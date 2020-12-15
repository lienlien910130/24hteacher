<?php 
include_once 'lib/core.php';
$pdo =DB_CONNECT();
@session_start();
$arr =$_POST["arr"];

$out = explode(",", $arr);

?>
 <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myTime">
 <input type="text" name="time" id="time" value="<?php echo $arr?>" style="display: none;">
<?php
if($arr != ""){

for ($i=0; $i <count($out) ; $i++) { 
 $sql = "SELECT * FROM week WHERE id=".$out[$i];
  $rs = $pdo ->query($sql);
 foreach ($rs as $key => $row) {
 ?>
  <?php echo $row["val"]."&nbsp;"?>  
  <?php
  } 
}
}else{
	echo "上課時間";
}
?>
</a>