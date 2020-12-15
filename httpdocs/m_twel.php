<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 5; 
  @session_start();
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="lastedit"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="DESC"; };
  if (isset($_SESSION["id"])) { $uid  = $_SESSION["id"]; } else { $uid=0; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  $sql = "SELECT r.numbers as numbers,rl.id as rlid,r.id as rid,rl.val as val,r.lastedit as lastedit FROM  resume_list rl LEFT JOIN resume r on r.id = rl.reid WHERE rl.rid = 19  ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12 ">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                  <a href="javascript:chaa('numbers','<?php echo $sort?>')">履歷編號
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
                <!-- <a href="javascript:chaa('val','<?php echo $sort?>')">證照說明
                  <?php 
                  if($o_old == "val" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->證照說明
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <!-- <a href="javascript:chaa('paths','<?php echo $sort?>')">
                  <?php 
                  if($o_old == "paths" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->證書
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('addtime','<?php echo $sort?>')">更新時間
                  <?php 
                  if($o_old == "addtime" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <!-- <a href="javascript:chaa('checks','<?php echo $sort?>')">審核
                  <?php 
                  if($o_old == "checks" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->審核
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                </td>
              </tr>
            </thead>
            <tbody>
               <?php
               $cases = getCase();
                foreach ($rs as $key => $row) {
                  $u  = explode(",", $row["val"]);
                  $r = getResumes();
                ?>
                <tr class="changedtr<?php echo $row["rlid"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                  <a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php echo $row["numbers"]?></a>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php 
                  $sql1 = "SELECT * FROM resume_list WHERE id = '".$u[0]."' ";
                  $rs1 = $pdo ->query($sql1);
                  foreach ($rs1 as $key => $row1) {
                    echo $row1["val"];
                  }
                  ?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php 
                  
                  if($u[2] == "0"){
                    echo "未提供";
                  }else{
                    $u1 = explode("/", $u[2]);
                    ?>
                    <a href="<?php echo $u[2]?>" target="_blank">
                  <img src="<?php echo $u[2]?>" class="img-responsive" style="width: 100%;border-radius: 10px;" title="查看">
                  </a>
                    <?php
                  }
                  ?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                     <?php echo $row["lastedit"] ?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                    <?php
                  if($u[3] == 0){ echo "未審核";}
                  else if($u[3] == 1){echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  else if($u[3] == 2){echo "<i class='fa fa-times' aria-hidden='true'></i>";}
                   ?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                    <a href="javascript:edit(<?php echo $row["rlid"]?>)"><button class="btn tbu" id="editbutton">編輯</button></a>
                    <a href="javascript:deletecard(<?php echo $row["rlid"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td>
                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) as n FROM  resume_list rl LEFT JOIN resume r on r.id = rl.reid WHERE rl.rid = 19 ";
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
          