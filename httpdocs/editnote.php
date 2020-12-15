<?php
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = @$_GET["id"];

$sql = "SELECT n.id AS id,n.uid AS buyid,n.cid AS cid,n.cuid AS saleid,c.titles AS titles,c.types AS types,r.numbers AS numbers,n.addtime AS addtime,c.types AS types,n.status as status FROM notes n LEFT JOIN clouds c ON n.cid = c.id LEFT JOIN resume r ON n.cuid = r.uid  WHERE n.id = ".$id;
$rs = $pdo -> query($sql);
foreach ($rs as $row) {
	$buy = getProfile($row["buyid"]);
    $sale = getProfile($row["saleid"]);
    ?> 
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202);word-break: break-all""><?php echo $row["numbers"]?></td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
	    <?php echo $sale[1];?><br><?php echo $sale[6];?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  	<?php echo $buy[1];?><br><?php echo $buy[6];?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  	 <?php echo $row["addtime"];?>
	  </td>
	  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202)">
	  	<?php
            if($row["types"] == 0){ echo "教材<br>".$row["titles"];}
            else if($row["types"] == 2){echo "筆記<br>".$row["titles"];}
        ?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  	<select id="status">
	  	    <?php 
	  	    if($row["status"] == 0){  
	  	    ?>
	  	    <option value="0" selected>未處理</option>
	  	    <option value="1">已成交</option>
	  	    <option value="2">已售出</option>
	  	    <option value="3">待回復</option>
	  	    <?php
	  	    }else if($row["status"] == 1){
	  	    ?>
	  	    <option value="0">未處理</option>
	  	    <option value="1" selected>已成交</option>
	  	    <option value="2">已售出</option>
	  	    <option value="3">待回復</option>
	  	    <?php
	  	    }else if ($row["status"] == 2) {
	  	    ?>
	  	    <option value="0">未處理</option>
	  	    <option value="1">已成交</option>
	  	    <option value="2" selected>已售出</option>
	  	    <option value="3">待回復</option>
	  	    <?php
	  	    }else if($row["status"] == 3){
	  	    ?>
	  	    <option value="0">未處理</option>
	  	    <option value="1">已成交</option>
	  	    <option value="2">已售出</option>
	  	    <option value="3" selected>待回復</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
	  </td>
	  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202)">
		  <a href="javascript:save(<?php echo $row["id"]?>)">
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
	
  
</script>