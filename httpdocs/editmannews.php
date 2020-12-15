<?php
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = @$_GET["id"];

$sql = "SELECT * FROM newsletter WHERE id = ".$id;
$rs = $pdo -> query($sql);
foreach ($rs as $row) {
    ?> 
	  <td class="col-lg-3" style="background-color:rgb(202,202,202);word-break: break-all"">
	  <?php echo $row["email"]?>
	  </td>
	  <td class="col-lg-2" style="background-color:rgb(202,202,202);word-break: break-all">
	  <select id="casespa">
	  	    <?php 
	  	    if($row["casespa"] == 0){  
	  	    ?>
	  	    <option value="0" selected>未訂閱</option>
	  	    <option value="1">已訂閱</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>已訂閱</option>
	  	    <option value="0">未訂閱</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
	  </td>
	  <td class="col-lg-2" style="background-color:rgb(202,202,202)">
	  	<select id="teachpa">
	  	    <?php 
	  	    if($row["teachpa"] == 0){  
	  	    ?>
	  	    <option value="0" selected>未訂閱</option>
	  	    <option value="1">已訂閱</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>已訂閱</option>
	  	    <option value="0">未訂閱</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
	  </td>
	  <td class="col-lg-2" style="background-color:rgb(202,202,202)">
	  	<select id="webpa">
	  	    <?php 
	  	    if($row["webpa"] == 0){  
	  	    ?>
	  	    <option value="0" selected>未訂閱</option>
	  	    <option value="1">已訂閱</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>已訂閱</option>
	  	    <option value="0">未訂閱</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
	  </td>
	  <td class="col-lg-3 tabletd" style="background-color:rgb(202,202,202)">
		  <a href="javascript:savenews(<?php echo $row["id"]?>)">
		   <button class="btn tbu">儲存</button>
		  </a>
		  <a href="javascript:cancel()">
		   <button class="btn tbu">取消</button>
		  </a>
	  </td>
	<?php
}
?>
<script type="text/javascript">
function savenews($id){
      var casespa = $("#casespa").val();
      var teachpa = $("#teachpa").val();
      var webpa = $("#webpa").val();
     
      $.ajax({
            type:'POST',
            url :'editnewsProc.php',
            data:"id="+$id+"&casespa="+casespa+"&teachpa="+teachpa+"&webpa="+webpa,
            dataType:'json', 
            success : function(data,textStatus, jqXHR){
              if(data.status == "1"){
               alert("已更新該筆資料!");
               location.href="man_newsletter.php";
               die();
              }else{
               alert("刪除失敗，請詢問開發人員");
               location.href="man_newsletter.php";
               die();
             }
            }
       });
  
}
</script>