<?php 
@session_start();
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$uid = @$_SESSION["id"];
$text = @$_GET["text"];
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
     <div id="wrapper">
        <div id="header">
            <?php include_once 'navbar.php';?>
        </div>
         <div id="content">   
         <div class="container">
      <div class="row" style="margin-top: 70px">
        <div class="col-lg-3">
        <ol class="breadcrumb">
          <li><a href="index.php">首頁</a></li>
          <li class="active">找老師</li>
        </ol>
         <?php include_once 'nav_teacher.php'; ?> 
        </div>
        <div class="col-lg-6">
          <div class="col-lg-12" style="border:2px solid  #20B2AA; border-radius: 10px;padding: 0 0 0 0";>
            <div class="col-lg-12" style="background-color:  #20B2AA;border-radius: 5px;">
           <h3  style="font-weight:bold;font-family:Microsoft JhengHei;">你的查詢條件 <a href="searchteacher.php" style="color: black;font-size: 18px"><i class="fa fa-times-circle pull-right" aria-hidden="true">清除</i></a></h3>

          </div>
            <div class="col-lg-12">
              <div id="d" class="col-lg-12" style="padding: 10px 0 10px 0;">
                 <div id="xx" style="padding: 10px 5px 10px 10px;width: 15%;float: left;;text-align: center">
                  對象
                  <button class="btn btn-default" style="font-size:10px;width:100%">請選擇</button>
                </div>
                <div id="yy"  style="padding: 10px 5px 10px 0;width: 18%;float: left;;text-align: center">
                科目
                  <button class="btn btn-default" style="font-size:10px;width:100%">請選擇</button>
                </div>
                <div id="zz"  style="padding: 10px 5px 10px 0;width: 18%;float: left;;text-align: center">
                地點
                  <button class="btn btn-default" style="font-size:10px;width:100%">請選擇</button>
                </div>
                <div id="ww"  style="padding: 10px 5px 10px 0;width: 19%;float: left;;text-align: center">
                經驗
                  <button class="btn btn-default" style="font-size:10px;width:100%">請選擇</button>
                </div>
                <div id="oo"  style="padding: 10px 5px 10px 0;width: 13%;float: left;;text-align: center">
                時薪
                  <button class="btn btn-default" style="font-size:10px;width:100%">請選擇</button>
                </div>
                <div id="pp"  style="padding: 10px 5px 10px 0;width: 17%;float: left;;text-align: center">
                身份
                  <button class="btn btn-default" style="font-size:10px;width:100%">請選擇</button>
                </div>
                <input type="text" name="x" id="x" class="form-control" style="display: none;">
                <input type="text" name="y" id="y" class="form-control" style="display: none;">
                <input type="text" name="z" id="z" class="form-control" style="display: none;">
                <input type="text" name="w" id="w" class="form-control" style="display: none;">
                <input type="text" name="o" id="o" class="form-control" style="display: none;">
                <input type="text" name="p" id="p" class="form-control" style="display: none;">
                
              </div>
            </div>
          </div>
           <div class="col-lg-12"  style="padding-top: 20px">
           <div id="steac">
             <table id="example3" class="table table-bordered  col-lg-12 table-hover" style="border: 2px solid #F4A460">
                            <thead>
                              <tr>
                                <td>老師名</td>
                                <td>科目</td>
                                <td>教育背景</td>
                                <td>經驗</td>
                                <td>成交人數</td>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if($text == ""){

                                $sql =  "SELECT * FROM resume ORDER BY addtime DESC ";
                                $rs = $pdo ->query($sql);
                                $r = getResumes();
                                foreach ($rs as $key => $row) {
                                  $sub = gettsub($row["id"]);
                                  $loc = gettloc($row["id"]);
                                  $obj = gettobj($row["id"]);
                                  $abr = gettabr($row["id"]);
                                  $lic = gettlic($row["id"]);
                                  $acc = getProfile($row["uid"]);
                                  ?>
                                  <tr>
                                  <td><a href="seteacher.php?id=<?php echo $row["id"]?>"><?php echo $acc[1]?></a></td>
                                  <td><?php 
                                  $t ="";
                                  for ($i=0; $i < count($sub[$row["id"]]); $i++) {
                                    $t=$t.$sub[$row["id"]][$i]."/";
                                  }
                                  echo substr($t,0,-1);
                                  ?></td>
                                  <td><?php echo $r[$row["id"]][10]?></td>
                                  <td><?php echo $r[$row["id"]][4]?></td>
                                  <td><?php echo $row["deal"]?></td>
                                  </tr>
                                <?php
                                }
                              }else{
                                $sql =  "SELECT * FROM resume_list WHERE val LIKE '%".$text."%' GROUP BY reid ";
                                $rs = $pdo ->query($sql);
                                $r = getResumes();
                                foreach ($rs as $key => $row) {
                                  $sql1 =  "SELECT * FROM resume WHERE id='".$row["reid"]."' ORDER BY addtime DESC ";
                                 $rs1 = $pdo ->query($sql1);
                                 foreach ($rs1 as $key => $row1) {
                                  $sub = gettsub($row1["id"]);
                                  $loc = gettloc($row1["id"]);
                                  $obj = gettobj($row1["id"]);
                                  $abr = gettabr($row1["id"]);
                                  $lic = gettlic($row1["id"]);
                                  $acc = getProfile($row1["uid"]);
                                  ?>
                                  <tr>
                                  <td><a href="seteacher.php?id=<?php echo $row1["id"]?>"><?php echo $acc[1]?></a></td>
                                  <td><?php 
                                  $r1="";
                                  for ($i=0; $i < count($sub[$row1["id"]]); $i++) { 
                                    $r1=$r1.$sub[$row1["id"]][$i]."/";
                                  }
                                  echo substr($r1,0,-1);
                                  ?></td>
                                  <td><?php echo $r[$row1["id"]][10]?></td>
                                  <td><?php echo $r[$row1["id"]][4]?></td>
                                  <td><?php echo $row1["deal"]?></td>
                                  </tr>
                                <?php
                                  }
                                }
                              }
                                ?>
                              
                            </tbody>
                          </table></div>
          </div>
        </div>
        <div class="col-lg-3">
         <div class="col-lg-12">
                    <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="text-center">家長推薦</h3>
                </div>
                <ul class="list-group list-group-flush text-center">
                 <?php 
                          $sql =  "SELECT * FROM cases ORDER BY addtime DESC ";
                          $rs = $pdo ->query($sql);
                          $c = getCase();
                          foreach ($rs as $key => $row) {
                            $course = getCourse($row["id"]);
                             
                               ?>
                               <li class="list-group-item">
                                <a href="secase.php?id=<?php echo $row["id"]?>">
                        【<?php echo $course[$row["id"]][0]?>】<?php echo $c[$row["id"]][19]."，".$c[$row["id"]][20]."，起薪".$c[$row["id"]][15]?></a>
                              </li>

                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
                              <?php
                              }
                            ?>
                            <li class="list-group-item">
                                <a href="#">家長推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">家長推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">家長推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">家長推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">家長推薦</a>
                              </li>
                </ul>
            </div>
           </div>
            <div class="col-lg-12">
                    <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="text-center">高薪家教推薦</h3>
                </div>
                <ul class="list-group list-group-flush text-center">
                 <?php 
                          $sql =  "SELECT * FROM cases ORDER BY addtime DESC ";
                          $rs = $pdo ->query($sql);
                          $c = getCase();
                          foreach ($rs as $key => $row) {
                            $course = getCourse($row["id"]);
                             
                               ?>
                               <li class="list-group-item">
                                <a href="secase.php?id=<?php echo $row["id"]?>">
                        【<?php echo $course[$row["id"]][0]?>】<?php echo $c[$row["id"]][19]."，".$c[$row["id"]][20]."，起薪".$c[$row["id"]][15]?></a>
                              </li>

                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
                              <?php
                              }
                            ?>
                            <li class="list-group-item">
                                <a href="#">高薪家教推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">高薪家教推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">高薪家教推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">高薪家教推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">高薪家教推薦</a>
                              </li>
                </ul>
            </div>

           </div>
            <div class="col-lg-12">
                    <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="text-center">專職/補教家教推薦</h3>
                </div>
                <ul class="list-group list-group-flush text-center">
                 <?php 
                          $sql =  "SELECT * FROM cases ORDER BY addtime DESC ";
                          $rs = $pdo ->query($sql);
                          $c = getCase();
                          foreach ($rs as $key => $row) {
                            $course = getCourse($row["id"]);
                             
                               ?>
                               <li class="list-group-item">
                                <a href="secase.php?id=<?php echo $row["id"]?>">
                        【<?php echo $course[$row["id"]][0]?>】<?php echo $c[$row["id"]][19]."，".$c[$row["id"]][20]."，起薪".$c[$row["id"]][15]?></a>
                              </li>

                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
                              <?php
                              }
                            ?>
                            <li class="list-group-item">
                                <a href="#">專職/補教家教推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">專職/補教家教推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">專職/補教家教推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">專職/補教家教推薦</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">專職/補教家教推薦</a>
                              </li>
                </ul>
            </div>

           </div>
            <div class="col-lg-12">
                    <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="text-center">解題老師</h3>
                </div>
                <ul class="list-group list-group-flush text-center">
                 <?php 
                          $sql =  "SELECT * FROM cases ORDER BY addtime DESC ";
                          $rs = $pdo ->query($sql);
                          $c = getCase();
                          foreach ($rs as $key => $row) {
                            $course = getCourse($row["id"]);
                             
                               ?>
                               <li class="list-group-item">
                                <a href="secase.php?id=<?php echo $row["id"]?>">
                        【<?php echo $course[$row["id"]][0]?>】<?php echo $c[$row["id"]][19]."，".$c[$row["id"]][20]."，起薪".$c[$row["id"]][15]?></a>
                              </li>

                              <!-- <td><a href="javascript:searchteachers('<?php echo $row["val"]?>')"><?php echo $row["val"]."(".$coun.")"?></a></td> -->
                              <?php
                              }
                            ?>
                            <li class="list-group-item">
                                <a href="#">解題老師</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">伴讀老師</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">函授課程</a>
                              </li>
                              <li class="list-group-item">
                                <a href="#">上課筆記販售</a>
                              </li>
                </ul>
            </div>

           </div>
       
        </div>

      </div>

    </div> <!-- /container -->

        </div>
         <div id="footer">
           <?php include_once 'footer.php';?>
        </div>
    </div>

 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>

<script type="text/javascript">
function addfavoritecase($id,$uid) {
  if ($uid == 0 ) {
    alert("請先登入");
  }
  else{
    
    $.ajax({
            type: "POST",
            url: 'addfavoritecaseProc.php',
            cache: false,
            data:"&id="+$id+"&uid="+$uid,
            error: function(){
                alert('123');
            },
            success: function(data){
                    alert('加入成功!');
            }
        });
  }
}

$(function () {
    $("#example1").DataTable();
    $("#example3").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
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

  function addtexts($id,$vid){

    
    var x = $("#x").val();
    var y = $("#y").val();
    var z = $("#z").val();
    var w = $("#w").val();
    var o = $("#o").val();
    var p = $("#p").val();
    $.ajax({
            type: "POST",
            url: 'addsearchProc.php',
            cache: false,
            data:"&id="+$id+"&vid="+$vid,
            error: function(){
                alert('123');
            },
            success: function(data){
               
                      if($id == 1){
                       $("#xx").html('對象<button class="btn btn-default" style="font-size:10px;padding-left:10px;width:100%">'+data+'</button>');
                       $("#x").val($vid);
                      }
                     if($id == 2){
                       $("#yy").html('科目<button class="btn btn-default" style="font-size:10px;padding-left:10px;width:100%;">'+data+'</button>');
                        $("#y").val($vid);
                     }
                     if($id == 3){
                       $("#zz").html('地點<button class="btn btn-default" style="font-size:10px;padding-left:10px;width:100%">'+data+'</button>');
                       $("#z").val($vid);
                     } 
                     if($id == 4){
                       $("#ww").html('經驗<button class="btn btn-default" style="font-size:10px;padding-left:10px;width:100%">'+data+'</button>');
                       $("#w").val($vid);
                     }
                     if($id == 5){
                       $("#oo").html('時薪<button class="btn btn-default" style="font-size:10px;padding-left:10px;width:100%">'+data+'</button>');
                       $("#o").val($vid);
                     }
                     if($id == 6){
                       $("#pp").html('身份<button class="btn btn-default" style="font-size:10px;padding-left:10px;width:100%">'+data+'</button>');
                       $("#p").val($vid);
                     }
                var obj = $("#x").val();
                var sub =$("#y").val();
                var area = $("#z").val();
                var exper = $("#w").val();
                var sala = $("#o").val();
                var iden = $("#p").val();
                $.ajax({
                    type: "POST",
                    url: 'conditionteacher.php',
                    cache: false,
                    data:"&obj="+obj+"&sub="+sub+"&area="+area+"&exper="+exper+"&sala="+sala+"&iden="+iden,
                    error: function(){
                        alert('123');
                    },
                    success: function(data){
                        $("#steac").html(data);
                    }
                });

            }
        });
       
       
}
</script>