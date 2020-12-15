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

    <title>我的最愛案件</title>

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
          <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 favor clo">
          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
              <h3 class="title">我的最愛案件</h3>
          </div>
          <div id="person" class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin-top: 10px;">
          <?php include_once 'my_o.php';?>

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


function cha($page,$order,$sort) {
  $.get("my_o.php?page="+$page+"&&order="+$order+"&&sort="+$sort,function(data)
  {
      $("#person").html(data);
  });
}
function chaa($order,$sort) {
  $.get("my_o.php?order="+$order+"&&sort="+$sort,function(data)
  {
      $("#person").html(data);
  });
}

function deletefav($id){
  $.ajax({
            type: "POST",
            url: 'removefavoritecaseProc.php',
            cache: false,
            data:"&fid="+$id,
            dataType:'json',
            error: function(){
                alert('');
            },
            success: function(data,textStatus, jqXHR){
                 if(data.status == "1"){
               alert("移除成功");
               location.href="favorite.php";
               die();
              }else{
               alert("刪除失敗，請詢問客服人員");
               location.href="favorite.php";
               die();
             }
            }
        });
}
</script>