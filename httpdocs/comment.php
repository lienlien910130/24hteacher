<?php 
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = $_GET["id"];
$sql = "SELECT * FROM interview WHERE id =".$id;
$rs = $pdo ->query($sql);
?>
<form class="form-horizontal" style="margin:30px 0px 20px 0px" name="commentForm" id="commentForm" action="commentProc.php" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
              <fieldset>
              <?php 
              foreach ($rs as $key => $row) {
                $resume = getResumes();
                $account = getProfile($row["reid"]);
              ?>

              <input id="inid" name="inid" type="text"  class="form-control input-md" placeholder="" value="<?php echo $id?>" style="display: none;">
             
              <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 pt">
                <label class="col-lg-4 col-xs-4 col-md-4 col-sm-4 control-label" for="textinput">錄取老師</label>
                <div class="col-lg-4 col-xs-4 col-md-4 col-sm-4">
                <input id="username" name="username" type="text" placeholder="Name" class="form-control input-md" value="<?php echo $account[1]?>" readonly>
                  
                </div>
              </div>
               <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 pt">
                <label class="col-md-4 control-label" for="textinput">學歷科系</label>
                <div class="col-md-4">
                <input id="gender" name="gender" type="text" placeholder="Gender" class="form-control input-md" value="<?php echo $resume[$row["rid"]][8].'/'.$resume[$row["rid"]][9]?>" readonly>
                </div>
              </div>
              <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 pt">
                <label class="col-md-4 control-label" for="textinput">給老師的分數</label>
                <div class="col-md-4">
                 <select name="num"  class="form-control" onchange="">
                    <option value="0">請選擇</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option> 
                    <option value="5">5</option>     
                  </select>
                </div>
              </div>
              <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 pt">
                <label class="col-md-4 control-label" for="textinput">給老師的話(限100字以內)</label>
                <div class="col-md-4">
                <textarea class="form-control input-md" id="commenttext" name="commenttext" cols="20" rows="10" size="100" maxlength="100"></textarea>
                </div>
              </div>
              <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 pt" style="text-align: center;">
                <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                  <button id="button1id" name="button1id" class="btn tbu" onclick="checkcoForm()" type="button">確認</button>
                  <button id="button2id" name="button2id" class="btn tbu" onclick="cancelForm()" type="button">取消</button>
                </div>
              </div>
              <?php
              }
              ?>
              </fieldset>
              </form>