<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 5; 
  @session_start();
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="addtime"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="DESC"; };
   if (isset($_SESSION["id"])) { $uid  = $_SESSION["id"]; } else { $uid=0; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  $sql = "SELECT n.id AS id,n.uid AS buyid,n.cid AS cid,n.cuid AS saleid,c.titles AS titles,r.numbers AS numbers,n.addtime AS addtime,c.types AS types,n.status as status,r.id as rid,c.hre as hre FROM notes n LEFT JOIN clouds c ON n.cid = c.id LEFT JOIN resume r ON n.cuid = r.uid WHERE n.uid='".$uid."' ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12 ">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                  <a href="javascript:chaa('numbers','<?php echo $sort?>')">賣家履歷
                  <?php 
                  if($o_old == "numbers" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <a href="javascript:chaa('types','<?php echo $sort?>')">類型
                  <?php 
                  if($o_old == "types" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                <a href="javascript:chaa('status','<?php echo $sort?>')">狀態
                  <?php 
                  if($o_old == "status" && $s_old == "DESC"){
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
               $cases = getCase();
                foreach ($rs as $key => $row) {
                ?>
                <tr class="changedtr<?php echo $row["id"]?>">
                  <td class="col-lg-4  col-md-4 col-xs-4 col-sm-4 tabletd" style="word-break: break-all">
                  <a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php echo $row["numbers"]?></a>
                  </td>
                  <td class="col-lg-4 col-md-4 col-xs-4 col-sm-4 tabletd">
                  <?php
                  if($row["types"] == 2){
                        ?>
                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">筆記</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <a href="<?php echo $row["hre"]?>" class="note" style="text-align: center;" target="_blank" title="預覽"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $row["titles"]?></div>
                      </div>
                        <?php
                       }else{
                        ?>
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">教材</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                          <a href="<?php echo $row["hre"]?>" class="hres" style="text-align: center;" target="_blank" title="預覽"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $row["titles"]?></div>
                      </div>
                        <?php
                       }
                  ?>
                  </td>
                  <td  class="col-lg-4  col-md-4 col-xs-4 col-sm-4 tabletd">
                    <?php
                  if($row["status"] == 0){ echo "未處理";}
                  else if($row["status"] == 1){echo "已成交";}
                  else if($row["status"] == 2){echo "已售出";}
                  else if($row["status"] == 3){echo "待回覆";}
                   ?>
                  </td>
                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) as n FROM notes n LEFT JOIN clouds c ON n.cid = c.id LEFT JOIN resume r ON n.cuid = r.uid WHERE n.uid='".$uid."' ";
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
          