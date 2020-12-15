<?php 
include_once 'lib/core.php';
$pdo = DB_CONNECT();
if(!isset($_POST["id"]) || empty($_POST["id"]) ){
   $id = 0;
 }else{
 	$id = $_POST["id"];
 }


$sql = "SELECT m.id AS id,m.numbers AS numbers,m.account AS account,p.id AS pid,p.cases AS cases,p.resumes AS resumes,p.invite AS invite,p.application AS application FROM member m LEFT JOIN power p ON m.id = p.uid  WHERE m.id = ".$id;
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
      	?>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>會員編號</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["numbers"]?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>帳號</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><?php echo $row["account"]?></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>付款權限</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><select id="pay">
	  	    <?php 
	  	    if($row["pay"] == 0){  
	  	    ?>
	  	    <option value="0" selected>關閉</option>
	  	    <option value="1">開放</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>開放</option>
	  	    <option value="0">關閉</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>刊登案件</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><select id="cases">
	  	    <?php 
	  	    if($row["cases"] == 0){  
	  	    ?>
	  	    <option value="0" selected>關閉</option>
	  	    <option value="1">開放</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>開放</option>
	  	    <option value="0">關閉</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>履歷曝光</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><select id="resumes">
	  	    <?php 
	  	    if($row["resumes"] == 0){  
	  	    ?>
	  	    <option value="0" selected>關閉</option>
	  	    <option value="1">開放</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>開放</option>
	  	    <option value="0">關閉</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>主動邀請</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><select id="invite">
	  	    <?php 
	  	    if($row["invite"] == 0){  
	  	    ?>
	  	    <option value="0" selected>關閉</option>
	  	    <option value="1">開放</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>開放</option>
	  	    <option value="0">關閉</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select></h5>
      	 </div>
      	 </div>
      	 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
      	 <div class="col-lg-4  col-xs-4 col-sm-4 col-md-4">
      	 	<h5>主動應徵</h5>
      	 </div>
      	 <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
      	 	<h5><select id="application">
	  	    <?php 
	  	    if($row["application"] == 0){  
	  	    ?>
	  	    <option value="0" selected>關閉</option>
	  	    <option value="1">開放</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>開放</option>
	  	    <option value="0">關閉</option>
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
          <a href="javascript:power(<?php echo $row["id"]?>)">
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