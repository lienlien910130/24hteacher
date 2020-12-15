<?php 
  include_once 'lib/core.php';
  $pdo = DB_CONNECT();
  $results_per_page = 5; 
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
  if (isset($_GET["order"])) { $order  = $_GET["order"]; } else { $order="id"; };
  if (isset($_GET["sort"])) { $sort  = $_GET["sort"]; } else { $sort="ASC"; };
  $start_from = ($page-1) * $results_per_page;
  $o_old = $order;
  $s_old = $sort;

  $sql = "SELECT * FROM parents ORDER BY $order $sort LIMIT $start_from,".$results_per_page;
  $rs = $pdo->query($sql);
  $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
?>

<table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-2 col-md-3 col-xs-3 col-sm-3">
                  圖片
                </td>
                <td class="col-lg-2 col-md-3 hidden-xs hidden-sm">
                <a href="javascript:chaa('title','<?php echo $sort?>')">文章標題
                  <?php 
                  if($o_old == "title" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-3 hidden-xs hidden-sm">
                <a href="javascript:chaa('description','<?php echo $sort?>')">文章簡介
                  <?php 
                  if($o_old == "description" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-3 col-xs-3 col-sm-3">
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
                <td class="col-lg-2 col-md-3 col-xs-3 col-sm-3">
                <a href="javascript:chaa('types','<?php echo $sort?>')">類型
                  <?php 
                  if($o_old == "types" && $s_old == "DESC"){
                    echo "<i class='fa fa-chevron-circle-up' aria-hidden='true'></i>";
                  }else{
                    echo "<i class='fa fa-chevron-circle-down' aria-hidden='true'></i>";
                  }
                  ?>
                  </a>
                </td>
                <td class="col-lg-2 col-md-3 col-xs-3 col-sm-3">
                 
                </td>
              </tr>
            </thead>
            <tbody>
               <?php
                foreach ($rs as $key => $row) {
                ?>
                <tr class="changedtr<?php echo $row["id"]?>">
                  <td class="col-lg-2 col-md-2 col-xs-3 col-sm-3 tabletd" style="word-break: break-all">
                  <a href="parentartic.php?id=<?php echo $row["id"]?>" target="_blank">
                  <img src="<?php echo $row["paths"]?>" class="img-responsive" style="border-radius: 10px;margin: auto"></a>
                  </td>
                  <td class="col-lg-2 col-md-2 hidden-xs hidden-sm tabletd" style="word-break: break-all">
                    <?php echo $row["title"];?>
                  </td>
                  <td class="col-lg-2 col-md-2 hidden-xs hidden-sm tabletd" style="word-break: break-all">
                    <?php echo $row["description"];?>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-3 col-sm-3 tabletd" style="word-break: break-all">
                    <?php echo $row["addtime"];?>
                  </td>
                  <td class="col-lg-2 col-md-2 col-xs-3 col-sm-3 tabletd" style="word-break: break-all">
                    <?php 
                    if($row["types"] == 0){
                      echo "家長情報";
                    }else{
                      echo "私校師資";
                    }
                    

                    ?>
                  </td>
                  <td class="col-lg-2 col-md-1 col-xs-3 col-sm-3 tabletd">
                  
                    <a href="javascript:editsub(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton">編輯</button></a>
                  <a href="javascript:deletepar(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton">刪除</button></a>
                  </td>
                </tr>
                <?php
                
              }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
          <?php 
            $sql1 = "SELECT count(*) AS n FROM parents";
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
                    }
                 }
            ?>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
            <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="addsubscript()" style="">新增文章</button>
            </div>
            