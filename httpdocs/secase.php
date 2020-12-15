<?php 
@session_start();
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = @$_GET["id"];

if(!isset($_SESSION['id']) || empty($_SESSION['id']) ){
  $uid = 0;
}else{
  $uid = $_SESSION["id"];
}
$c = getCase();
$pic = getPicture();
$time = getTime($id);
$sql = "SELECT * FROM cases WHERE id = ".$id;
$pdo = DB_CONNECT();
$rs =$pdo->query($sql);
if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
     $xx=$row["uid"];
     $yy=$row["numbers"];
     $acc = getProfile($xx);
}else{
  header("Location:error.php");
}
$sql = "SELECT * FROM resume WHERE uid = ".$uid;
$pdo = DB_CONNECT();
$rs =$pdo->query($sql);
foreach ($rs as $key => $row) {
   $reid=$row["id"];
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

    <title><?php echo "案件 ".$yy?></title>

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
          <div class="wid">
          <div class="secases">
            <div class="col-lg-8 col-xs-12 col-sm-12 col-md-12">
              <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <h2 class="se_hr" style="">案件資料</h2>
              </div>
              <?php 
                $sql = "SELECT * FROM cases WHERE id = ".$id;
                $pdo = DB_CONNECT();
                $rs =$pdo->query($sql);
                foreach ($rs as $key => $row) {
              ?>
              <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-6 c6 col-xs-12 col-sm-12 col-md-12">
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>案件編號</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $row["numbers"]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>聯絡人</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php 
                      if($acc[2] == "女"){
                        echo mb_substr($row["name"],0,1,"utf-8")."小姐";
                      }else{
                        echo mb_substr($row["name"],0,1,"utf-8")."先生";
                      }

                      ?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>刊登日期</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php 
                      $out = explode(" ", $row["addtime"]);
                      echo $out[0];?></h4>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 c61 col-xs-12 col-sm-12 col-md-12">
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>應徵人數</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $row["applicants"]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>修改日期</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php 
                      $out1 = explode(" ", $row["lastedit"]);
                      echo $out1[0];?></h4>
                    </div>
                  </div>
                </div>
              </div>
              <?php  } ?>
              <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <h2 class="se_hr" style="">上課內容</h2>
              </div>
              <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-6 c6 col-xs-12 col-sm-12 col-md-12">
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4  col-xs-4 col-sm-4 col-md-4">
                      <h4>學生資料</h4>
                    </div>
                    <div class="col-lg-8  col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][1].",".$c[$id][21].",".$c[$id][22]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12  col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>學生身份</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][20]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>上課科目</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][4]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>上課地點</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][19]?></h4>
                    </div>
                    <div class="col-lg-4 c4 c4 col-xs-4 col-sm-4 col-md-4">
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo "可在：".$c[$id][7]?></h4>
                    </div>
                    <div class="col-lg-4 c4 c4 col-xs-4 col-sm-4 col-md-4">
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo "附近地標：".$c[$id][18]?></h4>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 c61 col-xs-12 col-sm-12 col-md-12">
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>薪資待遇</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4>$<?php echo $c[$id][15]."-$".$c[$id][16]."/小時"?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>上課時間</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php 
                        for ($i=0; $i < count($time[$id]) ; $i++) { 
                          $out = explode(",",$time[$id][$i]);
                          echo $out[0].",".$out[1]."~".$out[2]."<br>";
                        }?>
                      </h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>上課期限</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][8]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>開始時間</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][10]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>上課目的</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][3]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>上課方式</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][5]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>程度說明</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8" style="word-break: break-all;">
                      <h4><?php 
					 echo str_replace("\n","<br>",$c[$id][2]);?></h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <h2 class="se_hr" style="">老師條件</h2>
              </div>
              <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <div class="col-lg-6 c6 col-xs-12 col-sm-12 col-md-12">
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>教學經驗</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][11]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>身份限制</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][12]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>希望學校</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][13]?></h4>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 c61 col-xs-12 col-sm-12 col-md-12">
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>希望科系</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8">
                      <h4><?php echo $c[$id][14]?></h4>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                    <div class="col-lg-4 c4 col-xs-4 col-sm-4 col-md-4">
                      <h4>其它條件</h4>
                    </div>
                    <div class="col-lg-8 col-xs-8 col-sm-8 col-md-8"  style="word-break: break-all;">
                      <h4><?php 
				echo str_replace("\n","<br>",$c[$id][17]);
					?>
						
						</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 c12b col-xs-12 col-sm-12 col-md-12" style="text-align: center;">
                <?php 
                if($uid == $xx){
                  ?>
                  <button id="button1id" name="button1id" class="btn bu" type="button" style="padding: 10px;width: 30%;" disabled="disabled">加入收藏</button>
                  <button id="button1id" name="button1id" class="btn bu"  type="button" style="padding: 10px;width: 30%;" disabled="disabled">主動應徵</button>
                  <?php 
                }else{
                  ?>
                  <input type="" name="resumeuid" id="resumeuid" style="display: none;" value="<?php echo $uid?>">
                  <input type="" name="resumeid" id="resumeid" style="display: none;" value="<?php echo $reid?>">
                  <input type="" name="caseuid" id="caseuid" style="display: none;" value="<?php echo $xx?>">
                  <input type="" name="caseid" id="caseid" style="display: none;" value="<?php echo $id?>">
                  <button id="button1id" name="button1id" class="btn bu" onclick="addfavoritecase(<?php echo $id?>,<?php echo $uid?>,1)" type="button" style="padding: 10px;width: 30%;">加入收藏</button>
                  <button id="button1id" name="button1id" class="btn bu" onclick="app(<?php echo $uid?>)" type="button" style="padding: 10px;width: 30%;">主動應徵</button>
                  <?php
                }
                ?>
                
              </div>
            </div>
          <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
           <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 img-responsive">
            <h2 class="se_hr" style="">推薦案件</h2>
            <img src="<?php echo $pic[11]?>" class="img-responsive" style="width:100%;height: 300px;">
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
           <?php
               $sql = "SELECT c.id as cid , cl.val as val FROM cases c LEFT JOIN  case_list cl on c.id = cl.cid WHERE cl.caid = 16 ORDER BY val LIMIT 5";
               $rs = $pdo->query($sql);
            ?> 
        <table  style="width: 100%;padding-top: 20px;padding-bottom: 20px;text-align: center;">
        <?php 
        $c = getCase();
           foreach ($rs as $key => $row) {
         ?> 
            <tr style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid white">
              <td class="trr" style="padding-top: 20px;padding-bottom: 20px;"><a href="secase.php?id=<?php echo $row["cid"]?>" target="_blank">
               <?php echo "科：".substr($c[$row["cid"]][4], 0,6)." | 地：".substr($c[$row["cid"]][19], 0,9)." | 薪：".$c[$row["cid"]][15]."-".$c[$row["cid"]][16]?>
               </a>
              </td>
            </tr>
         <?php 
            }
         ?> 
         </table>
            </div>
          <!--   <div class="col-lg-12" style="text-align: center;">
              <button id="button3id" name="button3id" class="btn bi" type="button" onclick="" style="bottom: 0px;border-radius: 10px;color: white;padding: 15px;">查看更多</button>
            </div> -->
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 img-responsive">
             <h2 class="se_hr">最新案件</h2>
                <img src="<?php echo $pic[12]?>" class="img-responsive" style="width: 100%;height: 300px;">
              </div>
               <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                 <?php
               $sql = "SELECT * FROM cases ORDER BY id ASC LIMIT 5";
               $rs = $pdo->query($sql);
            ?> 
        <table  style="width: 100%;padding-top: 20px;padding-bottom: 20px;text-align: center;">
        <?php 
        
           foreach ($rs as $key => $row) {
         ?> 
            <tr style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid white">
               <td class="trr" style="padding-top: 20px;padding-bottom: 20px;"><a href="secase.php?id=<?php echo $row["id"]?>" class="newcase" target="_blank"><?php echo "科：".substr($c[$row["id"]][4], 0,6)." | 地：".substr($c[$row["id"]][19], 0,9)." | 薪：".$c[$row["id"]][15]."-".$c[$row["id"]][16]?></a>
               </td>
            </tr>
         <?php 
            }
         ?> 
         </table>
            </div>
            <!-- <div class="col-lg-12" style="text-align: center;">
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
function addfavoritecase($id,$uid,$types) {
  if ($uid == 0 ) {
    alert("請先登入");
  }
  else{
    $.ajax({
            type: "POST",
            url: 'addfavoritecaseProc.php',
            cache: false,
            data:"&id="+$id+"&uid="+$uid+"&types="+$types,
            dataType:'json', 
            error: function(){
                alert('已經在我的最愛裡面!');
            },
            success: function(data,textStatus, jqXHR){
                if (data.status == "1") {
                    alert('加入成功!請至會員中心查看!');
                }else{
                    alert('已在我的最愛裡面!請至會員中心查看!');
                }
            }
        });
  }
}

function app($uid) {
    var reid = $("#resumeuid").val();
    var rid = $("#resumeid").val();
    var cid = $("#caseid").val();
    var caid = $("#caseuid").val();
    if($uid==0){
      alert("請先登入");
    }else{
      $.ajax({
            type: "POST",
            url: 'addapplicant.php',
            cache: false,
            data:"reid="+reid+"&rid="+rid+"&cid="+cid+"&caid="+caid,
            dataType:'json', 
            error: function(){
                alert('1');
            },
            success: function(data,textStatus, jqXHR){
              if (data.status == "1") {
                    alert('系統已幫您通知!請靜待回覆，謝謝');
                }else{
                    alert('已應徵過，若尚無回覆請靜待通知，謝謝。');
                }
            }
        });
    }
   
}
</script>