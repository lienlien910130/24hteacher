<?php
include_once 'lib/core.php';
@session_start();
$pdo=DB_CONNECT();
$id=$_GET["id"];
$sql ="SELECT * FROM page WHERE id=".$id;
$rs = $pdo->query($sql);
?>

<script src="ckeditor/ckeditor.js"></script>
<script>
   function processData($id){
   var data = CKEDITOR.instances.content.getData();
   var form = document.forms["editpageform"];
   if(form.content.value == ""){
    alert("欄位不可空白");
   }else{
      form.submit();
   }
 
  }
  function cancel() {
  location.href="article.php";
}
 </script>
 <?php
foreach ($rs as $key => $row) {
	?>

    <form name ="editpageform" id="editpageform" action='editpageProc.php' method='post'>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <textarea class="ckeditor" name="content" id="content" rows="100" cols="100">
             <?php include_once 'page/'.$row["val"];?>
        </textarea>
        <script>
           CKEDITOR.replace( 'content', {width:100%});
        </script>
        <input type="text" name="pageid" value="<?php echo $row["id"]?>" style="display: none;">
        </div>
       
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
              <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="processData(<?php echo $row["id"]?>)">送出</button>
             <!--  onclick="processData(<?php echo $row["id"]?>)" -->
              <button id="button2id" name="button2id" class="btn bu" onclick="cancel()" type="button">返回</button>
            </div>
        
    </form>	
    
<?php
}
?>