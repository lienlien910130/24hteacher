<?php 
@session_start();
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = @$_GET["id"];
$r = getResumes();
$sub = gettsub($id);
$loc = gettloc($id);
$obj = gettobj($id);
$abr = gettabr($id);
$lic = gettlic($id);
$lic15 = gettlic15($id);
$acc = getProfile($id);
$sql = "SELECT * FROM resume WHERE id = ".$id;
$pdo = DB_CONNECT();
$rs =$pdo->query($sql);
if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
  $nnn=$row["numbers"];
  $acc = getProfile($row["uid"]);
  $xx = $row["uid"];
  $yy = $row["id"];
  $views = $row["views"];
  $views++;
  $sql1 ="UPDATE resume SET views ='".$views."' WHERE id =".$id;
  $pdo->query($sql1);
}else{
  header("Location:error.php");
}
 if(!isset($_SESSION['id']) || empty($_SESSION['id']) ){
  $uid = 0;
 }else{
  $uid = $_SESSION["id"];
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
    <link rel="icon" href="bootstrap-3.3.7/docs/favicon.ico">

    <title><?php echo "履歷 ".$nnn?></title>

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
    </div>
    <div id="content">
       <div class="container">
        <div class="wid">
         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
           <h2 class="set">  老師基本資料</h2>
         </div>
         <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12 spl">
           <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 seta1">
             <!-- <img src="img/123.jpg" class="img-responsive" style="width: 540px;height: 386px;border-radius: 10px;"> -->
             <img src="<?php echo $acc[5]?>" class="img-responsive" style="width: 540px;height: 400px;border-radius: 10px;">
           </div>
           <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 seta1">
           <h3>
            <?php 
            $sql = "SELECT * FROM power WHERE uid='".$xx."'";
            $rs = $pdo ->query($sql);
            foreach ($rs as $key => $row) {
              if($row["certification"] == 1){
                 echo "<i class='fa fa-check-circle-o ' aria-hidden='true' style='color: rgb(239,67,0);'></i>已認證";
              }else{
                  echo "<i class='fa fa-times-circle-o' aria-hidden='true' style='color: rgb(202,202,202);'></i>未認證";
              }
           
            }
            ?>
          </h3>
           </div>
         </div>
         <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12 seta1 spr">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 o">
              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><h3>老師姓名</h3></div>
              <div class="col-lg-9 col-sm-9 col-md-9 col-xs-9">
              <h3>
              <?php 
              if($acc[2] == "女"){
                echo mb_substr($acc[1],0,1,"utf-8")."小姐";
              }else{
                echo mb_substr($acc[1],0,1,"utf-8")."先生";
              }?>
                
              </h3>
              </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 t">
              <div class="col-lg-3  col-sm-3 col-md-3 col-xs-3"><h3>老師編號</h3></div>
              <div class="col-lg-9  col-sm-9 col-md-9 col-xs-9"><h3><?php echo $nnn?></h3></div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 th">
              <div class="col-lg-3  col-sm-3 col-md-3 col-xs-3"><h3>老師年齡</h3></div>
              <div class="col-lg-9 col-sm-9 col-md-9 col-xs-9">
                <h3>
              <?php 
                list($year,$month,$day) = explode("-",$acc[3]);
                $year_diff = date("Y") - $year;
                $month_diff = date("m") - $month;
                $day_diff  = date("d") - $day;
                if ($day_diff < 0 || $month_diff < 0){
                  if($year_diff != 0 ){ $year_diff--; }
                  else{ $year_diff = 0;}
                }
                echo $year_diff;
                ?>
               </h3>
              </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 fo">
              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><h3>學歷背景</h3></div>
              <div class="col-lg-9 col-sm-9 col-md-9 col-xs-9">
              <h3>
              <?php echo $r[$id][10]."，".$r[$id][17]."，".$r[$id][8]."，".$r[$id][9]?></h3>
              </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 fi">
              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><h3>目前身份</h3></div>
              <div class="col-lg-9 col-sm-9 col-md-9 col-xs-9"><h3><?php echo $r[$id][14]?></h3></div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 si">
              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3"><h3>留學經驗</h3></div>
              <div class="col-lg-9 col-sm-9 col-md-9 col-xs-9">
               <h3>
                <?php 

                for ($i=0; $i < count($abr[$id]); $i++) { 
                  if($abr[$id][$i] == "無,無"){
                    echo "無";
                    break;
                  }else{
                      echo $abr[$id][$i]."<br>";
                  }
                }
                 ?>
               </h3>
              </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 se">
              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 pr8">
              <?php 
              if($uid ==$xx){
                ?>
                 <button id="button3id" name="button3id" class="btn bu" type="button" onclick="" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;" disabled="disabled">加入收藏</button> 
                <?php
              }else{
                ?>
                 <button id="button3id" name="button3id" class="btn bu" type="button" onclick="addfavoriteteac(<?php echo $id?>,<?php echo $uid?>,2)" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;">加入收藏</button> 
                <?php
              }
              ?>
               
              </div>
              <div class="col-lg-6  col-sm-6 col-md-6 col-xs-6 pl8">
                <button id="button3id" name="button3id" class="btn bu" type="button" onclick="invi()" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;">我要聘請</button> 
              </div>
            </div>
         </div>
         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 seta2">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading seteacher">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab" style="" class="set3">詳細履歷</a></li>
                    <li class=""><a href="#tab2" data-toggle="tab" style="">評價紀錄</a></li>
                    <li class=""><a href="#tab3" data-toggle="tab" style="">教學影片</a></li>
                    <li class=""><a href="#tab4" data-toggle="tab" style="">教材&筆記</a></li>
                  </ul>
                </div>
            <div class="panel-body">
              <div class="tab-content">
                 <div class="tab-pane fade in active tab1" id="tab1">
                   <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                       <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5"><h3>教學科目</h3></div>
                       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7"><h3>
                         <?php 
                        for ($i=0; $i < count($sub[$id]) ; $i++) { 
                          echo $sub[$id][$i]."<br>";
                        }?>
                       </h3></div>
                     </div>
                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                       <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5"><h3>上課地點</h3></div>
                       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7"><h3>
                         <?php 
                            for ($i=0; $i < count($loc[$id]) ; $i++) { 
                              echo $loc[$id][$i]."<br>";
                            }?>
                       </h3></div>
                     </div> 
                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                       <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5"><h3>上課方式</h3></div>
                       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7"><h3><?php 
                            echo $r[$id][6];
                          ?></h3></div>
                     </div> 
                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                       <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5"><h3>對象&期望時薪</h3></div>
                       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7"><h3>
                         <?php 
                          for ($i=0; $i < count($obj[$id]) ; $i++) { 
                            echo $obj[$id][$i]."<br>";
                          }?>
                       </h3></div>
                     </div>  
					   		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                       <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5"><h3>經驗描述</h3></div>
                       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7"><h3>
						           <?php 
                            echo str_replace("\n","<br>",$r[$id][5]);
                          ?></h3></div>
                     </div>
					   
                   </div>
                   <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                       <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5"><h3>教學經驗</h3></div>
                       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7"><h3><?php 
                            echo $r[$id][4];
                          ?></h3></div>
                     </div>
                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                       <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5"><h3>試教服務</h3></div>
                       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7"><h3><?php 
                            echo $r[$id][7];
                          ?></h3></div>
                     </div>
                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                       <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5">
                       <h3>證照<br>
                       <h4><i class='fa fa-times-circle-o ' aria-hidden='true' style='color: rgb(202,202,202);'></i>-未通過審核<br><i class='fa fa-check-circle-o ' aria-hidden='true' style='color: rgb(239,67,0);'></i>-已通過審核</h4>
                       </h3></div>
                       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7">
                       <h3>
                        <?php 
                          for ($i=0; $i < count($lic[$id]) ; $i++) { 
                            $u = explode(",", $lic[$id][$i]);
                            $u1 = explode(",",$lic15[$id][$i]);
                            if($u[3] == 0){
                              echo $u1[0]."-".$u1[1]."-<i class='fa fa-times-circle-o ' aria-hidden='true' style='color: rgb(202,202,202);'></i>"."<br>";
                            }else if($u[3] == 1){
                              echo $u1[0]."-".$u1[1]."-<i class='fa fa-check-circle-o ' aria-hidden='true' style='color: rgb(239,67,0);'></i>"."<br>";
                            }else{
                              echo $u1[0]."-".$u1[1]."-<i class='fa fa-times-circle-o ' aria-hidden='true' style='color: rgb(202,202,202);'></i>"."<br>";
                            }
                           
                        }
                        ?>
                        </h3></div>
                     </div>
                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                       <div class="col-lg-5 col-sm-5 col-md-5 col-xs-5"><h3>其他證照</h3></div>
                       <div class="col-lg-7 col-sm-7 col-md-7 col-xs-7"><h3><?php 
 										echo str_replace("\n","<br>",$r[$id][16]);
                       
                          ?></h3></div>
                     </div>
                   </div>
                 </div>
                 <div class="tab-pane" id="tab2">
                    <div class="page-header">
                    <?php 
                    $sql = "SELECT count(*) as n FROM comments c LEFT JOIN interview i on c.inid = i.id  WHERE i.reid = ".$xx;
                    $rs = $pdo ->query($sql);
                    if($row = $rs -> fetch(PDO::FETCH_BOTH)){
                      $n = $row["n"];
                    }
                    ?>
                    <h1><small class="pull-right">共<?php echo $n?>筆</small></h1>
                    </div> 
                    <div class="comments-list">
                     <?php
                     $sql = "SELECT c.id as c_id , c.inid as c_inid , c.uid as c_uid , c.val as c_val , i.reid as i_reid,c.edittime as c_edittime,c.uid as c_uid  FROM comments c LEFT JOIN interview i on c.inid = i.id  WHERE i.reid = ".$xx;
                     $rs = $pdo ->query($sql);
                     foreach ($rs as $key => $row) {
                      $acc = getProfile($row["c_uid"]);
                      ?>
                      <div class="col-md-12">
                       <div class="media">
                           <p class="pull-right">
                           <small><?php 
                           $out = explode(" ", $row["c_edittime"]);
                           $out1 = explode("-", $out[0]);
                           echo $out1[0]."-".$out1[1]."-".$out1[2]?></small></p>
                            <div class="media-body">
                              <h4 class="media-heading user_name"><?php echo $acc[1]?></h4>
                              <?php echo $row["c_val"]?>
                            </div>
                          </div>
                   </div>
                    <?php
                    }
                     ?>
                    
                    </div>
                </div>
                 <div class="tab-pane" id="tab3">
                   <?php 
                     $sql = "SELECT * FROM clouds WHERE uid ='".$xx."'  AND types = 1 AND checks = 1";
                     $rs=$pdo ->query($sql);
                     $listid = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{12,})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
                     $youtubeid = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
                     $needle = "list";
                     foreach ($rs as $key => $row) {
                        $tmp = explode($needle,$row["hre"]);
                      if(count($tmp)>1){
                        $lid = (preg_replace($listid, '$1', $row["hre"]));
                        $yid = (preg_replace($youtubeid, '$1', $row["hre"]));
                      }else{
                        $yid = (preg_replace($youtubeid, '$1', $row["hre"]));
                        $lid = "";
                      }

                    ?>
                        
                        <div class="col-lg-6 col-md-12 col-xs-12 col-sm-12" style="padding-bottom: 10px;padding-top: 10px;">
                          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;font-size: 21px;padding-bottom: 10px;">
                          <label><i class='fa fa-check-circle-o ' aria-hidden='true' style='color: rgb(239,67,0);'></i><?php echo $row["titles"]?></label>
                          </div>
                          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                          <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $yid?>?list=<?php echo $lid?>" frameborder="0" allowfullscreen>
                          </iframe>
                          </div>
                          </div>
                       <?php

                           }
                        ?>
                 </div>
                 <div class="tab-pane se4" id="tab4">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php 
                     $sql = "SELECT * FROM clouds WHERE uid ='".$xx."'  AND types <> 1";
                     $rs=$pdo ->query($sql);
                     foreach ($rs as $key => $row) {
                       if($row["types"] == 2 && $row["checks"] == 1){
                        ?>
                        <div class="col-lg-2  col-md-6 col-sm-6 col-xs-6" style="text-align: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h3>販售筆記</h3></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <a href="<?php echo $row["hre"]?>" class="note" style="text-align: center;" target="_blank" title="預覽"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><i class='fa fa-check-circle-o ' aria-hidden='true' style='color: rgb(239,67,0);'></i><?php echo $row["titles"]?></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">價格：NT.<?php echo $row["prices"]?></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <button id="button3id" name="button3id" class="btn bu" type="button" onclick="" data-toggle="modal" data-target="#myBuy" style="bottom: 0px;border-radius: 10px;color: white;padding: auto;">我要購買</button> 
                        </div>
                      </div>
                        <?php
                       }else if($row["types"] == 0 && $row["checks"] == 1){
                        ?>
                       <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6" style="text-align: center;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h3>上課教材</h3></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <a href="<?php echo $row["hre"]?>" class="hres" style="text-align: center;" target="_blank" title="預覽"></a>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><i class='fa fa-check-circle-o ' aria-hidden='true' style='color: rgb(239,67,0);'></i><?php echo $row["titles"]?></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">價格：NT.<?php echo $row["prices"]?></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <button id="button3id" name="button3id" class="btn bu" type="button" onclick="" data-toggle="modal" data-target="#myBuy"  style="bottom: 0px;border-radius: 10px;color: white;padding: auto;">我要購買</button> 
                        </div>
                      </div>
                        <?php
                       }
                     }
                    ?>
                    </div>
                 </div>
              <div id="myBuy" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content" style="height: 250px;top:150px;">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></button>
                    <h4 class="modal-title">購買筆記/教材</h4>
                  </div>
                  <div class="modal-body">
                    <?php 
                    if(empty($uid) || $xx == $uid){
                      if($xx == $uid){
                        ?>
                        <div class="col-lg-12" style="text-align: center;">
                        <h3>請至會員中心查看該筆記購買記錄</h3>
                        </div>
                        <div class="col-lg-12" style="text-align: center;">
                        <button id="button2id" name="button2id" class="btn bu" type="button" onclick="returnmember()">會員中心</button>
                        </div>
                        <?php
                      }else{
                        ?>
                        <div class="col-lg-12" style="text-align: center;">
                      <h3>請先登入再進行購買!提醒您!點擊圖片即可查看預覽，查看後確定要購買請點選確定購買，我們將會為您處理，謝謝!</h3>
                      </div>
                      <div class="col-lg-12" style="text-align: center;">
                      <button id="button2id" name="button2id" class="btn bu" type="button" onclick="returnlogin()">登入</button>
                      </div>
                        <?php
                      }
                      ?>
                      
                      <?php
                    }else{
                      
                      ?>

                      <div class="col-lg-12" style="text-align: center;">
                      <h3>提醒您!點擊圖片即可查看預覽，查看後確定要購買請點選確定購買，我們將會為您處理，謝謝!</h3>
                      </div>
                      <div class="col-lg-12" style="text-align: center;">
                      
                       <select class="" style="width: 200px" id="notes">
                      <?php 
                      $sql7 = "SELECT * FROM clouds WHERE uid ='".$xx."'  AND types <> 1";
                      $rs7=$pdo ->query($sql7);
                      foreach ($rs7 as $key => $row7) {
                        ?>
                        <option value="<?php echo $row7["id"]?>"><?php echo $row7["titles"]?></option>
                        <?php
                      }
                      ?>
                      </select>
                      </div>
                      <div class="col-lg-12" style="text-align: center;">
                      <button type="button" class="btn bu" onclick="buy(<?php echo $uid?>,<?php echo $xx?>)">確認購買</button>
                      <button type="button" class="btn bu" data-dismiss="modal">取消</button>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                </div>

              </div>
            </div>
              </div>
            </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" id="myInvi" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="" onclick="">
                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                        </button>
                        <h3 style="color: black;">聘請老師</h3>
                    </div>
                    <div class="modal-body as" style="text-align: center;padding-top: 20px;font-size: 21px;">
                    <?php
                    if(empty($uid) || $xx ==$uid){
                      if($xx ==$uid){
                        ?>
                        <div class="col-lg-12">
                         <h3>請至會員中心查看聘請我的案件資訊</h3>
                         </div>
                         <div class="col-lg-12">
                         <button id="button2id" name="button2id" class="btn bu" type="button" onclick="returnmember()">會員中心</button>
                         </div>
                        <?php
                      }else{
                        ?>
                        <div class="col-lg-12">
                         <h3>請先登入再進行聘請!</h3>
                        </div>
                         <div class="col-lg-12">
                         <button id="button2id" name="button2id" class="btn bu" type="button" onclick="returnlogin()">登入</button>
                         </div>
                        <?php
                      }
                    ?>
                    <?php
                    }else{

                      $sql3 = "SELECT * FROM power WHERE uid=".$uid;
                      $rs3=$pdo->query($sql3);
                      foreach ($rs3 as $key => $row3) {
                          if($row3["invite"] == 0){
                            $invites = 0;
                          }else{
                            $invites = 1;
                          }
                      }
                        
                        if($invites ==0){
                        ?>
                        <div class="col-lg-12">
                        <h3>你沒有邀請對方的權限，如有問題請聯絡客服人員，謝謝。</h3>
                        </div>
                        <?php
                        }else{
                        $sql1 = "SELECT * FROM cases WHERE uid = '".$uid."' ";
                        $rs1 = $pdo->query($sql1);
                        if ($row2 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                          ?>
                          <div class="col-lg-12">
                          <h3>你想邀請<?php echo $acc[1]?>教的案件是</h3>
                          </div>
                          <div class="col-lg-12">
                          <select class="" style="width: 200px" id="sele">
                         <?php
                            $rs2 = $pdo->query($sql1);
                            foreach ($rs2 as $key => $row1) {
                            ?>
                              <option value="<?php echo $row1["id"]?>"><?php echo $row1["numbers"]?></option>
                            <?php  
                            }
                            ?>
                          </select>
                          </div>
                          <input type="" name="resumeuid" id="resumeuid" style="display: none;" value="<?php echo $xx?>">
                          <input type="" name="resumeid" id="resumeid"   style="display: none;" value="<?php echo $yy?>">
                          <input type="" name="caseuid" id="caseuid" style="display: none;" value="<?php echo $row1["uid"]?>">
                          <div class="col-lg-12">
                          <button id="button1id" name="button1id" class="btn bu" type="button">我要聘請</button>
                          </div>
                  <?php

                        }else{
                          ?>
                          <div class="col-lg-12">
                          <h3>你尚未刊登案件，立即刊登即可邀請該老師應徵</h3>
                          </div>
                          <div class="col-lg-12">
                          <button id="button2id" name="button2id" class="btn bu" type="button" onclick="returncase()">我要刊登案件</button>
                          </div>
                          <?php
                        }
                        ?>

                        <?php
                      }
                   
                }
                ?>
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
  $("#button1id").on("click", 
    function () {
      var reid = $("#resumeuid").val();
      var rid = $("#resumeid").val();
      var cid = $("#sele").val();
      var caid = $("#caseuid").val();
      $.getJSON("getStaticData.php?action=AccountType&reid="+reid+"&rid="+rid+"&cid="+cid+"&caid="+caid,
        function(data)
        {
           alert("已通知該老師，請等候回覆");
		  		location.reload();
        }
      );
      }
    );
function invi() {
        $("#myInvi").modal("show");
}
function returnmember() {
  location.href="account.php";
}
function returnlogin() {
  $("#myInvi").modal("hide");
  $("#myBuy").modal("hide");
  $("#myLogin").modal("show");
}
function returncase() {
  location.href="case.php";
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
function buy($uid,$cuid) {
  var cid = $("#notes").val();
  $.ajax({
            type: "POST",
            url: 'addnote.php',
            cache: false,
            data:"&uid="+$uid+"&cid="+cid+"&cuid="+$cuid,
            dataType:'json',
            error: function(){
                alert('123');
            },
            success: function(data,textStatus, jqXHR){
                if (data.status == "1") {
                    alert("我們將為您處理!感謝您的購買");
                   $("#myBuy").modal("hide");
                }else{
                    alert("已通知老師，請靜待回復，謝謝。");
                }
                
            }
        });
  
}
function addfavoriteteac($id,$uid,$types) {
  if ($uid == 0 ) {
    alert("請先登入");
  }
  else{
    $.ajax({
            type: "POST",
            url: 'addfavoritecaseProc.php',
            cache: false,
            data:"&id="+$id+"&uid="+$uid+"&types="+$types,
            dataType:'json',
            error: function(){
                alert('123');
            },
            success: function(data,textStatus, jqXHR){
                if (data.status == "1") {
                    alert('加入成功!');
                }else{
                    alert('已經在我的最愛裡面!');
                }
                
            }
        });
  }
}

</script>