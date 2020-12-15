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

    <title>意見反應</title>

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
 <style type="text/css">  
         .code  
        {  
             background:lightblue; 
             color:red;  
             border:0;  
             padding:2px 10px;  
             letter-spacing:3px;  
             font-weight:bolder;  
        }  
         .unchanged  
        {  
             background:lightblue; 
             color:red;  
             border:0;  
             padding:2px 10px;  
             letter-spacing:3px;  
             font-weight:bolder;   
        }  
    </style>  
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
            <form method="POST" action="addreactionProc.php" accept-charset="UTF-8" id="reactionForm">
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="text-align: center;">
                 <h3 style="color: rgb(239,67,0);font-weight: bold;">意見反應</h3>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="text-align: center;color: rgb(160,160,160);padding-bottom: 10px;">
                 <h4>您好，若您對家教網有任何的建議意見，請在此流言，我們將盡快為您處理。謝謝!</h4>
              </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
              <div class="col-lg-12 bo col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-6 pl col-sm-6 col-xs-6 col-md-6"><h5>身份</h5></div>
                <div class="col-lg-6 pr col-sm-6 col-xs-6 col-md-6"><h5>反應類別</h5></div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-6 pl col-sm-6 col-xs-6 col-md-6 pr768">
                <select name="myIdentity" class="form-control">
                 <option value="0">選擇身分</option>
                 <option value="1">老師</option>
                 <option value="2">家長</option>
                </select>
                </div>
                <div class="col-lg-6 pr col-sm-6 col-xs-6 col-md-6">
                <select name="myReaction" class="form-control">
                 <option value="0">選擇類別</option>
                 <option value="1">費用相關</option>
                 <option value="2">成交回報</option>
                 <option value="3">功能操作問題</option>
                 <option value="4">案件刊登</option>
                 <option value="5">履歷刊登</option>
                 <option value="6">接案權益</option>
                 <option value="7">訂閱問題</option>
                 <option value="8">下載檔案問題</option>
                 <option value="9">其他</option>
                </select>  
                </div>
              </div>
            </div>
            <div class="col-lg-12 pt col-sm-12 col-xs-12 col-md-12">
              <div class="col-lg-12"><h5>反應內容：限制500字以內</h5></div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <textarea class="form-control input-md" id="texts" name="texts" cols="20" rows="10" size="500" maxlength="500"></textarea>
              </div>
            </div>
           
            <div class="col-lg-12 pt30 col-sm-12 col-xs-12 col-md-12">
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="text-align: center;">
                 <h3 style="color: rgb(239,67,0);font-weight: bold;">聯絡方式</h3>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="text-align: center;color: rgb(160,160,160);padding-bottom: 10px;">
                 <h4>您好，請務必留下正確聯絡資訊，我們將盡速與您聯繫，謝謝!</h4>
              </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
              <div class="col-lg-12 bo col-sm-12 col-xs-12 col-md-12" >
                <div class="col-lg-6 pl col-sm-6 col-xs-6 col-md-6"><h5>留言者</h5></div>
                <div class="col-lg-6 pr col-sm-6 col-xs-6 col-md-6"><h5>聯絡電話</h5></div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-6 pl col-sm-6 col-xs-6 col-md-6 pr768">
                <input id="myname" name="myname" type="text"  class="form-control input-md" placeholder="" size="10" maxlength="10">
                </div>
                <div class="col-lg-6 pr col-sm-6 col-xs-6 col-md-6">
                <input id="myphone" name="myphone" type="text"  class="form-control input-md" placeholder="" size="15" maxlength="15"> 
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-12 pt hidden-xs hidden-sm hidden-md ">
              <div class="col-lg-12 bo col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-6 pl col-sm-12 col-xs-12 col-md-12"><h5>email</h5></div>
                <div class="col-lg-6 pr col-sm-12 col-xs-12 col-md-12"><h5>驗證碼</h5></div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-6 pl col-sm-12 col-xs-12 col-md-12">
                <input id="myemail" name="myemail" type="text"  class="form-control input-md" placeholder=""> 
                </div>
                <div class="col-lg-6 pr col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-10 pl pr col-sm-10 col-xs-10 col-md-10">
                <input id="ckcode" name="ckcode" type="text"  class="form-control input-md" placeholder=""> 
                </div>
                <div class="col-lg-2 pr col-sm-2 col-xs-2 col-md-2" style="text-align: center;">
                <input type="text" readonly  id="checkCode" name="checkCode" class="unchanged" style="width: 100%;height: 30px"  />  
                </div>
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                  <a href="javascript:createCode()"><span class="pull-right" style="">重新整理</span></a>
                </div>
                </div>
              </div>
            </div> -->
            
            <div class="col-lg-12  col-sm-12 col-xs-12 col-md-12">
              <div class="col-lg-6 pl  col-sm-12 col-xs-12 col-md-12 pr768">
                <div class="col-lg-12 pl bo pr col-sm-12 col-xs-12 col-md-12"><h5>email</h5></div>
                <div class="col-lg-12 pl col-sm-12 col-xs-12 col-md-12 ">
                <input id="myemail" name="myemail" type="text"  class="form-control input-md" placeholder="" size="35" maxlength="35"> 
                </div>
              </div>
              <div class="col-lg-6 pr   col-sm-12 col-xs-12 col-md-12 pl768">
                <div class="col-lg-12 pr pl bo col-sm-12 col-xs-12 col-md-12 "><h5>驗證碼</h5></div>
                <div class="col-lg-12 pr pl col-sm-12 col-xs-12 col-md-12 ">
                <div class="col-lg-10 pl pr col-sm-8 col-xs-8 col-md-8">
                <input id="ckcode" name="ckcode" type="text"  class="form-control input-md" placeholder="" size="4" maxlength="4"> 
                </div>
                <div class="col-lg-2 pr col-sm-4 col-xs-4 col-md-4" style="text-align: center;">
                <div id="codes">
                <?php include_once 'authpage.php';?>
                <!-- <input type="text" readonly  id="checkCode" name="checkCode" class="unchanged" style="width: 100%;height: 30px"  />   -->
                </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                  <a href="javascript:changecode()"><span class="pull-right" style="">重新整理</span></a>
                </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 pt col-sm-12 col-xs-12 col-md-12" style="text-align: center;">
              <button id="button3id" name="button3id" class="btn bu" type="button" onclick="checkreactionfrm()" style="border-radius: 10px;margin-right: 8px;">送出</button> 
              <button id="button3id" name="button3id" class="btn bu" type="button" onclick="cancel()" style="border-radius: 10px;margin-left: 8px;">取消，回首頁</button> 
            </div>
            </form>
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
</script>
<script language="javascript" type="text/javascript">  
<?php
    if(@$_GET["msg"]==1)
    {
  ?>
      alert("感謝您的意見反應，我們將盡快與您聯繫，謝謝!");
  <?php
    }
  ?>
  // $(document).ready(function (){
  //    var code ; //在全局 定义验证码  
  //    // createCode();
  //   });
  //   function createCode()  
  //   {  
  //       code = "";  
  //       var codeLength = 4;//验证码的长度  
  //       var checkCode = document.getElementById("checkCode");  
  //       var selectChar =new Array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','你','Q','R','S','T','U','V','W','X','Y','Z');  
  //       for(var i=0;i<codeLength;i++)  
  //       {  
  //         var charIndex = Math.floor(Math.random()*36);  
  //         code +=selectChar[charIndex];  
  //       }  
  //       if(checkCode)  
  //       {  
  //         checkCode.className="code";  
  //         checkCode.value = code;  
  //       }  
  //   } 
    function changecode() {
        $.get("authpage.php",function(data)
        {
          $("#codes").html(data);
        });
     } 
    function checkreactionfrm() {
        var frm = document.forms["reactionForm"];
        var rule3=/^09\d{2}\d{6}$/;
        re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i;
        if(frm.myIdentity.value == 0 || frm.myReaction.value==0||
          frm.texts.value == "" || frm.myname.value==""||
          frm.myphone.value==""||frm.myemail.value==""||
          frm.ckcode.value==""){
          alert("欄位不可空白");
        }else if(frm.ckcode.value != frm.authnum.value){
          alert("驗證碼錯誤!請重新輸入");
          changecode();
        }else if(!rule3.test(frm.myphone.value)){
          alert("手機號碼格式輸入錯誤!請重新輸入");
        }else if(!frm.myemail.value.match(/^[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*@[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*\.+[a-zA-Z]+$/)){
          alert("信箱輸入錯誤!請重新輸入");
        }else if(frm.texts.value.length>500){
          alert("反應內容超過500字!請重新輸入");
        }else if(re.test(frm.texts.value.toLowerCase()) || re.test(frm.myname.value.toLowerCase())  || re.test(frm.myphone.value.toLowerCase())  || re.test(frm.myemail.value.toLowerCase()) || re.test(frm.ckcode.value.toLowerCase()) ){
          alert("欄位不可輸入無效字元");
        }
        else{
          frm.submit();
        }
        
    }
    function cancel() {
      location.href="index.php";
    }
</script>  

    