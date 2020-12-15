<?php 
include_once 'lib/core.php';
$pdo =DB_CONNECT();
@session_start();
$arr =$_POST["arr"];
$out = explode(",", $arr);

?>
 <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myArea">
 <input type="text" name="area" id="area" value="<?php echo $arr?>" style="display: none;">
<?php
if($arr !=""){
for ($i=0; $i <count($out) ; $i++) { 
 $sql = "SELECT a.id as ai,a.value as av,c.cityvalue as cv FROM area a LEFT JOIN city c on a.cid=c.id WHERE a.id=".$out[$i];
  $rs = $pdo ->query($sql);
 foreach ($rs as $key => $row) {
 
 ?>
  <?php echo $row["cv"].$row["av"]."<br>"?>  
  <?php
  } 
}}else{
	echo "上課區域";
}
?>
</a>