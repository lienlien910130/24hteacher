<?php 
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = $_GET["id"];
$sql = "SELECT * FROM interview WHERE id =".$id;
$rs = $pdo ->query($sql);

?>

<form class="form-horizontal" style="margin:30px 0px 20px 0px" name="casedealForm" id="casedealForm" action="teacdealProc.php" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
              <fieldset>
              <?php 
              foreach ($rs as $key => $row) {
                $student = getStudent($row["cid"]);
                $resume = getResumes();
                $account = getProfile($row["reid"]);
              ?>
              <input id="inid" name="inid" type="text"  class="form-control input-md" placeholder="" value="<?php echo $id?>" style="display: none;">
              
              <!-- <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">錄取老師</label>
                <div class="col-md-4">
                <input id="username" name="username" type="text" placeholder="Name" class="form-control input-md" value="<?php echo $account[1]?>" readonly>
                </div>
              </div>
               <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">學歷科系</label>
                <div class="col-md-4">
                <input id="gender" name="gender" type="text" placeholder="Gender" class="form-control input-md" value="<?php echo $resume[$row["rid"]][8].'/'.$resume[$row["rid"]][9]?>" readonly>
                </div>
              </div> -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">希望薪資</label>
                <div class="col-md-4">
                <input id="salary" name="salary" type="text"  class="form-control input-md" placeholder="" value="" size="6" maxlength="6">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                  <button id="button1id" name="button1id" class="btn tbu" onclick="checkdeForm()" type="button">確認</button>
                  <button id="button2id" name="button2id" class="btn tbu" onclick="cancelForm()" type="button">取消</button>
                </div>
              </div>
              <?php
              }
              ?>
              </fieldset>
              </form>