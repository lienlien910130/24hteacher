<?php  
@session_start();
include_once 'lib/core.php';
$arr=$_POST["arr"];
$arr1=$_POST["arr1"];
        if($arr != ""){
        ?>
        <input type="text" name="se" id="se" value="<?php echo $arr?>" style="display: none;">
        <?php 
        }else{
        ?>
          <input type="text" name="se" id="se" value="" style="display: none;">
        <?php 
        }if($arr1 != ""){
            ?>
        <input type="text" name="se4" id="se4" value="<?php echo $arr1?>" style="display: none;">
        <?php
        }else{?>
           <input type="text" name="se4" id="se4" value="" style="display: none;">
        <?php
          
        }

        $out = explode(",", $arr);
        $pdo = DB_CONNECT();
        if($arr != ""){
        for ($i=0; $i <count($out) ; $i++) { 
        $sql = "SELECT l.id as li,s.val as sv,l.val as lv FROM lessions l LEFT JOIN subjects s on l.sid=s.id WHERE l.id=".$out[$i];
        $rs = $pdo ->query($sql);
        foreach ($rs as $key => $row) {
        ?>
        <a  href="#" onclick="delete_this(<?php echo $row["li"]?>)" class="sv"><i class="fa fa-times-circle" aria-hidden="true"></i>  <?php echo $row["sv"].$row["lv"]?>  
        </a>
        <?php
           } 
        }
      }