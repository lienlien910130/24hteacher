<?php 
@session_start();
include_once 'lib/core.php';
 if(!isset($_SESSION['login']) || empty($_SESSION['login']) ){
   header("Location:index.php?msg=5");
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

    <title>教學影片/教材&筆記</title>

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
            <div class="col-lg-4 col-md-4 hidden-xs hidden-sm ">
               <?php include_once 'account_menu.php'; ?>
            </div>
            <div class="col-lg-8 col-xs-12 col-sm-12 col-md-8 cloud" >

          <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="">
          <h3 class="title">教材&筆記</h3>
          <div id="clouds" style="padding-top: 10px;" class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
              <?php 
              $pdo = DB_CONNECT();
              $id= $_SESSION["id"];
              $sql = "SELECT * FROM clouds WHERE uid ='".$id."' AND types <> 1";
              $rs = $pdo->query($sql);
              foreach ($rs as $key => $row) {
                if($row["types"] == 0){
                  ?>
                <div class="col-lg-3 col-xs-6 col-sm-6 col-md-3 note1">
                 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                  <a href="<?php echo $row["hre"]?>" class="hres" style="text-align: center;" target="_blank" title="下載">
                  </a>
                 </div>
                 <div class="col-lg-12 delet col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                  <a href="javascript:dele(<?php echo htmlspecialchars($row["id"], ENT_QUOTES);?>)" class="trash"><i class="fa fa-trash fa-lg" aria-hidden="true" type="button" onclick=""></i></a>
                   上課教材
                 </div>
                 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                  <h5><?php echo htmlspecialchars($row["titles"], ENT_QUOTES);?></h5>
                  </div>
                 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                  
                  <?php 
                  if($row["checks"] == 0){
                    echo "<i class='fa fa-times-circle-o' aria-hidden='true' style='color: rgb(202,202,202);'></i>審核中";
                  }else if($row["checks"] == 1){
                     echo "<i class='fa fa-check-circle-o ' aria-hidden='true' style='color: rgb(239,67,0);'></i>已認證";
                  }else{
                      echo "<i class='fa fa-times-circle-o' aria-hidden='true' style='color: rgb(202,202,202);'></i>未認證";
                  }
                  ?>
                 </div>
              </div>
                  <?php
                }else{
                  ?>
                  <div class="col-lg-3 col-xs-6 col-sm-6 col-md-3 note1">
                 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                  <a href="<?php echo $row["hre"]?>" class="note" style="text-align: center;" target="_blank" title="下載">
                  </a>
                 </div>
                 <div class="col-lg-12 delet col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                  <a href="javascript:dele(<?php echo htmlspecialchars($row["id"], ENT_QUOTES);?>)" class="trash"><i class="fa fa-trash fa-lg " aria-hidden="true" type="button" onclick=""></i></a>
                   筆記範本
                 </div>
                 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                  <h5><?php echo htmlspecialchars($row["titles"], ENT_QUOTES);?></h5>
                  </div>
                 <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                  <?php 
                  if($row["checks"] == 0){
                    echo "<i class='fa fa-times-circle-o' aria-hidden='true' style='color: rgb(202,202,202);'></i>審核中";
                  }else if($row["checks"] == 1){
                     echo "<i class='fa fa-check-circle-o ' aria-hidden='true' style='color: rgb(239,67,0);'></i>已認證";
                  }else{
                      echo "<i class='fa fa-times-circle-o' aria-hidden='true' style='color: rgb(202,202,202);'></i>未認證";
                  }
                  ?>
                 </div>
              </div>
                  <?php
                }
              ?>  
              
              <?php 
              }
              ?>
              <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;padding-top: 20px;padding-bottom: 50px;">
              <button id="button2id" name="button2id" class="btn bu" onclick="addclouds()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">新增</button>
              </div>

          </div>
          </div>

          <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
          <h3 class="title">YouTube影片</h3>
          <div id="videos" style="" class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
          <?php 
          $listid = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{12,})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
          $youtubeid = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i';
          $needle = "list";
          $sql = "SELECT * FROM clouds WHERE uid ='".$id."' AND types = 1";
          $rs = $pdo->query($sql);
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
          <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6 vide">
            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
              <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?php echo $yid?>?list=<?php echo $lid?>" frameborder="0" allowfullscreen>
              </iframe>
            </div>
            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
              <a href="javascript:delev(<?php echo htmlspecialchars($row["id"], ENT_QUOTES);?>)" class="trash"><i class="fa fa-trash fa-lg" aria-hidden="true" type="button" onclick=""></i></a>
               <?php echo htmlspecialchars($row["titles"], ENT_QUOTES);?>
            </div>
            <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                  <?php 
                  if($row["checks"] == 0){
                    echo "<i class='fa fa-times-circle-o' aria-hidden='true' style='color: rgb(202,202,202);'></i>審核中";
                  }else if($row["checks"] == 1){
                     echo "<i class='fa fa-check-circle-o ' aria-hidden='true' style='color: rgb(239,67,0);'></i>已認證";
                  }else{
                      echo "<i class='fa fa-times-circle-o' aria-hidden='true' style='color: rgb(202,202,202);'></i>未認證";
                  }
                  ?>
            </div>
          </div>
          <?php 
        }
          ?>
          <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;padding-top: 20px;padding-bottom: 50px;">
              <button id="button2id" name="button2id" class="btn bu" onclick="addvideos()" type="button" style="padding: 10px;width: 30%;margin-right: 5px;">新增</button>
              <!-- <button id="button2id" name="button2id" class="btn bu" onclick="editclouds()" type="button" style="padding: 10px;width: 30%;margin-left: 5px;">修改</button> -->
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
 function addclouds(){

 $.get("addclouds.php",function(data)
      {
              $("#clouds").html(data);
      });

}
function editclouds(){

 $.get("editclouds.php",function(data)
      {
              $("#clouds").html(data);
      });

}
function addvideos(){

 $.get("addvideos.php",function(data)
      {
              $("#videos").html(data);
      });

}
function editvideos(){

 $.get("editvideos.php",function(data)
      {
              $("#videos").html(data);
      });

}
function dele($id) {

  $.ajax({
            type: "POST",
            url: 'deleteclouds.php',
            cache: false,
            data:'id='+$id,
            dataType:'json',
            error: function(){
                alert('Ajax request 發生錯誤');
            },
            success: function(data,textStatus, jqXHR){
              if(data.status == "1"){
               alert("刪除成功");
               location.href="clouds.php";
             }
            }
        });
}
function delev($id) {

  $.ajax({
            type: "POST",
            url: 'deletevideo.php',
            cache: false,
            data:'id='+$id,
            dataType:'json',
            error: function(){
                alert('Ajax request 發生錯誤');
            },
            success: function(data,textStatus, jqXHR){
               if(data.status == "1"){
                alert("刪除成功");
                location.href="clouds.php";
               }
            }
        });
}
	
	 <?php
    if(@$_GET["msg"]==1)
    {
  ?>
      alert("檔案格式錯誤，請重新上傳");
  <?php
    }
  ?>
	
</script>