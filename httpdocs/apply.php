<?php 
@session_start();
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
    <script src="bootstrap-3.3.7/js/jquery-3.2.0.min.js"></script>
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
          <li class="active">揪團案件</li>
        </ol>
          <?php include_once 'account_menu.php'; ?>
        </div>


        <div class="col-lg-9" style="text-align: center">
            
            <div style="text-align: center;">
            <ul id="tabs" class="nav nav-tabs pull-right" data-tabs="tabs">
              <li class="active"><a href="#tab1" data-toggle="tab">揪團案件</a></li>
              <li><a href="#tab2" data-toggle="tab">參與中的揪團案件</a></li>
            </ul>
            <br>
            <br>
            <div id="my-tab-content" class="tab-content">
              <div class="tab-pane active" id="tab1">
                  <div class="col-lg-4">
                  <select class="form-control" id="caseid">
                  <option value="0" selected>請選擇案件</option>
                  <?php 
                  $pdo=DB_CONNECT();
                  @session_start();
                  $id = @$_SESSION["id"];
                  $sql = "SELECT * FROM cases WHERE uid = '".$id."' AND open = 1";
                  $rs = $pdo->query($sql);
                  foreach ($rs as $key => $row) {
                    ?>
                     <option value="<?php echo $row["id"]?>"><?php echo $row["numbers"]?></option>
                    <?php
                  }
                  ?>
                  </select>
                  </div>
                  <div class="col-lg-8"></div>
                  <br><br>
                  <div id="change" class="col-lg-12">
                   
                  </div>
              </div>
              <div class="tab-pane" id="tab2">
               <br><br>
                 <table id="example3" class="table table-bordered table-hover col-lg-12">
                  <thead>
                    <tr>
                      <td>案件編號</td>
                      <td>聯絡人姓名</td>
                      <td>電話</td>
                      <td>揪團</td>
                      <td>處理狀態</td>
                    </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $sql = "SELECT a.uid as a_uid,a.deal as a_deal,a.caid as a_caid,c.numbers as c_numbers,c.name as c_name,c.phone as c_phone,c.open as c_open,c.apply as c_apply FROM applytogether a LEFT JOIN cases c on a.caid = c.id WHERE a.uid = ".$id;
                     $rs = $pdo->query($sql);
                     foreach ($rs as $key => $row) {
                      ?>
                      <tr>
                      <td><a href="secase.php?id=<?php echo $row["a_caid"]?>"><?php echo $row["c_numbers"]?></a></td>
                      <td><?php echo $row["c_name"]?></td>
                      <td><?php echo $row["c_phone"]?></td>
                      <td>
                        <?php if($row["c_open"] == 0){
                          echo "關閉";
                        }else{
                          echo "開放，目前人數：".$row["c_apply"];
                        }
                        ?>
                      </td>
                      <td>
                      <?php 
                      if($row["a_deal"] == 0 ){
                        echo "未處理";
                      }if($row["a_deal"] == 1){
                        echo "婉拒";
                     }
                     if($row["a_deal"] == 2){
                          echo "成交";
                     }
                     echo '</td></tr>';
                 }
                     ?>
                  </tbody>
                </table>
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
                    var caid= $('#caseid').val();
                    $.ajax({
                        type: "POST",
                        url: 'apply_ajax.php',
                        cache: false,
                        data:'caid='+caid,
                        error: function(){
                            alert('Ajax request 發生錯誤');
                        },
                        success: function(data){
                            $('#change').html(data);
                        }
                    });
                });
               
            });
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