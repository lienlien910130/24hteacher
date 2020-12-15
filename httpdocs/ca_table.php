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

if (isset($_POST["obj"])){ 
  if($_POST["obj"] != -1){
    $obj_str = " AND sc.obj=".$_POST["obj"];
    $obj= $_POST["obj"];
  }else{
    $obj_str = "";
    $obj = -1;
  }
} else { 
  $obj_str = "";
  $obj = -1;
};
if (isset($_POST["exper"])){ 
  if($_POST["exper"] != -1){
    $exper_str  = " AND sc.exper=".$_POST["exper"]; 
    $exper= $_POST["exper"];
  }else{
     $exper_str=""; 
     $exper= -1;
  }
} else { 
  $exper_str="";
  $exper= -1;
};
if (isset($_POST["sala"])){ 
  if($_POST["sala"] != -1){
    $sala_str  = " AND sc.sala=".$_POST["sala"];
    $sala= $_POST["sala"]; 
  }else{
     $sala_str=""; 
     $sala= -1;
  }
} else { 
  $sala_str=""; 
  $sala= -1;
};
if (isset($_POST["textnu"])){ 
  if($_POST["textnu"] != -1){
    $text_case  = " AND cl.val LIKE '%".$_POST["textnu"]."%' GROUP BY c.id ";
    $textnu = $_POST["textnu"];
  }else{
    $text_case=" AND cl.caid = 15 "; 
    $textnu= -1;
  }
} else { 
  $text_case=" AND cl.caid = 15 "; 
  $textnu= -1;
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
        $area_str.= "sc.area=".$area_ary[$i];
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
        $sub_str.= "sc.sub=".$sub_ary[$i];
      }
      $sub_str.=" )";
    }
  }else{
    $sub = -1;
  }
}else{
   $sub = -1;
};

$time_str = "";
$time_ary = array();
if (isset($_POST["timess"])){ 
  if($_POST["timess"] != "" && $_POST["timess"] != -1 ){
    $time_ary = explode(",", $_POST["timess"]); 
    $timess = $_POST["timess"];
    if(count($time_ary)>0)
    {
      $time_str = " AND ( ";
      for($i=0;$i<count($time_ary);$i++)
      {
        if($i>0)
          $time_str.=" OR ";
        $time_str.= "sc.timess=".$time_ary[$i];
      }
      $time_str.=" )";
    }
  }else{
     $timess = -1;
  }
}else{
  $timess = -1;
};
if (isset($_GET["text_case_a"]) || isset($_GET["text_case_s"]) || isset($_GET["searchtext"]) ){ 
  if(isset($_GET["text_case_a"])){
  $text_case  = " AND cl.caid = 19 AND cl.val LIKE '%".$_GET["text_case_a"]."%' ";
  $sql = "SELECT * FROM city WHERE cityvalue='".$text_case_a."'";
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
}else if(isset($_GET["text_case_s"])){
  $text_case  = " AND cl.caid = 4 AND cl.val LIKE '%".$_GET["text_case_s"]."%' ";
  $sql = "SELECT * FROM subjects WHERE val='".$text_case_s."'";
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
   $text_case  = " AND cl.val LIKE '%".$_GET["searchtext"]."%' GROUP BY c.id ";
   $textnu = $_GET["searchtext"];
  }
}else{ 
  
};
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; };
if (isset($_POST["order"])) { 
  $order  = $_POST["order"]; 
}else if(isset($_GET["order"])){
  $order  = $_GET["order"]; 
} else{ 
  $order="c_id"; 
};
if (isset($_POST["sort"])) { 
  $sort  = $_POST["sort"]; 
}else if(isset($_GET["sort"])){
  $sort  = $_GET["sort"]; 
} else { $sort="ASC"; };
$start_from = ($page-1) * $results_per_page;
$o_old = $order;
$s_old = $sort;

$sql = "SELECT c.id AS c_id,c.name as c_name,c.addtime as c_addtime,c.applicants as c_applicants,sc.obj as sc_obj,sc.sub as sc_sub,sc.area as sc_area,sc.exper as sc_exper,sc.sala as sc_sala,sc.timess as sc_timess,cl.val as cl_val,m.id as mid FROM cases c LEFT JOIN search_case sc ON sc.caseid = c.id LEFT JOIN case_list cl ON cl.cid = c.id LEFT JOIN member m on m.id = c.uid WHERE  c.status = 0 ".$text_case.$obj_str.$area_str.$sub_str.$exper_str.$sala_str.$time_str." ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
//echo $sql ;
$rs = $pdo->query($sql);
$sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

?> 
  
  <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" >
  <h2 class="se_hr">您的查詢結果
   <span class="pull-right" style="color: rgb(239,239,239);padding-top: 6px">
    <?php 
    $sql1 = "SELECT count(*) AS n FROM cases c LEFT JOIN search_case sc ON sc.caseid = c.id LEFT JOIN case_list cl ON cl.cid = c.id WHERE  c.status = 0 ".$text_case.$obj_str.$area_str.$sub_str.$exper_str.$sala_str.$time_str;
    $rs1 = $pdo->query($sql1);
    foreach ($rs1 as $key => $row1) {
      $n1 = $row1["n"];
      $total_pages = ceil( $n1 / $results_per_page);
      for ($i=1; $i<=$total_pages; $i++) { 
      ?>
      <a href="javascript:cha('<?php echo $i?>','<?php echo $o_old?>','<?php echo $s_old?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')" style="padding-left:10px;padding-right:10px" <?php 
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
      if($o_old == "cl_val" && $s_old == "DESC"){
        ?>
        <a href="javascript:chaa('cl_val','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);"><i class='fa fa-chevron-circle-up' aria-hidden='true' style="color: rgb(239,97,0);"></i>時薪預算
      </a>
        <?php
      }else if($o_old == "cl_val" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('cl_val','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);"><i class='fa fa-chevron-circle-down' aria-hidden='true' style="color: rgb(239,97,0);"></i>時薪預算
      </a>
        <?php
      }else{
        ?>
        <a href="javascript:chaa('cl_val','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')"><i class='fa fa-chevron-circle-down' aria-hidden='true'></i>時薪預算
      </a>
        <?php
      }
      ?>
      
     <?php 
      if($o_old == "c_addtime" && $s_old == "DESC"){
        ?>
        <a href="javascript:chaa('c_addtime','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);"><i class='fa fa-chevron-circle-up' aria-hidden='true' style="color: rgb(239,97,0);"></i>案件日期
        </a>
        <?php
      }else if($o_old == "c_addtime" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('c_addtime','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);"><i class='fa fa-chevron-circle-down' aria-hidden='true' style="color: rgb(239,97,0);"></i>案件日期
        </a>
        <?php
      }else{
        ?>
        <a href="javascript:chaa('c_addtime','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')"><i class='fa fa-chevron-circle-down' aria-hidden='true'></i>案件日期
        </a>
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
      if($o_old == "cl_val" && $s_old == "DESC"){
        ?>
        <a href="javascript:chaa('cl_val','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);"><i class='fa fa-chevron-circle-up' aria-hidden='true' style="color: rgb(239,97,0);"></i>時薪預算
      </a>
        <?php
      }else if($o_old == "cl_val" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('cl_val','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);"><i class='fa fa-chevron-circle-down' aria-hidden='true' style="color: rgb(239,97,0);"></i>時薪預算
      </a>
        <?php
      }else{
        ?>
        <a href="javascript:chaa('cl_val','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')"><i class='fa fa-chevron-circle-down' aria-hidden='true'></i>時薪預算
      </a>
        <?php
      }
      ?>
      
     <?php 
      if($o_old == "c_addtime" && $s_old == "DESC"){
        ?>
        <a href="javascript:chaa('c_addtime','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);"><i class='fa fa-chevron-circle-up' aria-hidden='true' style="color: rgb(239,97,0);"></i>案件日期
        </a>
        <?php
      }else if($o_old == "c_addtime" && $s_old == "ASC"){
        ?>
        <a href="javascript:chaa('c_addtime','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')" style="color: rgb(239,97,0);"><i class='fa fa-chevron-circle-down' aria-hidden='true' style="color: rgb(239,97,0);"></i>案件日期
        </a>
        <?php
      }else{
        ?>
        <a href="javascript:chaa('c_addtime','<?php echo $sort?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')"><i class='fa fa-chevron-circle-down' aria-hidden='true'></i>案件日期
        </a>
        <?php
      }
      ?>

      <span class="pull-right" style="padding-right: 5px;">
      <span style="color: white;">|</span>  共計 <?php echo $n1?> 筆</span>
  </div>
  </div>
  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
  <?php 
  $c = getCase();
     foreach ($rs as $key => $row) {
      $acc = getProfile($row["mid"]);
   ?> 
   <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="border:2px solid rgb(239,239,239);margin-top: 20px;margin-bottom: 0px;border-radius: 10px;text-align: center;">
   <div class="col-lg-11 col-md-12 col-xs-12 col-sm-12">
     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="border-bottom: 2px solid rgb(239,239,239);color: rgb(202,202,202);padding: 10px 0 10px 0">
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">聯絡人</div>
       <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 c">科目/對象</div>
       <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 c">時薪/經驗</div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">上課地點</div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">應徵數</div>
     </div>
     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="color: black;padding: 5px 0 10px 0">
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">
        <a href="secase.php?id=<?php echo $row["c_id"]?>" target="_blank">
        <?php 
        if($acc[2] == "女"){
          echo mb_substr($row["c_name"],0,1,"utf-8")."小姐";
        }else{
          echo mb_substr($row["c_name"],0,1,"utf-8")."先生";
        }
   ?>
        </a>
       </div>
       <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 c"><?php echo $c[$row["c_id"]][4]?></div>
       <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 c"><?php echo $c[$row["c_id"]][15]?><br><?php echo $c[$row["c_id"]][11]?></div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c">
       <!-- <?php echo substr( $c[$row["c_id"]][19],0,9)?> -->
       <?php echo $c[$row["c_id"]][19]?>
       </div>
       <div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 c"><?php echo $row["c_applicants"]?></div>
     </div>
  </div>
     <div class="col-lg-1 col-md-12 col-xs-12 col-sm-12 bas" style="">
       <button id="button3id" name="button3id" class="btn ba" type="button" onclick="addfavoritecase(<?php echo $row["c_id"]?>,<?php echo $uid?>,1)" style="border-radius: 10px;">加入<br class="hidden-md hidden-xs hidden-sm">收藏</button> 
     </div>
   </div>
   <?php 
      }
   ?> 
   </div>
   <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="padding-top: 10px;">
   <h2 class="se_h">
   <span class="pull-right" style="">
   <?php 
    $sql = "SELECT count(*) AS n FROM cases c LEFT JOIN search_case sc ON sc.caseid = c.id LEFT JOIN case_list cl ON cl.cid = c.id WHERE  c.status = 0 ".$text_case.$obj_str.$area_str.$sub_str.$exper_str.$sala_str.$time_str;
    $rs = $pdo->query($sql);
        foreach ($rs as $key => $row) {
                 $n1 = $row1["n"];
                 $total_pages = ceil( $n1 / $results_per_page);
                 for ($i=1; $i<=$total_pages; $i++) { 
                 // 
                  ?>
                  <a href="javascript:cha('<?php echo $i?>','<?php echo $o_old?>','<?php echo $s_old?>','<?php echo $obj?>','<?php echo $sub?>','<?php echo $area?>','<?php echo $exper?>','<?php echo $sala?>','<?php echo $timess?>','<?php echo $textnu?>')" style="padding-left:10px;padding-right:10px" <?php 
                  if($i==$page){
                    echo "class='curPage'";
                  }
                  ?>><?php echo $i?></a>
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
  padding-top:20px;padding-left: 10px;
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
.sort a ,.sort_1200 a , .sort .fa-chevron-circle-down,
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
  // function changic($id) {
  //   var trigger = $(".fa_"+$id);
  //   var tt = $(".fa-chevron-circle-down");
  //    var f_trigger = $(".a"+$id);
  //     if (trigger.hasClass('fa-chevron-circle-up') == true){
  //       trigger.removeClass('fa-chevron-circle-up');
  //       if(tt.lenght =1){
  //          tt.removeClass('fa-chevron-circle-down');
  //          tt.addClass('fa-chevron-circle-up');
  //          tt.parent().removeClass('has');
  //       }
  //       trigger.addClass('fa-chevron-circle-down');
  //       f_trigger.addClass('has');
  //     }else{
  //       f_trigger.removeClass('has');
  //       trigger.removeClass('fa-chevron-circle-down');
  //       trigger.addClass('fa-chevron-circle-up');
  //     }
  // }
function addfavoritecase($id,$uid,$types) {
  if ($uid == 0 ) {
    alert("請先登入");
  }
  else{
    $.ajax({
            type: "POST",
            url: 'addfavoritecaseProc.php',
            cache: false,
            data:"&id="+$id+"&uid="+$uid+"&types="+$types,
            success: function(data){
                    alert('加入成功!');
            }
        });
  }
}
</script>
