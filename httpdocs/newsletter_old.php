<?php 
@session_start();
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$news =@$_POST["news"];
// $out = implode(",", $news);

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
    <script src="ckeditor/ckeditor.js"></script>
  </head>
<script>
 
 </script>
  <body>
   <?php include_once 'n.php';?>

    <div class="container">
    
      <div class="row" style="margin-top: 70px">
        <div class="col-lg-3">
           <ol class="breadcrumb">
          <li><a href="index.php">首頁</a></li>
          <li class="active">訂報中心</li>
            </ol>
        </div>
          <div class="col-lg-9">
             <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                       訂報中心</h3>
                </div>
                <div class="panel-body">
                         <p>您想搶先得知最新的案件機會或師資情報嗎？不限會員，歡迎免費訂閱！</p>
                         <br><br>
                         <h3 style="text-align: left;border-bottom:1px solid #e5e5e5;">聯絡資料</h3>
                          <form method="POST" action="addnewsletter.php" accept-charset="UTF-8" id="newsForm" name="newsForm">
                          <label style="font-size: 24px">信箱</label>
                            <?php
                              if(@$_GET["email"] != "")
                              {
                            ?>
                               <input type="text" id="email" class="span4" name="email" value="<?php echo $_GET["email"]?>">
                            <?php
                              }else{
                                ?>
                              <input type="text" id="email" class="span4" name="email" placeholder="請輸入信箱">
                               <?php
                              }
                            ?>
                          <button id="button3id" name="button3id" class="btn btn-success" type="button" onclick="checkneForm()">送出</button> 
                          </form>
                          <br><br>

                          <h3 style="text-align: left;border-bottom:1px solid #e5e5e5;">訂閱內容</h3>
                          <div id="news">
                           <form method="POST" action="editnewsletter.php" accept-charset="UTF-8" id="ednewsForm" name="ednewsForm">
                           <?php
                              if(@$_GET["email"] != "")
                              {
                            ?>
                             <input type="text" id="email" class="span4" name="email" value="<?php echo $_GET["email"]?>">
                              <?php 
                              $sql = "SELECT * FROM newsletter WHERE email = '".$_GET["email"]."'";
                              $rs = $pdo ->query($sql);
                              foreach ($rs as $key => $row) {
                                  if($row["casespa"] == 1){
                                    ?>
                                     <input type="checkbox" name="news[]" value="1" checked><label>當家教資訊報</label>
                                    <?php
                                  }else{
                                  ?>
                                   <input type="checkbox" name="news[]" value="1"><label>當家教資訊報</label>
                                  <?php
                                  } 
                                  if($row["teachpa"] == 1){
                                  ?>
                                   <input type="checkbox" name="news[]" value="2" checked><label>老師資訊報</label>
                                  <?php
                                  }else{
                                    ?>
                                    <input type="checkbox" name="news[]" value="2"><label>老師資訊報</label>
                                    <?php
                                  }
                                   if($row["webpa"] == 1){
                                  ?>
                                   <input type="checkbox" name="news[]" value="3" checked><label>家教好康報</label>
                                  <?php
                                  }else{
                                    ?>
                                   <input type="checkbox" name="news[]" value="3"><label>家教好康報</label>
                                   <?php
                                  }
                                }
                              
                              }else{
                                ?>
                                 <input type="text" id="email" class="span4" name="email" value="">
                                 <input type="checkbox" name="news[]" value="1"><label>當家教資訊報</label>
                                 <input type="checkbox" name="news[]" value="2"><label>老師資訊報</label>
                                 <input type="checkbox" name="news[]" value="3"><label>家教好康報</label>
                             
                               <?php
                              }
                               ?>
                               <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                                     <button id="button3id" name="button3id" class="btn btn-success" type="button" onclick="checkedneForm()">送出</button> 
                                     <button id="button3id" name="button3id" class="btn btn-success" type="button" onclick="cancelForm()">取消，回首頁</button> 
                                  </div>
                              </div>
                            </form>
                         
                          </div>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>
        </div>
      
  
     
      </div>

    </div> 
    <!-- /container -->

  <?php include_once't1.php';?>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>

<script type="text/javascript">
  function checkneForm() {
     var frm = document.forms["newsForm"];
     if(frm.email.value == ""){
      alert("信箱不可空白");
     }else{
      frm.submit();
     }
  }
    function checkedneForm() {
     var frm1 = document.forms["ednewsForm"];
     var frm = document.forms["newsForm"];
     if(frm.email.value == ""){
      alert("信箱不可空白");
     }else if(frm1.email.value == ""){
       alert("請先在上方輸入email後並按確認，才可進行訂閱!");
       }
     else{
      frm1.submit();
     }
  }
</script>