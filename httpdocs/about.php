<?php 
session_start();
include_once 'lib/core.php';
$pdo =DB_CONNECT();
$id = addslashes($_GET["id"]);
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
 <div class="overlay"></div>
    <div id="header">
      <?php include_once 'n1.php';?>
       <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin-bottom: 10px;padding-right: 0px;padding-left: 0px;margin-top: 40px;">
             <div class="row">
                <div class="owl-carousel1 owl-theme">
                <?php 
                  $sql = "SELECT * FROM picture WHERE types=1";
                  $rs =$pdo ->query($sql);
                  $x = 0;
                  foreach ($rs as $key => $row) {
                      ?>
                     <div class="item"><img src="<?php echo htmlspecialchars($row["paths"], ENT_QUOTES);?>" class="img-responsive ii" style="width: 100%;"></div>
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
              <?php 
                if($id==1){
                  ?>
                  <div class="col-lg-12 h3 col-sm-12 col-xs-12 col-md-12">
                    <h3>關於我們</h3>
                  </div>
                  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                  
                  <?php
                  include_once 'page/aboutus.html';
                  ?>
                  </div>
                  <?php
                }
                if($id==2){
                  ?>
                  <div class="col-lg-12 h3 col-sm-12 col-xs-12 col-md-12">
                    <h3>隱私權保護</h3>
                  </div>
                  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                  <?php
                  include_once 'page/privacy.html';
                  ?>
                  </div>
                  <?php
                }
                if($id==3){
                  ?>
                  <div class="col-lg-12 h3 col-sm-12 col-xs-12 col-md-12">
                    <h3>老師服務說明</h3>
                  </div>
                  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                  <?php
                  include_once 'page/teacher.html';
                  ?>
                  </div>
                  <?php
                }
                if($id==4){
                  ?>
                  <div class="col-lg-12 h3 col-sm-12 col-xs-12 col-md-12">
                    <h3>案主服務說明</h3>
                  </div>
                  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                  <?php
                  include_once 'page/cases.html';
                  ?>
                  </div>
                  <?php
                }
                if($id==5){
                  ?>
                  <div class="col-lg-12 h3 col-sm-12 col-xs-12 col-md-12">
                  <h3>常見問題</h3>
                  </div>
                  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                  <?php
                  include_once 'page/qa.html';
                  ?>
                  </div>
                  <?php
                }
              ?>
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
</script>