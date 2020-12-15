<?php
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = @$_GET["id"];

$sql = "SELECT i.id AS id, i.source as source,i.status as status, i.addtime as addtime, i.edittime as edittime,i.reid as reid ,c.name as cname ,c.phone as cphone,i.caid as caid,i.rid as rid ,i.cid as cid,i.salary as salary,i.accept as accept,i.accepttime as accepttime,i.pay as pay,i.paytime as paytime FROM  interview i  LEFT JOIN resume r ON i.rid = r.id LEFT JOIN cases c ON i.cid = c.id WHERE i.status = 2 AND  i.id = ".$id;
$rs = $pdo -> query($sql);

foreach ($rs as $row) {
	 $res = getProfile($row["reid"]);
    ?> 
        <td class="col-lg-2 col-md-2 col-xs-5 col-sm-5 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <?php echo $res[1]?><br><?php echo $res[6]?>
        </td>
        <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <?php echo $row["cname"]?><br><?php echo $row["cphone"]?>
        </td>
        <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <?php 
                if($row["source"] == 0 ){echo "案主";}
                else{echo "老師";}
            ?>    
        </td>
        <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <?php echo $row["cname"]?>
        </td>
        <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <?php 
            if($row["accept"] == 0 ){echo "未回報";}
            else if($row["accept"] == 1 ){echo "接受";}
            else{ echo "婉拒";}
            ?>  
        </td>
        <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <select id="pay">
	  	    <?php 
	  	    if($row["pay"] == 0){  
	  	    ?>
	  	    <option value="0" selected>未付款</option>
	  	    <option value="1">已付款</option>
	  	    <?php
	  	    }else if($row["pay"] == 1){
	  	    ?>
	  	    <option value="0">未付款</option>
	  	    <option value="1" selected>已付款</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
        </td>
        <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <?php echo $row["paytime"]?>
        </td>
	    <td class="col-lg-2" style="background-color:rgb(202,202,202)">
		  <a href="javascript:saveint(<?php echo $row["id"]?>)">
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