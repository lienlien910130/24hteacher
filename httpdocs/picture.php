<?php 
@session_start();
include_once 'lib/core.php';
 if(!isset($_SESSION['login']) || empty($_SESSION['login']) ){
   header("Location:index.php?msg=5");
 }
  if( $_SESSION["type"] == 1 ||  $_SESSION["type"] == 2  ){
   header("Location:index.php?msg=6");
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
          <div class="col-lg-4 col-md-4 hidden-xs hidden-sm">
              <?php include_once 'manage_menu.php'; ?>
          </div>
          <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 picture">
          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
              <h3 class="title">圖片管理</h3>
          </div>
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <form class="form-horizontal" style="margin:30px 0px 20px 0px" name="pictureForm" id="pictureForm" action="addpictureProc.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                  <fieldset>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <input id="pic" name="pic" type="file" class="form-control input-md">
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 pt">
                    <select name="mytype" id="mytype"  class="form-control" >
                      <option value="0">選擇位置</option>
                      <option value="1">輪播(1914px*500px 不限張數)</option> 
                      <option value="2">高學歷老師(330px*236px)</option>   
                      <option value="3">金牌老師(330px*236px)</option>  
                      <option value="4">人氣老師(330px*236px)</option>  
                      <option value="5">依科目搜尋(420px*378px)</option>  
                      <option value="6">依地區搜尋(420px*570px)</option>  
                      <option value="7">最新案件(600px*450px)</option>  
                      <option value="8">購買筆記(420px*380px)</option>  
                      <option value="9">當家教資訊報(510px*347px)</option>  
                      <option value="10">找老師資訊報(510px*347px)</option> 
                      <option value="11">家教好康報(510px*347px)</option><option value="12">推薦案件(330px*300px)</option>
                      <option value="13">最新案件(330px*300px)</option>
                      <option value="14">最新老師(330px*300px)</option> 
                    </select>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
                    <button id="button2id" name="button2id" class="btn bu" onclick="test()" type="button">上傳</button> 
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <?php 
                $pdo = DB_CONNECT();
                $sql = "SELECT * FROM picture";
                $rs =$pdo ->query($sql);
                foreach ($rs as $key => $row) {
                  ?>
                  <div class="col-lg-4 col-md-6 col-xs-6 col-sm-6">            
                      <div class="thumbnail" style="">
                        <div class="caption" style="vertical-align: center;">
                            <a href="<?php echo $row["paths"]?>" class="btn bu" target="_blank" rel="tooltip" title="Download">下載</a>
                            <a href="javascript:deletes(<?php echo $row["id"]?>)" class="btn bu" rel="tooltip" title="Delete">刪除</a></p>
                        </div>
                        <img src="<?php echo $row["paths"]?>" style="height: 150px" alt="">
                        <h4 style="text-align: center;">
                        <?php 
                        switch ($row["types"]) {
                          case 1:
                            echo "輪播";
                            break;
                          case 2:
                            echo "高學歷老師";
                            break;
                          case 3:
                            echo "金牌老師";
                            break;
                          case 4:
                            echo "人氣老師";
                            break;
                          case 5:
                            echo "依科目搜尋";
                            break;
                          case 6:
                            echo "依地區搜尋";
                            break;
                          case 7:
                            echo "最新案件";
                            break;
                          case 8:
                            echo "購買筆記";
                            break;
                          case 9:
                            echo "當家教資訊報";
                            break;
                          case 10:
                            echo "找老師資訊報";
                            break;
                          case 11:
                            echo "家教好康報";
                            break; 
                          case 12:
                            echo "推薦案件";
                            break; 
                          case 13:
                            echo "最新案件";
                            break;
                          case 14:
                            echo "最新老師";
                            break;       
                          default:
                            # code...
                            break;
                        }

                        ?>
                          
                        </h4>
                      </div>
                  </div>
                  <?php
                }
                ?>
               

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
$( document ).ready(function() { 
 $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
});
  <?php
    if(@$_GET["msg"]==1)
    {
  ?>
      alert("檔案類型錯誤，請選擇png/jpg/jpeg/gif檔上傳!");
  <?php
    }
  ?>

  <?php
    if(@$_GET["msg"]==2)
    {
  ?>
      alert("刪除失敗");
  <?php
    }
  ?>
function test() {
var types = $("#mytype").val();
var frm = document.forms["pictureForm"];
var input = document.getElementById("pic");

if(input.files){
  var f = input.files[0];
  var reader = new FileReader();
  reader.onload = function (e) {
      var data = e.target.result;
      var image = new Image();
      image.onload=function(){
          var width = image.width;
          var height = image.height;
           if(types == 2 || types == 3 || types == 4){
             if(width != 330 && height != 236 ){
               alert("請上傳330*236大小的圖片");
             }else{
               frm.submit();
             }
           }else if(types == 5){
            if(width != 420 && height != 378 ){
               alert("請上傳420*378大小的圖片");
             }else{
               frm.submit();
             }
           }else if(types == 6){
            if(width != 420 && height != 570 ){
               alert("請上傳420*570大小的圖片");
             }else{
               frm.submit();
             }
           }else if(types == 7){
            if(width != 600 && height != 450 ){
               alert("請上傳600*450大小的圖片");
             }else{
               frm.submit();
             }
           }else if(types == 8){
            if(width != 420 && height != 380 ){
               alert("請上傳420*380大小的圖片");
             }else{
               frm.submit();
             }
           }else if(types == 9 || types == 10 || types == 10){
            if(width != 510 && height != 347 ){
               alert("請上傳510*347大小的圖片");
             }else{
               frm.submit();
             }
           }
           else if(types == 1 ){
            if(width != 1913 && height != 500 ){
               alert("請上傳1913*500大小的圖片");
             }else{
               frm.submit();
             }
           }else if(types == 12 || types == 13 || types == 14){
            if(width != 330 && height != 300 ){
               alert("請上傳330*300大小的圖片");
             }else{
               frm.submit();
             }
           }
          // alert(width+'======'+height+"====="+f.size);
      };
      image.src= data;
  };
  reader.readAsDataURL(f);
  }else{
  // var image = new Image(); 
  // image.onload =function(){
  //     var width = image.width;
  //     var height = image.height;
  //     var fileSize = image.fileSize;
  //     alert(width+'======'+height+"====="+fileSize);
  // }
  // image.src = input.value;
  alert("欄位不可空白");
  }

}

function checkForm(){
     var frm = document.forms["pictureForm"];
     if (frm.pic.value == "") { 
       alert("欄位不可空白"); 
     } else { 
      frm.submit();
     
    } 
  }

function deletes($id){
    $.ajax({
         type: "POST",
         url: 'deletepicture.php',
         cache: false,
         data:'id='+$id,
         error: function(){
             alert('Ajax request 發生錯誤');
         },
          success: function(data){
              alert("刪除成功");
              location.href="picture.php";
            
         }
      });   
 }

</script>
