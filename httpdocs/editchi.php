<?php
include_once 'lib/core.php';
@session_start();
$pdo=DB_CONNECT();
$id=$_GET["id"];
$sql ="SELECT * FROM question WHERE id=".$id;
$rs = $pdo->query($sql);
?>
<script src="ckeditor/ckeditor.js"></script>

<form name ='editquestionform' action = 'editchiProc.php' method='post'>

    <?php
    foreach ($rs as $key => $row) {
     ?>
       <div class="col-lg-12">
          <div class="col-lg-2 spl">
            <h4>標題</h4>
          </div>
          <div class="col-lg-10 spr">
            <input type="text" name="title" value="<?php echo $row["title"]?>" class="form-control input-md">
            <input type="text" name="id" value="<?php echo $id?>" class="form-control input-md" style="display: none;">
          </div>
        </div>
        <div class="col-lg-12 pt">
        <textarea class="ckeditor" name="content" id="content" rows="100" cols="100">
        <?php include_once 'question/'.$row["val"];?>
        </textarea>
        <script>
           CKEDITOR.replace( 'content', {width:100%});
        </script>
        </div>
        
         <div class="col-lg-12" style="text-align: center;">
              <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="editchiProc(<?php echo $row["id"]?>)">送出</button>
              <button id="button2id" name="button2id" class="btn bu" onclick="cancel()" type="button">返回</button>
        </div>
      <?php
}
?>  
    </form>	
    
