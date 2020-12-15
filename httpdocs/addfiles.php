<?php 

?>

<form class="form-horizontal" style="margin:30px 0px 20px 0px" name="fileForm" id="fileForm" action="addfileProc.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
    <fieldset>
    	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 pl">
                <h4><span style="color: red">＊</span>標題</h4>
            </div>  
            <div class="col-lg-9  col-sm-9 col-xs-9 col-md-9 pr pl">
                <input type="text" class="form-control" id="mytitle" name="mytitle" placeholder="" />
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 pt">
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 pl">
                <h4><span style="color: red">＊</span>ICON圖片<br><span style="font-size: 14px">( 請勿上傳中文檔名 )</span></h4>
            </div>  
            <div class="col-lg-9  col-sm-9 col-xs-9 col-md-9 pr pl">
                <input  type="file" name="myicon" class="form-control" accept="image/*" />
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 pt">
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 pl">
                <h4><span style="color: red">＊</span>適用對象</h4>
            </div>  
            <div class="col-lg-9  col-sm-9 col-xs-9 col-md-9 pr pl">
                <select name="myobj" class="form-control">
			        <option value="0">選擇對象</option>
			        <option value="1">老師</option>
			        <option value="2">案主家長</option>
			        <option value="3">老師及案主家長</option>
			    </select>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 pt">
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 pl">
                <h4><span style="color: red">＊</span>簡介<br><span style="font-size: 14px">( 限300字以內 )</span></h4>
            </div>  
            <div class="col-lg-9  col-sm-9 col-xs-9 col-md-9 pr pl">
                <textarea class="form-control input-md" name="content" cols="10" rows="5"></textarea>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 pt">
            <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 pl">
                <h4><span style="color: red">＊</span>檔案<br><span style="font-size: 14px">( 請勿上傳中文檔名 )</span></h4>
            </div>  
            <div class="col-lg-9  col-sm-9 col-xs-9 col-md-9 pr pl">
                <input  type="file" name="myfiles" class="form-control" accept=".xlsx,.xls,.doc,.docx,.ppt,.pptx,.txt,.pdf"/>
            </div>
        </div>
        <div class="col-lg-12 pt col-sm-12 col-xs-12 col-md-12" style="text-align: center;">
            <button id="button2id" name="button2id" class="btn bu" onclick="savefiles()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">儲存</button>
            <button id="button2id" name="button2id" class="btn bu" onclick="canceladdfiles()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">取消</button>
        </div>
    </fieldset>
</form>
<script type="text/javascript">
function canceladdfiles() {
  location.href="fileupload.php";
}
function savefiles() {
	var frm = document.forms["fileForm"];
	if(frm.mytitle.value == "" || frm.myicon.value==""||
		frm.myobj.value == 0 || frm.content.value==""|| 
		frm.myfiles.value == ""){
		alert("欄位不可空白");
	}else if(frm.content.value.length >300){
		alert("字數超過300!請重新輸入");
	}else{
		frm.submit();
	}
}
</script>