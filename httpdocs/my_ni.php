<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 10; 
  @session_start();
 if (isset($_POST["id"])) { $caseid  = $_POST["id"]; } else { $caseid  = $_GET["id"]; };
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="rid"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="ASC"; };
   if (isset($_SESSION["id"])) { $uid  = $_SESSION["id"]; } else { $uid=0; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  // $sql = "SELECT * FROM cases cas left join search_case scs on cas.id=scs.caseid  WHERE cas.uid='".$uid."' ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $sql = "SELECT  st.obj as obj , st.sub as sub , st.area as area,st.exper as exper,r.uid as uid,r.id as rid,r.numbers as numbers from search_teacher st LEFT JOIN resume r on st.resumeid = r.id ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $r = getResumes();
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                  <a href="javascript:chaa('numbers','<?php echo $sort?>','<?php echo $caseid?>')">履歷編號
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
               <!--  <a href="javascript:chaa('area','<?php echo $sort?>')">老師身份
                  <?php 
                  if($o_old == "area" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->
                  老師身份
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <!-- <a href="javascript:chaa('obj','<?php echo $sort?>')">學歷科系
                  <?php 
                  if($o_old == "obj" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->
                  學歷科系
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('exper','<?php echo $sort?>','<?php echo $caseid?>')">經驗
                  <?php 
                  if($o_old == "exper" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <!-- <a href="javascript:chaa('status','<?php echo $sort?>')">試教
                  <?php 
                  if($o_old == "status" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->
                  試教
                </td>
              </tr>
            </thead>
            <tbody>
               <?php
               
                foreach ($rs as $key => $row) {
                $sql1 = "SELECT sc.obj as obj,sc.sub as sub,sc.area as area , sc.exper as exper,c.numbers as numbers  FROM cases c LEFT JOIN search_case sc on c.id = sc.caseid WHERE c.id = ".$caseid;
                $rs1 = $pdo->query($sql1);
                foreach ($rs1 as $key => $row1) {
                  $x = strpos($row["sub"],$row1["sub"]);
                  if($x !== false){
                    $y = strpos($row["obj"],$row1["obj"]);
                    if($y !== false){
                       $z = strpos($row["area"],$row1["area"]);
                       if($z !== false){
                          $q = strpos($row["exper"],$row1["exper"]);
                          if($q !== false){
                              ?>
                              <tr class="changedtr<?php echo $row["cid"]?>">
                              <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                              <a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php echo $row["numbers"]?></a>
                              </td>
                              <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                              <?php echo $r[$row["rid"]][14]?>
                              </td>
                              <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                              <?php echo $r[$row["rid"]][10]."<br>".$r[$row["rid"]][17]?>   
                              </td>
                              <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                              <?php echo $r[$row["rid"]][4];?>
                              </td>
                              <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                              <?php echo $r[$row["rid"]][7]; ?> 
                              </td>
                            </tr>
                              <?php
                          }
                       }
                    }
                  }
                }
              
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
          