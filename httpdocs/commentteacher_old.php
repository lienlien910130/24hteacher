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
          <li class="active">評價紀錄</li>
        </ol>
          <?php include_once 'account_menu.php'; ?>
        </div>

        <div class="col-lg-9" style="text-align: center">
            <div id="change">
            <ul id="tabs" class="nav nav-tabs pull-right" data-tabs="tabs">
              <li class="active"><a href="#tab1" data-toggle="tab">尚未評價</a></li>
              <li><a href="#tab2" data-toggle="tab">已獲評價</a></li>
            </ul>
            <br>
            <br><br><br>
          <?php 
          $pdo = DB_CONNECT();
          $uid = $_SESSION["id"];
          $sql = "SELECT count(*) as n  FROM casedeal WHERE uid=".$uid;
          $rs = $pdo ->query($sql);
          if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
             $n = $row["n"];
          }
         
          $sql ="SELECT c.id as c_id ,c.uid as c_uid,c.inid as c_inid,c.salary as c_salary,i.id as i_id ,i.uid as i_uid,i.reid as i_reid,i.cid as i_cid , i.caid as i_caid,i.rid as i_rid,i.source as i_source,i.status as i_status,i.type as i_type,i.edittime as i_edittime,ca.numbers as ca_numbers FROM casedeal c LEFT JOIN interview i on c.inid=i.id LEFT JOIN cases ca on ca.id=i.cid WHERE i.reid='".$uid."' AND c.comment = 0";

          $rs = $pdo ->query($sql);
          ?>
            <div id="my-tab-content" class="tab-content">
              <div class="tab-pane active" id="tab1">
                 <table id="example2" class="table table-bordered table-hover col-lg-12">
            <thead>
              <tr>
                <td>案件編號</td>
                <td>學生姓名</td>
                <td>錄取老師</td>
                <td>學歷科系</td>
                <td>回報確認時間</td>
                <td>面談時薪</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rs as $key => $row) {
                    $student = getStudent($row["i_cid"]);
                    $resume = getResumes();
                    $account = getProfile($row["i_reid"]);
                ?>
                <tr>
                <td><a href="secase.php?id=<?php echo $row["i_cid"]?>"><?php echo $row["ca_numbers"]?></a></td>
                <td>
                <?php
                for ($i=0; $i < count($student[$row["i_cid"]]) ; $i++) { 
                    echo $student[$row["i_cid"]][$i]."<br>"; 
                }
                ?>
                </td>
                <td><?php echo $account[1]?></td>
                <td><?php echo $resume[$row["i_rid"]][8].'/'.$resume[$row["i_rid"]][9]?></td>
                <td><?php echo $row["i_edittime"];?></td>
                <td><?php echo $row["c_salary"]?></td>
                <td></td>
                </tr>
                <?php
              }
                ?> 
            </tbody>
          </table>
              </div>
              <?php 
                $sql ="SELECT c.id as c_id ,c.uid as c_uid,c.inid as c_inid,c.salary as c_salary,i.id as i_id ,i.uid as i_uid,i.reid as i_reid,i.cid as i_cid , i.caid as i_caid,i.rid as i_rid,i.source as i_source,i.status as i_status,i.type as i_type,i.edittime as i_edittime,com.val as com_val,com.edittime as com_edittime,ca.numbers as ca_numbers,ca.name as ca_name FROM casedeal c LEFT JOIN interview i on c.inid=i.id LEFT JOIN comments  com ON com.inid = i.id LEFT JOIN cases ca on ca.id = i.cid   WHERE i.reid='".$uid."' AND c.comment = 1";
               $rs = $pdo ->query($sql);
              ?>
              <div class="tab-pane" id="tab2">
                <table id="example3" class="table table-bordered table-hover col-lg-12">
            <thead>
              <tr>
                <td>案件編號</td>
                <td>案主</td>
                <td>內容</td>
                <td>評價時間</td>
              </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rs as $key => $row) {
                    $resume = getResumes();
                    $course = getCourse($row["i_cid"]);
                    $account = getProfile($row["i_reid"]);
                ?>
                <tr>
                <td><a href="secase.php?id=<?php echo $row["i_cid"]?>"><?php echo $row["ca_numbers"]?></a></td>
                <td><?php echo $row["ca_name"];?></td>
                <td><?php echo $row["com_val"];?></td>
                <td><?php echo $row["com_edittime"]?></td>
                <td></td>
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

      <footer class="footer col-lg-12" style="text-align: center">
        <?php include_once 'footer.php'; ?>
      </footer>

    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>

<script type="text/javascript">
function seecomment($id) {
  var id = $id;
  $.get("comment.php?id="+id,function(data)
  {
     $("#change").html(data);
  });
}
$(function () {
    $("#example1").DataTable();
   $("#example2").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "language": {
          "emptyTable": "查無資料",
           "paginate": {
               "previous": "上一頁",
               "next": "下一頁"
           },
           "info": "顯示 _PAGE_ 到 _PAGES_ 筆資料",
            "infoEmpty": "0筆資料"
        }
    });
    $("#example3").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "language": {
          "emptyTable": "查無資料",
           "paginate": {
               "previous": "上一頁",
               "next": "下一頁"
           },
           "info": "顯示 _PAGE_ 到 _PAGES_ 筆資料",
            "infoEmpty": "0筆資料"
        }
    });

  });
</script>