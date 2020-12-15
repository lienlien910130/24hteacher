<?php 
include_once 'lib/core.php';
$pdo = DB_CONNECT();
if(!isset($_POST["id"]) || empty($_POST["id"]) ){
   $id = 0;
 }else{
 	$id = $_POST["id"];
 }
$sql = "SELECT n.id AS id,n.uid AS buyid,n.cid AS cid,n.cuid AS saleid,c.titles AS titles,c.types AS types,r.numbers AS numbers,n.addtime AS addtime,c.types AS types,n.status as status FROM notes n LEFT JOIN clouds c ON n.cid = c.id LEFT JOIN resume r ON n.cuid = r.uid  WHERE n.id = ".$id;
$rs = $pdo->query($sql);
?> 
<div class="modal fade" id="maned_xs">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-times-circle fa-lg" aria-hidden="true"></i>
        </button>
      </div>
      <div class="modal-body col-lg-12 col-xs-12 col-sm-12 col-md-12">
      <?php 
      foreach ($rs as $row) {
        $buy = getProfile($row["buyid"]);
        $sale = getProfile($row["saleid"]);
      	?>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>履歷編號</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["numbers"]?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>賣方聯絡人&電話</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5> <?php echo $sale[1];?><br><?php echo $sale[6];?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>買方聯絡人&電話</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5> <?php echo $buy[1];?><br><?php echo $buy[6];?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>購買時間</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["addtime"]?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>履歷曝光</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php
            if($row["types"] == 0){ echo "教材<br>".$row["titles"];}
            else if($row["types"] == 2){echo "筆記<br>".$row["titles"];}
        ?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>狀態</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><select id="status">
	  	     <?php 
          if($row["status"] == 0){  
          ?>
          <option value="0" selected>未成交</option>
          <option value="1">已成交</option>
          <option value="2">已售出</option>
          <option value="3">待回復</option>
          <?php
          }else if($row["status"] == 1){
          ?>
          <option value="0">未成交</option>
          <option value="1" selected>已成交</option>
          <option value="2">已售出</option>
          <option value="3">待回復</option>
          <?php
          }else if ($row["status"] == 2) {
          ?>
          <option value="0">未成交</option>
          <option value="1">已成交</option>
          <option value="2" selected>已售出</option>
          <option value="3">待回復</option>
          <?php
          }else if($row["status"] == 3){
          ?>
          <option value="0">未成交</option>
          <option value="1">已成交</option>
          <option value="2">已售出</option>
          <option value="3" selected>待回復</option>
          <?php
          }
          ?>
	  	</select></h5>
      	 </div>
      	 </div>
      	<?php
      }
      ?>
       
      </div>
      <div class="modal-footer" style="text-align: center;padding-top: 20px;padding-bottom: 20px;">
          <a href="javascript:save(<?php echo $row["id"]?>)">
		   <button class="btn tbu" style="margin-top: 15px;padding: 10px;margin-right: 4px;">儲存</button>
		  </a>
		  <a href="javascript:cancel()">
		   <button class="btn tbu" style="margin-top: 15px;padding: 10px;margin-left: 4px;">取消</button>
		  </a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	function power($id) {
       var pay = $("#pay").val();
       var cases = $("#cases").val();
       var resumes = $("#resumes").val();
       var invite = $("#invite").val();
       var application = $("#application").val();

       $.ajax({
        type: "POST",
        url: 'editpowerProc.php',
        cache: false,
        data:'id='+$id+'&pay='+pay+'&cases='+cases+'&resumes='+resumes+'&invite='+invite+'&application='+application,
        error: function(){
            alert('Ajax request 發生錯誤');
        },
        success: function(data){
            alert("更改成功");
            location.href="member_manage.php";
        }
    });
   }
</script>