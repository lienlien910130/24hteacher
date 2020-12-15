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
  $sql = "SELECT * FROM news ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-2 col-md-2 col-xs-5 col-sm-5">
                  <a href="javascript:chaa('title','<?php echo $sort?>')">標題
                  <?php 
                  if($o_old == "title" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('types','<?php echo $sort?>')">對象
                  <?php 
                  if($o_old == "types" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('issend','<?php echo $sort?>')">狀態
                  <?php 
                  if($o_old == "issend" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1">
                <a href="javascript:chaa('sendtime','<?php echo $sort?>')">寄送時間
                  <?php 
                  if($o_old == "sendtime" && $s_old == "DESC"){
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
                ?>
                <tr class="changedtr<?php echo $row["id"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-5 col-sm-5 tabletd" style="word-break: break-all"><?php echo $row["title"]?></td>
                  
                  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["types"] == 1 ){echo "案件";}
                  else if($row["types"] == 2 ){echo "老師";}
                  else{echo "網站";}
                  ?>
                  </td>
                 
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["issend"] == 0 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}
                  else{echo "<i class='fa fa-check' aria-hidden='true'></i>";}
                  ?>    
                  </td>
                  <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd">
                  <?php 
                  if($row["sendtime"] == 0 ){echo "<i class='fa fa-times' aria-hidden='true'></i>";}
                  else{echo $row["sendtime"];}
                  ?>  
                  </td>
                  <td  class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="text-align: center;">
                  <a href="javascript:send(<?php echo $row["id"]?>)"><button class="btn tbu hidden-xs hidden-sm" id="editbutton">寄件</button></a>
                  <a href="javascript:edit(<?php echo $row["id"]?>)"><button class="btn tbu hidden-xs hidden-sm" id="editbutton">編輯</button></a>
                  <a href="javascript:deletenews(<?php echo $row["id"]?>)"><button class="btn tbu" id="button">刪除</button></a>
                  </td>

                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) AS n FROM news";
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
          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
            <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="addsubscript()">新增文章</button>
            </div>