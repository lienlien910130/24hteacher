<?php  
@session_start();
include_once 'lib/core.php';
$arr=$_POST["arr"];
$arr1=$_POST["arr1"];
if($arr != ""){
  ?>
     <input type="text" name="ggg" id="ggg" style="display: none;"  value="<?php echo $arr?>">
        <?php 
        }else{
        ?>
          <input type="text" name="ggg" style="display: none;" id="ggg" >
        <?php 
        }if($arr1 != ""){
            ?>
        <input type="text" name="iii" id="iii" style="display: none;" value="<?php echo $arr1?>">
        <input type="text" name="hhh" id="hhh" style="display: none;" value="<?php echo $arr1?>">
        <?php
        }else{?>
          <input type="text" name="iii" id="iii" style="display: none;">
          <input type="text" name="hhh" id="hhh" style="display: none;">
        <?php
        }
        ?>
          <div>
        <?php
        $out = explode(",", $arr1);
        $pdo = DB_CONNECT();
        if($arr1 != ""){
        for ($i=0; $i <count($out) ; $i++) { 
        $sql = "SELECT a.id as ai,a.value as av,c.cityvalue as cv FROM area a LEFT JOIN city c on a.cid=c.id WHERE a.id=".$out[$i];
        $rs = $pdo ->query($sql);
        for ($i=0; $i <count($out) ; $i++) { 
        $sql = "SELECT * FROM week WHERE id =".$out[$i];
        $rs = $pdo ->query($sql);
        foreach ($rs as $key => $row) {
        ?>
         <a href="#" onclick="delete_thist(<?php echo $row["id"]?>)" class="sv"><i class="fa fa-times-circle" aria-hidden="true"></i>  <?php echo $row["val"]?>  </a>
        <?php
            } 
          }
        }
      }

      ?>
</div>