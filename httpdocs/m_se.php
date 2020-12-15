<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 20; 
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="accepttime"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="DESC"; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  $sql = "SELECT i.id AS id, i.source as source,i.status as status, i.addtime as addtime, i.edittime as edittime,i.reid as reid ,c.name as cname ,c.phone as cphone,i.caid as caid,i.rid as rid ,i.cid as cid,i.type as type,i.salary as salary,i.accept as accept,i.accepttime as accepttime,i.typeedit as typeedit FROM interview i LEFT JOIN resume r ON i.rid = r.id LEFT JOIN cases c ON i.cid = c.id ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
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
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('type','<?php echo $sort?>')">回報狀態
                  <?php 
                  if($o_old == "type" && $s_old == "type"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
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
                <a href="javascript:chaa('accepttime','<?php echo $sort?>')">回報時間
                  <?php 
                  if($o_old == "accepttime" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('edittime','<?php echo $sort?>')">修改時間
                  <?php 
                  if($o_old == "edittime" && $s_old == "DESC"){
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
                  $cas = getProfile($row["caid"]);
                ?>
                <tr class="changedtr<?php echo $row["id"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-5 col-sm-5 tabletd" style="word-break: break-all">
                    <a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php 
                    if($res[2]=="女"){
                      echo $res[1]."小姐";
                    }else{
                      echo $res[1]."先生";
                    }
                    ?><br><?php echo $res[6]?></a>
                  </td>
                  <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <a href="secase.php?id=<?php echo $row["cid"]?>" target="_blank"><?php 
                  if($cas[2]=="女"){
                      echo $row["cname"]."小姐";
                    }else{
                      echo $row["cname"]."先生";
                    }
                 ?><br><?php echo $row["cphone"]?></a>
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["source"] == 0 ){echo "案主";}
                  else{echo "老師";}
                  ?>    
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["status"] == 0 ){echo "未處理";}
                  else if($row["status"] == 1){echo "待回覆";}
                  else if($row["status"] == 2){echo "已成交";}
                  else if($row["status"] == 3){echo "已婉拒";}
                  else if($row["status"] == 4){echo "處理中";}
                  ?>  
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["type"] == 0 ){echo "未處理";}
                  else if($row["type"] == 1){
                    if($row["salary"]!=0){
                      echo "報價：".$row["salary"];
                    }else{
                      echo "未報價";
                    }
                  }
                  else if($row["type"] == 2){echo "婉拒";}
                  ?> 
                  <br>
                  <?php 
                  if($row["accept"] == 0){
                    echo "未回報";
                  }else if($row["accept"] == 1){
                    echo "接受";
                  }else{
                    echo "拒絕";
                  }
                  ?> 
                  </td>
                  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php echo $row["addtime"]?>
                  </td>
                  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php echo $row["accepttime"]?>
                  </td>
                  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php echo $row["edittime"]?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="text-align: center;">
                  <a href="javascript:edit(<?php echo $row["id"]?>)"><button class="btn tbu hidden-xs hidden-sm" id="editbutton">編輯</button></a>
                  <a href="javascript:deleteinte(<?php echo $row["id"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td>

                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) AS n FROM interview";
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
         