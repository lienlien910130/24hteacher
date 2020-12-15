<?php 
@session_start();
include_once 'lib/core.php';
 if(!isset($_SESSION['login']) || empty($_SESSION['login']) ){
   header("Location:index.php?msg=5");
 }
$account = getProfile($_SESSION["id"]);
$resume = getResume($_SESSION["id"]);

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
    
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <!-- Custom styles for this template -->
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    
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
          <li class="active">通知設定</li>
        </ol>
          <?php include_once 'account_menu.php'; ?>
        </div>

        <div class="col-lg-9" style="text-align: center;padding: 10px">
        
         <form class="form-horizontal" style="margin:30px 0px 20px 0px" name="resumeForm" id="resumeForm" action="settingProc_1.php" method="POST" accept-charset="UTF-8">
         <fieldset>

         <div id="my-tab-content" class="tab-content">
           <div class="tab-pane active" id="tab1">
           <?php
        if(!empty($resume)){
          ?>
           <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">＊上課科目</label>  
                <div class="col-md-8">
                  <table id="myTable1" class=" table order-list">
            <thead>
                <tr>
                    <td>類型</td>
                    <td>科目</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php 
                 for ($i=0; $i <count($resume[1]) ; $i++) { 
                ?>
                <tr>
                    <td class="col-sm-4">
                        <select name="mySubject[]" class="form-control" onchange="change(this)">
                          <option value="0">選擇類型</option>
                          <?php
                          $sql ="SELECT * FROM subjects";
                          $pdo = DB_CONNECT();
                          $rs =$pdo->query($sql);
                          foreach ($rs as $key => $row) {
                          ?>
                            <option value="<?php echo $row["id"] ?>"><?php echo $row["val"]; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                    </td>
                    <td class="col-sm-4 lession">
                      <select name="myLession[]" class="form-control">
                           <option value="0">選擇科目</option>
                        </select>
                    </td>
                    <td class="col-sm-3 course">
                      <input type="text" class="form-control" name="myCourse[]" value="<?php echo $resume[1][$i]?>" />
                    </td>
                    <?php
                    if($i!= 0){
                    ?>
                    <td><input type="button" class="ibtnDel btn btn-md btn-danger"  value="刪除"></td>
                    <?php
                    }
                    ?>
                </tr>
                <?php
                 }
                ?>
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: left;">
                        <input type="button" class="btn btn-lg btn-block " id="addrow1" value="新增" />
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label" for="year">＊可教學地點</label>
                 <div class="col-md-8">
                  <table id="myTable2" class=" table order-list">
            <thead>
                <tr>
                    <td>縣市</td>
                    <td>鄉鎮</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
              <?php 
                 for ($i=0; $i <count($resume[2]) ; $i++) { 
                ?>
              <tr>
                    <td class="col-sm-4">
                        <select name="myCity[]"  class="form-control" onchange="changeCity(this)">
                          <option value="0">選擇縣市</option>
                          <?php
                          $sql ="SELECT * FROM city";
                          $pdo = DB_CONNECT();
                          $rs =$pdo->query($sql);
                          foreach ($rs as $key => $row) {
                          ?>
                            <option value="<?php echo $row["id"] ?>"><?php echo $row["cityvalue"]; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                    </td>
                    <td class="col-sm-4 town">
                      <select name="myTown[]" class="form-control">
                           <option value="0">選擇鄉鎮</option>
                        </select>
                    </td>
                    <td class="col-sm-3 zip">
                      <input type="text" class="form-control" name="myZip[]" value="<?php echo $resume[2][$i]?>" />
                    </td>
                    <?php
                    if($i!= 0){
                    ?>
                    <td><input type="button" class="ibtnDel btn btn-md btn-danger"  value="刪除"></td>
                    <?php
                    }
                    ?>
                </tr>
                <?php 
              }
                ?>
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: left;">
                        <input type="button" class="btn btn-lg btn-block " id="addrow2" value="新增" />
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
                </div>
              </div>

               <div class="form-group">
                <label class="col-md-4 control-label" for="year">＊對象與期望待遇</label>
                <div class="col-md-8">
                  <table id="myTable3" class=" table order-list">
            <thead>
                <tr>
                    <td>對象</td>
                    <td>價錢</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php 
                 for ($i=0; $i <count($resume[3]) ; $i++) { 
                  $out = explode(",", $resume[3][$i]);
                ?>
                <tr>
                    <td class="col-sm-5">
                        <select name="myObject[]" class="form-control" onchange="changeObject(this)">
                        <?php
                        switch ($out[0]) {
                    case "學齡前兒童":
                      $eduval = 1;
                      break;
                    case "國小生":
                      $eduval = 2;
                      break;
                    case "國中生":
                      $eduval = 3;
                      break;
                    case "高中生":
                      $eduval = 4;
                      break;
                    case "大學生":
                      $eduval = 5;
                      break;
                    case "社會人士":
                      $eduval = 6;
                      break;
                    default:
                      break;
                  }
                        for ($x=1; $x < 7; $x++) { 
                          if($x == $eduval){
                            ?>
                            <option value="<?php echo $eduval?>" selected><?php echo $out[0]?></option>
                            <?php
                          }
                         } 
                        ?>
                            <option value="1">學齡前兒童</option>
                            <option value="2">國小生</option>
                            <option value="3">國中生</option>
                            <option value="4">高中生</option>
                            <option value="5">大學生</option>
                            <option value="6">社會人士</option>
                        </select>
                    </td>
                    <td class="col-sm-6 price">
                      <select name="myPrice[]" class="form-control">
                           <option value="<?php echo $out[1]?>"><?php echo $out[1]?></option>
                        </select>
                    </td>
                    <?php
                    if($i!= 0){
                    ?>
                    <td><input type="button" class="ibtnDel btn btn-md btn-danger"  value="刪除"></td>
                    <?php
                    }
                    ?>
                </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: left;">
                        <input type="button" class="btn btn-lg btn-block " id="addrow3" value="新增" />
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
                </div>


              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">＊教學經驗</label>
                <div class="col-md-4">
                <select id="year" name="year" class="form-control">
                <?php 
                switch ($resume[0][4]) {
                  case '無經驗':
                    $yid = 1;
                    break;
                  case '一年以下':
                    $yid = 2;
                    break;
                  case '一年以上~三年以下':
                    $yid = 3;
                    break;
                  case '三年以上~五年以下':
                    $yid = 4;
                    break;
                  case '五年以上':
                    $yid = 5;
                    break;
                  default:
                    break;
                }
                for ($i=1; $i < 6; $i++) { 
                  if($i==$yid){
                  ?>
                  <option value="<?php echo $i?>" selected><?php echo $resume[0][4]?></option>
                  <?php
                  }
                }
                ?>
           <option value="1">無經驗</option>
           <option value="2">一年以下</option>
           <option value="3">一年以上~三年以下</option>
           <option value="4">三年以上~五年以下</option>
           <option value="5">五年以上</option>
        </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                  <button id="button1id" name="button1id" class="btn btn-success"  type="submit">修改</button>
                  <button id="button2id" name="button2id" class="btn btn-default" onclick="cancelForm()" type="button">取消</button>
                </div>
              </div>
 <?php
        }else{
        ?>
    <p>請先新增履歷!</p>
        <?php
        }
        ?>

            </div>

            </div>

              </fieldset>
              </form>
       

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
<script src="addresume.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    
    //json寫法
    $("#addrow1").on("click", 
    function () {
      $.getJSON("getStaticData.php?action=SubjectType",
        function(data)
        {
          var newRow = $("<tr>");
              var cols = "";
              cols += '<td class="col-sm-4"><select name="mySubject[]" class="form-control" onchange="change(this)"><option value="0">選擇類型</option>';
              for(var i=0;i<data.length;i++)
              {
                cols += '<option value="'+ (data[i].key+1) +'">'+data[i].value+'</option>';
              }
              cols += '</select></td>';
              cols += '<td  class="col-sm-4 lession"><select name="myLession[]"  class="form-control"><option value="0">選擇科目</option></select></td>';
              cols += '<td  class="col-sm-4 course"><input type="text" class="form-control" name="myCourse[]" /></td>';
              cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="刪除"></td>';
              newRow.append(cols);
              $("#myTable1").append(newRow);
        }
      );
      }
    );

    $("#addrow2").on("click", 
    function () {
      $.getJSON("getStaticData.php?action=CityType",
        function(data)
        {
          var newRow = $("<tr>");
              var cols = "";
              cols += '<td class="col-sm-4"><select name="myCity[]" class="form-control" onchange="changeCity(this)"><option value="0">選擇縣市</option>';
              for(var i=0;i<data.length;i++)
              {
                cols += '<option value="'+ (data[i].key+1) +'">'+data[i].value+'</option>';
              }
              cols += '</select></td>';
              cols += '<td class="col-sm-4 town"><select name="myTown[]"  class="form-control"><option value="0">選擇鄉鎮</option></select></td>';
              cols += '<td  class="col-sm-4 zip"><input type="text" class="form-control"  name="myZip[]" /></td>';
              cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="刪除"></td>';
              newRow.append(cols);
              $("#myTable2").append(newRow);
        }
      );
      }
    );

  $("#addrow3").on("click", 
    function () {
      $.getJSON("getStaticData.php?action=StudentType",
        function(data)
        {
          var newRow = $("<tr>");
              var cols = "";
              cols += '<td class="col-sm-5"><select name="myObject[]" class="form-control" onchange="changeObject(this)">';
              for(var i=0;i<data.length;i++)
              {
                cols += '<option value="'+data[i].value+'">'+data[i].key+'</option>';
              }
              cols += '</select></td>';
              cols += '<td  class="col-sm-6 price"><select name="myPrice[]" class="form-control"><option value="0">選擇價錢</option></select></td>';
              cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="刪除"></td>';
              newRow.append(cols);
              $("#myTable3").append(newRow);
        }
      );
      }
    );

    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
    });

});



// function calculateRow(row) {
//     var price = +row.find('input[name^="price"]').val();

// }

// function calculateGrandTotal() {
//     var grandTotal = 0;
//     $("table.order-list").find('input[name^="price"]').each(function () {
//         grandTotal += +$(this).val();
//     });
//     $("#grandtotal").text(grandTotal.toFixed(2));
// }
</script>