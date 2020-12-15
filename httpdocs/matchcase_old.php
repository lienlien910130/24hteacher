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
          <li class="active">最新合適案件</li>
        </ol>
          <?php include_once 'account_menu.php'; ?>
        </div>

        <div class="col-lg-9" style="text-align: center">
           <table  id="example3" class="table table-bordered table-hover col-lg-12">
            <thead>
              <tr>
                <td>案件編號</td>
                                <td>上課科目</td>
                                <td>上課地點</td>
                                <td>上課對象</td>
                                <td>薪資待遇</td>
                                <td>更新日期</td>
              </tr>
            </thead>
            <tbody>
               <?php
                          $pdo = DB_CONNECT();
                          $sql = "SELECT * FROM cases";
                          $rs = $pdo->query($sql);
                          $uid = $_SESSION["id"];
                          $resume = getResume($uid);
                          $c = getCase();
                          if(!empty($resume)){
                             foreach ($rs as $key => $row) {
                             for ($i=0; $i <count($resume[1]) ; $i++) { 
                               $sql1 ="SELECT * FROM case_list WHERE caid=4 AND val ='".$resume[1][$i]."' AND cid = '".$row["id"]."' ";
                               $rs1 = $pdo->query($sql1);
                               foreach ($rs1 as $key => $row1) {
                                for ($x=0; $x <count($resume[2]) ; $x++) { 
                                  $sql2 ="SELECT * FROM case_list WHERE  caid=19 AND val='".$resume[2][$x]."' AND cid = '".$row1["cid"]."' GROUP BY cid ";
                                  $rs2 = $pdo->query($sql2);
                                  foreach ($rs2 as $key => $row2) {
                                    for ($y=0; $y <count($resume[3]) ; $y++) { 
                                      $out = explode(",", $resume[3][$y]);
                                      $o = trim($out[0], "生");
                                       $sql3 ="SELECT * FROM case_list WHERE  caid=20 AND val LIKE '%".$o."%' AND cid = '".$row2["cid"]."' GROUP BY cid ";
                                       $rs3 = $pdo->query($sql3);
                                       foreach ($rs3 as $key => $row3) {
                                       $sql4 ="SELECT * FROM case_list WHERE  caid=15 AND val > '".$out[1]."' AND cid = '".$row3["cid"]."' GROUP BY cid ";
                                       $rs4 = $pdo->query($sql4); 
                                       foreach ($rs4 as $key => $row4) {
                                       $sql5 ="SELECT * FROM case_list WHERE  caid=11 AND val ='".$resume[0][4]."' AND cid = '".$row4["cid"]."' GROUP BY cid ";
                                       $rs5 = $pdo->query($sql5); 
                                       foreach ($rs5 as $key => $row5) {
                                       
                                       
?>
                                     <tr>
                                          <td><a href="secase.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a></td>
                                          <td><?php echo $resume[1][$i]?></td>
                                          <td><?php echo $resume[2][$x]?></td>
                                          <td><?php echo $c[$row["id"]][20]?></td>
                                          <td><?php echo $c[$row["id"]][15]?></td>
                                          <td><?php echo $row["lastedit"]?></td>
                                     </tr>

<?php
                                            }
                                         }
                                       }
                                     }
                                    }
                                 } 
                               }

                             }

                          }
                          }else{
                            echo "<p>請先新增履歷!</p>";
                          }
                    
                          ?>
                         

            </tbody>
            </table>
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
$(function () {
    $("#example1").DataTable();
   
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