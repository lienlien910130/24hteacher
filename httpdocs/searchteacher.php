<?php 
@session_start();
include_once 'lib/core.php';
$pdo =DB_CONNECT();
$text_teac_s = @$_GET["text_teac_s"];
//$text_case_sid = @$_GET["text_case_sid"];
$text_teac_a = @$_GET["text_teac_a"];
//$text_case_aid = @$_GET["text_case_aid"];
$searchtext = @$_GET["searchtext"];
$other = @$_GET["other"];
$pic = getPicture();
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

    <title>搜尋老師</title>

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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
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
      <div class="wid">
          <div  class="searchcase">
      <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12">
        <div class="col-lg-12 a1  col-md-12 col-xs-12 col-sm-12">
          <h2 class="se_hr">您的老師條件</h2>
          <div class="col-lg-12  col-md-12 col-xs-12 col-sm-12" style="background-color: rgb(239,239,239);border-radius: 10px;margin-top: 20px;margin-bottom: 20px;">
          <div class="col-lg-12  hidden-sm  hidden-xs  hidden-md">
           <div class="col-lg-4  hidden-sm  hidden-xs  hidden-md">
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
           <div class="col-lg-4  hidden-sm  hidden-xs  hidden-md">
            <div id="m_l">
            <?php 
            if($text_teac_s !=""){
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myObj"><?php echo $text_teac_s?></a>
              <?php
              $sql = "SELECT * FROM subjects WHERE val='".$text_teac_s."'";
              $rs = $pdo ->query($sql);
              $st = "";
              $x=1;
              foreach ($rs as $key => $row) {
                $sql1 = "SELECT * FROM lessions WHERE sid='".$row["id"]."'";
                $rs1 = $pdo ->query($sql1);
                foreach ($rs1 as $key => $row1) {
                  if($x == 1){
                    $st .= $row1["id"];
                    $x++;
                  }else{
                    $st .= ",".$row1["id"];
                    $x++;
                  }
                }
                ?>
                <input type="text" name="subject" id="subject" value="<?php echo $st?>" style="display: none;">
                <?php
              }
            }else{
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myObj">科目類別</a>
              <input type="text" name="subject" id="subject" value="-1" style="display: none;">
              <?php
            }
            ?>
            </div>
           </div>
           <div class="col-lg-4  hidden-sm  hidden-xs  hidden-md">
            <div id="m_a">
            <?php 
            if($text_teac_a !=""){
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myArea"><?php echo $text_teac_a?></a>
              <?php 
               $sql = "SELECT * FROM city WHERE cityvalue='".$text_teac_a."'";
              $rs = $pdo ->query($sql);
              $sta = "";
              $y=1;
              foreach ($rs as $key => $row) {
                $sql1 = "SELECT * FROM area WHERE cid='".$row["id"]."'";
                $rs1 = $pdo ->query($sql1);
                foreach ($rs1 as $key => $row1) {
                  if($y == 1){
                    $sta .= $row1["id"];
                    $y++;
                  }else{
                    $sta .= ",".$row1["id"];
                    $y++;
                  }
                }
                ?>
                 <input type="text" name="area" id="area" value="<?php echo $sta?>" style="display: none;">
                <?php
              }
            }else{
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myArea">上課區域</a>
              <input type="text" name="area" id="area" value="-1" style="display: none;">
               <?php
            }
            ?>
             </div>
           </div>
          </div>
          <div class="col-lg-12  hidden-sm  hidden-xs  hidden-md">
           <div class="col-lg-4  hidden-sm  hidden-xs  hidden-md">
            <select class="form-control form-select ajax-processed" id="experience" name="experience">
              <option value="-1" selected="selected">教學經驗</option>
              <option value="1">無經驗</option>
              <option value="2">一年以下</option>
              <option value="3">一~三年</option>
              <option value="4">三~五年</option>
              <option value="5">五年以上</option>
            </select>
           </div>
           <div class="col-lg-4  hidden-sm  hidden-xs  hidden-md">
            <select class="form-control form-select ajax-processed" id="salary" name="salary">
              <option value="-1" selected="selected">時薪範圍</option>
              <option value="1">NT200以下</option>
              <option value="2">NT201~NT500</option>
              <option value="3">NT501~NT800</option>
              <option value="4">NT801~NT1000</option>
              <option value="5">NT1001以上</option>
            </select>
           </div>
           <div class="col-lg-4  hidden-sm  hidden-xs  hidden-md">
            <select class="form-control form-select ajax-processed" id="other" name="other">
            <?php 
            if($other == 3){
              ?>
              <option value="-1">其它</option>
              <option value="1">願意試教</option>
              <option value="2">自備教材</option>
              <option value="3" selected="selected">購買筆記</option>
              <option value="4">提供教學影片</option>
              <?php
            }else{
          ?>
              <option value="-1" selected="selected">其它</option>
              <option value="1">願意試教</option>
              <option value="2">自備教材</option>
              <option value="3">購買筆記</option>
              <option value="4">提供教學影片</option>
          <?php
          }
          ?> 
            </select>
            </div>
          </div>
         <!--   <div class="col-lg-4  col-xs-6 col-md-4 col-sm-6">
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
           <div class="col-lg-4  col-xs-6 col-md-4 col-sm-6">
            <div id="m_l">
            <?php 
            if($text_teac_s !=""){
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myObj"><?php echo $text_teac_s?></a>
              <?php
              $sql = "SELECT * FROM subjects WHERE val='".$text_teac_s."'";
              $rs = $pdo ->query($sql);
              $st = "";
              $x=1;
              foreach ($rs as $key => $row) {
                $sql1 = "SELECT * FROM lessions WHERE sid='".$row["id"]."'";
                $rs1 = $pdo ->query($sql1);
                foreach ($rs1 as $key => $row1) {
                  if($x == 1){
                    $st .= $row1["id"];
                    $x++;
                  }else{
                    $st .= ",".$row1["id"];
                    $x++;
                  }
                }
                ?>
                <input type="text" name="subject" id="subject" value="<?php echo $st?>" style="display: none;">
                <?php
              }
            }else{
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myObj">科目類別</a>
              <input type="text" name="subject" id="subject" value="-1" style="display: none;">
              <?php
            }
            ?>
            </div>
           </div>
           <div class="col-lg-4  col-xs-6 col-md-4 col-sm-6">
            <div id="m_a">
            <?php 
            if($text_teac_a !=""){
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myArea"><?php echo $text_teac_a?></a>
              <?php 
               $sql = "SELECT * FROM city WHERE cityvalue='".$text_teac_a."'";
              $rs = $pdo ->query($sql);
              $sta = "";
              $y=1;
              foreach ($rs as $key => $row) {
                $sql1 = "SELECT * FROM area WHERE cid='".$row["id"]."'";
                $rs1 = $pdo ->query($sql1);
                foreach ($rs1 as $key => $row1) {
                  if($y == 1){
                    $sta .= $row1["id"];
                    $y++;
                  }else{
                    $sta .= ",".$row1["id"];
                    $y++;
                  }
                }
                ?>
                 <input type="text" name="area" id="area" value="<?php echo $sta?>" style="display: none;">
                <?php
              }
            }else{
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myArea">上課區域</a>
              <input type="text" name="area" id="area" value="-1" style="display: none;">
               <?php
            }
            ?>
             </div>
           </div>
           <div class="col-lg-4  col-xs-6 col-md-4 col-sm-6">
            <select class="form-control form-select ajax-processed" id="experience" name="experience">
              <option value="-1" selected="selected">教學經驗</option>
              <option value="1">無經驗</option>
              <option value="2">一年以下</option>
              <option value="3">一年以上~三年以下</option>
              <option value="4">三年以上~五年以下</option>
              <option value="5">五年以上</option>
            </select>
           </div>
           <div class="col-lg-4  col-xs-6 col-md-4 col-sm-6">
            <select class="form-control form-select ajax-processed" id="salary" name="salary">
              <option value="-1" selected="selected">時薪範圍</option>
              <option value="1">NT200以下</option>
              <option value="2">NT201~NT500</option>
              <option value="3">NT501~NT800</option>
              <option value="4">NT801~NT1000</option>
              <option value="5">NT1001以上</option>
            </select>
           </div>
           <div class="col-lg-4 col-xs-6 col-md-4 col-sm-6">
            <select class="form-control form-select ajax-processed" id="other" name="other">
            <?php 
            if($other == 1){
              ?>
              <option value="-1">其它</option>
              <option value="1">願意試教</option>
              <option value="2">自備函授</option>
              <option value="3" selected="selected">購買筆記</option>
              <option value="4">提供教學影片</option>
              <?php
               }else{
              ?>
              <option value="-1" selected="selected">其它</option>
              <option value="1">願意試教</option>
              <option value="2">自備函授</option>
              <option value="3">購買筆記</option>
              <option value="4">提供教學影片</option>
              <?php
              }
              ?> 
            </select>
           </div> -->
          <div class="col-md-12 col-xs-12 col-sm-12 hidden-lg">
            <div class="col-md-6 col-xs-6 col-sm-6 hidden-lg" style="padding: 10px 5px 0 10px;">
              <select class="form-control form-select ajax-processed" id="object1" name="object1">
              <option value="-1" selected="selected">對象</option>
              <option value="1">學齡前兒童</option>
              <option value="2">國小生</option>
              <option value="3">國中生</option>
              <option value="4">高中生</option>
              <option value="5">大學生</option>
              <option value="6">社會人士</option>
            </select>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6 hidden-lg" style="padding: 10px 10px 0 5px;">
              <div id="m_lxs">
            <?php 
            if($text_teac_s !=""){
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myObj"><?php echo $text_teac_s?></a>
              <?php
              $sql = "SELECT * FROM subjects WHERE val='".$text_teac_s."'";
              $rs = $pdo ->query($sql);
              $st = "";
              $x=1;
              foreach ($rs as $key => $row) {
                $sql1 = "SELECT * FROM lessions WHERE sid='".$row["id"]."'";
                $rs1 = $pdo ->query($sql1);
                foreach ($rs1 as $key => $row1) {
                  if($x == 1){
                    $st .= $row1["id"];
                    $x++;
                  }else{
                    $st .= ",".$row1["id"];
                    $x++;
                  }
                }
                ?>
                <input type="text" name="subject" id="subject" value="<?php echo $st?>" style="display: none;">
                <?php
              }
            }else{
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myObj">科目類別</a>
              <input type="text" name="subject" id="subject" value="-1" style="display: none;">
              <?php
            }
            ?>
            </div>

            </div>
          </div>
          <div class="col-md-12 col-xs-12 col-sm-12 hidden-lg">
            <div class="col-md-6 col-xs-6 col-sm-6 hidden-lg" style="padding: 0px 5px 0 10px;">
              <div id="m_axs">
            <?php 
            if($text_teac_a !=""){
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myArea"><?php echo $text_teac_a?></a>
              <?php 
               $sql = "SELECT * FROM city WHERE cityvalue='".$text_teac_a."'";
              $rs = $pdo ->query($sql);
              $sta = "";
              $y=1;
              foreach ($rs as $key => $row) {
                $sql1 = "SELECT * FROM area WHERE cid='".$row["id"]."'";
                $rs1 = $pdo ->query($sql1);
                foreach ($rs1 as $key => $row1) {
                  if($y == 1){
                    $sta .= $row1["id"];
                    $y++;
                  }else{
                    $sta .= ",".$row1["id"];
                    $y++;
                  }
                }
                ?>
                 <input type="text" name="area" id="area" value="<?php echo $sta?>" style="display: none;">
                <?php
              }
            }else{
              ?>
              <a class="form-control form-select ajax-processed o" data-toggle="modal" href="#myArea">上課區域</a>
              <input type="text" name="area" id="area" value="-1" style="display: none;">
               <?php
            }
            ?>
             </div>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6 hidden-lg" style="padding: 0px 10px 0 5px;">
              <select class="form-control form-select ajax-processed" id="experience1" name="experience1">
              <option value="-1" selected="selected">教學經驗</option>
              <option value="1">無經驗</option>
              <option value="2">一年以下</option>
              <option value="3">一~三年</option>
              <option value="4">三~五年</option>
              <option value="5">五年以上</option>
            </select>
            </div>
          </div>
          <div class="col-md-12 col-xs-12 col-sm-12 hidden-lg">
            <div class="col-md-6 col-xs-6 col-sm-6 hidden-lg" style="padding: 0px 5px 0 10px;">
              <select class="form-control form-select ajax-processed" id="salary1" name="salary1">
              <option value="-1" selected="selected">時薪範圍</option>
              <option value="1">NT200以下</option>
              <option value="2">NT201~NT500</option>
              <option value="3">NT501~NT800</option>
              <option value="4">NT801~NT1000</option>
              <option value="5">NT1001以上</option>
            </select>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6 hidden-lg" style="padding: 0px 10px 0 5px;">
               <select class="form-control form-select ajax-processed" id="other1" name="other1">
            <?php 
            if($other == 1){
              ?>
              <option value="-1">其它</option>
              <option value="1">願意試教</option>
              <option value="2">自備函授</option>
              <option value="3" selected="selected">購買筆記</option>
              <option value="4">提供教學影片</option>
              <?php
            }else{
              ?>
              <option value="-1" selected="selected">其它</option>
              <option value="1">願意試教</option>
              <option value="2">自備函授</option>
              <option value="3">購買筆記</option>
              <option value="4">提供教學影片</option>
            <?php
            }
            ?>
            </select>
            </div>
          </div>
          <div id="m_t">
            <?php include_once 'modal_2.php';?>
          </div>
          <div id="m_o"></div>
          <div id="m_b">
            <?php include_once 'modal_3.php';?>
          </div>
          <div id="m_c"></div>
          <div id="m_d">
            <?php include_once 'modal_5.php';?>
          </div>
          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="text-align: center;">
      <!--     <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6"> -->
            <button id="button3id" name="button3id" class="btn bu qq" type="button" onclick="cancelte()" style="bottom: 0px;border-radius: 10px;color: white;">重新設定</button>
           <!--  </div> -->
          <!--   <div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">  -->
            <button id="button3id" name="button3id" class="btn bu" type="button" onclick="search_teacher()" style="bottom: 0px;border-radius: 10px;color: white;">送出條件</button>
            <!-- </div> -->
          </div>
          </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
          <div id="sec_change">
           <?php include_once 'ta_table.php';?>
          </div>
        </div>
      </div>
      <div class="col-lg-4  col-md-12 col-xs-12 col-sm-12">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 img-responsive">
             <h2 class="se_hr">最新老師</h2>
                <img src="<?php echo $pic[13]?>" class="img-responsive" style="">
              </div>
              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                 <?php
               $sql = "SELECT * FROM resume ORDER BY id ASC LIMIT 5";
               $rs = $pdo->query($sql);
            ?> 
        <table  style="width: 100%;padding-top: 20px;padding-bottom: 20px;text-align: center;">
        <?php 
           $r = getResumes();
           foreach ($rs as $key => $row) {
           $sub = gettsub($row["id"]);
           $loc = gettloc($row["id"]);
           $obj = gettobj($row["id"]);
         ?> 
            <tr style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid white">
               <td class="trr" style="padding-top: 20px;padding-bottom: 20px;"><a href="seteacher.php?id=<?php echo $row["id"]?>">

               <?php 
                echo "科：";
                $out1 = explode(",", $sub[$row["id"]][0]);
                echo $out1[0]." | ";
                echo "地：";
                $out2 = explode(",", $loc[$row["id"]][0]);
                echo $out2[0]." |";
                echo "對象：";
                $out = explode(",", $obj[$row["id"]][0]);
                echo $out[0];
                
                ?>
               </a>
               </td>
            </tr>
         <?php 
            }
         ?> 
         </table>
            </div>
           <!--  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="text-align: center;">
              <button id="button3id" name="button3id" class="btn bi" type="button" onclick="" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;">查看更多</button>
            </div> -->
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
function cha($page,$order,$sort,$obj,$sub,$area,$exper,$sala,$other,$textnu) {
  // $.post("ca_table.php?page="+$page+"&&order="+$order+"&&sort="+$sort+"&&obj="+$obj+"&&sub="+$sub+"&&area="+$area+"&&exper="+$exper+"&&sala="+$sala+"&&timess="+$timess,function(data)
  // {
  //     $("#sec_change").html(data);
  // });
  $.ajax({
      type:'POST',
      url :'ta_table.php',
      data:"obj="+$obj+"&sub="+$sub+"&area="+$area+"&exper="+$exper+"&sala="+$sala+"&other="+$other+"&page="+$page+"&order="+$order+"&sort="+$sort+"&textnu="+$textnu,
      dataType:'html', 
      success : function(data){
        $("#sec_change").html(data);
      }
  });

}
function chaa($order,$sort,$obj,$sub,$area,$exper,$sala,$other,$textnu) {
  // $.post("ca_table.php?order="+$order+"&&sort="+$sort+"&&obj="+$obj+"&&sub="+$sub+"&&area="+$area+"&&exper="+$exper+"&&sala="+$sala+"&&timess="+$timess,function(data)
  // {
  //     $("#sec_change").html(data);
  // });
   $.ajax({
      type:'POST',
      url :'ta_table.php',
      data:"obj="+$obj+"&sub="+$sub+"&area="+$area+"&exper="+$exper+"&sala="+$sala+"&other="+$other+"&order="+$order+"&sort="+$sort+"&textnu="+$textnu,
      dataType:'html', 
      success : function(data){
        $("#sec_change").html(data);
      }
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
function cancelte() {
  location.href="searchteacher.php";
}

function search_teacher(){
    var obj = $('#object').val();
    if(obj == -1){
      obj = $('#object1').val();
    }
    var sub = $('#subject').val();
    var area = $('#area').val();
    var exper = $('#experience').val();
    if(exper == -1){
      exper = $('#experience1').val();
    }
    var sala = $('#salary').val();
    if(sala == -1){
      sala = $('#salary1').val();
    }
    var other = $('#other').val();
    if(other == -1){
      other = $('#other1').val();
    }
   // alert(obj+"/"+sub+"/"+area+"/"+exper+"/"+sala+"/"+other);
    if(obj == -1 && sub == -1 && area == -1 && exper == -1 && sala == -1 
      && other == -1 ){
      //alert("請選擇條件");
      alert(obj+"/"+sub+"/"+area+"/"+exper+"/"+sala+"/"+other);
       $.ajax({
          type:'POST',
          url :'ta_table.php',
          data:"obj="+obj+"&sub="+sub+"&area="+area+"&exper="+exper+"&sala="+sala+"&other="+other,
          dataType:'html', 
          success : function(data){
            $("#sec_change").html(data);
          }
      }); 
    }else{
    //  alert(obj+"/"+sub+"/"+area+"/"+exper+"/"+sala+"/"+other);
      $.ajax({
      type:'POST',
      url :'ta_table.php',
      data:"obj="+obj+"&sub="+sub+"&area="+area+"&exper="+exper+"&sala="+sala+"&other="+other,
      dataType:'html', 
      success : function(data){
        $("#sec_change").html(data);
      }
    }); 
    }
   
}
</script>
