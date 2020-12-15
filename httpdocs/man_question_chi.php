<?php 
@session_start();
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = $_GET["id"];
$sql ="SELECT * FROM question WHERE id=".$id;
$rs = $pdo ->query($sql);
foreach ($rs as $key => $row) {
?>
<h4><?php echo $row["title"]?></h4>
<?php }
?>

          <table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td>標題</td>
                <td>編輯</td>
              </tr>
            </thead>
            <tbody>
               <?php
                $sql ="SELECT * FROM question WHERE parid=".$id;
                $rs = $pdo ->query($sql);
                foreach ($rs as $key => $row) {

                ?>
                <tr>
                <td style="text-align: center;">
                <?php echo $row["title"]?>
                </td>
                <td style="text-align: center;">
                  <a href="javascript:editchii(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton">編輯</button></a>
                  <a href="javascript:deletechii(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton">刪除</button></a>
                </td>
                </tr>
                <?php
                }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
            <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="cancel()">返回</button>
            <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="addchii(<?php echo $id?>)">新增分類</button>
          </div>
 

<script type="text/javascript">

</script>