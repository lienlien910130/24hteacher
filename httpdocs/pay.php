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
    <link rel="icon" href="bootstrap-3.3.7/docs/favicon.ico">

    <title>Tutor</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <!-- Custom styles for this template -->
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
      
    <div class="container">
      <div class="header clearfix">
        
        <?php include_once 'navbar.php';?>
      </div>

      
      <div class="row">
        <div class="col-lg-3" style="text-align: center">
        <ol class="breadcrumb">
          <li><a href="index.php">首頁</a></li>
          <li><a href="account_center.php">會員中心</a></li>
          <li class="active">付款紀錄</li>
        </ol>
          <?php include_once 'account_menu.php'; ?>
        </div>

        <div class="col-lg-9" style="text-align: center">
          <?php 
          $pdo = DB_CONNECT();
           $uid = $_SESSION["id"];
         
          $sql ="SELECT * FROM pay WHERE uid=".$uid;
          $rs = $pdo ->query($sql);
          $cases = getCases($uid);
          ?>
         
          <div id="person">
          <table id="example3" class="table table-bordered table-hover col-lg-12">
            <thead>
              <tr>
                <td>交易項目</td>
                <td>金額</td>
                <td>交易時間</td>
                <td>付款方式</td>
                <td>備註</td>
              </tr>
            </thead>
            <tbody>
             
            </tbody>
          </table>
         </div>
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
  $(function () {
    $("#example1").DataTable();
    $("#example3").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "language": {
          "emptyTable": "查無資料",
           "paginate": {
               "previous": "上一頁",
               "next": "下一頁"
           },
           "info": "顯示 _PAGE_ 到 _PAGES_ 筆資料",
            "infoEmpty": "0筆資料"
        }
    });
  });
function seeper($cid){

     $.ajax({
        type: "POST",
        url: 'seeperson_ajax.php',
        cache: false,
        data:'cid='+$cid,
        error: function(){
        alert('Ajax request 發生錯誤');
        },
        success: function(data){
            $('#person').html(data);
        }
    });


}
</script>