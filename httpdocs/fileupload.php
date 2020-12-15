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
    <div id="header">
      <?php include_once 'n1.php';?>
    </div>
    <div id="content">
      <div class="container">
        <div class="wid">
          <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 hidden-xs  hidden-sm">
              <?php include_once 'manage_menu.php'; ?>
          </div>
          <div class="col-lg-8 files col-md-8 col-xs-12 col-sm-12">
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <h3 class="title">下載表格管理</h3>
              </div>
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="padding-top: 10px;">
                <div id="changeto" class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                  
                  <?php 
                  $sql = "SELECT * FROM downfiles";
                  $rs = $pdo ->query($sql);
                  foreach ($rs as $key => $row) {

                  ?>
                  <div class="col-lg-4 col-md-6 col-xs-6 col-sm-6">
                    <div class="col-lg-12 imgss col-md-12 col-xs-12 col-sm-12">
                      <img src="<?php echo $row["imgs"]?>" class="img-responsive" >
                      <div class="caption" style="vertical-align: center;">
                      <a href="<?php echo $row["paths"]?>" class="btn bu" type="button" style="border-radius: 10px;" rel="tooltip" title="Download">下載</a>
                      <a href="javascript:edit(<?php echo $row["id"]?>)" class="btn bu" type="button" style="border-radius: 10px;" rel="tooltip" title="Edit">編輯</a>
                      <a href="javascript:deletes(<?php echo $row["id"]?>)" class="btn bu" type="button" style="border-radius: 10px;" rel="tooltip" title="Delete">刪除</a>
                      </p>
                  </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
                      <h4><?php echo $row["title"]?></h4>
                    </div>
                  </div>
                  
                  <?php
                  }
                  ?>
                  
                  </div>
                  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
                    <button id="button2id" name="button2id" class="btn bu" onclick="addfiles()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">新增</button>
                  </div>
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
<?php
    if(@$_GET["msg"]==1)
    {
  ?>
      alert("檔案類型錯誤，請重新上傳");
  <?php
    }
  ?>

 

function addfiles() {
  $.get("addfiles.php",function(data)
  {
      $("#changeto").html(data);
  });
}
function edit($id) {
   $.get("editfiles.php?id="+$id,function(data)
  {
      $("#changeto").html(data);
  });
}
function deletes($id) {
  $.ajax({
         type: "POST",
         url: 'deletefile.php',
         cache: false,
         data:'id='+$id,
         dataType:'json', 
         error: function(){
             alert('Ajax request 發生錯誤');
         },
          success: function(data,textStatus,jqXHR){
            if(data.status =="1"){
               alert("刪除成功");
               location.href="fileupload.php";
               die();
              }else{
                 alert(data.status);
              }
            
         }
      });  
}
$( document ).ready(function() {
    $('.imgss').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
});
</script>