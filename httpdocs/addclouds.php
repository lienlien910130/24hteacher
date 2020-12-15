<h5>檔案格式為excel、ppt、word、pdf，請勿上傳圖片檔。預覽版請上傳1~3頁的檔案即可。</h5>
<form class="form-horizontal"  name="cloudForm" id="cloudForm" action="addcloudProc.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
  <fieldset>
 <!--  <div class="col-lg-12" style="text-align: center;">
   <button id="button2id" name="button2id" class="btn bu" onclick="checkclForm()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">儲存</button>
   <button id="button2id" name="button2id" class="btn bu" onclick="cancelForm()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">取消</button>
   </div> -->
   <table id="myTable1" class=" table order-list">
            <thead>
                <tr>
                    <td>標題</td>
                    <td>預覽版檔案</td> 
                    <td>完整版檔案</td> 
                    <td>價格</td>                      
                    <td>選項</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
              <tr>
                    <td class="col-sm-2 col-lg-2 col-md-2 col-xs-2 tt">
                        <input type="text" class="form-control" name="titles[]" value="" onkeyup="changeCTitle(this)" size="15" maxlength="15" />
                    </td>
                    <td class="col-sm-3 fil col-lg-3 col-md-3 col-xs-3">
                         <input  type="file" name="hres[]" class="form-control" accept="" onchange="changeCHre(this)"/>
                    </td>
                    <td class="col-sm-3 call col-lg-3 col-md-3 col-xs-3">
                         <input  type="file" name="all[]" class="form-control" accept="" onchange="changeCAll(this)"/>
                    </td>
                    <td class="col-sm-1 col-lg-1 col-xs-1 col-md-1 price">
                       <input type="number" class="form-control pl pr" name="price[]" value="" onkeyup="changeCPrice(this)" size="6" maxlength="6"/> 
                    </td>
                    <td class="col-sm-2 col-lg-2 col-md-2 col-xs-2 no">
                        <select class="form-control" name="texttype[]">
                            <option value="0">教材</option>
                            <option value="1">筆記</option>
                        </select>
                    </td>
                    <td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1">
                      <i class="fa fa-times-circle fa-2x type_icon" aria-hidden="true"></i>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                   <td colspan="6" style="text-align: center;padding-top: 20px;">
                        <input type="button" class="btn  bu  bu_1" id="addrow1" value="新增一筆" style=""/>
                        <input type="button" class="btn  bu bu_2" id="button2id" value="儲存" onclick="checkclForm()" style=""/>
                        <input type="button" class="btn  bu bu_3" id="button2id" value="取消" onclick="cancelForm()" style=""/>
                        <!--   <button id="button2id" name="button2id" class="btn bu" onclick="checkclForm()" type="button" style="padding: 10px;margin-right: 5px;width: 30%">儲存</button>  -->
                         <!--  <button id="button2id" name="button2id" class="btn bu" onclick="cancelForm()" type="button" style="padding: 10px;margin-right: 5px;">取消</button> -->
                    </td> 
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
</fieldset>
</form>
      <script type="text/javascript">
<?php
    if(@$_GET["msg"]==1)
    {
  ?>
      alert("只接受上傳word/ppt/excel/pdf檔");
  <?php
    }
  ?>
  $("#addrow1").on("click", 
		function () {
			$.getJSON("getStaticData.php?action=WeekType",
				function(data)
				{
					var newRow = $("<tr>");
			        var cols = "";
			        cols += '<td class="col-sm-2 tt col-lg-2 col-md-2 col-xs-2"><input type="text" class="form-control" name="titles[]" onkeyup="changeCTitle(this)"/></td>';
			        cols += '<td class="col-sm-3 fil col-lg-3 col-md-3 col-xs-3"><input name="hres[]" type="file" class="form-control" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" onchange="changeCHre(this)"/></td>';
              cols += '<td class="col-sm-3 call col-lg-3 col-md-3 col-xs-3"><input  type="file" name="all[]" class="form-control" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" onchange="changeCAll(this)"/></td>';
              cols += '<td class="col-sm-1 col-lg-1 col-xs-1 col-md-1 price"><input type="text" class="form-control pl pr" name="price[]" value="" onkeyup="changeCPrice(this)" /></td>';
              cols += '<td class="col-sm-2 no col-lg-2 col-md-2 col-xs-2"><select class="form-control" name="texttype[]"><option value="0">教材</option><option value="1">筆記</option></select>';
			        cols += '<td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1"><i class="fa fa-times-circle fa-2x ibtnDel type_icon" aria-hidden="true" type="button"></i></td>';
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
    var frm = document.forms["cloudForm"];
    var trigger = $(".fa-times-circle");
    if(trigger.length >=5){
        alert("欄位不可空白");
    }else{
        frm.submit();
    }
}
function cancelForm(){
    location.href="clouds.php";
}
function changeCTitle(obj) {
    var t1 = $(obj).val();
    var t2 = $(obj).parent().parent().find(".fil").children();
    var t3 = $(obj).parent().parent().find(".call").children();
    var t4 = $(obj).parent().parent().find(".price").children();
    var i = $(obj).parent().parent().find(".icon").children();
    
    if(t1 == ""){
       $(i).removeClass("fa-check-circle");
       $(i).addClass("fa-times-circle");
    }else{
        if(t2.val() == "" || t3.val() == "" || t4.val() == ""){
           $(i).removeClass("fa-check-circle");
           $(i).addClass("fa-times-circle");
        }else{
           $(i).removeClass("fa-times-circle");
           $(i).addClass("fa-check-circle");  
        }
    }
}
function changeCHre(obj) {
    var t1 = $(obj).val();
    var t2 = $(obj).parent().parent().find(".tt").children();
    var t3 = $(obj).parent().parent().find(".call").children();
    var t4 = $(obj).parent().parent().find(".price").children();
    var i = $(obj).parent().parent().find(".icon").children();
    
    if(t1 == ""){
       $(i).removeClass("fa-check-circle");
       $(i).addClass("fa-times-circle");
    }else{
        if(t2.val() == "" || t3.val() == "" || t4.val() == ""){
           $(i).removeClass("fa-check-circle");
           $(i).addClass("fa-times-circle");
        }else{
           $(i).removeClass("fa-times-circle");
           $(i).addClass("fa-check-circle");  
        }
    }
}
function changeCPrice(obj) {
    var t1 = $(obj).val();
    var t2 = $(obj).parent().parent().find(".tt").children();
    var t3 = $(obj).parent().parent().find(".call").children();
    var t4 = $(obj).parent().parent().find(".fil").children();
    var i = $(obj).parent().parent().find(".icon").children();
    
    if(t1 == ""){
       $(i).removeClass("fa-check-circle");
       $(i).addClass("fa-times-circle");
    }else{
        if(t2.val() == "" || t3.val() == "" || t4.val() == ""){
           $(i).removeClass("fa-check-circle");
           $(i).addClass("fa-times-circle");
        }else{
           $(i).removeClass("fa-times-circle");
           $(i).addClass("fa-check-circle");  
        }
    }
}
function changeCAll(obj) {
    var t1 = $(obj).val();
    var t2 = $(obj).parent().parent().find(".tt").children();
    var t3 = $(obj).parent().parent().find(".fil").children();
    var t4 = $(obj).parent().parent().find(".price").children();
    var i = $(obj).parent().parent().find(".icon").children();
    
    if(t1 == ""){
       $(i).removeClass("fa-check-circle");
       $(i).addClass("fa-times-circle");
    }else{
        if(t2.val() == "" || t3.val() == "" || t4.val() == ""){
           $(i).removeClass("fa-check-circle");
           $(i).addClass("fa-times-circle");
        }else{
           $(i).removeClass("fa-times-circle");
           $(i).addClass("fa-check-circle");  
        }
    }
}
$("input[name='texttype']").change(function(){
   if($(".type_icon").hasClass('fa-times-circle') == true){
      $(".type_icon").removeClass('fa-times-circle');
      $(".type_icon").addClass('fa-check-circle');
     }else{
     }
});
</script>