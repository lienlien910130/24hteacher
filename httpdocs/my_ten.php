<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 10; 
  @session_start();
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="i_edittime"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="DESC"; };
   if (isset($_SESSION["id"])) { $uid  = $_SESSION["id"]; } else { $uid=0; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  $sql = "SELECT i.id as i_id ,i.uid as i_uid,i.reid as i_reid,i.cid as i_cid , i.caid as i_caid,i.rid as i_rid,i.source as i_source,i.status as i_status,i.type as i_type,i.edittime as i_edittime,ca.id as cid,i.accept as i_accept,i.accepttime as accepttime, ca.numbers as ca_numbers,i.comment as comment FROM  interview i  LEFT JOIN cases ca ON i.cid = ca.id WHERE i.caid='".$uid."' AND i.accept=1 AND i.status = 2 ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
  $r = getResumes();
 
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                  <a href="javascript:chaa('ca_numbers','<?php echo $sort?>')">案件編號
                  <?php 
                  if($o_old == "ca_numbers" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
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
                
                <td class="col-lg-4 col-md-4 col-xs-4 col-sm-4"></td>
              </tr>
            </thead>
            <tbody>
               <?php
               $cases = getCase();
                foreach ($rs as $key => $row) {
                ?>
                <tr class="changedtr<?php echo $row["fid"]?>">
                  <td class="col-lg-4 col-md-4 col-xs-4 col-sm-4 tabletd" style="word-break: break-all">
                  <a href="secase.php?id=<?php echo $row["c_id"]?>" target="_blank"><?php echo $row["ca_numbers"]?></a>
                  </td>
                  <td class="col-lg-4 col-md-4 col-xs-4 col-sm-4 tabletd">
                  <?php echo $row["accepttime"]?>
                  </td>
                  <td  class="col-lg-4 col-md-4 col-xs-4 col-sm-4 tabletd" style="text-align: center;">
                  <?php 
                  if($row["comment"] == 0){
                    ?>
                    <a href="javascript:changecomment(<?php echo $row["i_id"]?>)"><button class="btn tbu" id="button">給予評價</button></a>
                    <?php 
                  }else{
                    ?>
                    <a href="javascript:checkcomm(<?php echo $row["i_id"]?>)"><button class="btn tbu" id="button">查看評價</button></a>
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
            $sql1 = "SELECT COUNT(*) AS n FROM  interview i  LEFT JOIN cases ca ON i.cid = ca.id WHERE i.caid='".$uid."' AND i.accept=1 AND i.status = 2 ";
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
          <div id="xsed">
              <?php include_once 'my_ten_xs.php';?>
          </div>