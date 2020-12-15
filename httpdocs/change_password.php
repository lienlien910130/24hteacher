<?php 
@session_start();
include_once 'lib/core.php';
 if(!isset($_SESSION['login']) || empty($_SESSION['login']) ){
   header("Location:index.php?msg=5");
 }
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

    <title>更改密碼</title>

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
            <div class="col-lg-4 col-md-4 hidden-xs hidden-sm">
               <?php include_once 'account_menu.php'; ?>
            </div>
            <div class="col-lg-8 col-xs-12 col-sm-12 col-md-8 clo">
            <form class="form-horizontal" style="" name="passwordForm" id="passwordForm" action="change_passwordProc.php" method="POST" accept-charset="UTF-8">
             <fieldset>
             <h3 class="title">更改密碼 (<span style="color: red">＊</span>為必填項目)</h3>
             <div class="col-lg-12 o col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4 col3">
                <h4 ><span style="color: red">＊</span>舊密碼</h4>
                </div>
                <div class="col-lg-6 col-xs-8 col-sm-8 col-md-8">
                  <input id="pas" name="pas" type="password" placeholder="長度為8~12" class="form-control input-md" required="" size="12" maxlength="12">
                </div>
              </div>
             <div class="col-lg-12 o col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4 col3">
                <h4 ><span style="color: red">＊</span>輸入密碼</h4>
                </div>
                <div class="col-lg-6 col-xs-8 col-sm-8 col-md-8">
                  <input id="pas1" name="pas1" type="password" placeholder="長度為8~12" class="form-control input-md" required="" size="12" maxlength="12">
                  
                </div>
              </div>

              <div class="col-lg-12 t col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4 col3">
                <h4 ><span style="color: red">＊</span>確認密碼</h4>
                </div>
                <div class="col-lg-6 col-xs-8 col-sm-8 col-md-8">
                  <input id="pas2" name="pas2" type="password" placeholder="長度為8~12" class="form-control input-md" required="" size="12" maxlength="12">
                </div>
              </div>
             
              <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 th" style="text-align: center">
                  <button onclick="checkpaForm()" name="login" class="btn bu" style="width:30%;margin-right: 5px;" type="button">儲存</button>
                  <button onclick="cancelForm()" name="login" class="btn bu" style="width:30%;margin-left: 5px;" type="button">取消</button>
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
       
 function checkpaForm()
{
    var frm = document.forms["passwordForm"];
    re= /select|update|delete|exec|count|'|"|=|;|>|<|@|%/i;
    if(frm.pas1.value == ""  || frm.pas2.value=="" || frm.pas.value=="")
    {
        alert("欄位不可空白");
    }
    else if(frm.pas1.value != frm.pas2.value){
        alert("密碼輸入錯誤");
    }
    else if(re.test(frm.pas1.value.toLowerCase()) || re.test(frm.pas2.value.toLowerCase()) || re.test(frm.pas.value.toLowerCase())){
        alert("欄位不可輸入無效字元");
    }
    else if(frm.pas1.value.length < 8 || frm.pas1.value.length >12 || frm.pas.value.length < 8 || frm.pas.value.length >12){
        alert("密碼長度為8~12");
    }
	 else if(frm.pas.value == frm.pas1.value){
        alert("密碼不可設置相同");
    }
    else{
        frm.submit();
    }
}

 function cancelForm()
{
    location.href="change_password.php";
}

<?php
    if(@$_GET["msg"]==1)
    {
  ?>
      alert("修改成功");
  <?php
    }
  ?>

<?php
    if(@$_GET["msg"]==2)
    {
  ?>
      alert("舊密碼輸入錯誤!請重新輸入");
  <?php
    }
  ?>
<?php
    if(@$_GET["msg"]==3)
    {
  ?>
      alert("新舊密碼不可相同");
  <?php
    }
  ?>
</script>