<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 10; 
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="email"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="ASC"; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;

  $sql = "SELECT * FROM newsletter ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-3 col-md-2 col-xs-5 col-sm-5">
                  <a href="javascript:chaa('email','<?php echo $sort?>')">信箱
                  <?php 
                  if($o_old == "email" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>

                <td class="col-lg-2 col-md-3 hidden-xs hidden-sm">
                <a href="javascript:chaa('casespa','<?php echo $sort?>')">案件
                  <?php 
                  if($o_old == "casespa" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>

                <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 ">
                <a href="javascript:chaa('teachpa','<?php echo $sort?>')">老師
                  <?php 
                  if($o_old == "teachpa" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('webpa','<?php echo $sort?>')">網站
                  <?php 
                  if($o_old == "webpa" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>

                </td>
                <td class="col-lg-3 col-md-1 col-xs-1 col-sm-1">
                  
                </td>
                
                
              </tr>
            </thead>
            <tbody>
               <?php
                foreach ($rs as $key => $row) {
                ?>
                <tr class="changedtr<?php echo $row["id"]?>">

                  <td class="col-lg-3 col-md-2 col-xs-5 col-sm-5 tabletd" style="word-break: break-all"><?php echo $row["email"]?></td>
                  <td class="col-lg-2 col-md-3 hidden-xs hidden-sm tabletd"  style="word-break: break-all">
                    <?php 
                  if($row["casespa"] == 0 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}else{echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  ?>
                  </td>
                  <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["teachpa"] == 0 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}else{echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  ?>
                  </td>
                  <td  class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["webpa"] == 0 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}else{echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  ?> 
                  </td>
                  <td  class="col-lg-3 col-md-2 col-xs-2 col-sm-2 tabletd" style="text-align: center;">
                  
                  <a href="javascript:edit(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton">編輯</button></a>
                  <a href="javascript:deletess(<?php echo $row["id"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td>

                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) AS n FROM newsletter";
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
         