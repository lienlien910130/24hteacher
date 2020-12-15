<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 10; 
  @session_start();
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="cid"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="ASC"; };
   if (isset($_SESSION["id"])) { $uid  = $_SESSION["id"]; } else { $uid=0; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  // $sql = "SELECT * FROM cases cas left join search_case scs on cas.id=scs.caseid  WHERE cas.uid='".$uid."' ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $sql = "SELECT  sc.obj as obj , sc.sub as sub , sc.area as area,sc.exper as exper,c.uid as uid,c.id as cid,c.status as status,c.numbers as numbers from search_case sc LEFT JOIN cases c on sc.caseid = c.id ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
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
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <!-- <a href="javascript:chaa('obj','<?php echo $sort?>')">最低時薪
                  <?php 
                  if($o_old == "obj" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->
                  最低時薪
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
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
                $sql1 = "SELECT st.obj as obj,st.sub as sub,st.area as area , st.exper as exper  FROM resume r LEFT JOIN search_teacher st on r.id = st.resumeid WHERE r.uid = ".$uid;
                $rs1 = $pdo->query($sql1);
                foreach ($rs1 as $key => $row1) {
                  $x = strpos($row1["sub"],$row["sub"]);
                  if($x !== false){
                    $y = strpos($row1["obj"],$row["obj"]);
                    if($y !== false){
                       $z = strpos($row1["area"],$row["area"]);
                       if($z !== false){
                          $q = strpos($row1["exper"],$row["exper"]);
                          if($q !== false){
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
                              <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                              <?php 
                              echo $cases[$row["cid"]][15];
                              ?>  
                              </td>
                              <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="text-align: center;">
                              <?php 
                              if($row["status"] == 0){ echo "開放";}
                              else{ echo "關閉";}
                              ?>  
                              </td>
                            </tr>
                              <?php
                          }
                       }
                    }
                  }
                }
              // if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
              //   foreach ($rs1 as $key => $row1) {
              //     $x = strpos($row1["sub"],$row["sub"]);
              //     echo $x;
              //   }
              // }else{
              //    echo "<p>請先新增履歷!</p>";
              //  }
            }
                ?> 
            </tbody>
          </table>
          <!-- <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) AS n FROM interview WHERE uid=".$uid;
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
            </div> -->
          