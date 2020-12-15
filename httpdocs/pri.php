<?php 
include_once 'lib/core.php';
$pdo =DB_CONNECT();
@session_start();
$arr =$_POST["arr"];
$out = explode(",", $arr);

?>
 <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myObj">
 <input type="text" name="subject" id="subject" value="<?php echo $arr?>" style="display: none;">
<?php
if($arr != ""){
for ($i=0; $i <count($out) ; $i++) { 
 $sql = "SELECT l.id as li,s.val as sv,l.val as lv FROM lessions l LEFT JOIN subjects s on l.sid=s.id WHERE l.id=".$out[$i];
 $rs = $pdo ->query($sql);
 foreach ($rs as $key => $row) {
 
 ?>
  <?php echo $row["sv"].$row["lv"]."<br>"?>  
  <?php
  } 
 }
}else{
 echo "科目類別";
}
?>
</a>