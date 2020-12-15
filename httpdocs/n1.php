 <?php 
include_once 'gpConfig.php';
include_once 'User.php';
if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}
 ?>

 
   <div role="banner" class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" type="button" class="navbar-toggle pull-left is-closed hamburger">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
            <a class="" href="index.php" style=""><img src="img/Logo.png" class="img-responsive" style="border-radius: 10px;width: 140px;height: 40px;margin-left:10px;margin-top: 5px;"></a>
           
        </div>
        <div class="navbar-inverse side-collapse in">
          <nav role="navigation" class="navbar-collapse navbar-findcond">
            <ul class="nav navbar-nav navbar-right sidebar-nav">
              <?php 
                @session_start();
                if(isset($_SESSION['id']) || !empty($_SESSION['id']) ){
                  if( $_SESSION["type"]==0){
               ?>
               <li class="dropdown nn hidden-lg hidden-md hidden-sm">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">管理中心 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="member_manage.php">會員管理</a></li>
                        <li><a href="article.php">文章管理</a></li>
                        <li><a href="case_manage.php">案件管理</a></li>
                        <li><a href="man_inter.php">面試管理</a></li>
                        <li><a href="picture.php">首頁圖片管理</a></li>
                        <li><a href="mail.php">收件帳號管理</a></li>
                        <li><a href="buynotes.php">購買教材&筆記管理</a></li>
                        <li><a href="fileupload.php">下載表格管理</a></li>
                        <li><a href="man_question.php">常見問題管理</a></li>
                        <li><a href="reaction.php">意見反應管理</a></li>
                        <li><a href="art_newsletter.php">電子報文章管理</a></li>
                        <li><a href="man_newsletter.php">電子報訂閱者管理</a></li>
                    </ul>
                </li>
                
                  <?php
                }else{
                ?>
                
                <li class="nn hidden-lg hidden-md hidden-sm" ><a href="javascript:ch5()">登出</a></li>
                <li class="dropdown nn hidden-lg hidden-md hidden-sm">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">會員資料管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="account.php">修改基本資料</a></li>
                        <li><a href="change_password.php">更改密碼</a></li>
                    </ul>
                </li>
                <li class="dropdown nn hidden-lg hidden-md hidden-sm">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">老師履歷管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="resume.php">修改履歷表</a></li>
                        <li><a href="clouds.php">教學影片/教材&筆記</a></li>
                    </ul>
                </li>
                <li class="dropdown nn hidden-lg hidden-md hidden-sm">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">應徵案件管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="interview_one.php">面試管理</a></li>
                        <li><a href="favorite.php">我的最愛案件</a></li>
                        <li><a href="matchcase.php">最新合適案件</a></li>
                        <li><a href="commentteacher.php">評價紀錄</a></li>
                        <li><a href="casedeal_tea.php">成交回報</a></li>
                    </ul>
                </li>
                <li class="dropdown nn hidden-lg hidden-md hidden-sm">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">家長案件管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="case.php">新增案件</a></li>
                        <li><a href="history.php">案件管理</a></li>
                        <li><a href="buy.php">購買紀錄</a></li>
                        <li><a href="interview_two.php">面試管理</a></li>
                        <li><a href="favorite_tea.php">我的最愛老師</a></li>
                        <li><a href="matchteacher.php">最新媒合老師</a></li>
                        <li><a href="commentcase.php">  評價紀錄</a></li>
                        <li><a href="casedeal.php">  成交回報</a></li>
                    </ul>
                </li>
                <!-- <li class="dropdown nn hidden-lg hidden-md hidden-sm">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">帳務管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="addpay.php">我要付款</a></li>
                        <li><a href="pay.php">付款紀錄</a></li>
                    </ul>
                </li> -->
                <?php 

}
}else{
?>              <li class="dropdown nn hidden-lg hidden-md hidden-sm">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">會員中心 <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a class="o" data-toggle="modal" href="#myLogin">登入</a></li>
                        <li><a class="o" data-toggle="modal" href="#myRegister">註冊</a></li>
                      </ul>
                </li>
                <?php
  }         ?>
                <li class="nn "><a href="about.php?id=1">關於我們</a></li>
                <li class="nn hidden-lg hidden-md hidden-sm"><a href="parentarticall.php">家長情報</a></li>
                <li class="nn"><a href="searchcase.php?order=c_addtime&sort=DESC">最新案件</a></li>
                <li class="nn"><a href="case.php">刊登案件</a></li>
                <li class="dropdown hidden-lg hidden-md hidden-sm">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">我要找老師 <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">依科目搜尋<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
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
                                            <a href="javascript:searchteachers(1,'<?php echo  htmlspecialchars($row["val"], ENT_QUOTES);?>')"><?php echo htmlspecialchars($row["val"], ENT_QUOTES);?></a>
                                          </li>
                                          <?php
                                          }
                                        ?>
                         
                          </ul>
                        </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">依地區搜尋<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                                     <?php 
                                         $sql = "SELECT * FROM city";
                                        $rs = $pdo ->query($sql);
                                          foreach ($rs as $key => $row) {
                                          $sql1 ="SELECT count(*) as n FROM resume_list WHERE rid = 2 AND val LIKE '%".$row["cityvalue"]."%' ";
                                          $rs1 = $pdo ->query($sql1);
                                          if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                               $coun2 = $row1["n"];
                                          }
                                             ?>
                                           <li class="list-group-item">
                                            <a href="javascript:searchteachers(2,'<?php echo htmlspecialchars($row["cityvalue"], ENT_QUOTES);?>')"><?php echo htmlspecialchars($row["cityvalue"], ENT_QUOTES);?></a>
                                          </li>
                                          <?php
                                          }
                                        ?>
                          </ul>
                        </li>
                        <li><a href="searchteacher.php?order=r_lastedit&sort=DESC">最新老師</a></li>
                      </ul>
                </li>
                <li class="dropdown hidden-lg hidden-md hidden-sm">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">我要找案件 <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">依科目搜尋<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                          <?php 
                                        $sql = "SELECT * FROM subjects";
                                        $pdo = DB_CONNECT();
                                        $rs = $pdo ->query($sql);
                                        
                                         foreach ($rs as $key => $row) {
                                          $sql1 ="SELECT count(*) as n FROM case_list WHERE caid = 4 AND val LIKE '%".$row["val"]."%' ";
                                          $rs1 = $pdo ->query($sql1);
                                          if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                               $coun1 = $row1["n"];
                                            }
                                             ?>
                                           <li class="list-group-item">
                                            <a href="javascript:searchcases(1,'<?php echo $row["val"]?>')"><?php echo $row["val"]?></a>
                                          </li>
                                          <?php
                                          }
                                        ?>
                             
                          </ul>
                        </li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">依地區搜尋<span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                                  <?php 
                                        $sql = "SELECT * FROM city";
                                        $rs = $pdo ->query($sql);
                                        foreach ($rs as $key => $row) {
                                          $sql1 ="SELECT count(*) as n FROM case_list WHERE caid = 19 AND val LIKE '%".$row["cityvalue"]."%' ";
                                          $rs1 = $pdo ->query($sql1);
                                          if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                               $coun3 = $row1["n"];
                                          }
                                             ?>
                                           <li class="list-group-item">
                                           <a href="javascript:searchcases(2,'<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"] ?></a>
                                          </li>
                                          <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
                                          <?php
                                          }
                                        ?>
                             
                          </ul>
                        </li>
                        <li><a href="searchcase.php?order=c_addtime&sort=DESC">最新案件</a></li>
                      </ul>
                </li>
                <li class="dropdown d hidden-xs nn">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">我要找老師 <span class="caret"></span></a>
                      <ul class="dropdown-menu dd" role="menu" style="float: left;">
                        <li class="dropdown dl" style="float: left">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">科目<span class="caret"></span></a>
                          <ul class="dropdown-menu dropdown-menu-left dd" role="menu">
                              <table class="table ta" style="text-align: center;margin-bottom: 10px;">
                                        <?php 
                                        $sql = "SELECT * FROM subjects";
                                        $pdo = DB_CONNECT();
                                        $rs = $pdo ->query($sql);
                                        $x=1;
                                        foreach ($rs as $key => $row) {
                                          $sql1 ="SELECT count(*) as n,reid FROM resume_list WHERE rid = 1 AND val LIKE '%".$row["val"]."%' ";
                                          $rs1 = $pdo ->query($sql1);
                                          if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                                               $coun = $row1["n"];
                                             }
                                          if($x%3==1){
                                          ?>
                                            <tr style="color: black">
                                          <?php
                                          }
                                          ?>
                                          <td><a href="javascript:searchteachers(1,'<?php echo $row["val"]?>')"><?php echo $row["val"]?></a></td>
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
                          </ul>
                        </li>

                        <li class="dropdown dl" style="float: left">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">地區<span class="caret"></span></a>
                          <ul class="dropdown-menu dd" role="menu" style="">
                               <table class="table ta" style="text-align: center;margin-bottom: 10px;">
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
                                          <td><a href="javascript:searchteachers(2,'<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"]?></a></td>
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
                          </ul>
                        </li>
                      </ul>
                </li>
                <li class="dropdown hidden-xs nn">
                      <a href="#" class="dropdown-toggle fzw" data-toggle="dropdown" role="button" aria-expanded="false">我要找案件 <span class="caret"></span></a>
                      <ul class="dropdown-menu dd" role="menu" style="float: left;">
                        <li class="dropdown dl" style="float: left">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">科目<span class="caret"></span></a>
                          <ul class="dropdown-menu dropdown-menu-left dd" role="menu" style="">
                              <table class="table ta" style="text-align: center;margin-bottom: 10px;">
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
                                          <td><a href="javascript:searchcases(1,'<?php echo $row["val"]?>')"><?php echo $row["val"]."&nbsp;"?></a></td>
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
                          </ul>
                        </li>

                        <li class="dropdown dl" style="float: left">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">地區<span class="caret"></span></a>
                          <ul class="dropdown-menu dd" role="menu" style="">
                               <table class="table ta" style="text-align: center;margin-bottom: 10px;">
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
                                          <td><a href="javascript:searchcases(2,'<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"]?></a></td>
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
                          </ul>
                        </li>
                      </ul>
                </li>
                <li class="dropdown nn hidden-xs">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">會員中心 <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <?php 
                               if(isset($_SESSION['id']) || !empty($_SESSION['id']) ){
                                if( $_SESSION["type"]==0){
                                  ?>
                                   <li><a href="member_manage.php">管理中心</a></li>
                                  <?php
                                }else{
                                  ?>
                                   <li><a href="account.php">會員管理</a></li>
                                   <li><a href="resume.php">修改履歷</a></li>
                                  <?php
                                }
                                ?>
                                   <li><a href="javascript:ch5()">登出</a></li>
                                <?php
                               }else{
                                ?>
                                   <li><a class="o" data-toggle="modal" href="#myLogin">登入</a></li>
                                   <li><a class="o" data-toggle="modal" href="#myRegister">註冊</a></li>
                                <?php
                               }
                               ?>
                      </ul>
                </li>
                <li class="dropdown nn">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">熱門關鍵字<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="o" href="pointing.php?sub=20&order=ml_man&sort=DESC">學測指考加強</a></li>
                        <li><a class="o" href="searchteacher.php?sub=1&order=ml_man&sort=DESC">伴讀</a></li>
                        <li><a class="o" href="searchteacher.php?sub=20,21,22,23,24,25,26,27,28,29,30,31&order=ml_man&sort=DESC">數理</a></li>
                        <li><a class="o" href="searchteacher.php?sub=45&order=ml_man&sort=DESC">日文</a></li>
                        <li><a class="o" href="searchteacher.php?sub=11,12,13,14,15,16,17,18,19&order=ml_man&sort=DESC">英文</a></li>
                        <li><a class="o" href="searchcase.php?exper=1&order=c_addtime&sort=DESC">免經驗案件</a></li>
                        <li><a class="o" href="searchteacher.php?sub=51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66&order=ml_man&sort=DESC">音樂</a></li>
                        <li><a class="o" href="parentarticall.php">私校師資</a></li>
                        <li><a class="o" href="searchteacher.php?sub=3,4,5,6,7,8,9,10&order=ml_man&sort=DESC">國文</a></li>
                        <li><a class="o" href="searchteacher.php?sub=3&order=ml_man&sort=DESC">學測作文加強</a></li>
                        <li><a class="o" href="special.php?sub=22,28,29&order=ml_man&sort=DESC">特殊需求</a></li>
                   </ul>
                </li>
                <!-- <li class="dropdown se ">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></a>
                      <ul class="dropdown-menu sei" role="menu">
                          <div class="input-group" style="padding: 10px">
                              <div class="form-group  has-feedback">
                                  <input type="searchtext" class="form-control hidden-xs" id="searchtext" placeholder="輸入關鍵字"> 
                                  <input type="searchtext" class="form-control hidden-lg hidden-md hidden-sm" id="searchtext1" placeholder=""> 
                              </div>
                              <span class="input-group-btn">
                                  <button class="btn btn-success" type="button" onclick="searchcase()">找案件</button>
                                  <button class="btn btn-danger" type="button" onclick="searchteacher()">找老師</button>
                              </span>
                          </div>
                      </ul>
                </li> -->
            </ul>
          </nav>
        </div>
      </div>
  </div>
  <div class="modal fade" id="myLogin" role="dialog" >
            <div class="modal-dialog">
                <div class="modal-content log" >
                    <div class="modal-header" style="border:0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="" onclick="">
                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body as" style="text-align: center;">

                   <div class="log" style="margin: 0 auto">
                   <form method="POST" action="loginProc.php" accept-charset="UTF-8" id="loginForm">
                     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                      <button type="button" class="btn bf"  onclick="logins()" style="width:80%;height: 50px;margin: 0 auto;margin-bottom: 20px;background-color: rgb(59,89,152);color: white;font-size: 21px;">facebook 登入</button>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                      <?php 
                      $authUrl = $gClient->createAuthUrl();
                      $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">Google+ 登入</a>';
                     // echo $output;
                      ?>

                      <a href="<?php echo filter_var($authUrl, FILTER_SANITIZE_URL)?>" type="button" class="btn bg"   style="width: 80%;height: 50px;margin: 0 auto;margin-bottom: 20px;background-color: rgb(209,67,55);color: white;font-size: 21px;">Google+ 登入</a>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                      <input type="text" id="username" class="span4 form-control form-group" name="username" placeholder="email 帳號" style="width: 80%;height: 50px;margin: 0 auto;margin-bottom: 20px;font-size: 21px;" size="35" maxlength="35">
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                      <input type="password" id="password" class="span4 form-control form-group" name="password" placeholder="密碼(請輸入8~12個字)" style="width: 80%;height: 50px;margin: 0 auto;margin-bottom: 20px;font-size: 21px" size="12" maxlength="12">
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                      <button type="button" class="btn bu" data-dismiss="modal" onclick="chan()" style="width: 38%;margin-right: 5px;margin-bottom: 20px;height: 50px;;font-size: 21px">註冊新帳號</button>
                      <button type="button" class="btn bu" onclick="checkForm()" style="width: 38%;margin-bottom: 20px;margin-left: 5px;height: 50px;;font-size: 21px">立即登入</button><br>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="">
                        <a class="pull-right" style="padding-right: 10%;padding-bottom: 20px;;font-size: 20px" data-toggle="modal" href="#myPassword">忘記密碼?</a>
                      </div>
                      </form>
                    </div>
                    </div>
                </div>
            </div>
  </div>
  <div id="chang">
  <?php include_once 'modal_6.php';?>
  </div>
<div class="modal fade" id="myPassword" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content" style="height:300px;top:150px;left: 30px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="">
                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                        </button>
                        <h3 style="color: black;">忘記密碼</h3>
                    </div>
                    <div class="modal-body as" style="text-align: center;">

                    <div class="" style="width: 100%;margin: 0 auto">
                        <div class="col-lg-12" style="overflow: auto;padding-left: 15px;padding-right: 15px;">
                          <input type="email" id="forgetemail" class="span4 form-control form-group" name="forgetemail" placeholder="輸入email帳號" style="width: 80%;height: 50px;margin: 0 auto;margin-top:20px;margin-bottom: 20px;font-size: 21px" size="35" maxlength="35">
                        </div>  
                        <div class="col-lg-12">
                        <button type="button" class="btn bu" data-dismiss="modal" onclick="checkmember()" style="width: 80%;margin-right: 5px;margin-bottom: 20px;height: 50px;font-size: 21px">確認</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
<div class="modal fade bs-example-modal-lg" id="myClause" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="height: 700px;top:150px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="" onclick="returncl()">
                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                        </button>
                        <h3 style="color: black;">會員服務條款</h3>
                    </div>
                    <div class="modal-body as" style="text-align: center;">

                   <div class="" style="width: 100%;margin: 0 auto">
                        <div class="col-lg-12" style="height: 600px;overflow: auto;padding-left: 15px;padding-right: 15px;">
                          <?php include_once 'page/regi.html';?>
                        </div>  
                    </div>
                    </div>
                </div>
            </div>
        </div>

 <link rel="stylesheet" type="text/css" href="navbar.css">
    <script type="text/javascript">
    
       $(document).ready(function() {   
            // var sideslider = $('[data-toggle=collapse-side]');
            // var sel = sideslider.attr('data-target');
            // sideslider.click(function(event){
            //     $(sel).toggleClass('in');
            // });
             var sideslider = $('[data-toggle=collapse-side]');
             var sel = sideslider.attr('data-target');
            // sideslider.click(function(event){
            //     $(sel).toggleClass('in');
            // });
            var trigger = $('.hamburger'),
                overlay = $('.overlay'),
               isClosed = false;
              trigger.click(function () {
                cross();      
              });

              function cross() {
                $(sel).toggleClass('in');
                if (isClosed == true) {          
                  overlay.hide();
                  isClosed = false;
                } else {   
                  overlay.show();
                  isClosed = true;
                }
            }
        });

       (function($){
      $(document).ready(function(){
        $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
          event.preventDefault(); 
          event.stopPropagation(); 
          $(this).parent().siblings().removeClass('open');
          $(this).parent().toggleClass('open');
        });

        $('d').on('click', function(event) {
          $('d1').addClass('open');
        });
      });
    })(jQuery);

    </script>
    <script type="text/javascript">
         function ch5() {
           location.href="logout.php";
         }
     
      function searchcases($i,$text,$st) {
          if($i == 1){

            location.href="searchcase.php?text_case_s="+$text;
          }else{
            location.href="searchcase.php?text_case_a="+$text;
          } 
      }
      function searchteachers($i,$text){
        if($i == 1){
          location.href="searchteacher.php?text_teac_s="+$text;
        }else{
          location.href="searchteacher.php?text_teac_a="+$text;
        }
      }  
      function searchcase() {
        var text = $("#searchtext").val();
        if(text == ""){
          var text = $("#searchtext1").val();
        }
        location.href="searchcase.php?searchtext="+text;
      }

      function searchteacher(){
        var text = $("#searchtext").val();
        if(text == ""){
          var text = $("#searchtext1").val();
        }
        location.href="searchteacher.php?searchtext="+text;
      }
      function chan() {
        $("#myLogin").modal("hide");
        $("#myRegister").modal("show");
      }
        function checkForm()
      {
          var frm = document.forms["loginForm"];
          re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i;
          if(frm.username.value == "" || frm.password.value == "")
          {
              alert("欄位不可空白");
          }else if(re.test(frm.username.value.toLowerCase())){
              alert("欄位不可輸入無效字元");
          }else if(re.test(frm.password.value.toLowerCase())){
              alert("欄位不可輸入無效字元");
          }else{
              frm.submit();
          }
      }
    window.fbAsyncInit = function() {
        FB.init({
          appId      : '270122590058402',
          xfbml      : true,
          version    : 'v2.9'
        });
        // FB.getLoginStatus(function(response) {
        //   if (response.status === 'connected') {
        //     document.getElementById('status').innerHTML = 'We are connected.';
        //   } else if (response.status === 'not_authorized') {
        //     document.getElementById('status').innerHTML = 'We are not logged in.'
        //   } else {
        //     document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
        //   }
        // });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    // login with facebook with extra permissions
    function logins() {
		
      FB.login(function(response) {
        if (response.status === 'connected') {
            getInfo();
          } else if (response.status === 'not_authorized') {
            location.href="index.php?msg=2";
          } else {
            location.href="index.php?msg=2";
          }
      }, {scope: 'email'});
    }
     function reglogins() {
		var ch=document.getElementById('check');
      if(ch.checked){
		  FB.login(function(response) {
        if (response.status === 'connected') {
            getInfo();
          } else if (response.status === 'not_authorized') {
            location.href="index.php?msg=2";
          } else {
            location.href="index.php?msg=2";
          }
      }, {scope: 'email'});
		}else{
			  alert("請先閱讀會員服務條款再填寫註冊資料");
		}
     
    }
    // getting basic user info
    function getInfo() {
      FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email,gender'}, function(response) {
        var fbid = response.id;
        var fbname  = response.name;
        var fbemail  = response.email;
        var fbgender  = response.gender;
        
        $.getJSON("getStaticData.php?action=FbType&fbid="+fbid+"&fbname="+fbname+"&fbemail="+fbemail+"&fbgender="+fbgender,function(data)
        {
           location.href="index.php?msg=1";
        }
      );
      });
    }
	

    function checkb(){
      if($("#check").attr('checked',true)==true){  
        $("#check").removeAttr('checked');
        alert('cb1 checked');
      }
      else{
        $("#check").attr('checked',true);
        alert("false");
      }
     }
    function check(){

      var ch=document.getElementById('check');
      if(ch.checked){
        alert("進行下一步");
      }else{
        alert("未勾選");
      }
    
  }

  function checkmember(){
      var text = $("#forgetemail").val();
      var str = text.toLowerCase();
      re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i;
      if(text == ""){
        alert("欄位不可空白!"); 
      }else if(!text.match(/^[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*@[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*\.+[a-zA-Z]+$/)){
              alert("請輸入正確的email格式"); 
      }else if(re.test(str)){
              alert("欄位不可輸入無效字元");
      }else{
        $.ajax({
                 type:'POST',
                 url :'checkmember.php',
                 data:"username="+text,
                 dataType:'json',
                 error : function(){
                  alert("信件已寄出，請至信箱收件!");
                 },
                 success : function(data,textStatus, jqXHR){
                 if(data.status == "0"){
                  alert("此帳號為最高權限者，無法更改密碼!");
                 }else if(data.status == "1"){
                  alert("信件已寄出，請至信箱收件!");
                 }else if(data.status == "2"){
                  alert("信件寄送失敗，請洽客服人員");
                 }else if(data.status == "3"){
                  alert("此帳號為fb註冊，不提供更改密碼，如有登入問題請洽服務人員!");
                 }else if(data.status == "4"){
                  alert("此帳號為gmail註冊，不提供更改密碼，如有登入問題請洽服務人員!");
                 }else{
                  alert("此email尚未註冊過，請重新輸入!");
                 }
             }
         });
      }
       
      
      
  }
  function returncl() {
      
       $.ajax({
                 type:'POST',
                 url :'modal_6.php',
                 data:"i=1",
                 dataType:'html',
                 success : function(data){
                $("#chang").html(data);
                $("#myRegister").modal("show");
                $("#myClause").modal("hide");
             }
         });
  }

 
</script>