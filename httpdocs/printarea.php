<?php  
@session_start();
include_once 'lib/core.php';
$arr=$_POST["arr"];
$arr1=$_POST["arr1"];
if($arr != ""){
        ?>
         <input type="text" name="se1" id="se1" value="<?php echo $arr?>" style="display: none;">
        <?php 
        }else{
        ?>
        <input type="text" name="se1" id="se1" value="" style="display: none;">
         
        <?php 
        }if($arr1 != ""){
            ?>
        <input type="text" name="se5" id="se5" value="<?php echo $arr1?>" style="display: none;">
        <?php
        }else{?>
        <input type="text" name="se5" id="se5" value="" style="display: none;">
        <?php
        }

        $out = explode(",", $arr);
        $pdo = DB_CONNECT();
        if($arr != ""){
        for ($i=0; $i <count($out) ; $i++) { 
        $sql = "SELECT a.id as ai,a.value as av,c.cityvalue as cv FROM area a LEFT JOIN city c on a.cid=c.id WHERE a.id=".$out[$i];
        $rs = $pdo ->query($sql);
        foreach ($rs as $key => $row) {
                               ?>
           <a  href="#" onclick="delete_thisa(<?php echo $row["ai"]?>)" class="sv"><i class="fa fa-times-circle" aria-hidden="true"></i>  <?php echo $row["cv"].$row["av"]?>  </a>
            <?php
          } 
        }
      }