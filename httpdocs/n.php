<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<header">
<!-- <div class="top_bar">
<div class="container">
<div class="col-md-6">
<ul class="social">
<li><a target="_blank" href="https://www.webenlance.com/"><i class="fa fa-facebook text-white"></i></a></li>
<li><a target="_blank" href="https://webenlance.com"><i class="fa fa-twitter text-white"></i></a></li>
<li><a target="_blank" href="http://webenlance.com"><i class="fa fa-instagram text-white"></i></a></li>
</ul></div>

<div class="col-md-6">
<ul class="rightc">
<li><i class="fa fa-envelope-o"></i> webenlance@gmail.com  </li>
<li><i class="fa fa-user"></i> <a href="webenlance.com" >Become a Partner</a></li>      
</ul>
</div>
</div>
</div> -->
<!--top_bar-->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0px;width: 100%;">
    	<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img src="http://placehold.it/150x50&text=Logo"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
				
				<ul class="nav navbar-nav navbar-right">
					
					<li class="dropdown">
						<a href="javascript:ch1()" class="dropdown-toggle" data-toggle="dropdown">我要找案件</a>
					</li>
					<li class="dropdown">
						<a href="javascript:ch2()" class="dropdown-toggle" data-toggle="dropdown">我要找老師</a>
					</li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">會員專區</a>
						<ul class="dropdown-menu">
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
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search" aria-hidden="true"></i></a>
						<ul class="dropdown-menu">
							<li><input type="text" name="searchtext" id="searchtext" placeholder="請輸入關鍵字" class="col-lg-10" style="margin: 10px"><button id="button3id" name="button3id" class="btn btn-success" type="button" onclick="searchcase()">找案件</button> <button id="button3id" name="button3id" class="btn btn-success" type="button" onclick="searchteacher()">找老師</button></li>
						</ul>
					</li>
					<li class="dropdown hidden-lg hidden-sm hidden-md">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">依科目搜尋<i class="fa fa-caret-down pull-right" aria-hidden="true"></i></a>
						<ul class="dropdown-menu">
						 <?php 
						    include_once 'lib/core.php';
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
					<li class="dropdown hidden-lg hidden-sm hidden-md">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">依地區搜尋<i class="fa fa-caret-down pull-right" aria-hidden="true"></i></a>
						<ul class="dropdown-menu">
						<?php 
                            $sql = "SELECT * FROM city";
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
                               
                              <?php
                              }
                            ?>
						</ul>
					</li>
				</ul>

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
   
</header>




<link rel="stylesheet" type="text/css" href="n.css">
<script type="text/javascript">
	

$(document).ready(function(){

    $(".dropdown").hover(            

        function() {

            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");

            $(this).toggleClass('open');        

        },

        function() {

            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");

            $(this).toggleClass('open');       

        }

    );

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
		 function searchcase() {
		    var text = $("#searchtext").val();
		    location.href="searchcase.php?text="+text;
		  }

		  function searchteacher(){
		    var text = $("#searchtext").val();
		    location.href="searchteacher.php?text="+text;
		  }
       </script>