<?php 
@session_start();
include_once 'lib/core.php';

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

    <title>訂報中心</title>

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
                     <div class="item" style="margin-top: 40px;"><img src="<?php echo htmlspecialchars($row["paths"], ENT_QUOTES);?>" class="img-responsive ii" style="width: 100%;"></div>
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
          <div class="col-lg-12" style="text-align: center;">
              <h3 style="color: rgb(239,67,0);font-weight: bold;">訂閱中心</h3>
          </div>
          <div class="col-lg-12" style="text-align: center;color: rgb(160,160,160);padding-bottom: 10px;">
              <h4>你想搶先得知最新的案件機會或師資情報嗎?不限會員，歡迎免費訂閱!</h4>
          </div>
        </div>  
        <div class="row">
        <div class="col-lg-12 or col-md-12 col-xs-12 col-sm-12">
          <div class="ca index_6">
          <div class="wid">
            <div class="col-lg-6">
              <img src="img/i8.jpg" class="img-responsive" style="width: 640px;height: 362px">
            </div>
            <div class="col-lg-6">
              <h2>當家教資訊報</h2>
              <div class="col-lg-12" style="font-size: 21px;padding-top: 20px;padding-bottom: 20px">
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              </div>
              <button id="button3id" name="button3id" class="btn" type="button" onclick="" style="width: 80%;bottom: 0px;border-radius: 10px;color: black;padding: 15px;" data-toggle="modal" data-target="#myOne">訂閱案件</button> 
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 g col-md-12 col-xs-12 col-sm-12">
          <div class="index_7">
          <div class="wid">
            <div class="col-lg-6 hidden-lg">
              <img src="img/i8.jpg" class="img-responsive" style="width: 640px;height: 362px">
            </div>
            <div class="col-lg-6" style="text-align: center;">
              <h2>找老師資訊報</h2>
              <div class="col-lg-12" style="font-size: 21px;padding-top: 20px;padding-bottom: 20px;color:black">
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              </div>
              <button id="button3id" name="button3id" class="btn bu" type="button" onclick="" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;" data-toggle="modal" data-target="#myTwo">訂閱老師</button> 
            </div>
            <div class="col-lg-6 hidden-xs hidden-md hidden-sm">
              <img src="img/i8.jpg" class="img-responsive" style="width: 640px;height: 362px">
            </div>
          </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="co index_8">
          <div class="wid">
            <div class="col-lg-6">
              <img src="img/i9.jpg" class="img-responsive" style="width: 640px;height: 362px">
            </div>
            <div class="col-lg-6">
              <h2>家教好康報</h2>
              <div class="col-lg-12" style="font-size: 21px;padding-top: 20px;padding-bottom: 20px;color:black">
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              </div>
              <button id="button3id" name="button3id" class="btn bu" type="button" onclick="" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;" data-toggle="modal" data-target="#myThree">訂閱好康</button> 
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 g col-md-12 col-xs-12 col-sm-12">
          <div class="send">
          <div class="wid">
            <div class="col-lg-12 top">
              <h4 style="color: rgb(160,160,160);">舊訂戶如欲修改訂閱條件或取消電子報，請輸入您之前在訂閱時所填寫的email及密碼</h4>
            </div>
            <div class="col-lg-12 sen">
              <div class="col-lg-7">
                <input id="account_c" name="account_c" type="text"  class="form-control input-md" placeholder="帳號：為您收件的Email" size="35">
              </div>
              <div class="col-lg-5">
                <input id="password_c" name="password_c" type="password"  class="form-control input-md" placeholder="密碼" size="12">
              </div>
            </div>
            <div class="col-lg-12 thr">
              <button id="button3id" name="button3id" class="btn bu" type="button" onclick="cancelnews()" style="bottom: 0px;border-radius: 10px;color: white;">送出</button> 
            </div>
          </div>
          </div>
        </div>
       
        <div class="modal fade" id="myOne" style="top:100px;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="" >
                      <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                    </button>
                    <h3 style="color: black;">訂閱案件</h3>
              </div>
              <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 one_body">
                  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="padding-bottom: 10px;">
                    <div class="col-lg-2 col-md-3 col-xs-3 col-sm-3" style="text-align: right;"><h4>帳號</h4></div>
                    <div class="col-lg-10 col-md-9 col-xs-9 col-sm-9" style="text-align: left;">
                      <input id="account_1" name="account_1" type="text"  class="form-control input-md" placeholder="帳號：為您收件的Email" size="35">
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="col-lg-2 col-md-3 col-xs-3 col-sm-3" style="text-align: right;"><h4>密碼</h4></div>
                    <div class="col-lg-10 col-md-9 col-xs-9 col-sm-9" style="text-align: left;">
                      <input id="password_1" name="password_1" type="password"  class="form-control input-md" placeholder="密碼：長度為8~12的數字" size="12">
                    </div>
                  </div>
                  <div class="col-lg-12 one_footer col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
                <button id="button3id" name="button3id" class="btn bu" type="button" onclick="addnews_one()" style="border-radius: 10px;">送出</button>
                <button id="button3id" name="button3id" class="btn bu a" type="button" data-dismiss="modal" style="border-radius: 10px;margin-left: 10px;margin-bottom: 20px;">取消</button>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="myTwo" style="top:100px;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="" >
                      <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                    </button>
                    <h3 style="color: black;">訂閱老師</h3>
              </div>
              <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 one_body">
                  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="padding-bottom: 10px;">
                    <div class="col-lg-2 col-md-3 col-xs-3 col-sm-3" style="text-align: right;"><h4>帳號</h4></div>
                    <div class="col-lg-10 col-md-9 col-xs-9 col-sm-9" style="text-align: left;">
                      <input id="account_2" name="account_2" type="text"  class="form-control input-md" placeholder="帳號：為您收件的Email" size="35">
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="col-lg-2 col-md-3 col-xs-3 col-sm-3" style="text-align: right;"><h4>密碼</h4></div>
                    <div class="col-lg-10 col-md-9 col-xs-9 col-sm-9" style="text-align: left;">
                      <input id="password_2" name="password_2" type="password"  class="form-control input-md" placeholder="密碼：長度為8~12的數字" size="12">
                    </div>
                  </div>
                  <div class="col-lg-12 one_footer col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
                <button id="button3id" name="button3id" class="btn bu" type="button" onclick="addnews_two()" style="border-radius: 10px;">送出</button>
                <button id="button3id" name="button3id" class="btn bu a" type="button" data-dismiss="modal" style="border-radius: 10px;margin-left: 10px;margin-bottom: 20px;">取消</button>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="myThree" style="top:100px;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="" >
                      <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                    </button>
                    <h3 style="color: black;">訂閱好康</h3>
              </div>
              <div class="modal-body">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 one_body">
                  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="padding-bottom: 10px;">
                    <div class="col-lg-2 col-md-3 col-xs-3 col-sm-3" style="text-align: right;"><h4>帳號</h4></div>
                    <div class="col-lg-10 col-md-9 col-xs-9 col-sm-9" style="text-align: left;">
                      <input id="account_3" name="account_3" type="text"  class="form-control input-md" placeholder="帳號：為您收件的Email" size="35">
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="col-lg-2 col-md-3 col-xs-3 col-sm-3" style="text-align: right;"><h4>密碼</h4></div>
                    <div class="col-lg-10 col-md-9 col-xs-9 col-sm-9" style="text-align: left;">
                      <input id="password_3" name="password_3" type="password"  class="form-control input-md" placeholder="密碼：長度為8~12的數字" size="12">
                    </div>
                  </div>
                  <div class="col-lg-12 one_footer col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
                <button id="button3id" name="button3id" class="btn bu" type="button" onclick="addnews_three()" style="border-radius: 10px;">送出</button>
                <button id="button3id" name="button3id" class="btn bu a" type="button" data-dismiss="modal" style="border-radius: 10px;margin-left: 10px;margin-bottom: 20px;">取消</button>
              </div>
                </div>
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
function cancelnews() {
  var account  =$("#account_c").val(); 
  var password  =$("#password_c").val(); 
  re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i;
  if(!account.match(/^[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*@[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*\.+[a-zA-Z]+$/)){
    alert("請輸入正確的信箱");
   }
  else if(password.length <8 || password.length >12){
    alert("密碼長度錯誤"); 
  }
  else if(re.test(account.toLowerCase())){
    alert("欄位不可輸入無效字元"); 
   }else if(re.test(password.toLowerCase())){
      alert("欄位不可輸入無效字元"); 
   }
  else{
    $.ajax({
            type:'POST',
            url :'deletenewsletter.php',
            data:"account="+account+"&password="+password,
            dataType:'json', 
            success : function(data,textStatus, jqXHR){
              if(data.status == "1"){
               alert("感謝您這段期間的訂閱!歡迎您隨時再訂閱!謝謝。");
               location.href="newsletter.php";
               die();
             }else{
               alert("查無此訂閱者!請重新輸入帳號密碼。");
               location.href="newsletter.php";
               die();
             }
            }
       });
  }
}
function addnews_one() {
  var account  =$("#account_1").val(); 
  var password  =$("#password_1").val();
  re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i; 
  if(!account.match(/^[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*@[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*\.+[a-zA-Z]+$/)){
    alert("請輸入正確的信箱");
  }else if(password.length <8 || password.length >12){
    alert("密碼長度錯誤"); 
  }else if(re.test(account)){
    alert("欄位不可輸入無效字元"); 
   }else if(re.test(password)){
      alert("欄位不可輸入無效字元"); 
   }else{
    $.ajax({
            type:'POST',
            url :'addnewsletter.php',
            data:"account="+account+"&password="+password+"&type=1",
            dataType:'json', 
            success : function(data,textStatus, jqXHR){
              if(data.status == "1"){
               alert("感謝您的訂閱!如有最新消息將會寄信給您。");
               location.href="newsletter.php";
               die();
              }
              else{
               alert("帳號或密碼錯誤!請重新輸入。");
               location.href="newsletter.php";
               die();
             }
            }
       });
  }
}

function addnews_two() {
  var account  =$("#account_2").val(); 
  var password  =$("#password_2").val(); 
  re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i;
  if(!account.match(/^[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*@[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*\.+[a-zA-Z]+$/)){
    alert("請輸入正確的信箱");
  }else if(password.length <8 || password.length >12){
    alert("密碼長度錯誤"); 
  }else if(re.test(account)){
    alert("欄位不可輸入無效字元"); 
   }else if(re.test(password)){
      alert("欄位不可輸入無效字元"); 
   }else{
    $.ajax({
            type:'POST',
            url :'addnewsletter.php',
            data:"account="+account+"&password="+password+"&type=2",
            dataType:'json', 
            success : function(data,textStatus, jqXHR){
              if(data.status == "1"){
               alert("感謝您的訂閱!如有最新消息將會寄信給您。");
               location.href="newsletter.php";
               die();
              }else{
               alert("帳號或密碼錯誤!請重新輸入。");
               location.href="newsletter.php";
               die();
             }
            }
       });
  }
}
function addnews_three() {
  var account  =$("#account_3").val(); 
  var password  =$("#password_3").val(); 
  re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i;
  if(!account.match(/^[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*@[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*\.+[a-zA-Z]+$/)){
    alert("請輸入正確的信箱");
  }else if(password.length <8 || password.length >12){
    alert("密碼長度錯誤"); 
  }else if(re.test(account)){
    alert("欄位不可輸入無效字元"); 
   }else if(re.test(password)){
      alert("欄位不可輸入無效字元"); 
   }else{
    $.ajax({
            type:'POST',
            url :'addnewsletter.php',
            data:"account="+account+"&password="+password+"&type=3",
            dataType:'json', 
            success : function(data,textStatus, jqXHR){
              if(data.status == "1"){
               alert("感謝您的訂閱!如有最新消息將會寄信給您。");
               location.href="newsletter.php";
               die();
              }else{
               alert("帳號或密碼錯誤!請重新輸入。");
               location.href="newsletter.php";
               die();
             }
            }
       });
  }
}
</script>