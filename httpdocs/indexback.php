<?php 
session_start();
include_once 'lib/core.php';
$a = getProfiles();
$c = getCase();
$ot = getResumes();
$uid =@$_SESSION["id"];
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
       <?php include_once 'n.php';?>
   
      <div class="col-lg-12" style="margin-bottom: 10px;margin-top: 0px">
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
                  <div class="active item">  <img src="//placehold.it/1300x500" class="img-responsive"></div>
                  <div class="item">  <img src="//placehold.it/1300x500" class="img-responsive"></div>
                  <div class="item">  <img src="//placehold.it/1300x500" class="img-responsive"></div>
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
    <div class="container">
      <div class="header clearfix">
    <!--    
      <?php include_once 'navbar.php';?> 
            -->
      </div>
      <!-- <div class="col-lg-12" style="background-color: grey;height: 40px">
        
      </div> -->
      
      <div class="row marketing">
       
        <div class="col-lg-3" style="">
        <!--  <div class="col-lg-12" style="border:2px solid #e5e5e5;">
          <img src="img/book.png" style="height: 100px;width: 100%" class="">
         </div> -->
          
         <div class="col-lg-12" style="border:2px solid  #20B2AA; border-radius: 10px;padding: 0 0 0 0";>
          <div class="col-lg-12" style="background-color:  #20B2AA;border-radius: 5px;">
           <h3>家長情報</h3>
          </div>
          <div class="col-lg-6" style="padding-top: 20px">
              <img src="img/4.jpg" style="width: 100%;height: auto">
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

<!-- 
         <div class="col-lg-12" style="border:2px solid  #20B2AA; border-radius: 10px;padding: 0 0 0 0;margin-top: 10px";>
          <div class="col-lg-12" style="background-color:  #20B2AA;border-radius: 5px;">
           <h3>會員中心</h3>
          </div>
          <br><br><br>
          <div class="col-lg-12" style="text-align: center;padding:20px 0 5px 0;font-size: 20px">
            <button style="height: 40px;border-radius: 10px"  onclick="addresume(<?php  if (empty($_SESSION["id"])) { echo 0; }else {echo $uid;} ?>)">填寫履歷</button>
          </div>
           <div class="col-lg-12" style="text-align: center;padding:5px 0 5px 0;font-size: 20px">
            <button style="height: 40px;border-radius: 10px"  onclick="addcase(<?php  if (empty($_SESSION["id"])) { echo 0; }else {echo $uid;} ?>)">刊登案件</button>
          </div>
           <div class="col-lg-12" style="text-align: center;padding:5px 0 20px 0;font-size: 20px">
           <button style="height: 40px;border-radius: 10px"  onclick="addpay(<?php  if (empty($_SESSION["id"])) { echo 0; }else {echo $uid;} ?>)">我要付費</button>
          </div>
         
         
         </div> -->

        </div>

        <div class="col-lg-9">
          <div class="col-lg-12" style="border:2px solid #F4A460;">
            <div id="custom-search-input" class="row">
                <h3><i class="fa fa-search" aria-hidden="true"></i>快速搜尋</h3>
                <div class="input-group col-lg-12" style="padding-bottom: 15px">
                <div class="col-lg-7">
                   <input type="text" class="search-query form-control" placeholder="請輸入關鍵字" style="height: 40px;width: 100%" id="searchtext"/>
                </div>
                <div class="col-lg-5" style="font-size:18px">
                  <button class="tex" style="height: 40px;border-radius: 10px"  onclick="searchcase()">找案件</button>
                  <button class="tex" style="height: 40px;border-radius: 10px" onclick="searchteacher()">找老師</button>
                </div>
                 
                </div>
             </div>
          </div>
          

          <!-- <div class="col-lg-12" style="border:2px solid #e5e5e5; margin: 10px 0px 10px 0px;padding: 0;">
              <img src="img/5.jpg" style="width:100%;height: auto;">
          </div> -->
          <div class="col-lg-12">
            
          <div class="col-lg-4" style=" margin: 20px 0px 10px 0px;padding-bottom: 10px">
              <div class="panel" style="border:2px solid #F4A460;">
                
                <div class="panel-heading" style="margin-top: 5px">
                    <h3 class="panel-title" style="border-bottom:3px solid #e5e5e5;"><i class="fa fa-search" aria-hidden="true"></i>依科目搜尋</h3>
                    <span class="pull-right">
                        <ul class="nav panel-tabs" style="background: #20B2AA;height: 40px;border-radius: 30px">
                            <li><a href="#tab1" data-toggle="tab">找老師</a></li>
                            <li><a href="#tab2" data-toggle="tab">找案件</a></li>
                        </ul>
                    </span>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                        <table class="table" style="text-align: center">
                            <?php 
                            $sql = "SELECT * FROM subjects";
                            $pdo = DB_CONNECT();
                            $rs = $pdo ->query($sql);
                            $x=1;
                            foreach ($rs as $key => $row) {
                              $sql1 ="SELECT count(*) as n FROM resume_list WHERE rid = 1 AND val LIKE '%".$row["val"]."%' ";
                              $rs1 = $pdo ->query($sql1);
                              if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                   $coun = $row1["n"];
                                 }
                              if($x%4==1){
                              ?>
                                <tr>
                              <?php
                              }
                              ?>
                              <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td>
                              <?php
                              if ($x%4==0) {
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
                              if($x%4==1){
                              ?>
                                <tr>
                              <?php
                              }
                              ?>
                              <td><a href="javascript:searchcases('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun1.")"?></a></td>
                              <?php
                              if ($x%4==0) {
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

          <div class="col-lg-4" style="padding-bottom: 10px; margin: 20px 0px 0px 0px;">
              <div class="panel" style="border:2px solid #F4A460;">
                <div class="panel-heading" style="margin-top: 5px">
                    <h3 class="panel-title" style="border-bottom:3px solid #e5e5e5;"><i class="fa fa-search" aria-hidden="true"></i>依地區搜尋</h3>
                    <span class="pull-right">
                        <ul class="nav panel-tabs" style="background: #20B2AA;height: 40px;border-radius: 30px">
                            <li><a href="#tab4" data-toggle="tab">找老師</a></li>
                            <li><a href="#tab5" data-toggle="tab">找案件</a></li>
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
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
                              if($x%4==1){
                              ?>
                                <tr>
                              <?php
                              }
                              ?>
                              <td><a href="javascript:searchteachers('<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"]."(".$coun2.")"?></a></td>
                              <?php
                              if ($x%4==0) {
                             ?>
                                </tr>
                                <?php
                              }
                                $x++;
                              }
                              
                            ?>
                        </table></div>
                        <div class="tab-pane" id="tab5"><table class="table" style="text-align: center">
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
                              if($x%4==1){
                              ?>
                                <tr>
                              <?php
                              }
                              ?>
                              <td><a href="javascript:searchcases('<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"]."(".$coun3.")"?></a></td>
                              <?php
                              if ($x%4==0) {
                             ?>
                                </tr>
                                <?php
                              }
                                $x++;
                              }
                              
                            ?>
                        </table></div>
                    </div>
                </div>
            </div>
          </div>

           <div class="col-lg-4" style=" margin: 20px 0px 0px 0px;padding-bottom: 10px">
              <div class="panel" style="border:2px solid #F4A460;">
                <div class="panel-heading">
                    <span class="pull-right">
                        <ul class="nav panel-tabs" style="background: #20B2AA;height: 40px;border-radius: 30px">
                            <li><a href="#tab11" data-toggle="tab">最新老師</a></li>
                            <li><a href="#tab12" data-toggle="tab">最新案件</a></li>
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab11">
                        <table class="table">
                            <thead>
                              <tr>
                                <td>編號</td>
                                <td>科目</td>
                                <td>對象</td>
                                <td>經驗</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $sql = "SELECT * FROM resume ORDER BY addtime DESC LIMIT 5";
                              $rs = $pdo -> query($sql);
                              foreach ($rs as $key => $row) {
                              ?>
                              <tr>
                                <td><a href="seteacher.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a></td>
                                <td><?php echo $ot[$row["id"]][1]?></td>
                                <td>
                                  <?php
                                  $xx = explode(",", $ot[$row["id"]][3]);
                                  echo $xx[0];
                                  ?>
                                </td>
                                <td><?php echo $ot[$row["id"]][4]?></td>
                              </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane" id="tab12">
                         
                          <table class="table">
                            <thead>
                              <tr>
                                <td>編號</td>
                                <td>上課地點</td>
                                <td>科目</td>
                                <td>對象</td>
                                <td>起薪</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $sql = "SELECT * FROM cases ORDER BY addtime DESC  LIMIT 5";
                              $rs = $pdo -> query($sql);
                              foreach ($rs as $key => $row) {
                                $course = getCourse($row["id"]);
                              ?>
                              <tr>
                                <td><a href="secase.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a></td>
                                <td><?php echo $c[$row["id"]][19]?></td>
                                <td><?php 
                                for ($i=0; $i < count($course[$row["id"]]); $i++) { 
                                  echo $course[$row["id"]][$i]."<br>";
                                }
                                ?></td>
                                <td><?php echo $c[$row["id"]][20]?></td>
                                <td><?php echo $c[$row["id"]][15]?></td>
                              </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                       
                    </div>
                </div>
            </div>
          </div>


          </div>
           <!--  <div class="col-lg-12" style=" margin: 30px 0px 0px 0px;padding-bottom: 10px">
              <div class="panel" style="border:2px solid #F4A460;">
                <div class="panel-heading">
                    <span class="pull-right">
                        <ul class="nav panel-tabs" style="background: #20B2AA;height: 40px;border-radius: 30px">
                            <li><a href="#tab9" data-toggle="tab">人氣老師</a></li>
                            <li><a href="#tab10" data-toggle="tab">人氣案件</a></li>
                            
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab9">
                        <table class="table">
                            <thead>
                              <tr>
                                <td>編號</td>
                                <td>科目</td>
                                <td>對象</td>
                                <td>經驗</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $sql = "SELECT * FROM resume ORDER BY views DESC LIMIT 5";
                              $rs = $pdo -> query($sql);
                              foreach ($rs as $key => $row) {
                              ?>
                              <tr>
                                <td><a href="seteacher.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a></td>
                                <td><?php echo $ot[$row["id"]][1]?></td>
                                <td>
                                  <?php
                                  $xx = explode(",", $ot[$row["id"]][3]);
                                  echo $xx[0];
                                  ?>
                                </td>
                                <td><?php echo $ot[$row["id"]][4]?></td>
                              </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane" id="tab10">
                          
                          <table class="table">
                            <thead>
                              <tr>
                                <td>編號</td>
                                <td>上課地點</td>
                                <td>科目</td>
                                <td>對象</td>
                                <td>起薪</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $sql = "SELECT * FROM cases ORDER BY views DESC  LIMIT 5";
                              $rs = $pdo -> query($sql);
                              foreach ($rs as $key => $row) {
                                $course = getCourse($row["id"]);
                              ?>
                              <tr>
                                <td><a href="secase.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a></td>
                                <td><?php echo $c[$row["id"]][19]?></td>
                                <td><?php 
                                for ($i=0; $i < count($course[$row["id"]]); $i++) { 
                                  echo $course[$row["id"]][$i]."<br>";
                                }
                                ?></td>
                                <td><?php echo $c[$row["id"]][20]?></td>
                                <td><?php echo $c[$row["id"]][15]?></td>
                              </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                       
                    </div>
                </div>
            </div>
          </div> -->

         


         
      <!--     <div class="col-lg-12" style="border:2px solid  #20B2AA; border-radius: 10px;padding: 0 0 10px 0;margin: 10px 0px 10px 0px";>
          <div class="col-lg-12" style="background-color:  #20B2AA;border-radius: 5px;">
           <h3>熱門專區</h3>
          </div>
          <div class="col-lg-4">
            <dl style="padding-top: 20px">
            <dt><a href="#">高薪家教</a></dt>
            <dd>案件屢創新高，平均兩天就額滿，要搶要快！</dd>
            </dl>
          </div>
          <div class="col-lg-4">
             <dl style="padding-top: 20px">
            <dt><a href="#">高薪家教</a></dt>
            <dd>案件屢創新高，平均兩天就額滿，要搶要快！</dd>
            </dl>
          </div>
          <div class="col-lg-4">
            <dl style="padding-top: 20px">
            <dt><a href="#">高薪家教</a></dt>
            <dd>案件屢創新高，平均兩天就額滿，要搶要快！</dd>
            </dl>
          </div>
         </div> -->
           
        </div>
        <div class="col-lg-4">
     <!--   
         <div class="col-lg-12" style="border:2px solid  #20B2AA; border-radius: 10px;padding: 0 0 0 0";>
          <div class="col-lg-12" style="background-color:  #20B2AA;border-radius: 5px;">
           <h3>會員中心</h3>
          </div>
          <br><br><br>
          <div  style="text-align: center;padding:20px 0 20px 0;font-size: 20px">
             <button style="height: 40px;border-radius: 10px"  onclick="addresume(<?php  if (empty($_SESSION["id"])) { echo 0; }else {echo $uid;} ?>)">填寫履歷</button>
             <button style="height: 40px;border-radius: 10px"  onclick="addcase(<?php  if (empty($_SESSION["id"])) { echo 0; }else {echo $uid;} ?>)">刊登案件</button>
             <button style="height: 40px;border-radius: 10px"  onclick="addpay(<?php  if (empty($_SESSION["id"])) { echo 0; }else {echo $uid;} ?>)">我要付費</button>
            </div> 
         
         </div> -->

            
       <!--   <div class="col-lg-12" style=" margin: 30px 0px 0px 0px;padding-bottom: 10px">
              <div class="panel" style="border:2px solid #F4A460;">
                <div class="panel-heading">
                    <span class="pull-right">
                        <ul class="nav panel-tabs" style="background: #20B2AA;height: 40px;border-radius: 30px">
                            <li><a href="#tab9" data-toggle="tab">人氣老師</a></li>
                            <li><a href="#tab10" data-toggle="tab">人氣案件</a></li>
                            
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab9">
                        <table class="table">
                            <thead>
                              <tr>
                                <td>編號</td>
                                <td>科目</td>
                                <td>對象</td>
                                <td>經驗</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $sql = "SELECT * FROM resume ORDER BY views DESC LIMIT 5";
                              $rs = $pdo -> query($sql);
                              foreach ($rs as $key => $row) {
                              ?>
                              <tr>
                                <td><a href="seteacher.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a></td>
                                <td><?php echo $ot[$row["id"]][1]?></td>
                                <td>
                                  <?php
                                  $xx = explode(",", $ot[$row["id"]][3]);
                                  echo $xx[0];
                                  ?>
                                </td>
                                <td><?php echo $ot[$row["id"]][4]?></td>
                              </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane" id="tab10">
                          
                          <table class="table">
                            <thead>
                              <tr>
                                <td>編號</td>
                                <td>上課地點</td>
                                <td>科目</td>
                                <td>對象</td>
                                <td>起薪</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $sql = "SELECT * FROM cases ORDER BY views DESC  LIMIT 5";
                              $rs = $pdo -> query($sql);
                              foreach ($rs as $key => $row) {
                                $course = getCourse($row["id"]);
                              ?>
                              <tr>
                                <td><a href="secase.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a></td>
                                <td><?php echo $c[$row["id"]][19]?></td>
                                <td><?php 
                                for ($i=0; $i < count($course[$row["id"]]); $i++) { 
                                  echo $course[$row["id"]][$i]."<br>";
                                }
                                ?></td>
                                <td><?php echo $c[$row["id"]][20]?></td>
                                <td><?php echo $c[$row["id"]][15]?></td>
                              </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                       
                    </div>
                </div>
            </div>
          </div>

          <div class="col-lg-12" style=" margin: 20px 0px 0px 0px;padding-bottom: 10px">
              <div class="panel" style="border:2px solid #F4A460;">
                <div class="panel-heading">
                    <span class="pull-right">
                        <ul class="nav panel-tabs" style="background: #20B2AA;height: 40px;border-radius: 30px">
                            <li><a href="#tab11" data-toggle="tab">最新老師</a></li>
                            <li><a href="#tab12" data-toggle="tab">最新案件</a></li>
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab11">
                        <table class="table">
                            <thead>
                              <tr>
                                <td>編號</td>
                                <td>科目</td>
                                <td>對象</td>
                                <td>經驗</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $sql = "SELECT * FROM resume ORDER BY addtime DESC LIMIT 5";
                              $rs = $pdo -> query($sql);
                              foreach ($rs as $key => $row) {
                              ?>
                              <tr>
                                <td><a href="seteacher.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a></td>
                                <td><?php echo $ot[$row["id"]][1]?></td>
                                <td>
                                  <?php
                                  $xx = explode(",", $ot[$row["id"]][3]);
                                  echo $xx[0];
                                  ?>
                                </td>
                                <td><?php echo $ot[$row["id"]][4]?></td>
                              </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="tab-pane" id="tab12">
                         
                          <table class="table">
                            <thead>
                              <tr>
                                <td>編號</td>
                                <td>上課地點</td>
                                <td>科目</td>
                                <td>對象</td>
                                <td>起薪</td>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $sql = "SELECT * FROM cases ORDER BY addtime DESC  LIMIT 5";
                              $rs = $pdo -> query($sql);
                              foreach ($rs as $key => $row) {
                                $course = getCourse($row["id"]);
                              ?>
                              <tr>
                                <td><a href="secase.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a></td>
                                <td><?php echo $c[$row["id"]][19]?></td>
                                <td><?php 
                                for ($i=0; $i < count($course[$row["id"]]); $i++) { 
                                  echo $course[$row["id"]][$i]."<br>";
                                }
                                ?></td>
                                <td><?php echo $c[$row["id"]][20]?></td>
                                <td><?php echo $c[$row["id"]][15]?></td>
                              </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                       
                    </div>
                </div>
            </div>
          </div>
 -->

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
 $(document).ready(function() {
    $('.carousel').carousel({interval: 2000});
  });

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