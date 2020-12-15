<?php 
include_once 'lib/core.php';
$pdo =DB_CONNECT();
$id = $_GET["id"];
$sql = "SELECT * FROM question WHERE id=".$id;
$rs = $pdo ->query($sql);
if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
  $title = $row["title"];
  $sort = $row["sort"];
}
?>

    <form name='changtitleform' action='changtitle.php' method='post'>
        <div class="col-lg-12">
          <div class="col-lg-2 spl">
            <h4>標題</h4>
          </div>
          <div class="col-lg-10 spr">
          <input type="text" name="title" value="<?php echo $title?>" class="form-control input-md">
          <input type="text" name="id" value="<?php echo $id?>" class="form-control input-md" style="display: none;">
          </div>
        </div>
        <div class="col-lg-12">
          <div class="col-lg-2 spl">
            <h4>排列順序</h4>
          </div>
          <div class="col-lg-10 spr">
            <select name="mysort" id="mysort"  class="form-control" >    
          <?php 
          $sql1 = "SELECT count(*) as n FROM question WHERE parid=0 ";
          $rs1 = $pdo ->query($sql1);
          foreach ($rs1 as $key => $row1) {
            for ($i=1; $i <=$row1["n"] ; $i++) { 
              if($i == $sort){
                ?>
                <option value="<?php echo $i?>" selected><?php echo $i?></option> 
                <?php
              }else{
                ?>
                <option value="<?php echo $i?>"><?php echo $i?></option> 
                <?php
              }
            }
          }
          ?>
           
          </select>
          </div>
        </div>
        <div class="col-lg-12" style="text-align: center;">
            <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="changtitle()">送出</button>
            <button id="button2id" name="button2id" class="btn bu" onclick="cancel()" type="button">返回</button>
        </div>
        
    </form>	
    