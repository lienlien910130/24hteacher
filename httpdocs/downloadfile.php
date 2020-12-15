<?php 
@session_start();
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

    <title>下載表格</title>

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
        <div class="wid down">
        <?php 
        $sql = "SELECT * FROM downfiles";
        $rs = $pdo ->query($sql);
        foreach ($rs as $key => $row) {
          ?>
          <div class="col-lg-12  d_o col-md-12 col-xs-12 col-sm-12">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"><h3 class="h_3"><?php echo htmlspecialchars($row["title"], ENT_QUOTES);?></h3></div> 
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
              <div class="col-lg-2 c2 col-md-3 col-xs-3 col-sm-3">
                <img src="<?php echo htmlspecialchars($row["imgs"], ENT_QUOTES);?>" class="img-responsive" >
              </div>
              <div class="col-lg-10 c10 col-md-9 col-xs-9 col-sm-9">
                <p><h4 class="h_4">適用對象：<?php echo htmlspecialchars($row["objects"], ENT_QUOTES);?></h4></p>
                <p><h4 style=" font-weight: bold;"><?php echo htmlspecialchars($row["content"], ENT_QUOTES);?></h4></p>
              </div>
            </div> 
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
              <a href="<?php echo htmlspecialchars($row["paths"], ENT_QUOTES);?>" class="btn bu" type="button" style="border-radius: 10px;">下載</a>
            </div> 
          </div>

          <?php
        }
        ?>
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

</script>