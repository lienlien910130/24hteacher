<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 30; 
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="updatetime"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="DESC"; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;

  $sql = "SELECT m.id as id,m.numbers as numbers,r.id as rid,r.lastedit as lastedit,r.views as views,r.deal as deal,p.certification as cerfi,p.updatetime as updatetime FROM resume r LEFT JOIN member m on r.uid = m.id LEFT JOIN power p on p.uid = m.id ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>
<h4><i class='fa fa-dot-circle-o' aria-hidden='true' style='color:rgb(239,97,0);'></i>表示有未審核之項目</h4>
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
                <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <a href="javascript:chaa('updatetime','<?php echo $sort?>')">更新時間
                  <?php 
                  if($o_old == "updatetime" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('cerfi','<?php echo $sort?>')">學歷審核
                  <?php 
                  if($o_old == "cerfi" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <!-- <a href="javascript:chaa('cerfi','<?php echo $sort?>')">
                  <?php 
                  if($o_old == "cerfi" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->證照審核
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <!-- <a href="javascript:chaa('cerfi','<?php echo $sort?>')">
                  <?php 
                  if($o_old == "cerfi" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->教材&筆記審核
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <!-- <a href="javascript:chaa('cerfi','<?php echo $sort?>')">
                  <?php 
                  if($o_old == "cerfi" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->影片審核
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('certif','<?php echo $sort?>')">觀看次數
                  <?php 
                  if($o_old == "certif" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                  <a href="javascript:chaa('resumes','<?php echo $sort?>')">成交次數
                  <?php 
                  if($o_old == "resumes" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
              </tr>
            </thead>
            <tbody>
               <?php
                foreach ($rs as $key => $row) {
                ?>
                <tr class="changedtr<?php echo $row["id"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                  <a  href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php echo $row["numbers"]?></a>
                  </td>
                  <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3 tabletd"  style="word-break: break-all"><?php echo $row["updatetime"]?></td>
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd"  style="word-break: break-all">
                  <?php 
                  if($row["cerfi"] == 2 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}
                  else if($row["cerfi"] == 1 ){echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  else{
                    $sql1 = "SELECT * FROM certification WHERE uid = '".$row["id"]."' AND names != '0'";
                    $rs1 = $pdo->query($sql1);
                    if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                      echo "未審核";
                    }else{
                      echo "未提供";
                    }
                  }
                  ?>  
                  </td>
					     <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd"  style="word-break: break-all">
                    <?php 
                    $sql1 = "SELECT * FROM resume_list WHERE rid=19 AND reid = '".$row["rid"]."'";
                    $rs1 = $pdo ->query($sql1);
                    foreach ($rs1 as $key => $row1) {
                        $u = explode(",", $row1["val"]);
                        if($u[3] == "0" && $u[1] != "0"){
                          echo "<i class='fa fa-dot-circle-o' aria-hidden='true' style='color:rgb(239,97,0);'></i>";
                          break;
                        }
                    }
                    ?>
                  </td>
                  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd"  style="word-break: break-all">
                    <?php 
                    $sql1 = "SELECT * FROM clouds WHERE types <>1 AND uid = '".$row["id"]."'";
                    $rs1 = $pdo->query($sql1);
                    foreach ($rs1 as $key => $row1) {
                      if($row1["checks"] == 0){
                        echo "<i class='fa fa-dot-circle-o' aria-hidden='true' style='color:rgb(239,97,0);'></i>";
                        break;
                      }
                    }
                    ?>
                  </td>
                  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd"  style="word-break: break-all">
                    <?php 
                    $sql1 = "SELECT * FROM clouds WHERE types = 1 AND uid = '".$row["id"]."'";
                    $rs2 = $pdo->query($sql1);
                    foreach ($rs2 as $key => $row2) {
                      if($row2["checks"] == 0){
                        echo "<i class='fa fa-dot-circle-o' aria-hidden='true' style='color:rgb(239,97,0);'></i>";
                        break;
                      }
                    }
                    ?>
                  </td>
                 
                  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd" style="word-break: break-all">
                  <?php echo $row["views"]?>
                  </td>
                   <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                   <?php echo $row["deal"]?>    
                  </td>
                 <!--  
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1" style="text-align: center;">
                 
                  <a href="javascript:edit(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton">編輯</button></a>
                  <a href="javascript:deletess(<?php echo $row["id"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td> -->

                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
         
          
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) as n FROM resume r LEFT JOIN member m on r.uid = m.id";
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
            