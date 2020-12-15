<?php 
@session_start();
include_once 'lib/core.php';
 if(!isset($_SESSION['login']) || empty($_SESSION['login']) ){
   header("Location:index.php?msg=5");
 }
$account = getProfile($_SESSION["id"]);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-3.3.7/docs/favicon_1.ico">

    <title>修改基本資料</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="indexstyle.css"> 
    <!-- <link rel="stylesheet" type="text/css" href="navbar_1.css"> -->
    <!-- Custom styles for this template -->
   
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.theme.default.min.css"></link>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/owl.carousel.min.js"></script>
 

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

  </head>
  <body>
 <div id="wrapper">
   <div class="overlay"></div>
    <div id="header">
      <?php include_once 'n1.php';?>
    </div>
    <div id="content">
      <div class="container">
          <div class="wid">
            <div class="col-lg-4 col-md-4 hidden-xs hidden-sm ">
               <?php include_once 'account_menu.php'; ?>
            </div>
            <div class="col-lg-8 col-xs-12 col-sm-12 col-md-8 clo">
              <form class="form-horizontal" style="" name="accountForm" id="accountForm" action="accountProc.php" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
              <fieldset>
              <h3 class="title">會員資料 (<span style="color: red">＊</span>為必填項目)</h3>
              <div class="col-lg-4 o col-xs-12 col-sm-12 col-md-12">
                <?php if($account[5] !=""){
                  ?>
                  <img src="<?php echo htmlspecialchars($account[5], ENT_QUOTES);?>" style="width: 100%;">
                  <!-- <img src="img/person.png" style="width: 200px;height: 200px">
                   --><?php 
                }else{
                  ?>
                  <img src="profile/123.jpg" style="width: 100%;">
                  <?php
                  }?>
              </div>
              <div class="col-lg-8 o col-xs-12 col-sm-12 col-md-12">
                 <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <h4 >&nbsp;&nbsp;&nbsp;大頭照</h4>
                </div>
                <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                  <input id="pic" name="pic" type="file" class="form-control input-md" style="" >
                </div>
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <span style="font-size: 8px;">(尺寸：540*400)</span>
                </div>
                <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                <span style="font-size: 8px;">檔案類型限png、jpg、gif。</span>
                </div>
                <div class="col-lg-12 t col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <h4 ><span style="color: red">＊</span>真實姓名</h4>
                </div>
                <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                <input id="username" name="username" type="text" placeholder="真實姓名" class="form-control input-md" value="<?php echo htmlspecialchars($account[1], ENT_QUOTES);?>" size="25" maxlength="25">
                </div>
              </div>
              <div class="col-lg-12 th col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <h4 ><span style="color: red">＊</span>性別</h4>
                </div> 
                <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                <select name="gender" class="form-control" >
                <?php 
                if($account[2] == ""){
                  ?>
                  <option value="0" selected>請選擇</option>
                  <option value="1">女</option>
                  <option value="2">男</option>
                  <?php
                }else if($account[2] == "女"){
                  ?>
                  <option value="0">請選擇</option>
                  <option value="1" selected>女</option>
                  <option value="2">男</option>
                  <?php
                }else{
                  ?>
                  <option value="0">請選擇</option>
                  <option value="1">女</option>
                  <option value="2" selected>男</option>
                  <?php
                }
                ?>
                </select>
                </div>
              </div> 
              <div class="col-lg-12 fo col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <h4 ><span style="color: red">＊</span>出生日期</h4>
                </div>
                <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                <!-- <input id="birthday" name="birthday" type="date"  class="form-control input-md" value="<?php echo htmlspecialchars($account[3], ENT_QUOTES);?>" placeholder="xxxx/xx/xx" size="10" maxlength="10"> -->
                <input id="birthday" name="birthday" type="text" class="form-control input-md" size="10" maxlength="10" value="<?php echo htmlspecialchars($account[3], ENT_QUOTES);?>" placeholder="xxxx-xx-xx" />
                </div>
              </div>
              <div class="col-lg-12 fi col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <h4 ><span style="color: red">＊</span>手機號碼</h4>
                </div>
                <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                <input id="phone" name="phone" type="text"  class="form-control input-md" placeholder="09xxxxxxxx" value="<?php echo htmlspecialchars($account[6], ENT_QUOTES);?>" size="15" maxlength="15">
                </div>
              </div>
              <div class="col-lg-12 fi col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <h4 ><span style="color: red">＊</span>身份證字號</h4>
                </div>
                <div class="col-lg-7 col-xs-8 col-sm-8 col-md-8 pr pl">
                <input id="numb" name="numb" type="text"  class="form-control input-md" placeholder="身分證字號" value="<?php echo htmlspecialchars($account[8], ENT_QUOTES);?>" onkeyup="changenum(this)" size="11" maxlength="11">
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-lg-12 si col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <h4 ><span style="color: red">＊</span>聯絡信箱</h4>
                </div>
                <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                <input id="email" name="email" type="text"  class="form-control input-md" placeholder="xxx@xxx.xxx" value="<?php echo htmlspecialchars($account[7], ENT_QUOTES);?>" disabled>
                </div>
              </div>
              <div class="col-lg-12 se col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                <h4 ><span style="color: red">＊</span>居住地址</h4>
                </div>
                <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-left: 0px;padding-right: 5px;">
                   <select name="F_I_CNo" id="myCity" class="form-control">
                    <?php 
                    if($account[4] != ""){
                    ?><option value="-1">縣市</option>
                    <?php
                    }else{
                    ?>
                      <option value="0">縣市</option>
                    <?php
                    }
                    ?>
                    <?php
                    $sql ="SELECT * FROM city";
                    $msg=@$_GET["msg"];
                    $pdo = DB_CONNECT();
                    $rs =$pdo->query($sql);
                    foreach ($rs as $key => $row) {
                    ?>
                      <option value="<?php echo $row["id"] ?>"><?php echo $row["cityvalue"]; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6" style="padding-left: 5px;padding-right: 0px;">
                  <select name="F_I_TNo" id="myTown" class="form-control">
                   <?php 
                    if($account[4] != ""){
                    ?><option value="-1">鄉鎮</option>
                    <?php
                    }else{
                    ?>
                      <option value="0">鄉鎮</option>
                    <?php
                    }
                    ?>
                </select>
                </div>
                 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="padding-top: 10px;">
                   <input type="text" class="form-control" id="myZip" Name="myZip"  placeholder="地址" value="<?php echo htmlspecialchars($account[4], ENT_QUOTES);?>" size="50" maxlength="50"/>
                 </div>
               
                
                </div>
              </div>
              <div class="col-lg-12 ei col-xs-12 col-sm-12 col-md-12">
               
                <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center">
                 <!--  <button id="button1id" name="button1id" class="btn btn-success" onclick="checkacForm()" type="button">修改</button>
                  <button id="button2id" name="button2id" class="btn btn-default" onclick="cancelForm()" type="button">取消</button> -->
                  <div></div>
                  <button onclick="checkacForm()" name="login" class="btn bu" style="width:40%;margin-right: 5px;" type="button">儲存</button>
                  <button onclick="cancelForm()" name="login" class="btn bu" style="width:40%;margin-left: 5px;" type="button">取消</button>
                </div>
              </div>
              </div>
              
              
              </fieldset>
              </form>  
            </div>
          </div>
      </div>
    </div>
    <div id="footer">
      <?php include_once 'footer.php'; ?>
    </div>
  </div>

     
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>

<script type="text/javascript">
$(function(){
    $('#birthday').datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: "1950:2017"
    });
});

           $(document).ready(function(){
                //利用jQuery的ajax把縣市編號(CNo)傳到Town_ajax.php把相對應的區域名稱回傳後印到選擇區域(鄉鎮)下拉選單
                $('#myCity').change(function(){
                    var CNo= $('#myCity').val();
                    $.ajax({
                        type: "POST",
                        url: 'Town_ajax.php',
                        cache: false,
                        data:'CNo='+CNo,
                        error: function(){
                            alert('Ajax request 發生錯誤');
                        },
                        success: function(data){
                            $('#myTown').html(data);
                            $('#myZip').val("");//避免重新選擇縣市後郵遞區號還存在，所以在重新選擇縣市後郵遞區號欄位清空
                        }
                    });
                });
                //根據選擇區域(鄉鎮)的編號傳到Zip_ajax.php把區域對應的郵遞區號印到指定的郵遞區號欄位
                $('#myTown').change(function(){
                    // var data = new FormData
                    // data.append("TNo",$('#myTown').val());
                    // data.append("CNo",$('#myCity').val());
                    var CNo= $('#myCity').val();
                    var TNo= $('#myTown').val();
                    $.ajax({
                        type: "POST",
                        url: 'Zip_ajax.php',
                        cache: false,
                        data: 'TNo='+TNo,
                        error: function(){
                            alert('Ajax request 發生錯誤');
                        },
                        success: function(data){
                            $('#myZip').val(data);
                        }
                    });
                });
                var obj = $("#numb");
                changenum(obj);
            });

 function checkacForm()
{
    var frm = document.forms["accountForm"];
    var input = document.getElementById("pic");
    re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i;
    var v = $(".icon").children();
    var k = frm.birthday.value.split("-");
    var Today=new Date();
    var year_n = Today.getFullYear();
	 var month = Today.getMonth()+1
	 var day = Today.getDate();
    var rule3=/^09\d{2}\d{6}$/;
	 
    if(frm.username.value == ""  || frm.birthday.value=="" || frm.gender.value==0 || 
      frm.myZip.value=="" || frm.phone.value=="" || frm.numb.value == ""){
        alert("欄位不可空白");
    }
    else if(!rule3.test(frm.phone.value)){
        alert("手機號碼格式錯誤");
    }else if(frm.birthday.value.length >10 || k[0] > year_n || 
      k[1] > 12 || k[1] < 01 || k[2] >31 || k[2] <01 || k[0].length!= 4 ||k[1].length !=2 || k[2].length !=2 || k[0] <1912 || (k[1] == 02 && k[2]>29) ||
       (k[1] == 04 && k[2]>30) || (k[1] == 06 && k[2]>30) 
       || (k[1] == 09 && k[2]>30) || (k[1] == 11 && k[2]>30) || (k[0] == year_n && k[1] > month) || (k[0] == year_n && k[1] == month && k[2] > day ) )
	{
       alert("出生日期格式錯誤");
    }
    else if(re.test(frm.username.value.toLowerCase()) || re.test(frm.birthday.value.toLowerCase()) || re.test(frm.myZip.value.toLowerCase()) || re.test(frm.phone.value.toLowerCase())|| re.test(frm.numb.value.toLowerCase()) ){
        alert("欄位不可輸入無效字元");
    }
    else if(frm.myTown.value== 0 || frm.myCity.value == 0){
        alert("地址輸入錯誤");
    }else if(v.hasClass("fa-times-circle") == true){
		
        alert("身份證字號驗證錯誤");
		// alert(name+"!!!!"+ar_name[1]);
    }else{
      if(input.value != ""){
		  var name = input.value;
		  var ar_name = name.split('.');
		  var ar_ext = ['png', 'jpg', 'gif']; 
		  for(var i=0; i<ar_ext.length; i++) {
			if(ar_ext[i] == ar_name[1]) {
			  re = 1;
			  break;
			}
		  }
		  if(re==1){
		   var f = input.files[0];
          var reader = new FileReader();
          reader.onload = function (e) {
          var data = e.target.result;
          var image = new Image();
          image.onload=function(){
              var width = image.width;
              var height = image.height;
              if(width > 540 && height > 400 ){
                  alert("請上傳540*400大小的圖片");
              }else{
                  frm.submit();
              }
          };
           image.src= data;
         };
          reader.readAsDataURL(f);
		  }else{
		    alert("檔案格式錯誤，請重新選擇");
		  }
         
      }else{
       
        frm.submit();

        //alert("欄位不可空白");
      }
  
  }
}
function changenum(obj) {
    var v = $(obj).val();
    if(v.length == 10 ){
    var a = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'X', 'Y', 'W', 'Z', 'I', 'O');
    var b = new Array(1, 9, 8, 7, 6, 5, 4, 3, 2, 1);
    var c = new Array(2);
    var d;
    var e;
    var f;
    var g = 0;
    var h = /^[a-z](1|2)\d{8}$/i;
    if (v.search(h) == -1){
        // return false;
        alert("身份證字號格式錯誤");
    }else{
        d = v.charAt(0).toUpperCase();
        f = v.charAt(9);
        for (var i = 0; i < 26; i++){
        if (d == a[i]){
            e = i + 10; //10
            c[0] = Math.floor(e / 10); //1
            c[1] = e - (c[0] * 10); //10-(1*10)
            break;
           }
        }
        for (var i = 0; i < b.length; i++){
              if (i < 2){
                  g += c[i] * b[i];
              }else{
                  g += parseInt(v.charAt(i - 1)) * b[i];
              }
          }  
        var i = $(obj).parent().parent().find(".icon").children();
        if ((10 - (g % 10)) != f){
          if(i.hasClass("fa-check-circle")==true){
            $(i).removeClass("fa-check-circle");
            $(i).addClass("fa-times-circle");
          }
            // alert("驗證失敗");
        }else{
          if(i.hasClass("fa-times-circle")==true){
            $(i).removeClass("fa-times-circle");
            $(i).addClass("fa-check-circle");
          }
              //   alert("驗證成功");
      }
             
   // return true;
      }
    }else{
      var i = $(obj).parent().parent().find(".icon").children();
      if(i.hasClass("fa-check-circle")==true){
            $(i).removeClass("fa-check-circle");
            $(i).addClass("fa-times-circle");
      }
    }
    
}
 function cancelForm()
{
    location.href="account.php";
}

<?php
    if(@$_GET["msg"]==1)
    {
  ?>
      alert("儲存成功");
  <?php
    }
  ?>
<?php
    if(@$_GET["msg"]==2)
    {
  ?>
       alert("檔案類型錯誤，請重新上傳");
  <?php
    }
  ?>
</script>