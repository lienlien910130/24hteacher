<?php 
include_once 'lib/core.php';
$pdo = DB_CONNECT();
if(!isset($_POST["id"]) || empty($_POST["id"]) ){
   $id = 0;
 }else{
 	$id = $_POST["id"];
 }
$sql="UPDATE reaction SET isread=1 WHERE id=".$id;
$pdo->query($sql);
$sql = "SELECT * FROM reaction WHERE id = ".$id;
$rs = $pdo->query($sql);
?> 
<div class="modal fade" id="maned_xs">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times-circle fa-lg" aria-hidden="true" onclick="cancel()"></i>
        </button>
      </div>
      <div class="modal-body col-lg-12 col-xs-12 col-sm-12 col-md-12">
      <?php 
      foreach ($rs as $row) {
      	?>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>姓名</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["name"]?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>電話</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["phone"]?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>信箱</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["email"]?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>身份</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["identity"]?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>內容</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["texts"]?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>反應時間</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["addtime"]?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>反應類別</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["reactions"]?></h5>
      	 </div>
      	 </div>
      	<?php
      }
      ?>
       
      </div>
      <div class="modal-footer" style="text-align: center;padding-top: 20px;padding-bottom: 20px;">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	
</script>