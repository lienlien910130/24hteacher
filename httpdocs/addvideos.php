<form class="form-horizontal" style="" name="videoForm" id="videoForm" action="addvideoProc.php" method="POST" accept-charset="UTF-8">
  <fieldset>
  <!--  <button id="button2id" name="button2id" class="btn btn-default" onclick="checkviForm()" type="button">上傳</button>
   <button id="button2id" name="button2id" class="btn btn-default" onclick="cancelForm()" type="button">取消</button> -->
   <table id="myTable2" class=" table order-list">
            <thead>
                <tr>
                    <td>標題</td>
                    <td>連結</td>                    
                    <td></td>
                </tr>
            </thead>
            <tbody>
              <tr>
                    <td class="col-sm-5 ti col-lg-5 col-md-5 col-xs-5">
                        <input type="text" class="form-control" name="vititle[]" value="" onkeyup="changeTitle(this)" onchange="changeTitle(this)" size="15" maxlength="15" />
                    </td>
                    <td class="col-sm-6 hr col-lg-6 col-md-6 col-xs-6">
                         <input type="text" class="form-control" name="vihres[]" value="" onkeyup="changeHres(this)" onchange="changeHres(this)"/>
                    </td>
                    <td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1">
                      <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align: center;padding-top: 20px;">
                        <input type="button" class="btn  bu bu_1" id="addrow2" value="新增一筆" style=""/>
                        <input type="button" class="btn  bu bu_2" id="button2id" value="儲存" onclick="checkviForm()" style=""/>
                        <input type="button" class="btn  bu bu_3" id="button2id" value="取消" onclick="cancelForm()" style=""/>
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
			        cols += '<td class="col-sm-5 ti col-lg-5 col-md-5 col-xs-5"><input type="text" class="form-control" name="vititle[]" onkeyup="changeTitle(this)"/></td>';
			        cols += '<td class="col-sm-6 hr col-lg-6 col-md-6 col-xs-6"><input type="text" class="form-control" name="vihres[]" onkeyup="changeHres(this)"/></td>';
                    cols += '<td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1"><i class="fa fa-times-circle fa-2x ibtnDel" aria-hidden="true" type="button"></i></td>';
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
    var trigger = $(".fa-times-circle");
    var re = /http:/;
    if(trigger.length >=5){
      alert("欄位不可空白");
    }else{
       //alert("sss");
      frm.submit();
    }
    
    
}
function cancelForm(){
    location.href="clouds.php";
}
function changeTitle(obj) {
    var t1 = $(obj).val();
    var t2 = $(obj).parent().parent().find(".hr").children();
    var i = $(obj).parent().parent().find(".icon").children();
    
    if(t1 == ""){
       $(i).removeClass("fa-check-circle");
       $(i).addClass("fa-times-circle");
    }else{
        if(t2.val() == ""){
           $(i).removeClass("fa-check-circle");
           $(i).addClass("fa-times-circle");
        }else{
           $(i).removeClass("fa-times-circle");
           $(i).addClass("fa-check-circle");  
        }
    }
}
function changeHres(obj) {
    var t1 = $(obj).val();
    var t2 = $(obj).parent().parent().find(".ti").children();
    var i = $(obj).parent().parent().find(".icon").children();
    
    if(t1 == ""){
       $(i).removeClass("fa-check-circle");
       $(i).addClass("fa-times-circle");
    }else{
        if(t2.val() == ""){
           $(i).removeClass("fa-check-circle");
           $(i).addClass("fa-times-circle");
        }else{
           $(i).removeClass("fa-times-circle");
           $(i).addClass("fa-check-circle");  
        }
    }
}
</script>