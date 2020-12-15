<?php
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = @$_GET["id"];

$sql = "SELECT r.numbers as numbers,c.id as cid,r.id as rid,c.titles as titles,c.names as names,c.hre as hre,c.names_all as names_all,c.hre_all as hre_all,c.types as types,c.prices as prices,c.checks as checks,c.addtime as addtime FROM clouds c LEFT JOIN resume r on c.uid = r.uid WHERE c.id = ".$id;
$rs = $pdo -> query($sql);
foreach ($rs as $row) {
    ?> 
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
	  <?php echo $row["numbers"]?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202);word-break: break-all">
	    <?php
                  if($row["types"] == 2){
                        ?>
                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">筆記</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <a href="<?php echo $row["hre"]?>" class="note" style="text-align: center;" target="_blank" title="預覽"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $row["titles"]?></div>
                      </div>
                        <?php
                       }else{
                        ?>
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">教材</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                          <a href="<?php echo $row["hre"]?>" class="hres" style="text-align: center;" target="_blank" title="預覽"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $row["titles"]?></div>
                      </div>
                        <?php
                       }
                  ?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  <?php
                  if($row["types"] == 2){
                        ?>
                        <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">筆記</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <a href="<?php echo $row["hre_all"]?>" class="note" style="text-align: center;" target="_blank" title="預覽"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $row["titles"]?></div>
                      </div>
                        <?php
                       }else{
                        ?>
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">教材</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                          <a href="<?php echo $row["hre_all"]?>" class="hres" style="text-align: center;" target="_blank" title="預覽"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo $row["titles"]?></div>
                      </div>
                        <?php
                       }
                  ?>
	  </td>
	  <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2 tabletd" style="background-color:rgb(202,202,202)">
	  	 <?php echo $row["prices"];?>
	  </td>
	  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202)">
	  	 <?php echo $row["addtime"];?>
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
	  <td class="col-lg-1 col-md-1 col-xs-1 col-sm-1 tabletd" style="background-color:rgb(202,202,202)">
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