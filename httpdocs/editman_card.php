<?php
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = @$_GET["id"];

$sql = "SELECT r.numbers as numbers,rl.id as rlid,r.id as rid,rl.val as val,r.lastedit as lastedit FROM  resume_list rl LEFT JOIN resume r on r.id = rl.reid WHERE rl.id = '".$id."' ";
$rs = $pdo -> query($sql);
foreach ($rs as $row) {
	$u  = explode(",", $row["val"]);
    $r = getResumes();
    ?> 
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202);word-break: break-all""><?php echo $row["numbers"]?></td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
	   <?php 
                  $sql1 = "SELECT * FROM resume_list WHERE id = '".$u[0]."' ";
                  $rs1 = $pdo ->query($sql1);
                  foreach ($rs1 as $key => $row1) {
                    echo $row1["val"];
                  }
                  ?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  	 <?php 
                  
                  if($u[2] == "0"){
                    echo "未提供";
                  }else{
                    $u1 = explode("/", $u[2]);
                    ?>
                    <a href="<?php echo $u[2]?>" target="_blank">
                  <img src="<?php echo $u[2]?>" class="img-responsive" style="width: 100%;border-radius: 10px;" title="查看">
                  </a>
                    <?php
                  }
                  ?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  	<?php echo $row["lastedit"] ?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  	<select id="checks">
	  	    <?php 
	  	    if($u[3] == 0){  
	  	    ?>
	  	    <option value="0" selected>未審核</option>
	  	    <option value="1">已通過</option>
	  	    <option value="2">未通過</option>
	  	    <?php
	  	    }else if($u[3] == 1){
	  	    ?>
	  	     <option value="0">未審核</option>
	  	    <option value="1" selected>已通過</option>
	  	    <option value="2">未通過</option>
	  	    <?php
	  	    }else if ($u[3] == 2) {
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
		  <a href="javascript:save(<?php echo $row["rlid"]?>)">
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