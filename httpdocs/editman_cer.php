<?php
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = @$_GET["id"];

$sql = "SELECT r.numbers as numbers,c.id as cid,r.id as rid,c.names as names,c.paths as paths,c.checks as checks,c.addtime as addtime,rl.val as val FROM certification c LEFT JOIN resume r on c.uid = r.uid  LEFT JOIN resume_list rl on r.id = rl.reid WHERE rl.rid = 10 AND c.id = '".$id."'";
$rs = $pdo -> query($sql);
foreach ($rs as $row) {
$r = getResumes();
    ?> 
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
	  <?php echo $row["numbers"]?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
	    <?php echo $r[$row["rid"]][10]."，".$r[$row["rid"]][17]."，".$r[$row["rid"]][8]."，".$r[$row["rid"]][9]?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  <a href="<?php echo $row["paths"]?>" target="_blank">
          <img src="<?php echo $row["paths"]?>" class="img-responsive" style="width: 100%;border-radius: 10px;" title="查看">
        </a>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  <?php echo $row["addtime"] ?>
	  </td>
	
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  	<select id="checks">
	  	    <?php 
	  	    if($row["checks"] == 0){  
	  	    ?>
	  	    <option value="0" selected>未審核</option>
	  	    <option value="1">已通過</option>
	  	    <option value="2">未通過</option>
	  	    <?php
	  	    }else if($row["checks"] == 1){
	  	    ?>
	  	    <option value="0">未審核</option>
	  	    <option value="1" selected>已通過</option>
	  	    <option value="2">未通過</option>
	  	    <?php
	  	    }else if ($row["checks"] == 2) {
	  	    ?>
	  	    <option value="0">未審核</option>
	  	    <option value="1">已通過</option>
	  	    <option value="2" selected>未通過</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
		  <a href="javascript:save(<?php echo $row["cid"]?>)">
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