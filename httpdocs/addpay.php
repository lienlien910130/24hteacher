<?php 
@session_start();
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$uid = @$_SESSION["id"];
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
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="bootstrap-3.3.7/js/jquery-3.2.0.min.js"></script>
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
        <div class="col-lg-3">
         <ol class="breadcrumb">
          <li><a href="index.php">首頁</a></li>
          <li class="active">我要付款</li>
        </ol>
         <?php
        if (!empty($_SESSION["id"]) ||  isset($_SESSION["id"]) ) {
              include_once 'account_menu.php'; 
         }
        ?>
        </div>
        <div class="col-lg-9" id="addpay">
              <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                       付款說明</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 separator social-login-box"> <br />
                        <h3 style="border-bottom: 1px solid #e5e5e5;text-align: left;">就業諮詢<span class="pull-right" style="font-size: 36px;color: red;">$399</span></h3>
                        <ul>
                          <li>履歷線上公開90天</li>
                          <li>所刊登的案件90天內可以主動邀請老師</li>
                          <li>不限次數90天內可以主動應徵案件</li>
                        </ul>
                        </div>
                    </div><br><br>
                    <div class="row" style="padding: 10px;">
                       <p>【就業諮詢費399元】
                        繳交就業諮詢費399元可享有90天履歷曝光與瀏覽案件資訊權利，提醒您，本服務不保證錄取，付費前，請考慮清楚！
                        繳交就業諮詢費399元前，請先完成個人聯絡資訊(電話+Email)驗證。90天的履歷曝光需在繳交費用成功及完成聯絡資訊驗證後，即可正式啟用開通。
                        </p><br>
                        <p>
                        【其它付費提醒】
                        若您使用非線上付款方式(轉帳/匯款)，請將收據拍照掃描並至意見反應上傳收據，並註明發票是否捐贈，客服人員將於上班時間為您確認處理。
                        本人同意本網站有權於任何時間修改或變更網站條款及服務內容，本人應隨時注意該等修改或變更，修改後的服務條款將公佈在網站上，不另行個別通知使用者，若本人繼續使用本網站提供之求職服務時，即視為本人已閱讀、瞭解並默示同意修正後之內容。
                        104家教網僅提供網路家教資訊瀏覽平台服務，無任何權利以及立場干涉家教與刊登者（以下簡稱雙方）洽談過程及結果，若雙方發生任何爭議，應由雙方自行依循正當法律途徑解決。</p>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                           <button id="button3id" name="button3id" class="btn btn-success" type="button" onclick="addpay()">我要付款</button> 
                        </div>
                    </div>
                </div>
            </div>
            <div>
              
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

  function addpay()
{
  $.get("addpays.php",function(data)
    {
        $("#addpay").html(data);
    });
}


$(function () {
    $("#example1").DataTable();
    $("#example3").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });

</script>