<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 10; 
  @session_start();
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="addtime"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="DESC"; };
   if (isset($_SESSION["id"])) { $uid  = $_SESSION["id"]; } else { $uid=0; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  // $sql = "SELECT * FROM cases cas left join search_case scs on cas.id=scs.caseid  WHERE cas.uid='".$uid."' ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $sql = "SELECT i.reid AS reid,i.source as source,i.status as status,i.addtime as addtime,i.edittime as edittime,i.id as iid,i.salary as i_salary,sc.obj as obj,sc.sub as sub,sc.area as area,c.numbers as numbers,c.id as cid,c.status as cst,i.source as source,i.type as type,i.accept as accept FROM interview i LEFT JOIN search_case sc ON i.cid = sc.caseid LEFT JOIN cases c ON c.id = i.cid WHERE  i.reid='".$uid."' ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $cases = getCases($uid);
  $c = getCase();
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
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
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('sub','<?php echo $sort?>')">科目
                  <?php 
                  if($o_old == "sub" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('area','<?php echo $sort?>')">地點
                  <?php 
                  if($o_old == "area" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('obj','<?php echo $sort?>')">對象
                  <?php 
                  if($o_old == "obj" && $s_old == "DESC"){
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
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('cst','<?php echo $sort?>')">回報
                  <?php 
                  if($o_old == "cst" && $s_old == "DESC"){
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
                <tr class="changedtr<?php echo $row["cid"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                  <a href="secase.php?id=<?php echo $row["cid"]?>" target="_blank"><?php echo $row["numbers"]?></a>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php echo $cases[$row["cid"]][4];?>
                  </td>
                 
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php echo $cases[$row["cid"]][19];?>    
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php echo $cases[$row["cid"]][20];?>   
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["status"] == 0){ echo "未處理";}
                  else if($row["status"] == 1){ echo "待回覆";}
                  else if($row["status"] == 2){ echo "已成交";}
                  else if($row["status"] == 3){ echo "已婉拒";}
                  ?>  
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd" style="text-align: center;">
                  <?php 
                  if($row["source"] == 0){ echo "案主";}
                  else{ echo "老師";}
                  ?>  
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="text-align: center;">
                  <?php 
                  if($row["source"] == 0){ 

                      if($row["type"] == 0){
                        ?>
                      <a href="javascript:changedeal(<?php echo $row["iid"]?>,1)"><button class="btn tbu" id="editbutton" >報價</button></a>
                      <a href="javascript:changetype(<?php echo $row["iid"]?>,2)"><button class="btn tbu" id="editbutton" >婉拒</button></a>
                        <?php
                      }else if($row["type"] == 1){
                        echo "報價：".$row["i_salary"];
                      }else{
                        echo "婉拒";
                      }
                  }else{
                    if($row["type"] == 1){
                      if($row["status"] == 4){
                         if($row["accept"] == 0){
                        ?>
                        <a href="javascript:changeaccept(<?php echo $row["iid"]?>,1)"><button class="btn tbu" id="editbutton" >接受</button></a>
                      <a href="javascript:changeaccept(<?php echo $row["iid"]?>,2)"><button class="btn tbu" id="editbutton" >婉拒</button></a>
                      <?php
                      }else if($row["accept"] == 1){
                        echo "接受";
                      }else{
                        echo "拒絕";
                      }
                      }
                     
                    }
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
            $sql1 = "SELECT count(*) as n FROM interview i LEFT JOIN search_case sc ON i.cid = sc.caseid LEFT JOIN cases c ON c.id = i.cid WHERE  i.reid='".$uid."' ";
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
          