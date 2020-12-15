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

  $sql = "SELECT n.id AS id,n.uid AS buyid,n.cid AS cid,n.cuid AS saleid,c.titles AS titles,c.types AS types,r.numbers AS numbers,n.addtime AS addtime,c.types AS types,n.status as status,r.id as rid FROM notes n LEFT JOIN clouds c ON n.cid = c.id LEFT JOIN resume r ON n.cuid = r.uid ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-2 col-md-3 col-xs-3 col-sm-3">
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
                <td class="col-lg-2 col-md-3 hidden-xs hidden-sm">
                <a href="javascript:chaa('saleid','<?php echo $sort?>')">賣方聯絡人&電話
                  <?php 
                  if($o_old == "saleid" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-3 hidden-xs hidden-sm">
                <a href="javascript:chaa('buyid','<?php echo $sort?>')">買方聯絡人&電話
                  <?php 
                  if($o_old == "buyid" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-3 col-xs-3 col-sm-3">
                <a href="javascript:chaa('addtime','<?php echo $sort?>')">購買時間
                  <?php 
                  if($o_old == "addtime" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-3 hidden-xs hidden-sm">
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
                <td class="col-lg-2 col-md-3 col-xs-3 col-sm-3">
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
                <td class="col-lg-1 col-md-3 col-xs-3 col-sm-3">
                 
                </td>
              </tr>
            </thead>
            <tbody>
               <?php
                foreach ($rs as $key => $row) {
                $buy = getProfile($row["buyid"]);
                $sale = getProfile($row["saleid"]);
                ?>
                <tr class="changedtr<?php echo $row["id"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-3 col-sm-3 tabletd" style="word-break: break-all"><a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank" class="tablea"><?php echo $row["numbers"]?></a></td>
                  <td class="col-lg-2 col-md-2 hidden-xs hidden-sm tabletd" style="word-break: break-all">
                    <?php echo $sale[1];?><br><?php echo $sale[6];?>
                  </td>
                  <td class="col-lg-2 col-md-2 hidden-xs hidden-sm tabletd" style="word-break: break-all">
                    <?php echo $buy[1];?><br><?php echo $buy[6];?>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-3 col-sm-3 tabletd" style="word-break: break-all">
                    <?php echo $row["addtime"];?>
                  </td>
                  <td class="col-lg-1 col-md-1 hidden-xs hidden-sm tabletd">
                  <?php
                  if($row["types"] == 0){ 
                    echo "教材<br>".$row["titles"];
                  }
                  else if($row["types"] == 2){
                    echo "筆記<br>".$row["titles"];
                  }
                   ?>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-3 col-sm-3 tabletd">
                  <?php
                  if($row["status"] == 0){ echo "未處理";}
                  else if($row["status"] == 1){echo "已成交";}
                  else if($row["status"] == 2){echo "已售出";}
                  else if($row["status"] == 3){echo "待回復";}
                   ?>
                  </td>
                  <td class="col-lg-1 col-md-1 col-xs-3 col-sm-3 tabletd">
                  <a href="javascript:edit_xs(<?php echo $row["id"]?>)"><button class="btn tbu hidden-lg hidden-md" id="editbutton">編輯</button></a>
                    <a href="javascript:edit(<?php echo $row["id"]?>)"><button class="btn tbu hidden-xs hidden-sm" id="editbutton">編輯</button></a>
                  <a href="javascript:deletenote(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton">刪除</button></a>
                  </td>
                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) AS n FROM notes";
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
            <div id="xsed">
              <?php include_once 'm_th_xs_e.php';?>
            </div>