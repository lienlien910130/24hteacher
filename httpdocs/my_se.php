<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 10; 
  @session_start();
  if (isset($_POST["id"])) { $id  = $_POST["id"]; } else { $id  = $_GET["id"]; };
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="addtime"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="DESC"; };
   if (isset($_SESSION["id"])) { $uid  = $_SESSION["id"]; } else { $uid=0; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  $sql = "SELECT i.id as iid,i.status as istatus,st.obj as obj , st.sub as sub,st.area as area ,st.exper as exper,c.numbers as numbers,r.numbers as rnumbers,r.id as rid,i.status as status,i.type as type,i.salary as salary,i.accept as accept,i.source as source,i.addtime as addtime from interview i LEFT JOIN search_teacher st on i.rid = st.resumeid LEFT JOIN cases c on i.cid = c.id LEFT JOIN resume r on r.id = st.resumeid where c.id='".$id."' ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
  $r = getResumes();
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                  <a href="javascript:chaa('rnumbers','<?php echo $sort?>','<?php echo $id?>')">履歷編號
                  <?php 
                  if($o_old == "rnumbers" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3">
                <a href="javascript:chaa('obj','<?php echo $sort?>','<?php echo $id?>')">經驗
                  <?php 
                  if($o_old == "obj" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                 <a href="javascript:chaa('istatus','<?php echo $sort?>','<?php echo $id?>')">狀態
                  <?php 
                  if($o_old == "istatus" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                 <a href="javascript:chaa('source','<?php echo $sort?>','<?php echo $id?>')">來源
                  <?php 
                  if($o_old == "source" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                
                <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3 tabletd">
                  回報
                </td>
              </tr>
            </thead>
            <tbody>
               <?php
               $cases = getCase();
                foreach ($rs as $key => $row) {
                ?>
                <tr class="changedtr<?php echo $row["rid"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                  <a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php echo $row["rnumbers"]?></a>
                  </td>
                  <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3 tabletd">
                  <?php echo $r[$row["rid"]][4];?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php 
                  if($row["istatus"] == 0){ echo "未處理";}
                  else if($row["istatus"] == 1){ echo "待回覆";}
                  else if($row["istatus"] == 2){ echo "已成交";}
                  else if($row["istatus"] == 3){ echo "已婉拒";}
                  ?>   
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php 
                  if($row["source"] == 0){ echo "案主";}
                  else { echo "老師";}
                  ?>   
                  </td>
                  <td class="col-lg-3 col-md-3 col-xs-3 col-sm-3 tabletd">
                  <?php 
                  if($row["source"] == 1){
                    if($row["type"] == 0){
                      ?>
                    <a href="javascript:changedeal(<?php echo $row["iid"]?>,2)"><button class="btn tbu" id="editbutton" >報價</button></a>
                    <a href="javascript:changetype(<?php echo $row["iid"]?>,3)"><button class="btn tbu" id="editbutton" >婉拒</button></a>
                    <?php
                    }else if($row["type"] == 1){
                      echo "報價：".$row["salary"];
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
            $sql1 = "SELECT count(*) as n from interview i LEFT JOIN search_teacher st on i.rid = st.resumeid LEFT JOIN cases c on i.cid = c.id LEFT JOIN resume r on r.id = st.resumeid where c.id='".$id."' ";
            $rs1 = $pdo->query($sql1);
               foreach ($rs1 as $key => $row1) {
                 $n1 = $row1["n"];
                 $total_pages = ceil( $n1 / $results_per_page);
                 for ($i=1; $i<=$total_pages; $i++) { 
                 // 
                  ?>
                  <a href="javascript:cha('<?php echo $i?>','<?php echo $o_old?>','<?php echo $s_old?>','<?php echo $id?>')" style="padding-left:10px;padding-right:10px" <?php 
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
          <div id="xsed">
              <?php include_once 'my_fi_xs.php';?>
          </div>