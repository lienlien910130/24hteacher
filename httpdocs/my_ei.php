<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 10; 
  @session_start();
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="fid"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="ASC"; };
   if (isset($_SESSION["id"])) { $uid  = $_SESSION["id"]; } else { $uid=0; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  $sql = "SELECT r.id as resumeid , r.numbers as numbers , r.uid as cuid ,f.id as fid,st.obj as obj , st.sub as sub , st.area as area,st.exper as exper,r.id as rid  FROM resume  r LEFT JOIN favorite  f on r.id = f.tid LEFT JOIN search_teacher st on st.resumeid = r.id  WHERE f.types= 2 AND f.uid='".$uid."' ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
  $r = getResumes();
 
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
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
                 <a href="javascript:chaa('exper','<?php echo $sort?>')">經驗
                  <?php 
                  if($o_old == "exper" && $s_old == "DESC"){
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
               $cases = getCase();
                foreach ($rs as $key => $row) {
                   $sub = gettsub($row["rid"]);
                    $loc = gettloc($row["rid"]);
                    $obj = gettobj($row["rid"]);
                    $abr = gettabr($row["rid"]);
                    $lic = gettlic($row["rid"]);
                    $acc = getProfile($row["rid"]);
                ?>
                <tr class="changedtr<?php echo $row["fid"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                  <a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php echo $row["numbers"]?></a>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php 
                        for ($i=0; $i < count($sub[$row["rid"]]) ; $i++) { 
                          echo $sub[$row["rid"]][$i]."<br>";
                        }?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php 
                            for ($i=0; $i < count($loc[$row["rid"]]) ; $i++) { 
                              echo $loc[$row["rid"]][$i]."<br>";
                            }?>    
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php 
                          for ($i=0; $i < count($obj[$row["rid"]]) ; $i++) { 
                            echo $obj[$row["rid"]][$i]."元<br>";
                          }?>   
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php 
                            echo $r[$row["rid"]][7];
                          ?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="text-align: center;">
                  <a href="javascript:deletefav(<?php echo $row["fid"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td>

                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) as n  FROM resume  r LEFT JOIN favorite  f on r.id = f.tid LEFT JOIN search_teacher st on st.resumeid = r.id  WHERE f.types= 2 AND f.uid='".$uid."' ";
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
          