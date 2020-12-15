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
    <link rel="icon" href="bootstrap-3.3.7/docs/favicon.ico">

    <title>Tutor</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <!-- Custom styles for this template -->
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
   
    <div class="container">
      <div class="header clearfix">
         <?php include_once 'navbar.php';?>
      </div>

      
      <div class="row">
        <div class="col-lg-3" style="text-align: center">
        <ol class="breadcrumb">
          <li><a href="index.php">首頁</a></li>
          <li><a href="account_center.php">會員中心</a></li>
          <li class="active">刊登面試管理</li>
        </ol>
          <?php include_once 'account_menu.php'; ?>
        </div>

        <div class="col-lg-9" style="text-align: center">
            <div class="col-lg-4">
            <select class="form-control" id="caseid">
            <option value="0" selected>請選擇</option>
            <?php 
            $pdo=DB_CONNECT();
            @session_start();
            $id = @$_SESSION["id"];
            $sql = "SELECT * FROM cases WHERE uid = ".$id;
            $rs = $pdo->query($sql);
            foreach ($rs as $key => $row) {
              ?>
               <option value="<?php echo $row["id"]?>"><?php echo $row["numbers"]?></option>
              <?php
            }
            ?>
            </select>
            </div>
            <div id="change" style="text-align: center;">
            <ul id="tabs" class="nav nav-tabs pull-right" data-tabs="tabs">
              <li class="active"><a href="#tab1" data-toggle="tab">未處理</a></li>
             
              <li><a href="#tab3" data-toggle="tab">已回報</a></li>
              <li><a href="#tab4" data-toggle="tab">已婉拒</a></li>
            </ul>
            <br>
            <br>
            <div id="my-tab-content" class="tab-content">
              <div class="tab-pane active" id="tab1">
                 
              </div>
              <div class="tab-pane" id="tab3">
                  
              </div>
              <div class="tab-pane" id="tab4">
               
              </div>
            </div>
            </div>
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
     $(document).ready(function(){
                //利用jQuery的ajax把縣市編號(CNo)傳到Town_ajax.php把相對應的區域名稱回傳後印到選擇區域(鄉鎮)下拉選單
                $('#caseid').change(function(){
                    var cid= $('#caseid').val();
                    $.ajax({
                        type: "POST",
                        url: 'case_ajax.php',
                        cache: false,
                        data:'cid='+cid,
                        error: function(){
                            alert('Ajax request 發生錯誤');
                        },
                        success: function(data){
                            $('#change').html(data);
                        }
                    });
                });
               
            });

     function changestatus($id,$status){
           var id = $id;
           var status = $status ; 
           $.ajax({
                        type: "POST",
                        url: 'changestatusProc.php',
                        cache: false,
                        data:'id='+id+'&status='+status,
                        error: function(){
                            alert('Ajax request 發生錯誤');
                        },
                        success: function(data){
                          alert("修改成功!");
                          location.href="interview_two.php";
                        }
                    });
         
     }
     function changedeal($id,$status){
        var id = $id;
       $.get("deal.php?id="+id,function(data)
        {
              $("#change").html(data);
        });
     }
     function cancelForm(){
       location.href = "interview_two.php";
     }
     
     function checkdeForm($id){ 
      var frm = document.forms["casedealForm"];
      if(frm.salary.value == ""){
        alert("欄位不可空白");
      }
      else{
        frm.submit();
      }
    }

   
</script>
<script type="text/javascript">
   $(function () {
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    $("#example3").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    $("#example4").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    $("#example5").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });

  </script>