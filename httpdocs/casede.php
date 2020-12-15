<?php 
@session_start();
include_once 'lib/core.php';
$id = @$_GET["id"];
$uid = $_SESSION["id"];
$cases = getCases($uid);
$student = getStudent($id);
$course = getCourse($id);
$time = getTime($id);
?>

<form class="form-horizontal" style="margin:30px 0px 20px 0px" name="caseForm" id="caseForm" action="" method="POST" accept-charset="UTF-8">
         <fieldset>
          <h3 style="border-bottom: 1px solid #e5e5e5;text-align: left;">案件資料</h3>
          <?php 
          $sql = "SELECT * FROM cases WHERE id = ".$id;
          $pdo = DB_CONNECT();
          $rs =$pdo->query($sql);
          foreach ($rs as $key => $row) {
          ?>
          <div class="form-group">
                <label class="col-md-4 control-label">＊案件編號</label>
                <div class="col-md-8" style="text-align: left;">
                <?php echo $row["numbers"]?>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊聯絡人</label>
                <div class="col-md-8" style="text-align: left;">
                <?php echo $row["name"]?>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊刊登日期</label>
                <div class="col-md-8" style="text-align: left;">
                <?php echo $row["addtime"]?>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊修改日期</label>
                <div class="col-md-8" style="text-align: left;">
                <?php echo $row["lastedit"]?>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊應徵人數</label>
                <div class="col-md-8" style="text-align: left;">
                <?php echo $row["applicants"]?>
                </div>
          </div>
       
          <h3 style="border-bottom: 1px solid #e5e5e5;text-align: left;">上課內容</h3>
          
          <div class="form-group">
                <label class="col-md-4 control-label">＊學生資料</label>
                <div class="col-md-8" style="text-align: left;">
                <?php 
                for ($i=0; $i < count($student[$id]) ; $i++) { 
                  echo $student[$id][$i]."<br>";
                }?>
                </div>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label">＊學生身分</label>
                <div class="col-md-8" style="text-align: left;">
                <?php 
                  echo $cases[$id][20];
                ?>
                </div>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label">＊上課人數</label>
                <div class="col-md-8" style="text-align: left;">
                <span style="text-align: left;">
                 <?php echo count($cases[$id][1])?>
                </span>
                </div>
                
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊上課科目</label>
                <div class="col-md-8" style="text-align: left;">
                <?php 
                for ($i=0; $i < count($course[$id]) ; $i++) { 
                  echo $course[$id][$i]."<br>";
                }?>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊上課地點</label>
                <div class="col-md-8"  style="text-align: left;">
                <span>
                <?php echo $cases[$id][19]?>
                </span>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label"></label>
               <div class="col-md-8"  style="text-align: left;">
                <span>
                可在 : <?php echo $cases[$id][7]?>
                </span>
                </div>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-8"  style="text-align: left;">
                <span>
                附近地標 : <?php echo $cases[$id][18]?>
                </span>
                </div>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label">＊薪資待遇</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][15]."~".$cases[$id][16]."元/小時"?>
                </span>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊上課時間</label>
                <div class="col-md-8" style="text-align: left;">
                <?php 
                for ($i=0; $i < count($time[$id]) ; $i++) { 
                  $out = explode(",",$time[$id][$i]);
                  echo $out[0].",".$out[1]."~".$out[2]."<br>";
                }?>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊上課期限</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][8]?>
                </span>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊希望開始日期</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][10]?>
                </span>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊上課目的</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][3]?>
                </span>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊上課方式</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][5]?>
                </span>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊程度說明</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][2]?>
                </span>
                </div>
          </div>
          <h3 style="border-bottom: 1px solid #e5e5e5;text-align: left;">老師條件</h3>
          <div class="form-group">
                <label class="col-md-4 control-label">＊教學經驗</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][11]?>
                </span>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊身分限制</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][12]?>
                </span>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊希望學校</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][13]?>
                </span>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊希望科系</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][14]?>
                </span>
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊其他條件說明</label>
                <div class="col-md-8" style="text-align: left;">
                <span>
                <?php echo $cases[$id][17]?>
                </span>
                </div>
          </div>
           <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                  <button id="button1id" name="button1id" class="btn btn-success" onclick="editcase(<?php echo $id?>)" type="button">修改</button>
                  <button id="button2id" name="button2id" class="btn btn-default" onclick="cancelForm(<?php echo $id?>)" type="button">刪除</button>
                  <button id="button2id" name="button2id" class="btn btn-default" onclick="cancelsForm()" type="button">取消</button>
                  <?php
                  if($row["status"]==0){
                    ?>
                    <button id="button3id" name="button3id" class="btn btn-default" onclick="changeForm(<?php echo $id?>,1)" type="button">關閉</button>
                    <?php
                  }else{
                  ?>
                   <button id="button3id" name="button3id" class="btn btn-default" onclick="changeForm(<?php echo $id?>,0)" type="button">開啟</button>
                  <?php
                  }
                  ?>
                  

                </div>
              </div>
             <?php } ?>
        </fieldset>
        </form>
