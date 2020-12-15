<?php 
@session_start();
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

    <title>Tutor</title>

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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.theme.default.min.css"></link>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.7/dist/js/bootstrap.js"></script>
  </head>

  <body>
 <div id="wrapper">
    <div id="header">
      <?php include_once 'n1.php';?>
    </div>
    <div id="content">
    <div class="container">
    <div  class="searchcase">
      <div class="col-lg-8">
        <div class="col-lg-12 a1">
          <h2 class="se_hr">您的查詢條件</h2>
          <div class="col-lg-12" style="background-color: rgb(239,239,239);border-radius: 10px;margin-top: 20px;margin-bottom: 20px;">
          <div class="col-lg-4">
            <select class="form-control form-select ajax-processed" id="object" name="object">
              <option value="-1" selected="selected">對象</option>
              <option value="1">學齡前兒童</option>
              <option value="2">國小生</option>
              <option value="3">國中生</option>
              <option value="4">高中生</option>
              <option value="5">大學生</option>
              <option value="6">社會人士</option>
            </select>
          </div>
          <div class="col-lg-4">
            <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myObj">科目類別</a>

            <!-- <select class="" id="object" name="object" data-toggle="modal" href="#myModal"> -->

            <!--   <?php 
                        @session_start();
                        include_once 'lib/core.php';
                        $sql = "SELECT  * FROM subjects";
                        $pdo = DB_CONNECT();
                        $rs = $pdo ->query($sql);
                        foreach ($rs as $key => $row) {
                        ?>
                          <option value="<?php echo $row["id"]?>"><?php echo $row["val"]?></option>
                            <?php
                        }
                        ?> -->
                        
            <!-- </select> -->
          </div>
          <div id="m_t">
           <?php include_once 'modal_2.php';?>
           </div>
          <div class="col-lg-4">
          <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myArea">上課區域</a>
          <!--   <select class="form-control form-select ajax-processed" id="object" name="object">
              <option value="-1" selected="selected">上課區域</option> -->
               <!-- <?php 
                        @session_start();
                        include_once 'lib/core.php';
                        $sql = "SELECT  * FROM city";
                        $pdo = DB_CONNECT();
                        $rs = $pdo ->query($sql);
                        foreach ($rs as $key => $row) {
                        ?>
                        <option value="<?php echo $row["id"]?>"><?php echo $row["cityvalue"]?></option>
                        <?php
                        }
                        ?> -->
            <!-- </select> -->
          </div>
          <div id="m_o">
        
         </div>
          <div class="col-lg-4">
            <select class="form-control form-select ajax-processed" id="object" name="object">
              <option value="-1" selected="selected">教學經驗</option>
              <option value="1">學齡前兒童</option>
              <option value="2">國小生</option>
              <option value="3">國中生</option>
              <option value="4">高中生</option>
              <option value="5">大學生</option>
              <option value="6">社會人士</option>
            </select>
          </div>
          <div class="col-lg-4">
            <select class="form-control form-select ajax-processed" id="object" name="object">
              <option value="-1" selected="selected">時薪範圍</option>
              <option value="1">學齡前兒童</option>
              <option value="2">國小生</option>
              <option value="3">國中生</option>
              <option value="4">高中生</option>
              <option value="5">大學生</option>
              <option value="6">社會人士</option>
            </select>
          </div>
          <div class="col-lg-4">
            <select class="form-control form-select ajax-processed" id="object" name="object">
              <option value="-1" selected="selected">其他</option>
              <option value="1">願意試教</option>
              <option value="2">自備函授</option>
              <option value="3">提供教學影片</option>
              <option value="4">提供販售筆記</option>
              <option value="5">以上皆有</option>
            </select>
          </div>
          <div class="col-lg-12" style="text-align: center;">
            <button id="button3id" name="button3id" class="btn bu" type="button" onclick="" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;">重新設定</button> 
            <button id="button3id" name="button3id" class="btn bu" type="button" onclick="" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;">送出條件</button>
          </div>

          </div>
        </div>
        <div class="col-lg-12">
          <div id="sec_change">
           <?php include_once 'ca_table.php';?>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="col-lg-12">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 img-responsive">
            <h2 class="se_hr" style="">推薦案件</h2>
            <img src="img/i6.jpg" class="img-responsive" style="width:100%;height: 300px;">
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
           <?php
               $sql = "SELECT * FROM city ORDER BY id ASC LIMIT 5";
               $rs = $pdo->query($sql);
            ?> 
        <table  style="width: 100%;padding-top: 20px;padding-bottom: 20px;text-align: center;">
        <?php 
           foreach ($rs as $key => $row) {
         ?> 
            <tr style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid white">
               <td class="trr" style="padding-top: 20px;padding-bottom: 20px;font-size: 18px"><a href="#"><?php echo "科：中文 | 地：台北市 |  薪：800-1000" ?></a></td>
            </tr>
         <?php 
            }
         ?> 
         </table>
            </div>
            <div class="col-lg-12" style="text-align: center;">
              <button id="button3id" name="button3id" class="btn bi" type="button" onclick="" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;">查看更多</button>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 img-responsive">
             <h2 class="se_hr">最新案件</h2>
                <img src="img/i6.jpg" class="img-responsive" style="width: 100%;height: 300px;">
              </div>
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                 <?php
               $sql = "SELECT * FROM city ORDER BY id ASC LIMIT 5";
               $rs = $pdo->query($sql);
            ?> 
        <table  style="width: 100%;padding-top: 20px;padding-bottom: 20px;text-align: center;">
        <?php 
           foreach ($rs as $key => $row) {
         ?> 
            <tr style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid white">
               <td class="trr" style="padding-top: 20px;padding-bottom: 20px;font-size: 18px"><a href="#"><?php echo "科：中文 | 地：台北市 |  薪：800-1000" ?></a></td>
            </tr>
         <?php 
            }
         ?> 
         </table>
            </div>
            <div class="col-lg-12" style="text-align: center;">
              <button id="button3id" name="button3id" class="btn bi" type="button" onclick="" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;">查看更多</button>
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
function cha($page) {
     $.get("ca_table.php?page="+$page,function(data)
    {
        $("#sec_change").html(data);
    });
  }
function c($id) {
     $.get("modal_1.php?id="+$id,function(data)
    {
        $("#m_o").html(data);
         $("#myArea").modal("show");
    });
}
function ca($id) {
     $.get("modal_1.php?id="+$id,function(data)
    {
         $("#m_o").html(data);
         $("#myArea").modal("show");
    });

}

</script>
