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
  $sql = "SELECT i.id AS id, i.source as source,i.status as status, i.addtime as addtime, i.edittime as edittime,i.reid as reid ,c.name as cname ,c.phone as cphone,i.caid as caid,i.rid as rid ,i.cid as cid,i.salary as salary,i.accept as accept,i.accepttime as accepttime,i.pay as pay,i.paytime as paytime FROM  interview i  LEFT JOIN resume r ON i.rid = r.id LEFT JOIN cases c ON i.cid = c.id WHERE i.status = 2   ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-2 col-md-2 col-xs-5 col-sm-5">
                  <a href="javascript:chaa('reid','<?php echo $sort?>')">
                  老師姓名&電話
                  <?php 
                  if($o_old == "reid" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('cname','<?php echo $sort?>')">案主姓名&電話
                  <?php 
                  if($o_old == "cname" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('source','<?php echo $sort?>')">來源
                  <?php 
                  if($o_old == "source" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('salary','<?php echo $sort?>')">時薪
                  <?php 
                  if($o_old == "salary" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('accept','<?php echo $sort?>')">回報狀態
                  <?php 
                  if($o_old == "accept" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('pay','<?php echo $sort?>')">付款
                  <?php 
                  if($o_old == "pay" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('paytime','<?php echo $sort?>')">確認時間
                  <?php 
                  if($o_old == "paytime" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2"></td>
              </tr>
            </thead>
            <tbody>
               <?php
                foreach ($rs as $key => $row) {
                  $res = getProfile($row["reid"]);
                ?>
                <tr class="changedtr<?php echo $row["id"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-5 col-sm-5 tabletd" style="word-break: break-all">
                    <a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php echo $res[1]?><br><?php echo $res[6]?></a>
                  </td>
                  <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <a href="secase.php?id=<?php echo $row["cid"]?>" target="_blank"><?php echo $row["cname"]?><br><?php echo $row["cphone"]?></a>
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["source"] == 0 ){echo "案主";}
                  else{echo "老師";}
                  ?>    
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  echo $row["salary"];
                  ?>  
                  </td>
                  <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["accept"] == 0 ){echo "未回報";}
                  else if($row["accept"] == 1 ){echo "接受";}
                  else{ echo "婉拒";}
                  ?>  
                  </td>
                  <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd">
                    <?php 
                  if($row["pay"] == 0 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}else{echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  ?>    
                  </td>
                  <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php echo $row["paytime"]?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="text-align: center;">
                  <a href="javascript:edit(<?php echo $row["id"]?>)"><button class="btn tbu " id="editbutton">編輯</button></a> 
                  <a href="javascript:deletedeal(<?php echo $row["id"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td>

                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) as n FROM  interview i  LEFT JOIN resume r ON i.rid = r.id LEFT JOIN cases c ON i.cid = c.id WHERE i.status = 2";
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
         