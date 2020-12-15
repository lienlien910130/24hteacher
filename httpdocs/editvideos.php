<?php 
@session_start();
include_once 'lib/core.php';
$id = $_SESSION["id"];
$pdo = DB_CONNECT();
$sql = "SELECT * FROM clouds WHERE uid = '".$id."' AND types = 1";
$rs = $pdo ->query($sql);
$x = 0;
?>
<form class="form-horizontal" style="margin:30px 0px 20px 0px" name="videoForm" id="videoForm" action="editvideoProc.php" method="POST" accept-charset="UTF-8">
  <fieldset>
   <button id="button2id" name="button2id" class="btn btn-default" onclick="checkviForm()" type="button">上傳</button>
   <button id="button2id" name="button2id" class="btn btn-default" onclick="cancelForm()" type="button">取消</button>
   <table id="myTable2" class=" table order-list">
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
                    <td class="col-sm-3">
                        <input type="text" class="form-control" name="vititle[]" value="<?php echo $row["titles"]?>" />
                    </td>
                    <td class="col-sm-5">
                         <input type="text" class="form-control" name="vihres[]" value="<?php echo $row["hre"]?>" />
                    </td>
                    <td class="col-sm-2">
                        <select class="form-control" name="viopen[]">
                           <?php 
                           if($row["open"]==0){
                            ?>
                            <option value="0" selected>開放</option>
                            <option value="1">關閉</option>
                            <?php
                           }else{
                            ?>
                            <option value="0">開放</option>
                            <option value="1" selected>關閉</option>
                            <?php
                           }
                           ?>
                            
                        </select>
                    </td>
                    <?php 
                    if($x==1){
                    ?>
                    <td class="col-sm-2"><a class="刪除"></a>
                    </td>
                    <?php
                    }else{
                    ?>
                    <td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="刪除"></td>
                    <?php
                    }
                    ?>
                    
                </tr>
            <?php
                }
             ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: left;">
                        <input type="button" class="btn btn-lg btn-block " id="addrow2" value="新增" />
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
</fieldset>
</form>
     <script type="text/javascript">
         $("#addrow2").on("click", 
    function () {
      $.getJSON("getStaticData.php?action=WeekType",
        function(data)
        {
          var newRow = $("<tr>");
              var cols = "";
              cols += '<td class="col-sm-3"><input type="text" class="form-control" name="vititle[]" /></td>';
              cols += '<td class="col-sm-5"><input type="text" class="form-control" name="vihres[]" /></td>';
              cols += '<td class="col-sm-2"><select class="form-control" name="viopen[]"><option value="0">開放</option><option value="1">關閉</option></select>';
              cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="刪除"></td>';
              newRow.append(cols);
              $("#myTable2").append(newRow);
        }
      );
      }
    );
           $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
    });

function checkviForm()
{
    var frm = document.forms["videoForm"];
    frm.submit();
    
}
function cancelForm(){
    location.href="clouds.php";
}
</script>