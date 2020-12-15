<?php 
@session_start();
include_once 'lib/core.php';
$pdo =DB_CONNECT();
if(!isset($_GET["token"]) || empty($_GET["token"]) ){
   header("Location:error.php");
}else{
  $token = addslashes($_GET["token"]);
  $email= addslashes($_GET["email"]);
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
    <link rel="icon" href="bootstrap-3.3.7/docs/favicon.ico">

    <title>Tutor</title>

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
       <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin-bottom: 10px;padding-right: 0px;padding-left: 0px">
             <div class="row">
                <div class="owl-carousel1 owl-theme">
                <?php 
                  $sql = "SELECT * FROM picture WHERE types=1";
                  $rs =$pdo ->query($sql);
                  $x = 0;
                  foreach ($rs as $key => $row) {
                      ?>
                     <div class="item" style="margin-top: 40px;"><img src="<?php echo htmlspecialchars($row["paths"], ENT_QUOTES);?>" class="img-responsive ii" style="width: 100%;height: 500px"></div>
                      <?php
                    }
                      ?>
               </div>
            </div>
        </div>
    </div>
    <div id="content">
      <div class="container">
          <div class="wid">
          <div class="col-lg-12 about col-sm-12 col-xs-12 col-md-12">
             <div class="col-lg-12 h3 col-sm-12 col-xs-12 col-md-12">
              <h3>重設密碼</h3>
             </div>
             <div class="col-lg-12 o col-xs-12 col-sm-12 col-md-12">
             <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 clo">
            <form class="form-horizontal" style="" name="resetForm" id="resetForm" action="reset_passwordProc.php" method="POST" accept-charset="UTF-8" style="padding-top: 15px;">
             <fieldset>
             <div class="col-lg-12 o col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-2 col-md-2 hidden-xs hidden-sm"></div>
                <div class="col-lg-3 col-sm-5 col-xs-5 col-md-3 col3 pl">
                <h4 ><span style="color: red">＊</span>輸入密碼</h4>
                </div>
                <div class="col-lg-5 col-xs-7 col-sm-7 col-md-5 pr">
                  <input id="pas1" name="pas1" type="password" placeholder="" class="form-control input-md" required="長度8~12" size="12">
                 <div class="col-lg-1"></div> 
                </div>
              </div>
              <div class="col-lg-12 pt col-xs-12 col-sm-12 col-md-12">
               <div class="col-lg-2 hidden-xs hidden-sm col-md-2"></div>
                <div class="col-lg-3  col-sm-5 col-xs-5 col-md-3 col3 pl">
                <h4 ><span style="color: red">＊</span>確認密碼</h4>
                </div>
                <div class="col-lg-5 col-xs-7 col-sm-7 col-md-5 pr">
                  <input id="pas2" name="pas2" type="password" placeholder="" class="form-control input-md" required="長度8~12" size="12">
                </div>
              </div>
             
              <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 th" style="text-align: center;padding-top: 20px;">
                  <button onclick="checkpaForm()" name="login" class="btn bu" style="width:30%;margin-right: 5px;" type="button">儲存</button>
                  <button onclick="cancelForm()" name="login" class="btn bu" style="width:30%;margin-left: 5px;" type="button">取消</button>
                </div>
                <input id="email" name="email" type="text" placeholder="" class="form-control input-md" value="<?php echo htmlspecialchars($email, ENT_QUOTES);?>" style="display: none;">
             </fieldset>
            </form>  
            </div>
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
$('.owl-carousel1').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
 function checkpaForm()
{
    var frm = document.forms["resetForm"];
    re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i;
    if(frm.pas1.value == ""  || frm.pas2.value=="" )
    {
        alert("欄位不可空白");
    }
    else if(frm.pas1.value != frm.pas2.value){
        alert("密碼輸入錯誤");
    }
    else if(frm.pas1.value.length < 8 || frm.pas1.value.length >12){
        alert("密碼長度為8~12");
    }
    else if(re.test(frm.pas1.value.toLowerCase()) || re.test(frm.pas2.value.toLowerCase()) ){
       alert("欄位不可輸入無效字元");
    }
    else{
        frm.submit();
    }
}
 function cancelForm()
{
    location.href="index.php";
}

</script>