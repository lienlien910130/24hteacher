<?php 
@session_start();
include_once 'lib/core.php';
$id = @$_GET["id"];
$uid = $_SESSION["id"];
$cases = getCases($uid);
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

    <title>105 Tutor</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <!-- Custom styles for this template -->
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php include_once 'navbar.php';?>
    <div class="container">
      <div class="header clearfix">
        <nav>
         <!--  <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">我要找老師</a></li>
          </ul> -->
        </nav>
        <a href="index.php">
        <img src="img/book.png" style="width: 200px;height: 150px">
        </a>
      </div>

      
      <div class="row">
        <div class="col-lg-3" style="text-align: center">
          <?php include_once 'account_menu.php'; ?>
        </div>

        <div class="col-lg-9" style="text-align: center">
        <?php include_once 'casede.php'; ?>

        </div>
    
      </div>

      <footer class="footer col-lg-12" style="text-align: center">
        <?php include_once 'footer.php'; ?>
      </footer>

    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>

<script type="text/javascript">
function cancelForm($id){
  location.href="deletecase.php?id="+$id;
}
function cancelsForm(){
  location.href="history.php";
}
function editcase($id){
  location.href="editcase.php?id="+$id;
}
function changeForm($id,$status){
  var id = $id;
  var status = $status;
  $.ajax({
                        type: "POST",
                        url: 'casestatusProc.php',
                        cache: false,
                        data:'id='+id+'&status='+status,
                        error: function(){
                            alert('Ajax request 發生錯誤');
                        },
                        success: function(data){
                          alert("案件狀態修改成功!");
                          location.href="history.php";
                        }
                    });
         
  
}

</script>