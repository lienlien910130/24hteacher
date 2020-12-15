<?php 
@session_start();
include_once 'lib/core.php';
 if(!isset($_SESSION['login']) || empty($_SESSION['login']) ){
   header("Location:index.php?msg=5");
 }
  if( $_SESSION["type"] == 1 ||  $_SESSION["type"] == 2  ){
   header("Location:index.php?msg=6");
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

    <title>名師網</title>


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
    <div id="header">
      <?php include_once 'n1.php';?>
    </div>
    <div id="content">
      <div class="container">
        <div class="wid">
          <div class="col-lg-4 col-md-4 hidden-xs hidden-sm">
              <?php include_once 'manage_menu.php'; ?>
          </div>
          <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 mail">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
              <h3 class="title">收件帳號管理</h3>
            </div>  
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <form class="form-horizontal" name="mailForm" id="mailForm" action="change_mail.php" method="POST" accept-charset="UTF-8">
              <fieldset>
              <div class="col-lg-12 pt col-md-12 col-xs-12 col-sm-12">
                <div class="col-lg-3 spl col-md-4 col-xs-4 col-sm-4">
                  <h4><span style="color: red">＊</span>gmail帳號</h4>
                </div>
                <div class="col-lg-9 pr col-md-8 col-xs-8 col-sm-8">
                  <input id="pas1" name="pas1" type="text" placeholder="輸入email帳號" class="form-control input-md" required="">
                </div>
              </div>

              <div class="col-lg-12 pt col-md-12 col-xs-12 col-sm-12">
                <div class="col-lg-3 spl col-md-4 col-xs-4 col-sm-4">
                  <h4><span style="color: red">＊</span>gmail帳號</h4>
                </div>
                <div class="col-lg-9 pr col-md-8 col-xs-8 col-sm-8">
                  <input id="pas2" name="pas2" type="password" placeholder="輸入email密碼" class="form-control input-md" required="">
                </div>
              </div>
              <!-- Button (Double) -->
              <div class="col-lg-12 pt col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
                <button id="button1id" name="button1id" class="btn bu mr8" onclick="checkmaForm()" type="button">儲存</button>
                <button id="button2id" name="button2id" class="btn bu ml8" onclick="cancelForm()" type="button">取消</button>
              </div>

              </fieldset>
              </form>
              </div>
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
function checkmaForm()
{
    var frm = document.forms["mailForm"];
    if(frm.pas1.value == ""  || frm.pas2.value=="" )
    {
        alert("欄位不可空白");
    }
    else{
        frm.submit();
    }
}

 function cancelForm()
{
    location.href="mail.php";
}

<?php
    if(@$_GET["msg"]==1)
    {
  ?>
      alert("儲存成功");
  <?php
    }
  ?>
</script>