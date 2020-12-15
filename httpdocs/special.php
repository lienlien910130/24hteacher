<?php 
session_start();
include_once 'lib/core.php';
$pdo =DB_CONNECT();

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

    <title>特殊需求</title>

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
     .list-group-horizontal .list-group-item {
    display: inline-block;
    width: 20%;
    text-align: center;
    background-color: rgb(239,239,239);
    color: rgb(137,137,137);
    font-weight: bold;
    font-size: 24px;
}
.list-group-item:focus,.list-group-item:hover{
  background-color: rgb(246,175,108);
}
a.list-group-item:focus, a.list-group-item:hover, button.list-group-item:focus, button.list-group-item:hover{
  background-color: rgb(246,175,108);
  color: white;
}
.list-group-horizontal .list-group-item {
  margin-bottom: 0;
  margin-left:-4px;
  margin-right: 0;
}
.list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover{
   background-color: rgb(235,97,0);
  color: white;
  border-color: white;
  z-index: 0;
}
.list-group-horizontal .list-group-item:first-child {
  border-top-right-radius:0;
  border-bottom-left-radius:4px;
}
.list-group-horizontal .list-group-item:last-child {
  border-top-right-radius:4px;
  border-bottom-left-radius:0;
}
   </style>
  </head>

  <body>
 <div id="wrapper">
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
          <div class="col-lg-12 about col-sm-12 col-xs-12 col-md-12">
            <div id="changessssss">
            <?php include_once 'link_s.php';?>
            </div>
          </div>
         <div id="sec_change">
           <?php include_once 'sp_table.php';?>
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

function cha($page,$order,$sort,$obj,$sub,$area,$exper,$sala,$other,$textnu) {
  
  $.ajax({
      type:'POST',
      url :'sp_table.php',
      data:"obj="+$obj+"&sub="+$sub+"&area="+$area+"&exper="+$exper+"&sala="+$sala+"&other="+$other+"&page="+$page+"&order="+$order+"&sort="+$sort+"&textnu="+$textnu,
      dataType:'html', 
      success : function(data){
        $("#sec_change").html(data);
      }
  });

}
function chaa($order,$sort,$obj,$sub,$area,$exper,$sala,$other,$textnu) {
  
   $.ajax({
      type:'POST',
      url :'sp_table.php',
      data:"obj="+$obj+"&sub="+$sub+"&area="+$area+"&exper="+$exper+"&sala="+$sala+"&other="+$other+"&order="+$order+"&sort="+$sort+"&textnu="+$textnu,
      dataType:'html', 
      success : function(data){
        $("#sec_change").html(data);
      }
  });
}

function po($index) {

   switch ($index) {
    case 1:
       var day = "22,28,29";
        break;
    case 2:
       var day = "8,17";
        break;
    case 3:
       var day = "9,18";
        break;
    case 4:
      var  day = "8,17";
        break;
    case 5:
      var  day = "5,6,13,14";
        break;
   }
   $.ajax({
      type:'POST',
      url :'sp_table.php',
      data:"order=ml_man&sort=DESC&sub="+day,
      dataType:'html', 
      success : function(data){
        $("#sec_change").html(data);
      }
  });
    $.ajax({
      type:'POST',
      url :'link_s.php',
      data:"index="+$index,
      dataType:'html', 
      success : function(data){
        $("#changessssss").html(data);
      }
  });
}
</script>