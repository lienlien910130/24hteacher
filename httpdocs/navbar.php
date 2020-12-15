<div id="wrapper">

<nav class="navbar navbar-findcond navbar-fixed-top" id="slide-nav">
    <div class="container">
    <div class="navbar-header">
      <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">

       <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> -->
      <a class="navbar-toggle"> 
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
       </a>
      <a class="navbar-brand" href="index.php">Tutor</a>
    </div>

    <div class="collapse navbar-collapse side-collapse in" id="slidemenu">
      <ul class="nav navbar-nav navbar-right sidebar-nav">
        <li class="active"><a href="javascript:ch10()">關於我們</a></li>
        <li class="active"><a href="javascript:ch11()">最新案件</a></li>
        <li class="dropdown hidden-lg hidden-md hidden-sm ">
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
                                <a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a>
                              </li>
                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
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
                                <a href="javascript:searchteachers('<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"].$coun2?></a>
                              </li>
                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
                              <?php
                              }
                            ?>
              </ul>
            </li>
            <li><a href="#">最新案件</a></li>
          </ul>
        </li>
        <li class="dropdown hidden-lg hidden-md hidden-sm ">
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
                                <a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a>
                              </li>
                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
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
                               <a href="javascript:searchcases('<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"].$coun3 ?></a>
                              </li>
                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
                              <?php
                              }
                            ?>
                 
              </ul>
            </li>
            <li><a href="#">最新案件</a></li>
          </ul>
        </li>
        <li class="dropdown d hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">我要找老師 <span class="caret"></span></a>
          <ul class="dropdown-menu " role="menu" style="float: left;width: 500px">
            <li class="dropdown d1" style="width: 250px;float: left">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">科目<span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu-left" role="menu" style="width: 500px">
                  <table class="table ta" style="text-align: center;">
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
                                <tr style="color: black">
                              <?php
                              }
                              ?>
                              <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"].$coun?></a></td>
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

            <li class="dropdown" style="width: 250px;float: left">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">地區<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" style="width: 500px">
                   <table class="table ta" style="text-align: center">
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
                              <td><a href="javascript:searchteachers('<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"].$coun2?></a></td>
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
        <li class="dropdown hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">我要找案件 <span class="caret"></span></a>
          <ul class="dropdown-menu " role="menu" style="float: left;width: 500px">
            <li class="dropdown" style="width: 250px;float: left">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">科目<span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu-left" role="menu" style="width: 500px">
                  <table class="table ta" style="text-align: center;">
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
                              <td><a href="javascript:searchcases('<?php echo $row["val"]?>')"><?php echo $row["val"].$coun1?></a></td>
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

            <li class="dropdown" style="width: 250px;float: left">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">地區<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" style="width: 500px">
                   <table class="table ta" style="text-align: center">
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
                              <td><a href="javascript:searchcases('<?php echo $row["cityvalue"]?>')"><?php echo $row["cityvalue"].$coun3 ?></a></td>
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
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">會員中心 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php 
                   @session_start();
                   if(isset($_SESSION['id']) || !empty($_SESSION['id']) ){

                    if( $_SESSION["type"]==0){
                      ?>
                       <li><a href="javascript:ch3()">管理中心</a></li>
                      <?php
                    }else{
                      ?>
                       <li><a href="javascript:ch4()">會員管理</a></li>
                       <li><a href="javascript:ch7(<?php  if (empty($_SESSION["id"])) { echo 0; }else {echo $uid;} ?>)">修改履歷</a></li>
                       <li><a href="javascript:ch9(<?php  if (empty($_SESSION["id"])) { echo 0; }else {echo $uid;} ?>)">刊登案件</a></li>
                      <?php
                    }
                    ?>
                       <li><a href="javascript:ch5()">登出</a></li>
                    <?php
                   }else{
                    ?>
                       <li><a href="javascript:ch6()">登入</a></li>
                       <li><a href="javascript:ch8()">註冊</a></li>
                    <?php
                   }
                   ?>
          </ul>
        </li>
        <li class="dropdown se">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></a>
          <ul class="dropdown-menu sei" role="menu">
              <div class="input-group" style="padding: 10px">
                  <div class="form-group  has-feedback">
                      <input type="text" class="form-control" id="inputSuccess5" placeholder="輸入關鍵字">  
                  </div>
                  <span class="input-group-btn">
                      <button class="btn btn-success" type="button">找案件</button>
                      <button class="btn btn-danger" type="button">找老師</button>
                  </span>
              </div>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>

<style type="text/css">
nav.navbar-findcond { background: rgb(235, 97, 0); border-color: #ccc; box-shadow: 0 0 2px 0 #ccc; }
nav.navbar-findcond a { color: white; }
nav.navbar-findcond ul.navbar-nav a { color: white;text-align: center;font-size: 18px;}
nav.navbar-findcond ul.navbar-nav .open a { color: black;text-align: center;font-size: 18px;}
nav.navbar-findcond ul.navbar-nav .ta a { color: black;text-align: center;font-size: 18px;}
nav.navbar-findcond ul.navbar-nav a:hover,
nav.navbar-findcond ul.navbar-nav a:visited,
nav.navbar-findcond ul.navbar-nav a:active { background: rgb(239, 239, 239); }

nav.navbar-findcond ul.navbar-nav a:hover{ color: rgb(62, 58, 57); }

/*nav.navbar-findcond ul.navbar-nav a:active,
nav.navbar-findcond ul.navbar-nav a:focus {color: white; background: rgb(246, 175, 108);}
*/
nav.navbar-findcond ul.navbar-nav a:active,
nav.navbar-findcond ul.navbar-nav a:focus {color: white; background: rgb(246, 175, 108);}

nav.navbar-findcond li.divider { background: #ccc; }
nav.navbar-findcond button.navbar-toggle { background: black; border-radius: 2px; }
nav.navbar-findcond button.navbar-toggle:hover { background: rgb(239, 239, 239); }
nav.navbar-findcond button.navbar-toggle:hover > span.icon-bar { background: rgb(62, 58, 57); }
nav.navbar-findcond button.navbar-toggle > span.icon-bar { background: white; }
nav.navbar-findcond ul.dropdown-menu { border: 0; background: #fff; border-radius: 4px; margin: 4px 0; box-shadow: 0 0 4px 0 #ccc;}
nav.navbar-findcond ul.dropdown-menu > li > a { color: #444;height: 40px;padding-top: 10px;padding-bottom: 10px;text-align: center; }
@media screen and (min-width: 768px) {
     nav.navbar-findcond ul > li { width: 160px; }

}
@media screen and (min-width: 992px) {
     nav.navbar-findcond ul > .se,nav.navbar-findcond ul > .sei { width: 300px; }
}

.ta>tr>td:hover{
  background-color: rgb(62, 58, 57);
}

nav.navbar-findcond ul.dropdown-menu > li > a:hover { background: rgb(239, 239, 239); color: rgb(62, 58, 57); }

nav.navbar-findcond span.badge { background: #f14444; font-weight: normal; font-size: 11px; margin: 0 4px; }
nav.navbar-findcond span.badge.new { background: rgba(255, 0, 0, 0.8); color: #fff; }


</style>
   
<script type="text/javascript">

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
 $(document).ready(function () {
    $('#slide-nav.navbar .container').append($('<div id="navbar-height-col"></div>'));
    var toggler = '.navbar-toggle';
    var pagewrapper = '#content';
    var navigationwrapper = '.navbar-header';
    var menuwidth = '100%'; 
    var slidewidth = '50%';
    var menuneg = '-100%';
    var slideneg = '-50%';
    $("#slide-nav").on("click", toggler, function (e) {
        var selected = $(this).hasClass('slide-active');
        $('#slidemenu').stop().animate({
            left: selected ? menuneg : '0px'
        });
        $('#navbar-height-col').stop().animate({
            left: selected ? slideneg : '0px'
        });
        $(pagewrapper).stop().animate({
            left: selected ? '0px' : slidewidth
        });
        $(navigationwrapper).stop().animate({
            left: selected ? '0px' : slidewidth
        });
        $(this).toggleClass('slide-active', !selected);
        $('#slidemenu').toggleClass('slide-active');
        $('#content, .navbar, body, .navbar-header').toggleClass('slide-active');
    });
    var selected = '#slidemenu, #content, body, .navbar, .navbar-header';
    $(window).on("resize", function () {
        if ($(window).width() > 767 && $('.navbar-toggle').is(':hidden')) {
            $(selected).removeClass('slide-active');
        }
    });
});

</script>

<script type="text/javascript">
         function ch1() {
           location.href="searchcase.php";
         }
         function ch2() {
           location.href="searchteacher.php";
         }
         function ch3() {
           location.href="manager.php";
         }
         function ch4() {
           location.href="account_center.php";
         }
         function ch5() {
           location.href="logout.php";
         }
         function ch6() {
           location.href="login.php";
         }
         function ch7($id){
        if($id == 0){
           alert("請先登入");
           location.href="login.php";
        }
        else{
              location.href="resume.php";
          }
     }
     function ch8() {
           location.href="register.php";
         }
     function ch9($id) {
        if($id == 0){
           alert("請先登入");
           location.href="login.php";
        }
        else{
             location.href="case.php";
          }
      }
      function ch10() {
           location.href="about.php?id=1";
      }
      function ch11() {
           location.href="#";
      }
     function searchcase() {
        var text = $("#searchtext").val();
        location.href="searchcase.php?text="+text;
      }

      function searchteacher(){
        var text = $("#searchtext").val();
        location.href="searchteacher.php?text="+text;
      }

       </script>

         <style type="text/css">
    /* adjust body when menu is open */
body.slide-active {
    overflow-x: hidden
}
/*first child of #page-content so it doesn't shift around*/
.no-margin-top {
    margin-top: 0px!important
}
/*wrap the entire page content but not nav inside this div if not a fixed top, don't add any top padding */
#content {
    position: relative;
    padding-top: 70px;
    left: 0;
}
#content.slide-active {
    padding-top: 0
}
/* put toggle bars on the left :: not using button */
#slide-nav .navbar-toggle {
    cursor: pointer;
    position: relative;
    line-height: 0;
    float: left;
    margin: 0;
    width: 30px;
    height: 40px;
    padding: 10px 0 0 0;
    border: 0;
    background: transparent;
}
/* icon bar prettyup - optional */
#slide-nav .navbar-toggle > .icon-bar {
    width: 100%;
    display: block;
    height: 3px;
    margin: 5px 0 0 0;
    background-color: white;
}
#slide-nav .navbar-toggle.slide-active .icon-bar {
    background: orange
}
.navbar-header {
    position: relative
}
/* un fix the navbar when active so that all the menu items are accessible */
.navbar.navbar-fixed-top.slide-active {
    position: relative
}
/* screw writing importants and shit, just stick it in max width since these classes are not shared between sizes */
@media (max-width:767px) { 
  #slide-nav .container {
      margin: 0;
      padding: 0!important;
  }
  #slide-nav .navbar-header {
      margin: 0 auto;
      padding: 0 15px;
  }
  #slide-nav .navbar.slide-active {
      position: absolute;
      width: 50%;
      top: -1px;
      z-index: 1000;
  }
  .navbar-collapse{
    padding-right: 0px;
  }
  .navbar-fixed-top .navbar-collapse{
    max-height: 700px;
  }
nav.navbar-findcond ul.navbar-nav a
{
  color: black;
}
  #slide-nav #slidemenu {
      background: white;
      left: -100%;
      width: 50%;
      min-width: 0;
      position: absolute;
      padding-left: 0;
      z-index: 2;
      top: -8px;
      margin: 0;
      padding-top: 30px;
  }
  #slide-nav #slidemenu .navbar-nav {
      min-width: 0;
      width: 100%;
      margin: 0;
  }
  #slide-nav #slidemenu .navbar-nav .dropdown-menu li a {
      min-width: 0;
      width: 100%;
      white-space: normal;
  }
  #slide-nav {
      border-top: 0;
      text-align: left;
  }
  #slide-nav.navbar-inverse #slidemenu {
      background: #333
  }
  /* this is behind the navigation but the navigation is not inside it so that the navigation is accessible and scrolls*/
  #slide-nav #navbar-height-col {
      position: fixed;
      top: 0;
      height: 100%;
      width: 50%;
      left: -50%;
      background: white;
  }
  #slide-nav.navbar-inverse #navbar-height-col {
      background: #333;
      z-index: 1;
      border: 0;
  }
  #slide-nav .navbar-form {
      width: 100%;
      margin: 8px 0;
      text-align: center;
      overflow: hidden;
      /*fast clearfixer*/
  }
  #slide-nav .navbar-form .form-control {
      text-align: center
  }
  #slide-nav .navbar-form .btn {
      width: 100%
  }
}
@media (min-width:768px) { 
  #content {
      left: 0!important
  }
  .navbar.navbar-fixed-top.slide-active {
      position: fixed
  }
  .navbar-header {
      left: 0!important
  }
}
</style>