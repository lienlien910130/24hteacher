<?php
include_once 'lib/core.php';
@session_start();
$pdo=DB_CONNECT();
$id=$_GET["id"];
$sql ="SELECT * FROM parents WHERE id=".$id;
$rs = $pdo->query($sql);
?>

<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>

 <?php
foreach ($rs as $key => $row) {
	?>

    <form name ="editparents" id="editparents" action='editparentsProc.php' method="post" accept-charset="UTF-8" enctype="multipart/form-data">
        <div class="col-lg-12">
          <div class="col-lg-2 spl">
            <h4><span style="color: red">＊</span>圖片</h4>
          </div>
          <div class="col-lg-10 col-md-10 col-xs-10 col-sm-10 spr">
          <img src="<?php echo $row["paths"]?>" class="img-responsive" style="border-radius: 10px;margin: auto">
           <!--  <input id="pic" name="pic" type="file" class="form-control input-md" value="<?php echo $row["name"]?>"> -->
          </div>
        </div>
        <div class="col-lg-12 pt">
          <div class="col-lg-2 spl">
            <h4><span style="color: red">＊</span>標題</h4>
          </div>
          <div class="col-lg-10 spr">
            <input type="text" name="title" value="<?php echo $row["title"]?>" class="form-control input-md">
          </div>
        </div>
        <div class="col-lg-12 pt">
          <div class="col-lg-2 spl">
            <h4><span style="color: red">＊</span>類型</h4>
          </div>
          <div class="col-lg-10 spr">
            <select name="types" id="types"  class="form-control" >
            <?php 
            if($row["types"] == 0){
              ?>
                <option value="0" selected>家長情報</option>
                <option value="1">私校師資</option> 
              <?php
            }else{
              ?>
              <option value="0">家長情報</option>
              <option value="1" selected>私校師資</option> 
              <?php
            }
            ?>
            </select>
          </div>
        </div>
        <div class="col-lg-12 pt">
          <div class="col-lg-2 spl">
            <h4><span style="color: red">＊</span>內文標題</h4>
          </div>
          <div class="col-lg-10 spr">
            <input type="text" name="contitle" value="<?php echo $row["contitle"]?>" class="form-control input-md">
          </div>
        </div>
        <div class="col-lg-12 pt">
          <div class="col-lg-2 spl">
            <h4><span style="color: red">＊</span>簡介<br><span style="font-size: 14px">( 限60字以內 )</span></h4>
          </div>
          <div class="col-lg-10 spr">
          <textarea class="form-control input-md" name="descript" cols="10" rows="5"><?php echo $row["description"]?></textarea>
        <!--     <input type="text" name="descript" value="" class="form-control input-md"> -->
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 pt">
        <textarea class="ckeditor" name="content" id="content" rows="100" cols="100">
             <?php echo $row["val"];?>
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