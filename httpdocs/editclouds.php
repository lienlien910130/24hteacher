<?php 
@session_start();
include_once 'lib/core.php';
$id = $_SESSION["id"];
$pdo = DB_CONNECT();
$sql = "SELECT * FROM clouds WHERE uid = '".$id."' AND types <> 3";
$rs = $pdo ->query($sql);
$x = 0;
?>
<form class="form-horizontal" style="margin:30px 0px 20px 0px" name="editcloudForm" id="editcloudForm" action="editcloudProc.php" method="POST" accept-charset="UTF-8">
  <fieldset>
  <table id="myTable1" class=" table order-list">
            <thead>
                <tr>
                    <td>標題</td>
                    <td>連結</td>                    
                    <td></td>
                </tr>
            </thead>
            <tbody>
             <?php 
             foreach ($rs as $key => $row) {
                $x++;
               ?> 
              <tr>
                    <td class="col-sm-6">
                      <input type="text" class="form-control" name="id[]" value="<?php echo $row["id"]?>" style="display:none"/>
                        <input type="text" class="form-control" name="titles[]" value="<?php echo $row["titles"]?>" onkeyup="changeText(this)"/>
                    </td>
                    <td class="col-sm-5">
                        <select class="form-control" name="texttype[]">
                        <?php 
                        if($row["types"] == 0){
                        ?>
                        <option value="0" selected>教材</option>
                        <option value="1">筆記</option>
                        <?php
                        }else{
                        ?>
                        <option value="0">教材</option>
                        <option value="1" selected>筆記</option>
                        <?php
                        }
                        ?>   
                        </select>
                    </td>
                    <td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1"><i class="fa fa-check-circle fa-2x ibtnDel" aria-hidden="true" type="button"></i></td>
                </tr>
            <?php
                }
             ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6"  style="text-align: center;padding-left: 20%;padding-right: 20%">
                       <!--  <input type="button" class="btn btn-lg btn-block bu" id="addrow1" value="新增教材&筆記" style="width: 100%;padding: 10px;"/> -->
                       <button id="button2id" name="button2id" class="btn bu" onclick="checkclForm()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">儲存</button>
                       <button id="button2id" name="button2id" class="btn bu" onclick="cancelForm()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">取消</button>
                    </td>
                </tr>
            </tfoot>
  </table>
  <!-- <div class="col-lg-12" style="text-align: center;">
     <button id="button2id" name="button2id" class="btn bu" onclick="checkclForm()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">上傳</button>
   <button id="button2id" name="button2id" class="btn bu" onclick="cancelForm()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">取消</button>
  </div> -->
</fieldset>
</form>
 <script type="text/javascript">
 $("#addrow1").on("click", 
    function () {
      $.getJSON("getStaticData.php?action=WeekType",
        function(data)
        {
          var newRow = $("<tr>");
              var cols = "";
              cols += '<td class="col-sm-6"><input type="text" class="form-control" name="id[]" value="0" style="display:none"/><input type="text" class="form-control" name="titles[]" onkeyup="changeText(this)"/></td>';
              cols += '<td class="col-sm-5"><select class="form-control" name="texttype[]"><option value="0">教材</option><option value="1">筆記</option></select>';
              cols += '<td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1"><i class="fa fa-times-circle fa-2x ibtnDel" aria-hidden="true" type="button"></i></td>';
              newRow.append(cols);
              $("#myTable1").append(newRow);
        }
      );
      }
    );
    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();

    });

function checkclForm()
{
    var frm = document.forms["editcloudForm"];
   // frm.submit();
    alert(frm.id.length);
}
function cancelForm(){
    location.href="clouds.php";
}

function changeText(obj) {
    var v = $(obj).val();
    var i = $(obj).parent().parent().find(".icon").children();
    if(v.length == 0){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else{
        $(i).removeClass("fa-times-circle");
        $(i).addClass("fa-check-circle");  
    }
}
</script>