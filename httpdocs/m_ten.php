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
  $sql = "SELECT r.numbers as numbers,c.id as cid,r.id as rid,c.titles as titles,c.names as names,c.hre as hre,c.names_all as names_all,c.hre_all as hre_all,c.types as types,c.prices as prices,c.checks as checks,c.addtime as addtime FROM clouds c LEFT JOIN resume r on c.uid = r.uid WHERE c.types <> 1 ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
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
                <a href="javascript:chaa('types','<?php echo $sort?>')">預覽版
                  <?php 
                  if($o_old == "types" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('types','<?php echo $sort?>')">完整版
                  <?php 
                  if($o_old == "types" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('prices','<?php echo $sort?>')">價錢
                  <?php 
                  if($o_old == "prices" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('addtime','<?php echo $sort?>')">新增時間
                  <?php 
                  if($o_old == "addtime" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('checks','<?php echo $sort?>')">審核
                  <?php 
                  if($o_old == "checks" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                </td>
              </tr>
            </thead>
            <tbody>
               <?php
               $cases = getCase();
                foreach ($rs as $key => $row) {
                ?>
                <tr class="changedtr<?php echo $row["cid"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                  <a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php echo $row["numbers"]?></a>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
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
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                   <?php
                  if($row["types"] == 2){
                        ?>
                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">筆記</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <a href="<?php echo $row["hre_all"]?>" class="note" style="text-align: center;" target="_blank" title="預覽"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $row["titles"]?></div>
                      </div>
                        <?php
                       }else{
                        ?>
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">教材</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                          <a href="<?php echo $row["hre_all"]?>" class="hres" style="text-align: center;" target="_blank" title="預覽"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $row["titles"]?></div>
                      </div>
                        <?php
                       }
                  ?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                    <?php echo $row["prices"] ?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                     <?php echo $row["addtime"] ?>
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                    <?php
                  if($row["checks"] == 0){ echo "未審核";}
                  else if($row["checks"] == 1){echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  else if($row["checks"] == 2){echo "<i class='fa fa-times' aria-hidden='true'></i>";}
                   ?>
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                    <a href="javascript:edit(<?php echo $row["cid"]?>)"><button class="btn tbu" id="editbutton">編輯</button></a>
                    <a href="javascript:deletenote(<?php echo $row["cid"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td>
                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) as n FROM clouds c LEFT JOIN resume r on c.uid = r.uid WHERE c.types <> 1 ";
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
          