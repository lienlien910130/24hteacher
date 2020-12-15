<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 15; 
  @session_start();
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="addtime"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="DESC"; };
  if (isset($_SESSION["id"])) { $uid  = $_SESSION["id"]; } else { $uid=0; };

//   if (isset($_GET["txtss"])){

//   // if($_GET["textss"] != "-1"){
//   //   $textss_str = " AND r.numbers='".$_GET["textss"]."' ";
//   //   $textss = $_GET["textss"]; 
//   // }else{
//   //   $textss_str = "";
//   //   $textss = "-1";
//   // }
//     $textss = "-2";
// } else { 
//   $textss_str = "";
//   $textss = "-3";
// };
 
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  $sql = "SELECT r.numbers as numbers,c.id as cid,r.id as rid,c.names as names,c.paths as paths,c.checks as checks,c.addtime as addtime,rl.val as val FROM certification c LEFT JOIN resume r on c.uid = r.uid  LEFT JOIN resume_list rl on r.id = rl.reid WHERE rl.rid = 10 AND c.names <> '0'  ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';

?>

<!-- <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: right;float: right;margin-bottom: 10px;">
  <div class="col-lg-5 col-md-5 col-xs-5 col-sm-5 pr" style="text-align: right;float: right;">
   <div class="input-group">
      <input type="text" class="form-control" placeholder="輸入履歷編號" name="searnumtext" id="searnumtext">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="searchnumbe()">查詢</button>
      </span>
    </div>
  </div>
</div> -->
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
                <a href="javascript:chaa('val','<?php echo $sort?>')">學歷狀況
                  <?php 
                  if($o_old == "val" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <!-- <a href="javascript:chaa('paths','<?php echo $sort?>')">
                  <?php 
                  if($o_old == "paths" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a> -->證書
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
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
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('checks','<?php echo $sort?>')">審核
                  <?php 
                  if($o_old == "checks" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                </td>
              </tr>
            </thead>
            <tbody>
               <?php
               $cases = getCase();
                foreach ($rs as $key => $row) {
                  $r = getResumes();
                ?>
                <tr class="changedtr<?php echo $row["cid"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                  <a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php echo $row["numbers"]?></a>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php echo $r[$row["rid"]][10]."，".$r[$row["rid"]][17]."，".$r[$row["rid"]][8]."，".$r[$row["rid"]][9]?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <a href="<?php echo $row["paths"]?>" target="_blank">
                  <img src="<?php echo $row["paths"]?>" class="img-responsive" style="width: 100%;border-radius: 10px;" title="查看">
                  </a>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                     <?php echo $row["addtime"] ?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                    <?php
                  if($row["checks"] == 0){ echo "未審核";}
                  else if($row["checks"] == 1){echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  else if($row["checks"] == 2){echo "<i class='fa fa-times' aria-hidden='true'></i>";}
                   ?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                    <a href="javascript:edit(<?php echo $row["cid"]?>)"><button class="btn tbu" id="editbutton">編輯</button></a>
                    <a href="javascript:deletenote(<?php echo $row["cid"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td>
                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) as n FROM certification c LEFT JOIN resume r on c.uid = r.uid  LEFT JOIN resume_list rl on r.id = rl.reid WHERE rl.rid = 10 AND c.names <> '0' ";
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
<script type="text/javascript">
    
</script>