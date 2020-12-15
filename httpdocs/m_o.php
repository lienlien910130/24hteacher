<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 25; 
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="updatetime"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="DESC"; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;

  $sql = "SELECT m.id AS id,m.numbers AS numbers,m.account AS account,p.id AS pid,p.cases AS cases,p.resumes AS resumes,p.invite AS invite,p.application AS application,p.certification as certif,p.invitenum as inum,p.applicnum as anum,p.updatetime as updatetime,p.lasttype as lasttype,m.type as type FROM member m   LEFT JOIN power p ON m.id = p.uid WHERE m.type != 0 ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                  <a href="javascript:chaa('numbers','<?php echo $sort?>')">會員編號
                  <?php 
                  if($o_old == "numbers" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }

                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('account','<?php echo $sort?>')">帳號
                  <?php 
                  if($o_old == "account" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
               <!--  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('certif','<?php echo $sort?>')">學歷審核
                  <?php 
                  if($o_old == "certif" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td> -->
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                  <a href="javascript:chaa('resumes','<?php echo $sort?>')">履歷曝光
                  <?php 
                  if($o_old == "resumes" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('cases','<?php echo $sort?>')">刊登案件
                  <?php 
                  if($o_old == "cases" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }

                  ?>

                </a>

                </td>
                
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                   <a href="javascript:chaa('invite','<?php echo $sort?>')">主動邀請
                  <?php 
                  if($o_old == "invite" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                   <a href="javascript:chaa('application','<?php echo $sort?>')">主動應徵
                  <?php 
                  if($o_old == "application" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                   <a href="javascript:chaa('updatetime','<?php echo $sort?>')">最新活動
                  <?php 
                  if($o_old == "updatetime" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2"></td>
              </tr>
            </thead>
            <tbody>
               <?php
                foreach ($rs as $key => $row) {
                ?>
                <tr class="changedtr<?php echo $row["id"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                  <a  href="javascript:myprofile(<?php echo $row["id"]?>)"><?php echo $row["numbers"]?></a>
                  <?php 
                  if($row["type"] == 0){
                    echo "<br>管理者";
                  }else if($row["type"] == 1){
                    echo "<br>網站註冊";
                  }else if($row["type"] == 2){
                    echo "<br>FB";
                  }else{
                    echo "<br>Google+";
                  }
                  ?>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd"  style="word-break: break-all">
					  <?php echo $row["account"]?>
					
					</td>
                  <!-- <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                  <?php 
                  if($row["certif"] == 2 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}
                  else if($row["certif"] == 1 ){echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  else{
                    $sql1 = "SELECT * FROM certification WHERE uid = '".$row["id"]."'";
                    $rs1 = $pdo->query($sql1);
                    if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                      echo "未審核";
                    }else{
                      echo "未提供";
                    }
                 
                  }
                  ?>  
                  </td> -->
                   <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["resumes"] == 0 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}else{echo "<i class='fa fa-check' aria-hidden='true'></i>";}

                  ?>    
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["cases"] == 0 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}else{echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  
                  ?>  
                  </td>
                 
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["invite"] == 0 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}else{echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  echo "<br>".$row["inum"];
                  ?>    
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["application"] == 0 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}else{echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  echo "<br>".$row["anum"];
                  ?>    
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php 
                  echo $row["updatetime"];
                   if($row["lasttype"] == 1){
                    echo "<br>更新履歷";
                  }else if($row["lasttype"] == 2){
                    echo "<br>刊登案件";
                  }else if($row["lasttype"] == 3){
                    echo "<br>主動邀請";
                  }else if($row["lasttype"] == 4){
                    echo "<br>主動應徵";
                  }else if($row["lasttype"] == 5){
                    echo "<br>上傳教材&筆記/影片";
                  }else if($row["lasttype"] == 6){
                    echo "<br>購買筆記";
                  }else if($row["lasttype"] == 7){
                    echo "<br>給予評論";
                  }else if($row["lasttype"] == 8){
                    echo "<br>回覆面試";
                  }else if($row["lasttype"] == 9){
                    echo "<br>成交回報";
                  }
                  ?>    
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="text-align: center;">
                 
                  <a href="javascript:edit(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton">編輯</button></a>
                  <a href="javascript:deletess(<?php echo $row["id"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td>

                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div id="myProfile">
          <?php include_once 'myProfile.php';?>
          </div>

          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) AS n FROM member WHERE type != 0";
            $rs1 = $pdo->query($sql1);
               foreach ($rs1 as $key => $row1) {
                 $n1 = $row1["n"];
                 $total_pages = ceil( $n1 / $results_per_page);
                 for ($i=1; $i<=$total_pages; $i++) { 
                 // 
                  ?>
                  <a href="javascript:cha('<?php echo $i?>','<?php echo $o_old?>','<?php echo $s_old?>')" style="padding-left:10px;padding-right:10px" <?php 
                  if($i==$page){
                    echo "class='curPage'";
                  }
                  ?>><?php echo $i?></a>
                  <?php
                    // echo "<a href='javascript:cha('".$i."','".$order."','".$sort."')' style='padding-left:10px;padding-right:10px'";
                    // if ($i==$page)  echo " class='curPage'";
                    // echo ">".$i."</a> "; 
                    }
                 }
            ?>
            </div>
            