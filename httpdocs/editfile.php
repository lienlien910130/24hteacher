 <?php 
include_once 'lib/core.php';
@session_start();
$id = $_GET["id"];
$pdo =DB_CONNECT();
$sql ="SELECT * FROM picture WHERE id =".$id;
$rs = $pdo->query($sql);
foreach ($rs as $key => $row) {
?>
<form class="form-horizontal" style="margin:30px 0px 20px 0px" name="editfileForm" id="editfileForm" action="editfileProc.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        <fieldset>
          <input id="picid" name="picid" type="text" class="form-control input-md" value="<?php echo $row["id"]?>" style="display: none;">
          <input id="pic" name="pic" type="file" class="form-control input-md" value="<?php echo $row["name"]?>" style="display: none;">
          <br>
          <div class="form-group">
            <label class="col-md-1 control-label">說明</label>
            <div class="col-md-11">
            <textarea class="form-control input-md" id="des" name="des" cols="10" rows="5" placeholder="限100字以內"><?php echo $row["description"]?></textarea>
            </div>
          </div>
          <button id="button2id" name="button2id" class="btn btn-default" onclick="checkpedForm()" type="button">修改</button> 
        </fieldset>
</form>



<?php
}
?>
<script type="text/javascript">
  function checkpedForm() {
    var frm = document.forms["editfileForm"];
    if(frm.des.value.length >101){
        alert("字數不可超過100個字!"); 
      }
      else{
        frm.submit();
      }
  }
</script>

 