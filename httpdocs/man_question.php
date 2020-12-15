
<?php 
@session_start();
include_once 'lib/core.php';
 if(!isset($_SESSION['login']) || empty($_SESSION['login']) ){
   header("Location:index.php?msg=5");
 }
  if( $_SESSION["type"] == 1 ||  $_SESSION["type"] == 2  ){
   header("Location:index.php?msg=6");
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
    <div id="header">
      <?php include_once 'n1.php';?>
    </div>
    <div id="content">
      <div class="container">
        <div class="wid">
          <div class="col-lg-4 col-md-4 hidden-xs hidden-sm">
              <?php include_once 'manage_menu.php'; ?>
          </div>
          <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 man_que">
          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <h3 class="title">常見問題管理</h3>
          </div>
          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
          <div id="person" style="margin-top: 10px;">
          <table class="table table-bordered table-hover col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <thead>
              <tr class="th_tr">
                <td class="col-lg-5 col-md-5 col-xs-5 col-sm-5">標題</td>
                <td class="col-lg-2 col-md-2 col-xs-2 col-sm-2">順序</td>
                <td class="col-lg-5 col-md-5 col-xs-5 col-sm-5">編輯</td>
              </tr>
            </thead>
            <tbody>
               <?php
                $sql ="SELECT * FROM question WHERE parid=0 order by sort ASC";
                $rs = $pdo ->query($sql);
                foreach ($rs as $key => $row) {
                ?>
                <tr>
                <td style="text-align: center;" class="col-lg-5 col-md-5 col-xs-5 col-sm-5">
                <a href="javascript:editch(<?php echo $row["id"]?>)" title="編輯子分類">
                <?php echo $row["title"]?>
                </a>
                </td>
                <td style="text-align: center;" class="col-lg-2 col-md-2 col-xs-2 col-sm-2">
                <?php echo $row["sort"]?>
                </td>
                <td style="text-align: center;" class="col-lg-5 col-md-5 col-xs-5 col-sm-5">
                  <a href="javascript:editpar(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton">編輯</button></a>
                   <a href="javascript:deletepar(<?php echo $row["id"]?>)"><button class="btn tbu" id="editbutton">刪除</button></a>
                </td>
                </tr>
                <?php
                }
                ?> 
            </tbody>
          </table>
          <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
            <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="addquestion()">新增分類</button>
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
function addquestion() {
  $.get("addquestion.php",function(data)
  {
      $("#person").html(data);
  });
}
function editch($id){
  $.get("man_question_chi.php?id="+$id,function(data)
  {
      $("#person").html(data);
  });
}
function editpar($id){
  $.get("editquestion.php?id="+$id,function(data)
  {
      $("#person").html(data);
  });
}
function addchii($id){
  $.get("addchi.php?id="+$id,function(data)
  {
      $("#person").html(data);
  });
}
function editchii($id){
  $.get("editchi.php?id="+$id,function(data)
  {
      $("#person").html(data);
  });
}
function cancel() {
  location.href="man_question.php";
}
function deletepar($id) {
  $.ajax({
            type: "POST",
            url: 'deletequestion.php',
            cache: false,
            data:'id='+$id,
            error: function(){
                alert('Ajax request 發生錯誤');
            },
            success: function(data){
                 alert('刪除成功');
                 location.href="man_question.php";
            }
        });
}
function addquestionpar(){
   var frm = document.forms["addquestionProc"];
   if(frm.title.value == ""){
   alert("欄位不可空白");
   }else{
     frm.submit();
   }
}
function changtitle(){

    var frm = document.forms["changtitleform"];
   if(frm.title.value == ""){
    alert("欄位不可空白");
   }else{
    frm.submit();
   }
   
  }
  function addchique(){
    var frm = document.forms["addquestionform"];
   var data = CKEDITOR.instances.content.getData();
   if(frm.title.value == ""){
   alert("欄位不可空白");
   }else{
     frm.submit();
   }
  
  }
  function editchiProc($id){
    var frm = document.forms["editquestionform"];
   var data = CKEDITOR.instances.content.getData();
   if(frm.title.value == ""){
   alert("欄位不可空白");
   }else{
     frm.submit();
   }
}
function deletechii($id) {
  $.ajax({
            type: "POST",
            url: 'deletechiquestion.php',
            cache: false,
            data:'id='+$id,
            error: function(){
                alert('Ajax request 發生錯誤');
            },
            success: function(data){
                 alert('刪除成功');
                 location.href="man_question.php";
            }
        });
}
</script>