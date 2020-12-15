<?php
include_once 'lib/core.php';
@session_start();
$pdo=DB_CONNECT();
$id=$_GET["id"];
$sql ="SELECT * FROM news WHERE id=".$id;
$rs = $pdo->query($sql);
?>

<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script>
 
 </script>
 <?php
foreach ($rs as $key => $row) {
	?>

    <form name ="editsubform" id="editsubform" action='editsubProc.php' method='post'>
        <div class="col-lg-12">
          <div class="col-lg-2 spl">
            <h4>標題</h4>
          </div>
          <div class="col-lg-10 spr">
            <input type="text" name="title" value="<?php echo $row["title"]?>" class="form-control input-md">
          </div>
        </div>
        <div class="col-lg-12 pt">
          <div class="col-lg-2 spl">
            <h4>對象</h4>
          </div>
          <div class="col-lg-10 spr">
            <select name="mytype" id="mytype"  class="form-control" >
            <?php 
            if($row["types"] == 1){
              ?>
              <option value="1" selected>案件</option> 
              <option value="2">老師</option>   
              <option value="3">網站</option>  
              <?php
            }else if($row["types"] == 2){
              ?>
              <option value="1">案件</option> 
              <option value="2" selected>老師</option>   
              <option value="3">網站</option> 
              <?php
            }else{
              ?>
              <option value="1">案件</option> 
              <option value="2">老師</option>   
              <option value="3" selected>網站</option> 
              <?php
            }
            ?>
            </select>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <textarea class="ckeditor" name="content" id="content" rows="100" cols="100">
             <?php include_once 'news/'.$row["val"];?>
        </textarea>
        <script>
        
          CKEDITOR.replace( 'content',{
             filebrowserBrowseUrl : 'ckeditor/ckfinder/ckfinder.html',
             filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
             filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
             filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
             filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
             filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
             width : 100%
          });

          </script>

        <!--    CKEDITOR.replace( 'content', {width:100%}); -->
  
        <input type="text" name="id" value="<?php echo $row["id"]?>" style="display: none;">
        </div>
       
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
              <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="editsave(<?php echo $row["id"]?>)">送出</button>
             <!--  onclick="processData(<?php echo $row["id"]?>)" -->
              <button id="button2id" name="button2id" class="btn bu" onclick="cancel()" type="button">返回</button>
        </div>
        
    </form>	
    
<?php
}
?>