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

    <title>修改履歷表</title>

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
                <div id="addresume">
                      <?php
                        $pdo = DB_CONNECT();
                        $sql = "SELECT * FROM resume WHERE uid='".$_SESSION["id"]."' ";
                        $rs = $pdo -> query($sql);
                      if($row = $rs -> fetch(PDO::FETCH_BOTH)){
                          include_once 'editresume.php';
                      }else{
                       ?>
                      <div class="col-lg-12" style="padding-top: 63px;text-align: center;">
                      <?php 
                      $sql1 = "SELECT * FROM member_list WHERE uid='".$_SESSION["id"]."' AND cid=3 ";
                      $rs1 = $pdo -> query($sql1);
                      foreach ($rs1 as $key => $row1) {
                        if($row1["val"] == ""){
                          ?>
                          <h3>請先至基本資料處進行資料填寫!</h3>
                          <button onclick="returneditmem()" name="login" class="btn bu" style="width:100%;font-size: 28px" type="button">修改基本資料</button>
                          <?php
                        }else{
                          ?>
                          <button onclick="addresume()" name="login" class="btn bu" style="width:100%;font-size: 28px" type="button">新增履歷</button>
                          <?php
                        }
                      }
                      ?>
                        
                      </div>
                       <?php
                      }
                      ?>
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
<?php 
if(@$_GET["msg"] == 1){
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
function addresume()
{
  $.get("addresume.php",function(data)
    {
        $("#addresume").html(data);
    });
}
function returneditmem() {
  location.href="account.php";
}

</script>