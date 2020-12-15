<?php
include_once 'lib/core.php';
$pdo = DB_CONNECT();
@session_start();
$id=$_GET["id"];
$sql="UPDATE reaction SET isread=1 WHERE id=".$id;
$pdo->query($sql);

$sql="SELECT * FROM reaction WHERE id=".$id;
$rs=$pdo->query($sql);
foreach ($rs as $key => $row) {
?>

<form class="form-horizontal" style="margin:30px 0px 20px 0px;border: 2px solid #F4A460;padding:20px 10px 0 10px" name="reactionForm" id="reactionForm" action="" method="POST" accept-charset="UTF-8">
         <fieldset>
          
          <div class="form-group">
          <label class="col-md-4 control-label" style="font-size: 20px">姓名</label>  
          	<div class="col-md-4">
          	<?php echo $row["name"]?>
            </div>
          </div>
          <div class="form-group">
          <label class="col-md-4 control-label" style="font-size: 20px">電話</label>  
          	<div class="col-md-4">
          	<?php echo $row["phone"]?>
            </div>
          </div>
          <div class="form-group">
          <label class="col-md-4 control-label" style="font-size: 20px">信箱</label>  
          	<div class="col-md-4">
          	<?php echo $row["email"]?>
            </div>
          </div>
          <div class="form-group">
          <label class="col-md-4 control-label" style="font-size: 20px">時間</label>  
          	<div class="col-md-4">
          	<?php echo $row["addtime"]?>
            </div>
          </div>
          <div class="form-group">
          <label class="col-md-4 control-label" style="font-size: 20px">內容</label>  
          	<div class="col-md-4">
          	<?php echo $row["texts"]?>
            </div>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                  <button id="button1id" name="button1id" class="btn btn-success" onclick="cancel()" type="button">返回</button>
                </div>
              </div>
          </fieldset>

         </form>
         <?php
}
         ?>