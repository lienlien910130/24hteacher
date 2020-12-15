<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 5; 
  @session_start();
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="addtime"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="DESC"; };
  if (isset($_SESSION["id"])) { $uid  = $_SESSION["id"]; } else { $uid=0; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;
  $sql = "SELECT r.numbers as numbers,c.id as cid,r.id as rid,c.titles as titles,c.hre as hre,c.types as types,c.checks as checks,c.addtime as addtime FROM clouds c LEFT JOIN resume r on c.uid = r.uid WHERE c.types = 1 ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12 ">
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
                <a href="javascript:chaa('titles','<?php echo $sort?>')">標題
                  <?php 
                  if($o_old == "titles" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <a href="javascript:chaa('hre','<?php echo $sort?>')">影片
                  <?php 
                  if($o_old == "hre" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
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
                ?>
                <tr class="changedtr<?php echo $row["cid"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                  <a href="seteacher.php?id=<?php echo $row["rid"]?>" target="_blank"><?php echo $row["numbers"]?></a>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                  <?php echo $row["titles"]?>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="word-break: break-all">
                  <!-- <?php 
                  $listid = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{12,})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
                  $youtubeid = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
                  $needle = "list";
                  $tmp = explode($needle,$row["hre"]);
                  if(count($tmp)>1){
                         $lid = (preg_replace($listid, '$1', $row["hre"]));
                         $yid = (preg_replace($youtubeid, '$1', $row["hre"]));
                      }else{
                         $yid = (preg_replace($youtubeid, '$1', $row["hre"]));
                         $lid = "";
                       }
                  ?>
                  <iframe width="100%" src="https://www.youtube.com/embed/<?php echo $yid?>?list=<?php echo $lid?>" frameborder="0" allowfullscreen>
                  </iframe> -->
                  <a href="<?php echo $row["hre"]?>" target="_blank"><?php echo $row["hre"]?></a>
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd">
                     <?php echo $row["addtime"] ?>
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                    <?php
                  if($row["checks"] == 0){ echo "未審核";}
                  else if($row["checks"] == 1){echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  else if($row["checks"] == 2){echo "<i class='fa fa-times' aria-hidden='true'></i>";}
                   ?>
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                    <a href="javascript:edit(<?php echo $row["cid"]?>)"><button class="btn tbu" id="editbutton">編輯</button></a>
                    <a href="javascript:deletevideo(<?php echo $row["cid"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td>
                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) as n FROM clouds c LEFT JOIN resume r on c.uid = r.uid WHERE c.types = 1 ";
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
          