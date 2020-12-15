<?php
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = @$_GET["id"];

$sql = "SELECT i.id AS id, i.source as source,i.status as status, i.addtime as addtime, i.edittime as edittime,i.reid as reid ,c.name as cname ,c.phone as cphone,i.caid as caid,i.rid as rid ,i.cid as cid,i.type as type,i.salary as salary,i.accept as accept,i.accepttime as accepttime FROM interview i LEFT JOIN resume r ON i.rid = r.id LEFT JOIN cases c ON i.cid = c.id  WHERE i.id = ".$id;
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
            <select id="status">
	  	    <?php 
	  	    if($row["status"] == 0){  
	  	    ?>
	  	    <option value="0" selected>未處理</option>
	  	    <option value="1">待回覆</option>
	  	    <option value="2">已成交</option>
	  	    <option value="3">已婉拒</option>
	  	    <option value="4">處理中</option>
	  	    <?php
	  	    }else if($row["status"] == 1){
	  	    ?>
	  	    <option value="0">未處理</option>
	  	    <option value="1" selected>待回覆</option>
	  	    <option value="2">已成交</option>
	  	    <option value="3">已婉拒</option>
	  	    <option value="4">處理中</option>
	  	    <?php
	  	    }else if($row["status"] == 2){
	  	    ?>
	  	    <option value="0">未處理</option>
	  	    <option value="1">待回覆</option>
	  	    <option value="2" selected>已成交</option>
	  	    <option value="3">已婉拒</option>
	  	    <option value="4">處理中</option>
	  	    <?php
	  	    }else if($row["status"] == 3){
	  	    ?>
	  	    <option value="0">未處理</option>
	  	    <option value="1">待回覆</option>
	  	    <option value="2">已成交</option>
	  	    <option value="3" selected>已婉拒</option>
	  	    <option value="4">處理中</option>
	  	    <?php
	  	    }else if($row["status"] == 4){
	  	    ?>
	  	    <option value="0">未處理</option>
	  	    <option value="1">待回覆</option>
	  	    <option value="2">已成交</option>
	  	    <option value="3">已婉拒</option>
	  	    <option value="4" selected>處理中</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
        </td>
        <td  class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <?php 
                  if($row["type"] == 0 ){echo "未處理";}
                  else if($row["type"] == 1){
                    if($row["salary"]!=0){
                      echo "報價：".$row["salary"];
                    }else{
                      echo "未報價";
                    }
                  }
                  else if($row["type"] == 2){echo "婉拒";}
                  ?> 
                  <br>
                  <?php 
                  if($row["accept"] == 0){
                    echo "未回報";
                  }else if($row["accept"] == 1){
                    echo "接受";
                  }else{
                    echo "拒絕";
                  }
                  ?>    
        </td>
        <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <?php echo $row["addtime"]?>
        </td>
        <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <?php echo $row["accepttime"]?>
        </td>
        <td class="col-lg-2 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
            <?php echo $row["edittime"]?>
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