<?php 
session_start();
include_once 'lib/core.php';
$pdo =DB_CONNECT();

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

    <title>家長情報</title>

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
                     <div class="item" style="margin-top: 40px;"><img src="<?php echo  htmlspecialchars($row["paths"], ENT_QUOTES);?>" class="img-responsive ii" style="width: 100%;"></div>
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
             <h3>熱門推薦</h3>
             </div>

             <div id="change_hot">
             <div class ='row'>
             <div class='col-lg-12 col-sm-12 col-xs-12 col-md-12' style=''>
             <?php
              $sql = "SELECT * FROM parents ORDER BY addtime DESC LIMIT 0,6";
              $rs =$pdo ->query($sql);
              foreach ($rs as $key => $row) {
                ?>
                <div class="col-lg-4 col-sm-4 col-xs-12 col-md-4" style="margin-top: 10px;">
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <a href="parentartic.php?id=<?php echo  htmlspecialchars($row["id"], ENT_QUOTES);?>" target="_blank">
                <img src="<?php echo  htmlspecialchars($row["paths"], ENT_QUOTES);?>" class="img-responsive" style="border-radius: 10px;margin: auto;height: 220px;width: 353px"></a>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <h4 style="font-weight: bold;"><?php echo  htmlspecialchars($row["contitle"], ENT_QUOTES);?></h4>
                </div>
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12"
                 style="bottom:0px">
                <span class="pull-right">
                <?php
                $out = explode(" ", $row["addtime"]);
                echo $out[0];
                 ?>
                </span>
                </div>
              </div>
              </div>
                <?php
              }
             ?>
             </div>
             </div>
             </div>

             <div class="col-lg-12 h3 col-sm-12 col-xs-12 col-md-12">
             <h3>家長情報文章</h3>
             </div>

             <div id="change_all">
             <?php include_once 'a2_table.php';?>
             </div>


            <div class="col-lg-12 h3 col-sm-12 col-xs-12 col-md-12">
             <h3>私校師資文章</h3>
             </div>

             <div id="change_tea">
             <?php include_once 'a3_table.php';?>
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
 function cha1($page) {
     $.get("a1_table.php?page="+$page,function(data)
    {
        $("#change_hot").html(data);
    });
  }
   function cha2($page) {
     $.get("a2_table.php?page="+$page,function(data)
    {
        $("#change_all").html(data);
    });
  }
    function cha3($page) {
     $.get("a3_table.php?page="+$page,function(data)
    {
        $("#change_tea").html(data);
    });
  }
</script>