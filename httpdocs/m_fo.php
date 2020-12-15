<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 10; 
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="id"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="ASC"; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;

  $sql = "SELECT * FROM reaction ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-1 col-md-3 col-xs-3 col-sm-3">
                  <a href="javascript:chaa('name','<?php echo $sort?>')">姓名
                  <?php 
                  if($o_old == "name" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-3 hidden-xs hidden-sm">
                <a href="javascript:chaa('phone','<?php echo $sort?>')">電話
                  <?php 
                  if($o_old == "phone" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-3 hidden-xs hidden-sm">
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
                <a href="javascript:chaa('identity','<?php echo $sort?>')">身份
                  <?php 
                  if($o_old == "identity" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-3 col-xs-3 col-sm-3">
                <a href="javascript:chaa('addtime','<?php echo $sort?>')">反應時間
                  <?php 
                  if($o_old == "addtime" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-3 hidden-xs hidden-sm">
                <a href="javascript:chaa('reactions','<?php echo $sort?>')">反應類別
                  <?php 
                  if($o_old == "reactions" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-3 col-xs-3 col-sm-3">
                  <a href="javascript:chaa('isread','<?php echo $sort?>')">狀態
                  <?php 
                  if($o_old == "isread" && $s_old == "DESC"){
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
                  <td class="col-lg-1 col-md-2 col-xs-3 col-sm-3 tabletd" style="word-break: break-all"><?php echo $row["name"];?></td>
                  <td class="col-lg-2 col-md-2 hidden-xs hidden-sm tabletd" style="word-break: break-all">
                    <?php echo $row["phone"];?>
                  </td>
                  <td class="col-lg-2 col-md-2 hidden-xs hidden-sm tabletd" style="word-break: break-all">
                    <?php echo $row["email"];?>
                  </td>
                  <td class="col-lg-2 col-md-2 hidden-xs hidden-sm tabletd" style="word-break: break-all">
                    <?php echo $row["identity"];?>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-3 col-sm-3 tabletd" style="word-break: break-all">
                    <?php echo $row["addtime"];?>
                  </td>
                  <td class="col-lg-2 col-md-2 hidden-xs hidden-sm tabletd" style="word-break: break-all">
                    <?php echo $row["reactions"];?>
                  </td>
                  <td class="col-lg-1 col-md-2 col-xs-3 col-sm-3 tabletd">
                  <?php
                  if($row["isread"] == 0){ 
                    ?>
                    <a href="javascript:read(<?php echo $row["id"]?>)""><i class="fa fa-envelope-o" aria-hidden="true" style="color: #595959"></i></a>
                    <?php
                  }
                  else if($row["isread"] == 1){
                  ?>
                   <a href="javascript:read(<?php echo $row["id"]?>)"><i class="fa fa-envelope-open-o" aria-hidden="true" style="color: rgb(239,97,0);"></i></a>
                  <?php
                  }
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
            $sql1 = "SELECT count(*) AS n FROM reaction";
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
              <?php include_once 'm_fo_xs_e.php';?>
            </div>