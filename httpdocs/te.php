<?php 
session_start();
include_once 'lib/core.php';
$pdo =DB_CONNECT();
$a = getProfiles();
$c = getCase();
$ot = getResumes();
$uid =@$_SESSION["id"];
// $sql = "SELECT count(*) as n FROM picture";
// $rs = $pdo ->query($sql);
// foreach ($rs as $key => $row) {
//   $n = $row["n"];
// }
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
    
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="indexstyle.css"> 
    <!-- <link rel="stylesheet" type="text/css" href="navbar_1.css"> -->
    <!-- Custom styles for this template -->
   
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .col-lg-3{
        padding-left: 0px;
        padding-right: 0px;
      }
    </style>
  </head>

  <body>
   
<!--   <div style="top:0px;position: fixed;width: 100%;height: 60px;">
  <div class="col-lg-2" style="background-color: red;height: 60px">45452212</div>
   <div class="col-lg-2" style="background-color: grey">
        <img src="img/3.png" style="width: 300px;height: 60px">
   </div>
    <div class="col-lg-6" style="background-color: red;height: 60px">45452212</div>  
    <div class="col-lg-2" style="background-color: grey;height: 60px">45452212</div>
  </div> -->
  
   
      
    <div class="container">
      <div class="header clearfix">
      <?php include_once 'navbar.php';?> 
            
      </div>
      <!-- <div class="col-lg-12" style="background-color: grey;height: 40px">
        
      </div> -->
      <div class="col-lg-3" style="padding-top: 30px;height: 500px">
           <div class="col-lg-12" style="border:2px solid  #20B2AA; border-radius: 10px;padding: 0 0 0 0;margin-top: 10px;height: 1140px";>
          <div class="col-lg-12" style="background-color:  #20B2AA;border-radius: 5px;">
           <h3>家長情報</h3>
          </div>
          <div class="col-lg-6" style="padding-top: 20px">
              <img src="img/i4.jpg" style="width: 100%;height: auto">
          </div>
          <div class="col-lg-6">
             <dl style="padding-top: 20px">
            <dt><a href="#">好評師資專區</a></dt>
            <dd>開學收心拼成績，家長稱讚的好評老師推薦！</dd>
          </dl>
          </div>

          <dl  style="padding-left: 20px">
            <dt><a href="#">私校請家教</a></dt>
            <dd>全台50所私校菁英學生指定師資推薦！</dd>
          </dl>
          <dl  style="padding-left: 20px">
            <dt><a href="#">高三總複習</a></dt>
            <dd>家教老師無私傳授，學測各科考前策略，掌握得分。</dd>
          </dl>
          <p  style="padding-left: 20px">推薦 <a href="#">成交金牌老師</a>
          <a href="#">優良評價</a></p>
          <p  style="padding-left: 20px">指定 <a href="#">專職家教</a>
          <a href="#">5年以上經驗</a></p>
           <p  style="padding-left: 20px">指定 <a href="#">專職家教</a>
          <a href="#">5年以上經驗</a></p>
          <p  style="padding-left: 20px">指定 <a href="#">專職家教</a>
          <a href="#">5年以上經驗</a></p>
         

         </div>
      </div>
      <div class="col-lg-9" style="padding-top: 30px">
         <div class="col-lg-12">
         <div class="col-lg-12" style="margin-bottom: 10px;">
            <div class="row">
                <div id="myCarousel" class="carousel  slide">
                <!-- Dot Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Items -->

                <div class="carousel-inner">
                 <!--  <div class="active item">  <img src="img/i1.jpg" class="img-responsive" style="width: 100%;height: 1000px"></div>
                  <div class="item">  <img src="img/i2.jpg" class="img-responsive" style="width: 100%;height: 1000px"></div>
                  <div class="item">  <img src="img/i3.jpg" class="img-responsive" style="width: 100%;height: 1000px"></div> -->
                  <?php 
                  $sql = "SELECT * FROM picture WHERE types=1";
                  $rs =$pdo ->query($sql);
                  $x = 0;
                  foreach ($rs as $key => $row) {
                     if($x == 0){
                      ?>
                      <div class="active item">  <img src="<?php echo $row["paths"]?>" class="img-responsive" style="width: 100%;height: 500px"></div>
                      <?php
                      $x++;
                    }else{
                      ?>
                      <div class="item">  <img src="<?php echo $row["paths"]?>" class="img-responsive" style="width: 100%;height: 500px"></div>
                      <?php
                      $x++;
                    }
                  }
                  ?>
                </div>
                <!-- Navigation -->
                 <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                </div>
            </div>
        </div>

      </div>
    
     
     
      <div class="col-lg-12">
            <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="text-center">依科目搜尋</h3>
                </div>
                <ul class="list-group list-group-flush text-center">
                 <?php 
                            $sql = "SELECT * FROM subjects";
                            $pdo = DB_CONNECT();
                            $rs = $pdo ->query($sql);
                            
                            foreach ($rs as $key => $row) {
                              $sql1 ="SELECT count(*) as n FROM resume_list WHERE rid = 1 AND val LIKE '%".$row["val"]."%' ";
                              $rs1 = $pdo ->query($sql1);
                              if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                   $coun = $row1["n"];
                                 }
                               ?>
                               <li class="list-group-item">
                                <a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a>
                              </li>
                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
                              <?php
                              }
                            ?>
                </ul>
            </div>
            </div>
            <div class="col-lg-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="text-center">依地區搜尋</h3>
                </div>
                <ul class="list-group list-group-flush text-center">
                 <?php 
                            $sql = "SELECT * FROM city Limit 14";
                            $pdo = DB_CONNECT();
                            $rs = $pdo ->query($sql);
                            foreach ($rs as $key => $row) {
                               $sql1 ="SELECT count(*) as n FROM resume_list WHERE rid = 2 AND val LIKE '%".$row["cityvalue"]."%' ";
                             $rs1 = $pdo ->query($sql1);
                              if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                   $coun2 = $row1["n"];
                              }
                               ?>
                               <?php 
                               if($row["id"] !=14){
                                ?>
                                <li class="list-group-item">
                                <a href="javascript:searchteachers('<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"]."(".$coun2.")"?></a>
                              </li>
                                <?php
                               }else{
                                ?>
                                <li class="list-group-item">
                                 <!-- <a href="javascript:searchteachers('<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"]."(".$coun2.")"?></a> --><i class="fa fa-chevron-down" aria-hidden="true"> More</i>
                                </li>
                                <?php
                               }
                               ?>
                               
                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
                              <?php
                              }
                            ?>
                </ul>
                <ul  class="list-group list-group-flush text-center drop">
                   <?php 
                            $sql = "SELECT * FROM city Limit 13,9";
                            $pdo = DB_CONNECT();
                            $rs = $pdo ->query($sql);
                            foreach ($rs as $key => $row) {
                               $sql1 ="SELECT count(*) as n FROM resume_list WHERE rid = 2 AND val LIKE '%".$row["cityvalue"]."%' ";
                             $rs1 = $pdo ->query($sql1);
                              if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                   $coun2 = $row1["n"];
                              }
                               ?>
                               <li class="list-group-item">
                                <a href="javascript:searchteachers('<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"]."(".$coun2.")"?></a>
                              </li>
                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
                              <?php
                              }
                            ?>
                </ul>
            </div>
            </div>
            <div class="col-lg-3" style="padding-right: 15px">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="text-center">最新案件</h3>
                </div>
                <ul class="list-group list-group-flush text-center">
               <!--   <?php 
                             $sql = "SELECT * FROM resume ORDER BY addtime DESC LIMIT 5";
                              $rs = $pdo -> query($sql);
                            foreach ($rs as $key => $row) {
                               ?>
                               <li class="list-group-item">
                                <a href="seteacher.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a>
                              </li>
                              <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> 
                              <?php
                              }
                            ?> -->
                             <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">最新案件</a>
                              </li>
                </ul>
            </div>
            </div>
             <div class="col-lg-3" style="border:2px solid  #20B2AA; border-radius: 10px;padding: 0 0 0 0;margin-top: 10px;height: 635px";>
          <div class="col-lg-12" style="background-color:  #20B2AA;border-radius: 5px;">
           <h3>訂報中心</h3>
          </div>
          <div class="col-lg-6" style="padding-top: 20px">
              <img src="img/i5.jpg" style="width: 100%;height: auto">
          </div>
          <div class="col-lg-6">
             <dl style="padding-top: 20px">
            <dt><a href="#">好評師資專區</a></dt>
            <dd>開學收心拼成績，家長稱讚的好評老師推薦！</dd>
          </dl>
          </div  class="col-lg-6">
          <dl  style="padding-left: 20px">
            <dt><a href="#">私校請家教</a></dt>
            <dd>全台50所私校菁英學生指定師資推薦！</dd>
          </dl>
          <dl  style="padding-left: 20px">
            <dt><a href="#">高三總複習</a></dt>
            <dd>家教老師無私傳授，學測各科考前策略，掌握得分。</dd>
          </dl>
          <p  style="padding-left: 20px">推薦 <a href="#">成交金牌老師</a>
          <a href="#">優良評價</a></p>
          <p  style="padding-left: 20px">指定 <a href="#">專職家教</a>
          <a href="#">5年以上經驗</a></p>
         </div>


          </div>
         



      </div>
 
      

    </div> <!-- /container -->

<!-- <footer class="footer col-lg-12" style="text-align: center">
        <?php include_once 'footer.php'; ?>
      </footer> -->
      <?php include_once't1.php';?>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>

<script type="text/javascript">
 $(document).ready(function() {
    $('.carousel').carousel({interval: 2000});
  });

$(document).ready(function(){
     var panels = $('.drop');
     panels.hide();

     $(".fa").click(function(){

      panels.toggle("slow",function(){

         if ( panels.css('display') != 'none' ){
             $(".fa").removeClass("fa-chevron-down");
            $(".fa").addClass("fa-chevron-up");
            

          }else{
             
              $(".fa").removeClass("fa-chevron-up");
              $(".fa").addClass("fa-chevron-down");
           }

      });

     

     });
});

//    $(document).ready(function() {
//     var panels = $('.drop');
//     var panelsButton = $('.fa-chevron-down');
//     panels.hide();

//     //Click dropdown
//     panelsButton.click(function() {
//         //get data-for attribute
//         // var dataFor = $(this).attr('data-for');
//         // var idFor = $(dataFor);
//         panels.show("slow");

//         //toggle 像電燈般開闔物件
//         $(this).removeClass("fa-chevron-down");
//         $(this).addClass("fa-chevron-up");
//         var panelsbutton = $('.fa-chevron-up');
//          panelsbutton.click(function() {

//           if ( $(this).css('display') == 'hide' ){
//             panels.show();
//          }else{
//             panels.hide();
//             $(this).removeClass("fa-chevron-up");
//             $(this).addClass("fa-chevron-down");
//          }

//          });
       
//         // //current button
//         // var currentButton = $(this);
//         // idFor.slideToggle(400, function() {
//         //     //Completed slidetoggle
//         //     if(idFor.is(':visible'))
//         //     {
//         //         currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
//         //     }
//         //     else
//         //     {
//         //         currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
//         //     }
//         // })
//     });
// });

  <?php
    if(@$_GET["msg"]==1)
    {
  ?>
      alert("登入成功");
  <?php
    }
  ?>

  <?php
    if(@$_GET["msg"]==2)
    {
  ?>
      alert("登入失敗");
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
  function searchcase() {
    var text = $("#searchtext").val();
    location.href="searchcase.php?text="+text;
  }

  function searchteacher(){
    var text = $("#searchtext").val();
    location.href="searchteacher.php?text="+text;
  }
   function searchcases($text) {
    location.href="searchcase.php?text="+$text;
  }

  function searchteachers($text){
    location.href="searchteacher.php?text="+$text;
  }

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
</script>