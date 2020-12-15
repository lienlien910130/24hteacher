<?php 
session_start();
include_once 'lib/core.php';
$pdo =DB_CONNECT();
$a = getProfiles();
$c = getCase();
$ot = getResumes();
$pic = getPicture();
$uid =@$_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="名師網是一個提供給想要找家教或者刊登家教資訊的人使用">

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
 <div class="overlay"></div>
    <div id="header">
      <?php include_once 'n1.php';?>
         <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin-bottom: 10px;padding-right: 0px;padding-left: 0px;margin-top: 40px;">
             <div class="row">
                <div class="owl-carousel1 owl-theme">
                <?php 
                  $sql = "SELECT * FROM picture WHERE types=1";
                  $rs =$pdo ->query($sql);
                  $x = 0;
                  foreach ($rs as $key => $row) {
                      ?>
                     <div class="item" style=""><img src="<?php echo $row["paths"]?>" class="img-responsive ii" style="width: 100%;"></div>
                      <?php
                    }
                      ?>
               </div>
            </div> 

        </div>
    </div>
    <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="co index_1">
          <div class="wid">
          <h2>  推薦給您的老師</h2>
              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                 <div class="" style="text-align: center"><a target="_blank" href="searchteacher.php?order=ml_man&sort=DESC"><img src="<?php echo htmlspecialchars($pic[2], ENT_QUOTES);?>" class="img-responsive" style="border-radius: 10px;"><h3 class="h_3">高學歷老師</h3></a></div>
              </div> 
              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                 <div class="" style="text-align: center">
                 <a target="_blank" href="searchteacher.php?order=exper&sort=DESC">
                 <img src="<?php echo htmlspecialchars($pic[3], ENT_QUOTES);?>" class="img-responsive" style="border-radius: 10px;">
                 <h3 class="h_3">金牌老師</h3>
                 </a>
                 </div>
              </div>
              <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                 <div class="" style="text-align: center"><a target="_blank" href="searchteacher.php?order=r_deal&sort=DESC"><img src="<?php echo htmlspecialchars($pic[4], ENT_QUOTES);?>" class="img-responsive" style="border-radius: 10px;"><h3 class="h_3">人氣老師</h3></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 g col-md-12 col-xs-12 col-sm-12">
          <div class="co index_2">
          <div class="wid">
              <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12 img-responsive" style="text-align: center">
                <img src="<?php echo htmlspecialchars($pic[5], ENT_QUOTES);?>" class="img-responsive" style="border-radius: 10px;margin: auto">
              </div>
              <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12" >
              <div class="panel">
                <div class="panel-heading" style="margin-top: 5px">
                    <h2 class="text-left"><img src="img/home_page_icon_b.png" class="img-responsive" style="float: left;">  依科目搜尋
                    <div class="pull-right" >
                       <ul class="nav panel-tabs">
                          <li class="c"><a href="#tab2" data-toggle="tab">找案件</a></li>
                          <li class="active t"><a href="#tab1" data-toggle="tab" >找老師</a></li>
                       </ul>
                    </div>
                    </h2>
                </div>
                <div class="panel-body" style="padding-top: 0px;">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                        <table class="table" style="text-align: center">
                            <?php 
                            $sql = "SELECT * FROM subjects";
                            $rs = $pdo ->query($sql);
                            $x=1;
                            foreach ($rs as $key => $row) {
                              $sql1 ="SELECT count(*) as n FROM resume_list WHERE rid = 1 AND val LIKE '%".$row["val"]."%' ";
                              $rs1 = $pdo ->query($sql1);
                              if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                   $coun = $row1["n"];
                                }
                              if($x%3==1){
                              ?>
                                <tr>
                              <?php
                              }
                              ?>
                              <td><a href="javascript:searchteachers(1,'<?php echo htmlspecialchars($row["val"], ENT_QUOTES);?>')" target="_blank"><?php echo
htmlspecialchars($row["val"], ENT_QUOTES).'&nbsp;'.htmlspecialchars($coun, ENT_QUOTES);
                               ?></a></td>
                              <?php
                              if ($x%3==0) {
                             ?>
                                </tr>
                                <?php
                              }
                                $x++;
                              }
                              
                            ?>
                        </table>
                        </div>
                        <div class="tab-pane" id="tab2">
                          <table class="table" style="text-align: center">
                            <?php 
                            $sql = "SELECT * FROM subjects";
                            $rs = $pdo ->query($sql);
                            $x=1;
                            foreach ($rs as $key => $row) {
                              $sql1 ="SELECT count(*) as n FROM case_list WHERE caid = 4 AND val LIKE '%".$row["val"]."%' ";
                              $rs1 = $pdo ->query($sql1);
                              if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                   $coun1 = $row1["n"];
                                }
                              if($x%3==1){
                              ?>
                                <tr>
                              <?php
                              }
                              ?>
                              <td><a href="javascript:searchcases(1,'<?php echo htmlspecialchars($row["val"], ENT_QUOTES);?>')" target="_blank"><?php echo htmlspecialchars($row["val"], ENT_QUOTES).'&nbsp;'.htmlspecialchars($coun1, ENT_QUOTES);?></a></td>
                              <?php
                              if ($x%3==0) {
                             ?>
                                </tr>
                                <?php
                              }
                                $x++;
                              }
                            ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
           <div class="co index_3">
           <div class="wid">
              <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12 img-responsive hidden-lg">
                <img src="<?php echo htmlspecialchars($pic[6], ENT_QUOTES);?>" class="img-responsive" style="">
              </div>
              <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12">
              <div class="panel">
                <div class="panel-heading" style="margin-top: 5px">
                    <h2 class="text-left"><img src="img/home_page_icon_c.png" class="img-responsive" style="float: left;">  依地區搜尋
                    <div class="pull-right" >
                     <ul class="nav panel-tabs">
                        <li class="c"><a href="#tab3" data-toggle="tab">找案件</a></li>
                        <li class="active t"><a href="#tab4" data-toggle="tab" >找老師</a></li>
                     </ul>
                    </div>
                    </h2>
                </div>
                <div class="panel-body" style="padding-top: 0px;">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab4">
                        <table class="table" style="text-align: center">
                           <?php 
                            $sql = "SELECT * FROM city";
                            $rs = $pdo ->query($sql);
                            $x=1;
                            foreach ($rs as $key => $row) {
                              $sql1 ="SELECT count(*) as n FROM resume_list WHERE rid = 2 AND val LIKE '%".$row["cityvalue"]."%' ";
                              $rs1 = $pdo ->query($sql1);
                              if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                   $coun2 = $row1["n"];
                              }
                              if($x%3==1){
                              ?>
                                <tr>
                              <?php
                              }
                              ?>
                              <td><a href="javascript:searchteachers(2,'<?php echo htmlspecialchars($row["cityvalue"], ENT_QUOTES);?>')" target="_blank"><?php echo htmlspecialchars($row["cityvalue"], ENT_QUOTES).'&nbsp;'.htmlspecialchars($coun2, ENT_QUOTES);?></a></td>
                              <?php
                              if ($x%3==0) {
                             ?>
                                </tr>
                                <?php
                              }
                                $x++;
                              }
                              
                            ?>
                        </table>
                        </div>
                        <div class="tab-pane" id="tab3">
                          <table class="table" style="text-align: center">
                            <?php 
                            $sql = "SELECT * FROM city";
                            $rs = $pdo ->query($sql);
                            $x=1;
                            foreach ($rs as $key => $row) {
                              $sql1 ="SELECT count(*) as n FROM case_list WHERE caid = 19 AND val LIKE '%".$row["cityvalue"]."%' ";
                              $rs1 = $pdo ->query($sql1);
                              if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                   $coun3 = $row1["n"];
                              }
                              if($x%3==1){
                              ?>
                                <tr>
                              <?php
                              }
                              ?>
                              <td><a href="javascript:searchcases(2,'<?php echo htmlspecialchars($row["cityvalue"], ENT_QUOTES);?>')" target="_blank"><?php echo htmlspecialchars($row["cityvalue"], ENT_QUOTES).'&nbsp;'.htmlspecialchars($coun3, ENT_QUOTES);?></a></td>
                              <?php
                              if ($x%3==0) {
                             ?>
                                </tr>
                                <?php
                              }
                                $x++;
                              }
                              
                            ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
             <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12 img-responsive hidden-xs hidden-md hidden-sm">
                <img src="<?php echo htmlspecialchars($pic[6], ENT_QUOTES);?>" class="img-responsive" style="">
              </div>
              </div>
          </div>
        </div>
        <div class="col-lg-12 g col-md-12 col-xs-12 col-sm-12">
           <div class="co index_4">
           <div class="wid">
              <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 img-responsive">
                <img src="<?php echo htmlspecialchars($pic[7], ENT_QUOTES);?>" class="img-responsive" style="">
              </div>
              <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12">
                <h2 class="text-left"><img src="img/home_page_icon_d.png" class="img-responsive" style="float: left;">  最新案件</h2>
                <div id="chang_tab">
                   <?php include_once 'in_table.php';?>
                </div>  
            </div>
          </div>
          </div>
        </div>
        <div class="col-lg-12 or col-md-12 col-xs-12 col-sm-12">
           <div class="co index_10">
           <div class="wid">
              <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12 img-responsive hidden-lg " >
                <img src="<?php echo htmlspecialchars($pic[8], ENT_QUOTES);?>" class="img-responsive" style="">
              </div>
              <div class="col-lg-7 col-md-12 col-xs-12 col-sm-12">
              <div class="panel">
                <div class="panel-heading" style="margin-top: 5px">
                    <h2 class="text-left"><img src="img/home_page_icon_e.png" class="img-responsive" style="float: left;">  購買筆記</h2>
                </div>
                <div class="panel-body" style="padding-top: 0px;">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab4">
                        <table class="table" style="text-align: center">
                           <?php 
                            $sql = "SELECT * FROM subjects";
                            $pdo = DB_CONNECT();
                            $rs = $pdo ->query($sql);
                            $x=1;
                            foreach ($rs as $key => $row) {
                              $sql1 ="SELECT count(*) as n FROM resume_list rl LEFT JOIN search_teacher st on rl.reid = st.resumeid WHERE rl.rid = 1 AND rl.val LIKE '%".$row["val"]."%' AND st.other LIKE '%3%' ";
                              $rs1 = $pdo ->query($sql1);
                              if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                   $countt = $row1["n"];
                                 }
                              if($x%3==1){
                              ?>
                                <tr>
                              <?php
                              }
                              ?>

                              <td><a href="javascript:searchbuy('<?php echo htmlspecialchars($row["val"], ENT_QUOTES);?>')" target="_blank"><?php echo htmlspecialchars($row["val"], ENT_QUOTES).'&nbsp;'.htmlspecialchars($countt, ENT_QUOTES);?></a></td>
                              <?php
                              if ($x%3==0) {
                             ?>
                                </tr>
                                <?php
                              }
                                $x++;
                              }
                              
                            ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
             <div class="col-lg-5 col-md-12 col-xs-12 col-sm-12 img-responsive hidden-xs hidden-md hidden-sm" >
                <img src="<?php echo htmlspecialchars($pic[8], ENT_QUOTES);?>" class="img-responsive" style="">
              </div>
              </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" >
           <div class="co index_5">
           <div class="wid">
            <h2>家長情報</h2>
             <div class="owl-carousel owl-theme" style="padding-top: 30px;">
                <?php 
                $sql = "SELECT * FROM parents ORDER BY addtime DESC LIMIT 0,21";
                $rs = $pdo ->query($sql);
                foreach ($rs as $key => $row) {
                  ?>
                 <div class="item" style="text-align: center"><a href="parentartic.php?id=<?php echo htmlspecialchars($row["id"], ENT_QUOTES);?>" target="_blank">
                 <img src="<?php echo htmlspecialchars($row["paths"], ENT_QUOTES);?>" style="border-radius: 10px;"/></a>
                 <h4 style="font-size: 21px"><?php echo htmlspecialchars($row["title"], ENT_QUOTES);?></h4>
                 <h5 style="font-size: 18px"><?php echo htmlspecialchars($row["description"], ENT_QUOTES);?></h5>
                 </div>
                  <?php
                }
                ?>
               </div>
               </div>
          </div>
        </div>
        <div class="col-lg-12 or col-md-12 col-xs-12 col-sm-12">
          <div class="ca index_6">
          <div class="wid">
            <div class="col-lg-6">
              <img src="<?php echo htmlspecialchars($pic[9], ENT_QUOTES);?>" class="img-responsive" style="">
            </div>
            <div class="col-lg-6">
              <h2>當家教資訊報</h2>
              <div class="col-lg-12" style="font-size: 21px;padding-top: 20px;padding-bottom: 20px">
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              </div>
              <button id="button3id" name="button3id" class="btn" type="button" onclick="window.open('newsletter.php');" style="width: 80%;bottom: 0px;border-radius: 10px;color: black;padding: 15px;">訂閱案件</button> 
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 g col-md-12 col-xs-12 col-sm-12">
          <div class="index_7">
          <div class="wid">
            <div class="col-lg-6 hidden-lg">
              <img src="<?php echo htmlspecialchars($pic[10], ENT_QUOTES);?>" class="img-responsive" style="">
            </div>
            <div class="col-lg-6" style="text-align: center;">
              <h2>找老師資訊報</h2>
              <div class="col-lg-12" style="font-size: 21px;padding-top: 20px;padding-bottom: 20px;color:black">
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              </div>
              <button id="button3id" name="button3id" class="btn bu" type="button" onclick="window.open('newsletter.php');" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;">訂閱老師</button> 
            </div>
            <div class="col-lg-6 hidden-xs hidden-md hidden-sm">
              <img src="<?php echo htmlspecialchars($pic[10], ENT_QUOTES);?>" class="img-responsive" style="">
            </div>
          </div>
          </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div class="co index_8">
          <div class="wid">
            <div class="col-lg-6">
              <img src="<?php echo htmlspecialchars($pic[11], ENT_QUOTES);?>" class="img-responsive" style="">
            </div>
            <div class="col-lg-6">
              <h2>家教好康報</h2>
              <div class="col-lg-12" style="font-size: 21px;padding-top: 20px;padding-bottom: 20px;color:black">
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              <p>開心收心拚成績，</p>
              <p>讓家長稱讚的好評老師大推薦！</p>
              </div>
              <button id="button3id" name="button3id" class="btn bu" type="button" onclick="window.open('newsletter.php');" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;">訂閱好康</button> 
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12 or col-md-12 col-xs-12 col-sm-12">
          <div class="ca index_9">
          <div class="wid">
            <h2>關於我們</h2>
            <div class="col-lg-12" style="font-size: 21px;padding-top: 20px;padding-bottom: 20px;color:white">
            <p>為什麼我們需要設計？當我們開始注重設計，生活會如何變好、眼界會如何變寬廣？</p>
            <p>因為有了想像力，人們可以創造未來，實現從前的不可能。</p>
            <p>這天下午，《PPAPER》與包益民輕鬆地談設計，</p>
            <p>如他所言，設計師必須體驗生活中的每一個細節，他與我們分享了設計如何在生活中落實，</p>
            <p>並且談到他喜歡的德國設計，以及對汽車產業的想法。</p>
            </div>
            <button id="button3id" name="button3id" class="btn bu" type="button" onclick="window.open('about.php?id=1');" style="bottom: 0px;border-radius: 10px;color: black;padding: 15px;">了解更多</button> 
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

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:false, 
    autoplayHoverPause: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
});
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
})


  <?php
    if(@$_GET["msg"]==1)
    {
  ?>
      alert("登入成功。");
  <?php
    }
  ?>

  <?php
    if(@$_GET["msg"]==2)
    {
  ?>
      alert("帳號或密碼錯誤!請重新輸入。");
  <?php
    }
  ?>

  <?php
    if(@$_GET["msg"]==3)
    {
  ?>
      alert("註冊成功");
  <?php
    }
  ?>

  <?php
    if(@$_GET["msg"]==4)
    {
  ?>
      alert("註冊失敗");
  <?php
    }
  ?>

   <?php
    if(@$_GET["msg"]==5)
    {
  ?>
      alert("請先登入!");
  <?php
    }
  ?>

   <?php
    if(@$_GET["msg"]==6)
    {
  ?>
      alert("沒有權限可以使用此功能!");
  <?php
    }
  ?>
  <?php
    if(@$_GET["msg"]==7)
    {
  ?>
      alert("該連結已過期!請重新申請找回密碼!");
  <?php
    }
  ?>
  <?php
    if(@$_GET["msg"]==8)
    {
  ?>
      alert("無效的連結");
  <?php
    }
  ?>
  <?php
    if(@$_GET["msg"]==9)
    {
  ?>
      alert("更改密碼成功，請重新登入!");
  <?php
    }
  ?>
	
	<?php
    if(@$_GET["msg"]==10)
    {
  ?>
      alert("該帳號已註冊過，請重新登入");
  <?php
    }
  ?>
  function addresume($id){
    if($id == 0){
       alert("請先登入");
       location.href="login.php";
    }
    else{
          location.href="resume.php";
      }
  }
  function addcase($id) {
    if($id == 0){
       alert("請先登入");
       location.href="login.php";
    }
    else{
         location.href="case.php";
      }
  }
  function addpay($id) {
    if($id == 0){
       alert("請先登入");
       location.href="login.php";
    }
    else{
        location.href="addpay.php"; 
      }
  }
  function cha($page) {
     $.get("in_table.php?page="+$page,function(data)
    {
        $("#chang_tab").html(data);
    });
  }
  function searchbuy($text) {
    location.href="searchteacher.php?other=3&text_teac_s="+$text; 
  }
  function returntost_2($order,$sort){
    location.href="searchteacher.php?order="+$order+"&sort="+$sort; 
  }
</script>