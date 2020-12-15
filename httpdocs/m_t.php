<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 10; 
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="numbers"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="ASC"; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;

  $sql = "SELECT * FROM cases ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                  <a href="javascript:chaa('numbers','<?php echo $sort?>')">案件編號
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
                <a href="javascript:chaa('name','<?php echo $sort?>')">聯絡人
                  <?php 
                  if($o_old == "name" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <a href="javascript:chaa('status','<?php echo $sort?>')">案件狀態
                  <?php 
                  if($o_old == "status" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3"></td>
              </tr>
            </thead>
            <tbody>
               <?php
                foreach ($rs as $key => $row) {
                ?>
                <tr class="changedtr<?php echo $row["id"]?>">
                  <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3 tabletd" style="word-break: break-all"><a href="secase.php?id=<?php echo $row["id"]?>" target="_blank" class="tablea"><?php echo $row["numbers"]?></a></td>
                  <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3 tabletd"  style="word-break: break-all"><?php echo $row["name"]?></td>
                  <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3 tabletd">
                  <?php
                  if($row["status"] == 0){ echo "開放";}else{echo "關閉";} ?>
                  </td>
                  <td  class="col-lg-3 col-md-3 col-xs-3 col-sm-3 tabletd">
                  <?php
                  if($row["status"] == 0){
                    ?>
                    <a href="javascript:changestatus(<?php echo $row["id"]?>,1)"><button class="btn tcbu" id="editbutton">關閉</button></a>
                    <?php
                    }else{
                    ?>
                    <a href="javascript:changestatus(<?php echo $row["id"]?>,0)"><button class="btn tbu" id="editbutton" >開放</button></a>
                      <?php
                    }?>
                    <a href="javascript:deletecases(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton" >刪除</button></a>
                  </td>
                  
                  
                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) AS n FROM cases";
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
                    }
                 }
            ?>
            </div>