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

    <title>常見問題</title>

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
          <div class="wid qu">
          <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 ques_menu pl">
             <?php 
             $sql = "SELECT * FROM question WHERE parid=0 order by sort ASC";
             $rs = $pdo ->query($sql);
             foreach ($rs as $key => $row) {
              ?>
                <div class="panel panel-default nav nav-pills nav-stacked admin-menu">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse"  data-target-id="1" data-parent="#accordion" href="#<?php echo htmlspecialchars($row["id"], ENT_QUOTES);?>" onclick="changethis(this)"><i class="fa fa-chevron-circle-down ques_b" aria-hidden="true"></i> <?php echo htmlspecialchars($row["title"], ENT_QUOTES);?></a>
                        </h4>
                    </div>
                    <div id="<?php echo htmlspecialchars($row["id"], ENT_QUOTES);?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                            <?php
                            $sql1 = "SELECT * FROM question WHERE parid=".$row["id"];
                            $rs1 = $pdo ->query($sql1);
                            $xx = 0;
                            foreach ($rs1 as $key => $row1) {
                              $xx++;
                              if($xx == 1){
                                ?>
                                 <tr>
                                    <td style="border-top: 0;">
                                        <li><a href="#" class="ques_a" style="color: black;font-weight: bold;padding: 8px;" onclick="chekckque(<?php echo htmlspecialchars($row1["id"], ENT_QUOTES);?>)"><?php echo htmlspecialchars($row1["title"], ENT_QUOTES);?></a></li>
                                    </td>
                                </tr>
                                <?php
                              }else{
                                ?>
                                <tr>
                                    <td>
                                        <li><a href="#" class="ques_a" style="color: black;font-weight: bold;padding: 8px;" type="button" onclick="chekckque(<?php echo htmlspecialchars($row1["id"], ENT_QUOTES);?>)"><?php echo htmlspecialchars($row1["title"], ENT_QUOTES);?></a></li>
                                    </td>
                                </tr>
                                <?php
                              }
                            }
                           ?>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
             }
             ?>
          </div>
          <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8 pr">
              <div id="ques">
                 <?php include_once 'question_detail.php';?>
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
$(document).ready(function()
{
    var navItems = $('.admin-menu li > a');
    var navListItems = $('.admin-menu li');
    var allWells = $('.admin-content');
    var allWellsExceptFirst = $('.admin-content:not(:first)');
    
    allWellsExceptFirst.hide();
    navItems.click(function(e)
    {
        e.preventDefault();
        navListItems.removeClass('active');
        $(this).closest('li').addClass('active');
        
        allWells.hide();
        var target = $(this).attr('data-target-id');
        $('#' + target).show();
    });
});
function chekckque($id) {

// alert("123");
 $.get("question_detail.php?id="+$id,function(data)
  {
      $("#ques").html(data);
  });

}
function changethis(obj) {
  var l = $(obj).children();
  if(l.hasClass("fa-chevron-circle-down") == true){
    $(l).removeClass("fa-chevron-circle-down");
    $(l).addClass("fa-chevron-circle-up");
  }else{
    $(l).removeClass("fa-chevron-circle-up");
    $(l).addClass("fa-chevron-circle-down");
  }
  
}
</script>