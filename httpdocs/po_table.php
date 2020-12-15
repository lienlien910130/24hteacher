 <?php
 include_once 'lib/core.php';
 $pdo = DB_CONNECT();
 @session_start();

 if(!isset($_SESSION['id']) || empty($_SESSION['id']) ){
  $uid =  0;
 }else{
  $uid = $_SESSION["id"];
 }
  $results_per_page = 10; 

if (isset($_POST["exper"])){ 
  if($_POST["exper"] != -1){
    $exper_str  = " AND st.exper=".$_POST["exper"]; 
    $exper= $_POST["exper"];
  }else{
     $exper_str=""; 
     $exper= -1;
  }
} else { 
  $exper_str="";
  $exper= -1;
};
if (isset($_POST["other"]) || isset($_GET["other"])){ 
  if(isset($_POST["other"])){
     if($_POST["other"] != -1){
      $other_str  = " AND st.other LIKE '%".$_POST["other"]."%' ";
      $other= $_POST["other"]; 
    }else{
      $other_str=""; 
      $other= -1;
    }
  }else{
    $other_str  = " AND st.other LIKE '%".$_GET["other"]."%' ";
    $other= $_GET["other"];  
  }
} else { 
  $other_str=""; 
  $other= -1;
};
if (isset($_POST["textnu"])){ 
  if($_POST["textnu"] != -1){
    $text_case  = " AND rl.val LIKE '%".$_POST["textnu"]."%' ";
    $textnu = $_POST["textnu"];
  }else{
    $text_case=""; 
    $textnu= -1;
  }
} else { 
  $text_case=""; 
  $textnu= -1;
};
$obj_str = "";
$obj_ary = array();
if (isset($_POST["obj"])){ 
  if($_POST["obj"] != "" && $_POST["obj"] != -1 ){
    $obj_ary = explode(",", $_POST["obj"]);
    $obj =  $_POST["obj"];
    if(count($obj_ary)>0)
    {
      $obj_str = " AND ( ";
      for($i=0;$i<count($obj_ary);$i++)
      {
        if($i>0)
          $obj_str.=" OR ";
        $obj_str.= " st.obj LIKE '%".$obj_ary[$i]."%'  ";
      }
      $obj_str.=" )";
    }
  }else{
    $obj = -1;
  }
}else{
   $obj = -1;
};
$sala_str = "";
$sala_ary = array();
if (isset($_POST["sala"])){ 
  if($_POST["sala"] != "" && $_POST["sala"] != -1 ){
    $sala_ary = explode(",", $_POST["sala"]);
    $sala =  $_POST["sala"];
    if(count($sala_ary)>0)
    {
      $sala_str = " AND ( ";
      for($i=0;$i<count($sala_ary);$i++)
      {
        if($i>0)
          $sala_str.=" OR ";
        $sala_str.= " st.sala LIKE '%".$sala_ary[$i]."%' ";
      }
      $sala_str.=" )";
    }
  }else{
    $sala = -1;
  }
}else{
   $sala = -1;
};
$area_str = "";
$area_ary = array();
if (isset($_POST["area"])){ 
  if($_POST["area"] != "" && $_POST["area"] != -1 ){
    $area_ary = explode(",", $_POST["area"]);
    $area = $_POST["area"]; 
    if(count($area_ary)>0)
    {
      $area_str = " AND ( ";
      for($i=0;$i<count($area_ary);$i++)
      {
        if($i>0)
          $area_str.=" OR ";
        $area_str.= " st.area LIKE '%,".$area_ary[$i]."' OR st.area LIKE  '%,".$area_ary[$i].",%' OR st.area LIKE '".$area_ary[$i].",%' ";
      }
      $area_str.=" )";
    }
  }else{
    $area = -1;
  }
}else{
   $area = -1;
};

$sub_str = "";
$sub_ary = array();
if (isset($_POST["sub"])){ 
  if($_POST["sub"] != "" && $_POST["sub"] != -1 ){
    $sub_ary = explode(",", $_POST["sub"]);
    $sub =  $_POST["sub"];
    if(count($sub_ary)>0)
    {
      $sub_str = " AND ( ";
      for($i=0;$i<count($sub_ary);$i++)
      {
        if($i>0)
          $sub_str.=" OR ";
        $sub_str.= " st.sub LIKE '%,".$sub_ary[$i].",%' OR  st.sub LIKE '%,".$sub_ary[$i]."'  OR  st.sub LIKE '".$sub_ary[$i].",%' ";
      }
      $sub_str.=" )";
    }
  }else{
    $sub = -1;
  }
}else if(isset($_GET["sub"])){
  if($_GET["sub"] != "" && $_GET["sub"] != -1 ){
    $sub_ary = explode(",", $_GET["sub"]);
    $sub =  $_GET["sub"];
    if(count($sub_ary)>0)
    {
      $sub_str = " AND ( ";
      for($i=0;$i<count($sub_ary);$i++)
      {
        if($i>0)
          $sub_str.=" OR ";
        $sub_str.= " st.sub LIKE '%,".$sub_ary[$i].",%' OR  st.sub LIKE '%,".$sub_ary[$i]."'  OR  st.sub LIKE '".$sub_ary[$i].",%' ";
      }
      $sub_str.=" )";
    }
  }else{
    $sub = -1;
  }
}else{
   $sub = -1;
};

if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; };
if (isset($_POST["order"])) { 
  $order  = $_POST["order"];
  switch ($order) {
    case 'r_lastedit':
      $order_str = " r.lastedit ";
      $ml_str = " ml.cid = 2 AND rl.rid = 10 ";
      break;
    case 'ml_gender':
      $order_str = " ml.val ";
      $ml_str = " ml.cid = 2 AND rl.rid = 10 ";
      break;
    case 'exper':
      $order_str = " exper ";
      $ml_str = " ml.cid = 2 AND rl.rid = 4 ";
      break;
    case 'r_deal':
      $order_str = " r.deal ";
      $ml_str = " ml.cid = 2 AND rl.rid = 10 ";
      break;
    case 'ml_man':
      $order_str = " rl.val ";
      $ml_str = " ml.cid = 2 AND rl.rid = 18 ";
      break;
    case 'r.id':
      $order_str = " r.id ";
      $ml_str = " ml.cid = 2 AND rl.rid = 10 ";
      break;  
    default:
      $order_str = " r.id ";
      $ml_str = " ml.cid = 2 AND rl.rid = 10 ";
      break;
  }
}else if(isset($_GET["order"])){
  $order  = $_GET["order"];
  switch ($order) {
    case 'exper':
      $order_str = " exper ";
      $ml_str = " ml.cid = 2 AND rl.rid = 4 ";
      break;
    case 'r_deal':
      $order_str = " r.deal ";
      $ml_str = " ml.cid = 2 AND rl.rid = 10 ";
      break;
    case 'ml_man':
      $order_str = " rl.val ";
      $ml_str = " ml.cid = 2 AND rl.rid = 18 ";
      break; 
    default:
      $order_str = " r.id ";
      $ml_str = " ml.cid = 2 AND rl.rid = 10 ";
      break;
  }
}else{ $order=" r.id " ; $order_str=" r.id "; $ml_str = " ml.cid = 2 AND rl.rid = 10 "; };
if (isset($_POST["sort"])) { 
  $sort  = $_POST["sort"]; 
}else if(isset($_GET["sort"])){
  $sort  = $_GET["sort"];
}else { $sort="ASC"; };
if (isset($_GET["text_teac_a"]) || isset($_GET["text_teac_s"]) || isset($_GET["searchtext"]) ){ 
  if(isset($_GET["text_teac_a"])){
  $text_case  = " AND rl.rid = 2 AND rl.val LIKE '%".$_GET["text_teac_a"]."%' ";
  $ml_str = " ml.cid = 2 ";
  $sql = "SELECT * FROM city WHERE cityvalue='".$text_teac_a."'";
  $rs = $pdo ->query($sql);
  $sta = "";
  $y=1;
  foreach ($rs as $key => $row) {
  $sql1 = "SELECT * FROM area WHERE cid='".$row["id"]."'";
  $rs1 = $pdo ->query($sql1);
  foreach ($rs1 as $key => $row1) {
    if($y == 1){
      $sta .= $row1["id"];
      $y++;
    }else{
      $sta .= ",".$row1["id"];
      $y++;
     }
  }
}
  $area = $sta;
}else if(isset($_GET["text_teac_s"])){
  $text_case  = " AND rl.rid = 1 AND rl.val LIKE '%".$_GET["text_teac_s"]."%' ";
  $ml_str = " ml.cid = 2 ";
  $sql = "SELECT * FROM subjects WHERE val='".$text_teac_s."'";
  $rs = $pdo ->query($sql);
  $st = "";
  $x=1;
  foreach ($rs as $key => $row) {
  $sql1 = "SELECT * FROM lessions WHERE sid='".$row["id"]."'";
  $rs1 = $pdo ->query($sql1);
  foreach ($rs1 as $key => $row1) {
    if($x == 1){
      $st .= $row1["id"];
      $x++;
    }else{
      $st .= ",".$row1["id"];
      $x++;
      }
    }
  }
  $sub = $st;
  }else{
    $text_case  = " AND rl.val LIKE '%".$_GET["searchtext"]."%' ";
    $textnu = $_GET["searchtext"];
  }
}else{ 
};

$start_from = ($page-1) * $results_per_page;
$o_old = $order;
$s_old = $sort;

$sql = "SELECT r.id AS r_id,r.numbers AS r_numbers,r.lastedit AS r_lastedit,ml.val as ml_val,r.deal as r_deal,rl.val as rl_val,st.exper as exper FROM resume r LEFT JOIN search_teacher st ON st.resumeid = r.id LEFT JOIN resume_list rl ON rl.reid = r.id LEFT JOIN power p ON p.uid = r.uid LEFT JOIN member_list ml ON ml.uid = r.uid WHERE ".$ml_str.$text_case.$obj_str.$area_str.$sub_str.$exper_str.$sala_str.$other_str." GROUP BY r.id ORDER BY ".$order_str." $sort LIMIT $start_from,".$results_per_page;
//p.resumes = 1
$rs = $pdo->query($sql);
$sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
//echo $sql ;
?> 
  <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" >
  <h2 class="se_hr">
   <span class="pull-right" style="color: rgb(239,239,239);padding-top: 6px">
    <?php 
    $sql1 = "SELECT count(*) as n FROM resume r LEFT JOIN search_teacher st ON st.resumeid = r.id LEFT JOIN resume_list rl ON rl.reid = r.id LEFT JOIN power p ON p.uid = r.uid LEFT JOIN member_list ml ON ml.uid = r.uid WHERE ".$ml_str.$text_case.$obj_str.$area_str.$sub_str.$exper_str.$sala_str.$other_str ;
    $rs1 = $pdo->query($sql1);
      foreach ($rs1 as $key => $row1) {
       $n1 = $row1["n"];
       $total_pages = ceil( $n1 / $results_per_page);
       for ($i=1; $i<=$total_pages; $i++) { 
       ?>
       <a href="javascript:cha('<?php echo $i?>','<?php echo $o_old?>','<?php echo $s_old?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="padding-left:10px;padding-right:10px" <?php 
         if($i==$page){
           echo "class='curPage'";
         }?>
          ><?php echo $i?></a>
          <?php
          }
       }
    ?>
  </span> 
  </h2>
  </div>
  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="background-color: rgb(239,239,239);border-radius: 10px;">
  <div class="col-lg-12 hidden-xs hidden-sm hidden-md">
    <h3 class="sort">排序方式： 
     <?php 
      if($o_old == "r_lastedit" && $s_old == "DESC"){
        ?>
        <a href="javascript:chaa('r_lastedit','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);">
        <?php
        echo "<i class='fa fa-chevron-circle-up' aria-hidden='true' style='color:rgb(239,97,0);'></i>更新日期</a>";
      }else if($o_old == "r_lastedit" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('r_lastedit','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);">
        <?php
        echo "<i class='fa fa-chevron-circle-down' aria-hidden='true' style='color:rgb(239,97,0);'></i>更新日期</a>";
      }
      else{
        ?>
        <a href="javascript:chaa('r_lastedit','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')">
        <?php
        echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>更新日期</a>";
      }
      ?>
      </a>

     <?php 
      if($o_old == "ml_gender" && $s_old == "DESC"){
        ?>
        <a href="javascript:chaa('ml_gender','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);">
        <i class="fa fa-chevron-circle-up" aria-hidden="true" style="color:rgb(239,97,0);"></i>性別</a>
        <?php
      }else if($o_old == "ml_gender" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('ml_gender','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);">
        <i class="fa fa-chevron-circle-down" aria-hidden="true" style="color:rgb(239,97,0);"></i>性別</a>
        <?php
      }else{
        ?>
        <a href="javascript:chaa('ml_gender','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')">
        <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>性別</a>
        <?php
      }
      ?>

     <?php 
      if($o_old == "exper" && $s_old == "DESC"){
        ?>
        <a href="javascript:chaa('exper','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
        <i class="fa fa-chevron-circle-up" aria-hidden="true" style="color:rgb(239,97,0);"></i>教學經驗</a>  
        <?php
      }else if($o_old == "exper" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('exper','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
        <i class="fa fa-chevron-circle-down" aria-hidden="true" style="color:rgb(239,97,0);"></i>教學經驗</a>
        <?php
      }else{
        ?>
        <a href="javascript:chaa('exper','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" >
        <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>教學經驗</a>
        <?php
      }
      ?>
      
     <?php 
      if($o_old == "r_deal" && $s_old == "DESC"){
       ?>
        <a href="javascript:chaa('r_deal','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
         <i class="fa fa-chevron-circle-up" aria-hidden="true" style="color:rgb(239,97,0);"></i>成交量</a>
       <?php
      }else if($o_old == "r_deal" && $s_old == "ASC"){
       ?>
       <a href="javascript:chaa('r_deal','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
         <i class="fa fa-chevron-circle-down" aria-hidden="true" style="color:rgb(239,97,0);"></i>成交量</a>
       <?php 
      }else{
       ?>
       <a href="javascript:chaa('r_deal','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')">
         <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>成交量</a>
       <?php
      }
      ?>
     <?php 
      if($o_old == "ml_man" && $s_old == "DESC"){
       ?>
       <a href="javascript:chaa('ml_man','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
       <i class="fa fa-chevron-circle-up" aria-hidden="true" style="color:rgb(239,97,0);"></i>學歷</a>
       <?php
      }else if($o_old == "ml_man" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('ml_man','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
       <i class="fa fa-chevron-circle-down" aria-hidden="true" style="color:rgb(239,97,0);"></i>學歷</a>
       <?php
      }else{
        ?>
        <a href="javascript:chaa('ml_man','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')">
       <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>學歷</a>
       <?php
      }
      ?>
      <span class="pull-right" style="padding-right: 20px;">
      <span style="color: white;">|</span>  共計 <?php echo $n1?> 筆</span>
    </h3>
  </div>
  <div class="col-lg-12 hidden-lg col-xs-12 col-sm-12 col-md-12" style="padding-top: 10px;padding-left: 10px;">
    <h3 class="">排序方式</h3>
  </div>
  <div class="col-lg-12 sort_1200 hidden-lg col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 10px;">
    <?php 
      if($o_old == "r_lastedit" && $s_old == "DESC"){
        ?>
        <a href="javascript:chaa('r_lastedit','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);">
        <?php
        echo "<i class='fa fa-chevron-circle-up' aria-hidden='true' style='color:rgb(239,97,0);'></i>更新日期</a>";
      }else if($o_old == "r_lastedit" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('r_lastedit','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);">
        <?php
        echo "<i class='fa fa-chevron-circle-down' aria-hidden='true' style='color:rgb(239,97,0);'></i>更新日期</a>";
      }
      else{
        ?>
        <a href="javascript:chaa('r_lastedit','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')">
        <?php
        echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>更新日期</a>";
      }
      ?>
      </a>

     <?php 
      if($o_old == "ml_gender" && $s_old == "DESC"){
        ?>
        <a href="javascript:chaa('ml_gender','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);">
        <i class="fa fa-chevron-circle-up" aria-hidden="true" style="color:rgb(239,97,0);"></i>性別</a>
        <?php
      }else if($o_old == "ml_gender" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('ml_gender','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);">
        <i class="fa fa-chevron-circle-down" aria-hidden="true" style="color:rgb(239,97,0);"></i>性別</a>
        <?php
      }else{
        ?>
        <a href="javascript:chaa('ml_gender','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')">
        <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>性別</a>
        <?php
      }
      ?>

     <?php 
      if($o_old == "ml_exper" && $s_old == "DESC"){
        ?>
        <a href="javascript:chaa('ml_exper','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
        <i class="fa fa-chevron-circle-up" aria-hidden="true" style="color:rgb(239,97,0);"></i>教學經驗</a>  
        <?php
      }else if($o_old == "ml_exper" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('ml_exper','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
        <i class="fa fa-chevron-circle-down" aria-hidden="true" style="color:rgb(239,97,0);"></i>教學經驗</a>
        <?php
      }else{
        ?>
        <a href="javascript:chaa('ml_exper','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" >
        <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>教學經驗</a>
        <?php
      }
      ?>
      <br>
     <?php 
      if($o_old == "r_deal" && $s_old == "DESC"){
       ?>
        <a href="javascript:chaa('r_deal','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
         <i class="fa fa-chevron-circle-up" aria-hidden="true" style="color:rgb(239,97,0);"></i>成交量</a>
       <?php
      }else if($o_old == "r_deal" && $s_old == "ASC"){
       ?>
       <a href="javascript:chaa('r_deal','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
         <i class="fa fa-chevron-circle-down" aria-hidden="true" style="color:rgb(239,97,0);"></i>成交量</a>
       <?php 
      }else{
       ?>
       <a href="javascript:chaa('r_deal','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')">
         <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>成交量</a>
       <?php
      }
      ?>
     <?php 
      if($o_old == "ml_man" && $s_old == "DESC"){
       ?>
       <a href="javascript:chaa('ml_man','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
       <i class="fa fa-chevron-circle-up" aria-hidden="true" style="color:rgb(239,97,0);"></i>教育</a>
       <?php
      }else if($o_old == "ml_man" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('ml_man','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="color:rgb(239,97,0);">
       <i class="fa fa-chevron-circle-down" aria-hidden="true" style="color:rgb(239,97,0);"></i>教育</a>
       <?php
      }else{
        ?>
        <a href="javascript:chaa('ml_man','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')">
       <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>教育</a>
       <?php
      }
      ?>
    <span class="pull-right" style="padding-right: 5px;">
    <span style="color: white;">|</span>  共計 <?php echo $n1?> 筆</span>
  </div>
  </div>
  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
  <?php 
     $r = getResumes();
     foreach ($rs as $key => $row) {
      $sub = gettsub($row["r_id"]);
      
   ?> 
   <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="border:2px solid rgb(239,239,239);margin-top: 20px;margin-bottom: 0px;border-radius: 10px;text-align: center;">
   <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 ta_table_t" style="border-bottom: 2px solid rgb(239,239,239);color: rgb(202,202,202);padding: 10px 0 10px 0">
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">履歷編號</div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">科目</div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">教育背景</div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">經驗/試教</div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">成交數</div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">更新日期</div>
     </div>
     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 ta_table_c" style="color: black;padding: 5px 0 10px 0">
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c" style="word-break: break-all">
        <a href="seteacher.php?id=<?php echo $row["r_id"]?>" target="_blank"><?php echo $row["r_numbers"]?></a>
       </div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c" style="word-break: break-all"> 
         <?php 
          for ($i=0; $i < count($sub[$row["r_id"]]) ; $i++) { 
            $out = explode(",",$sub[$row["r_id"]][$i]);
            echo $out[1]."<br>";
         }?>
       </div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c" style="word-break: break-all">
         <?php echo $r[$row["r_id"]][10]."，".$r[$row["r_id"]][17];?>
       </div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c" style="word-break: break-all">
         <?php echo $r[$row["r_id"]][4]."/".$r[$row["r_id"]][7];?>
       </div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c" style="word-break: break-all">
         <?php echo $row["r_deal"]?>
       </div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c" style="word-break: break-all">
         <?php 
         $list=explode(" ", $row["r_lastedit"]);
         $list1=explode("-", $list[0]); 
         echo $list1[0]."/".$list1[1]."/".$list1[2];
         ?>
       </div>
     </div>
  </div>
   </div>
   <?php 
      }
   ?> 
   </div>
    <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" >
  <h2 class="se_h">
   <span class="pull-right" style="color: rgb(239,239,239);padding-top: 6px">
    <?php 
    $sql1 = "SELECT count(*) as n FROM resume r LEFT JOIN search_teacher st ON st.resumeid = r.id LEFT JOIN resume_list rl ON rl.reid = r.id LEFT JOIN power p ON p.uid = r.uid LEFT JOIN member_list ml ON ml.uid = r.uid WHERE ".$ml_str.$text_case.$obj_str.$area_str.$sub_str.$exper_str.$sala_str.$other_str ;
    $rs1 = $pdo->query($sql1);
      foreach ($rs1 as $key => $row1) {
       $n1 = $row1["n"];
       $total_pages = ceil( $n1 / $results_per_page);
       for ($i=1; $i<=$total_pages; $i++) { 
       ?>
       <a href="javascript:cha('<?php echo $i?>','<?php echo $o_old?>','<?php echo $s_old?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $other?>','<?php echo $textnu?>')" style="padding-left:10px;padding-right:10px" <?php 
         if($i==$page){
           echo "class='curPage'";
         }?>
          ><?php echo $i?></a>
          <?php
          }
       }
    ?>
  </span> 
  </h2>
  </div>
    <style type="text/css">
.ba {
    background-color:  rgb(235,97,0);
    color: white;
    padding:7px;
}
.bas{
  padding-top:20px;padding-left: 10px;padding-right: 10px;
}
@media screen and (max-width: 1200px){
    .ba {
    padding:10px;
    width:50%;
   }
   .bas{
      padding-top:0px;padding-bottom: 10px;
   }
   .sort a{
    font-size: 20px;
   }
   .searchcase select , .searchcase .o{
    margin-top: 10px;
   }
}
.ba:hover{
  background-color: rgb(246,175,108);
  color: white;
}
.ba:focus{
  background-color: rgb(202,202,202);
  color: white;
}
.sort a ,.sort_1200 a,.sort .fa-chevron-circle-down,
.sort_1200 .fa-chevron-circle-down {
   color: rgb(137,137,137);
}
.sort a:hover ,.sort_1200 a:hover,.sort a:hover>i,.sort_1200 a:hover>i{
   color:rgb(235,97,0);
   text-decoration:none;
}
.sort a:focus,.sort_1200 a:focus,.sort a:focus>i,.sort_1200 a:focus>i{
   text-decoration:none;
}
.sort{
  font-size: 20px;
  padding-left: 20px;
}
.sort_1200{
  font-size: 18px;
  padding-left: 5px;
}

.sort .has,
.sort_1200 .has{
   color:rgb(235,97,0);
}
.se_hr>span>a ,.se_h>span>a{
  color: rgb(137,137,137);
  font-size: 14px;
}
.se_hr>span>a:hover , .se_h>span>a:hover{
  color: black;
  font-size: 14px;
}
.se_hr>span>a:focus , .se_h>span>a:focus{
  color: black;
  font-size: 14px;
}
</style>

<script type="text/javascript">
  function changic($id) {
    var trigger = $(".fa_"+$id);
    var tt = $(".fa-chevron-circle-down");
     var f_trigger = $(".a"+$id);
      if (trigger.hasClass('fa-chevron-circle-up') == true){
        trigger.removeClass('fa-chevron-circle-up');
        if(tt.lenght =1){
           tt.removeClass('fa-chevron-circle-down');
           tt.addClass('fa-chevron-circle-up');
           tt.parent().removeClass('has');
        }
        trigger.addClass('fa-chevron-circle-down');
        f_trigger.addClass('has');
      }else{
        f_trigger.removeClass('has');
        trigger.removeClass('fa-chevron-circle-down');
        trigger.addClass('fa-chevron-circle-up');
      }
  }
function addfavoritecase($id,$uid) {
  if ($uid == 0 ) {
    alert("請先登入");
  }
  else{
    $.ajax({
            type: "POST",
            url: 'addfavoritecaseProc.php',
            cache: false,
            data:"&id="+$id+"&uid="+$uid,
            success: function(data){
                    alert('加入成功!');
            }
        });
  }
}
</script>
