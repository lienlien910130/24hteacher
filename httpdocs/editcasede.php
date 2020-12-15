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

<form class="form-horizontal" style="margin:30px 0px 20px 0px" name="caseeditForm" id="caseeditForm" action="editcaseProc.php" method="POST" accept-charset="UTF-8">
         <fieldset>
          <h3 style="border-bottom: 1px solid #e5e5e5;text-align: left;">上課內容</h3>
          <div class="form-group" style="display: none;">
                
                <div class="col-md-4">
                <input  name="cid" type="text"  class="form-control input-md" value="<?php echo $id?>">
                </div>
          </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊基本資料</label>  
                <div class="col-md-8">
                  <table id="myTable2" class=" table order-list">
            <thead>
                <tr>
                    <td>姓名</td>
                    <td>性別</td>
                    <td>學校</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
             <?php 
               for ($i=0; $i < count($student[$id]) ; $i++) { 
                 $out = explode(",", $student[$id][$i]);
              ?>
              <tr>
                    <td class="col-sm-4">
                        <input type="text" class="form-control" name="myName[]" value="<?php echo $out[0]?>" />
                    </td>
                    <td class="col-sm-4 lession">
                      <select name="myGender[]" class="form-control">
                      <?php 
                      if($out[1] == "女"){
                        ?>
                           <option value="1" selected>女</option>
                           <option value="2">男</option>
                      <?php
                      }else{
                        ?>
                           <option value="1">女</option>
                           <option value="2" selected>男</option>
                        <?php
                      }
                      ?>
                        </select>
                    </td>
                    <td class="col-sm-3 course">
                      <input type="text" class="form-control" name="mySchool[]" value="<?php echo $out[2]?>" />
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
                <label class="col-md-4 control-label">＊學生身分</label>
                <div class="col-md-8" style="text-align: left;">
                <select name="myIdentity" class="form-control">
                <?php
                switch ($cases[$id][20]) {
                      case '學齡前兒童':
                      $identity = 1;
                      break;
                      case '國小一年級':
                      $identity = 2;
                      break;
                      case '國小二年級':
                      $identity = 3;
                      break;
                      case '國小三年級':
                      $identity = 4;
                      break;
                      case '國小四年級':
                      $identity = 5;
                      break;
                      case '國小五年級':
                      $identity = 6;
                      break;
                      case '國小六年級':
                      $identity = 7;
                      break;
                      case '國中一年級':
                      $identity = 8;
                      break;
                      case '國中二年級':
                      $identity = 9;
                      break;
                      case '國中三年級':
                      $identity = 10;
                      break;
                      case '高中一年級':
                      $identity = 11;
                      break;
                      case '高中二年級':
                      $identity = 12;
                      break;
                      case '高中三年級':
                      $identity = 13;
                      break;
                      case '大專生':
                      $identity = 14;
                      break;
                      case '社會人士':
                      $identity = 15;
                      break;
                      default:
                      break;
                   } 
                  for ($i=1; $i < 16 ; $i++) { 
                       if($i == $identity ){
                        ?>
                          <option value="<?php echo $i?>" selected><?php echo $cases[$id][20]?></option>
                     <?php
                       }
                  }
                ?>
                 <option value="1">學齡前兒童</option>
                 <option value="2">國小一年級</option>
                 <option value="3">國小二年級</option>
                 <option value="4">國小三年級</option>
                 <option value="5">國小四年級</option>
                 <option value="6">國小五年級</option>
                 <option value="7">國小六年級</option>
                 <option value="8">國中一年級</option>
                 <option value="9">國中二年級</option>
                 <option value="10">國中三年級</option>
                 <option value="11">高中一年級</option>
                 <option value="12">高中二年級</option>
                 <option value="13">高中三年級</option>
                 <option value="14">大專生</option>
                 <option value="15">社會人士</option>
             </select>
                </div>
          </div>

          

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
                 for ($i=0; $i <count($course[$id]) ; $i++) { 
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
                      <input type="text" class="form-control" name="myCourse[]" value="<?php echo $course[$id][$i]?>" />
                    </td>
                    <?php
                    if($i!= 0){
                    ?>
                    <td><input type="button" class="ibtnDel btn btn-md btn-danger"  value="刪除"></td>
                    <?php
                    }
                    ?>
                </tr>
                <?php } ?>
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
                <label class="col-md-4 control-label">＊上課地點</label>
                <div class="col-md-2">
                <select name="myCity"  class="form-control" onchange="changeCity(this)">
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
                </div>
                <div class="col-md-2 town">
                <select  name="myTown" class="form-control">
                     <option value="0">選擇鄉鎮</option>
                </select>
                </div>
                <div class="col-md-4 zip">
                <input type="text" class="form-control" name="myZip" value="<?php echo $cases[$id][19]?>" />
                </div>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                <select id="location" name="location" class="form-control">
                  <?php 
                  switch ($cases[$id][7]) {
                      case "家裡上課":
                        $locval = 1;
                        break;
                      case "外面上課":
                        $locval = 2;
                        break;
                      case "老師家上課":
                        $locval = 3;
                        break;
                      default:
                        break;
                    }
                    for ($i=1; $i < 4; $i++) { 
                      if($i == $locval ){
                        ?>
                        <option value="<?php echo $i?>" selected><?php echo $cases[$id][7]?></option>
                        <?php 
                      }
                    }
                  ?>
                  <option value="1">家裡上課</option>
                  <option value="2">外面上課</option>
                  <option value="3">老師家上課</option>
                </select>
                </div>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label">＊附近明顯路標</label>
                <div class="col-md-4">
                <input  name="load" type="text"  class="form-control input-md" value="<?php echo $cases[$id][18]?>">
                </div>
              </div>

          <div class="form-group">
                 <label class="col-md-4 control-label">＊薪資待遇</label>
                 <span class="col-md-1 input-md">最低</span>
                 <div class="col-md-3">
                 <input name="low" type="text"  class="form-control input-md" value="<?php echo $cases[$id][15]?>">
                </div>
                <span class="col-md-1 input-md">最高</span>
                 <div class="col-md-3">
                 <input name="high" type="text"  class="form-control input-md" value="<?php echo $cases[$id][16]?>">
                </div>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label" for="year">＊上課時間</label>
                <div class="col-md-8">
                  <table id="myTable3" class=" table order-list">
            <thead>
                <tr>
                    <td>星期</td>
                    <td>時間</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php 
                for ($i=0; $i < count($time[$id]); $i++) { 
                  $outs = explode(",",$time[$id][$i]);
                ?>
                <tr>
                    <td class="col-sm-4">
                        <select name="myWeek[]" class="form-control">
                        <?php
                         switch ($outs[0]) {
                            case "週一":
                            $weeks = 1;
                            break;
                            case "週二":
                            $weeks = 2;
                            break;
                            case "週三":
                            $weeks = 3;
                            break;
                            case "週四":
                            $weeks = 4;
                            break;
                            case "週五":
                            $weeks = 5;
                            break;
                            case "週六":
                            $weeks = 6;
                            break;
                            case "週七":
                            $weeks = 7;
                            break;
                            default:
                            break;
                         }
                         for ($x=1; $x < 8; $x++) { 
                           if($x == $weeks){
                            ?>
                             <option value="<?php echo $i?>"><?php echo $outs[0]?></option>
                            <?php
                           }
                         }
                        ?>
                            <option value="1">週一</option>
                            <option value="2">週二</option>
                            <option value="3">週三</option>
                            <option value="4">週四</option>
                            <option value="5">週五</option>
                            <option value="6">週六</option>
                            <option value="7">週七</option>
                        </select>
                    </td>
                    <td class="col-sm-4 starttime">
                      <select  name="myStartTime[]" class="form-control">
                      <option value='<?php echo $outs[1]?>'><?php echo $outs[1]?></option><option value='700'>7:00</option><option value='730'>7:30</option><option value='800'>8:00</option><option value='830'>8:30</option><option value='900'>9:00</option><option value='930'>9:30</option><option value='1000'>10:00</option><option value='1030'>10:30</option><option value='1100'>11:00</option><option value='1130'>11:30</option><option value='1200'>12:00</option><option value='1230'>12:30</option><option value='1300'>13:00</option><option value='1330'>13:30</option><option value='1400'>14:00</option><option value='1430'>14:30</option><option value='1500'>15:00</option><option value='1530'>15:30</option><option value='1600'>16:00</option><option value='1630'>16:30</option><option value='1700'>17:00</option><option value='1730'>17:30</option><option value='1800'>18:00</option><option value='1830'>18:30</option><option value='1900'>19:00</option><option value='1930'>19:30</option><option value='2000'>20:00</option><option value='2030'>20:30</option><option value='2100'>21:00</option><option value='2130'>21:30</option><option value='2200'>22:00</option><option value='2230'>22:30</option><option value='2300'>23:00</option><option value='2330'>23:30</option></select>
                    </td>
                    <td class="col-sm-3 endtime">
                        <select name="myEndTime[]" class="form-control">
                           <option value='<?php echo $outs[2]?>'><?php echo $outs[2]?></option><option value='700'>7:00</option><option value='730'>7:30</option><option value='800'>8:00</option><option value='830'>8:30</option><option value='900'>9:00</option><option value='930'>9:30</option><option value='1000'>10:00</option><option value='1030'>10:30</option><option value='1100'>11:00</option><option value='1130'>11:30</option><option value='1200'>12:00</option><option value='1230'>12:30</option><option value='1300'>13:00</option><option value='1330'>13:30</option><option value='1400'>14:00</option><option value='1430'>14:30</option><option value='1500'>15:00</option><option value='1530'>15:30</option><option value='1600'>16:00</option><option value='1630'>16:30</option><option value='1700'>17:00</option><option value='1730'>17:30</option><option value='1800'>18:00</option><option value='1830'>18:30</option><option value='1900'>19:00</option><option value='1930'>19:30</option><option value='2000'>20:00</option><option value='2030'>20:30</option><option value='2100'>21:00</option><option value='2130'>21:30</option><option value='2200'>22:00</option><option value='2230'>22:30</option><option value='2300'>23:00</option><option value='2330'>23:30</option>
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
                <label class="col-md-4 control-label">＊上課期限</label>
                <div class="col-md-4">
                <select id="rang" name="rang" class="form-control">
                <?php 
                switch ($cases[$id][8]) {
                  case "上短期(2個月以內)":
                    $ranval = 1;
                    break;
                  case "希望上長期":
                    $ranval = 2;
                    break;
                  default:
                    break;
                }
                for ($i=1; $i < 3; $i++) { 
                    if($i == $ranval){
                      ?>
                      <option value="<?php echo $i?>" selected><?php echo $cases[$id][8]?></option>
                      <?php

                    }
                }
                ?>
                   <option value="1">上短期(2個月以內)</option>
                   <option value="2">希望上長期</option>
                </select>
                </div>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label">＊開始上課日期</label>
                <?php 
                if($cases[$id][10] == "立即"){
                  ?>
                  <input type="radio" name="time" class="col-md-1" value="1" checked>
                  <span class="col-md-1">立即</span>
                  <input type="radio" name="time" class="col-md-1" value="2">
                  <span class="col-md-1">從</span>
                   <div class="col-md-3">
                   <input  name="datetext" type="date"  class="form-control input-md">
                  </div>
                  <span class="col-md-1">開始</span>
                <?php
                }else{
                  ?>
                  <input type="radio" name="time" class="col-md-1" value="1">
                  <span class="col-md-1">立即</span>
                  <input type="radio" name="time" class="col-md-1" value="2" checked>
                  <span class="col-md-1">從</span>
                   <div class="col-md-3">
                   <input  name="datetext" type="date"  class="form-control input-md" value="<?php echo $cases[$id][10]?>">
                  </div>
                  <span class="col-md-1">開始</span>
                <?php
                }
                ?>
                
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label">＊上課目的</label>
                <div class="col-md-4">
                <select id="goal" name="goal" class="form-control">
                   <?php 
                   switch ($cases[$id][3]) {
                      case "升學考試":
                        $goalval = 1;
                        break;
                      case "課業輔導":
                        $goalval = 2;
                        break;
                      case "個人進修":
                        $goalval = 3;
                        break;
                      case "興趣培養":
                        $goalval = 4;
                        break;
                      default:
                        break;
                    }
                    for ($i=1; $i < 5 ; $i++) { 
                      if($i == $goalval ){
                        ?>
                        <option value="<?php echo $i?>"><?php echo $cases[$id][3]?></option>
                    <?php 
                      }
                    }
                   ?>
                   <option value="1">升學考試</option>
                   <option value="2">課業輔導</option>
                   <option value="3">個人進修</option>
                   <option value="4">興趣培養</option>
                </select>
                </div>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label">＊上課方式</label>
                <div class="col-md-4">
                <select id="way" name="way" class="form-control">
                <?php 
                switch ($cases[$id][5]) {
                  case "面對面上課":
                    $wayval = 1;
                    break;
                  case "視訊上課":
                    $wayval = 2;
                    break;
                  default:
                    break;
                }
                for ($i=1; $i < 3; $i++) { 
                  if($i == $wayval){
                    ?>
                    <option value="<?php echo $i?>" selected><?php echo $cases[$id][5]?></option>
                <?php
                  }
                }
                ?>
                   <option value="1">面對面上課</option>
                   <option value="2">視訊上課</option>
                </select>
                </div>
              </div>

        <div class="form-group">
                <label class="col-md-4 control-label">＊希望應徵人數</label>
                <div class="col-md-4">
                <select id="person" name="person" class="form-control">
                     <option value="<?php echo $cases[$id][6]?>"><?php echo $cases[$id][6]?></option>
                     <option value="10">10</option>
                     <option value="20">20</option>
                     <option value="30">30</option>
                     <option value="40">40</option>
               </select>
                </div>
       </div>
          <div class="form-group">
                <label class="col-md-4 control-label">＊程度說明</label>
                <div class="col-md-8">
                <textarea class="form-control input-md" id="extent" name="extent" cols="20" rows="10" ><?php echo $cases[$id][2]?></textarea>
                </div>
          </div>

          <h3 style="border-bottom: 1px solid #e5e5e5;text-align: left;">老師條件</h3>
          <div class="form-group">
                <label class="col-md-4 control-label">＊教學經驗</label>
                <div class="col-md-4">
                <select  name="experience" class="form-control">
                <?php 
                switch ($cases[$id][11]) {
                  case "無經驗":
                    $yearval = 1;
                    break;
                  case "一年以下":
                    $yearval = 2;
                    break;
                  case "一年以上~三年以下":
                    $yearval = 3;
                    break;
                  case "三年以上~五年以下":
                    $yearval = 4;
                    break;
                  case "五年以上":
                    $yearval = 5;
                    break;
                  default:
                    break;
                }
                for ($i=1; $i < 6; $i++) { 
                  if($i == $yearval){
                    ?>
                    <option value="<?php echo $i?>" selected><?php echo $cases[$id][11]?></option>
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
                <label class="col-md-4 control-label">＊身分要求</label>
                <div class="col-md-4">
                <select name="identity" class="form-control">
                <?php 
                switch ($cases[$id][12]) {
                    case "不拘":
                      $ideval = 1;
                      break;
                    case "上班族":
                      $ideval = 2;
                      break; 
                    case "在校生":
                      $ideval = 3;
                      break;
                    case "教師":
                      $ideval = 4;
                      break;
                    case "補習班老師/家教":
                      $ideval = 5;
                      break;
                    default:
                      break;
                  }
                  for ($i=1; $i < 6; $i++) { 
                   if($i == $ideval){
                    ?>
                    <option value="<?php echo $i?>" selected><?php echo $cases[$id][12]?></option>
                    <?php
                   }
                  }
                ?>
                   <option value="1">不拘</option>
                   <option value="2">上班族</option>
                   <option value="3">在校生</option>
                   <option value="4">教師</option>
                   <option value="5">補習班老師/家教</option>
                </select>
                </div>
              </div>

          <div class="form-group">
                <label class="col-md-4 control-label">＊學校要求</label>
                <?php 
                if($cases[$id][13] == "不拘"){
                ?>
                <input type="radio" name="school" class="col-md-1" value="1" checked>
                 <span class="col-md-1">不拘</span>
                <input type="radio" name="school" class="col-md-1" value="2">
                <span class="col-md-2">有，學校</span>
                 <div class="col-md-3">
                 <input  name="schooltext" type="text"  class="form-control input-md" value="">
                </div>
                <?php
                }else{
                ?>
                <input type="radio" name="school" class="col-md-1" value="1">
                 <span class="col-md-1">不拘</span>
                <input type="radio" name="school" class="col-md-1" value="2" checked>
                <span class="col-md-2">有，學校</span>
                 <div class="col-md-3">
                 <input  name="schooltext" type="text"  class="form-control input-md" value="<?php echo $cases[$id][13]?>">
                </div>
                <?php
                }
                ?>
          </div>

          <div class="form-group">
                <label class="col-md-4 control-label">＊科系要求</label>
                <?php 
                if($cases[$id][13] == "不拘"){
                ?>
                 <input type="radio" name="department" class="col-md-1" value="1" checked>
                 <span class="col-md-1">不拘</span>
                <input type="radio" name="department" class="col-md-1" value="2">
                <span class="col-md-2">有，科系</span>
                 <div class="col-md-3">
                 <input name="departmenttext" type="text"  class="form-control input-md" value="">
                </div>
                <?php
                }else{
                ?>
                 <input type="radio" name="department" class="col-md-1" value="1">
                 <span class="col-md-1">不拘</span>
                <input type="radio" name="department" class="col-md-1" value="2" checked>
                <span class="col-md-2">有，科系</span>
                 <div class="col-md-3">
                 <input name="departmenttext" type="text"  class="form-control input-md" value="<?php echo $cases[$id][14]?>">
                </div>
                <?php
                }
                ?>
          </div>

           <div class="form-group">
                <label class="col-md-4 control-label">＊其他條件</label>
                <div class="col-md-8">
                <textarea class="form-control input-md " name="other" id="other" cols="20" rows="10"><?php echo $cases[$id][17]?></textarea>
                </div>
           </div>
           
            <div class="form-group">
                <label class="col-md-4 control-label">＊揪團</label>
                <?php
                $sql = "SELECT * FROM cases WHERE id =".$id;
                $rs = $pdo->query($sql);
                foreach ($rs as $key => $row) {
                  $xx = $row["open"];
                }
                if($xx==0){
                  ?>
                   <input type="radio" name="open" class="col-md-1" value="0" checked>
                 <span class="col-md-1">關閉</span>
                <input type="radio" name="open" class="col-md-1" value="1">
                <span class="col-md-2">開放</span>
                  <?php
                }else{
                  ?>
                   <input type="radio" name="open" class="col-md-1" value="0">
                 <span class="col-md-1">關閉</span>
                <input type="radio" name="open" class="col-md-1" value="1" checked>
                <span class="col-md-2">開放</span>
                  <?php
                }
                  ?>
                
              </div>

           <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                  <button id="button1id" name="button1id" class="btn btn-success" onclick="checkedit()" type="button">修改</button>
                  <button id="button2id" name="button2id" class="btn btn-default" onclick="cancelForm(<?php echo $id?>)" type="button">取消</button>
                </div>
              </div>

        </fieldset>
        </form>

        <script src="addcase.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    // $("#addrow1").on("click", function () {   原始寫法
    //     var newRow = $("<tr>");
    //     var cols = "";
    //     cols += '<td class="col-sm-4"><select name="mySubject[]" class="form-control" onchange="change(this)"><option value="0">選擇類型</option><?php $sql ="SELECT * FROM subjects";$pdo = DB_CONNECT();$rs =$pdo->query($sql); foreach ($rs as $key => $row) {?><option value="<?php echo $row["id"] ?>"><?php echo $row["val"]; ?></option> <?php } ?></select></td>';
    //     cols += '<td  class="col-sm-4 lession"><select name="myLession[]"  class="form-control"><option value="0">選擇科目</option></select></td>';
    //     cols += '<td  class="col-sm-4 course"><input type="text" class="form-control" name="myZip[]" /></td>';
    //     cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger " id="ibtnDel"  value="Delete"></td>';
    //     newRow.append(cols);
    //     $("#myTable1").append(newRow);
        
    // });

    //json寫法
    $("#addrow2").on("click", 
    function () {
      $.getJSON("getStaticData.php?action=StType",
        function(data)
        {
          var newRow = $("<tr>");
              var cols = "";
              cols += '<td class="col-sm-3"><input type="text" class="form-control" name="myName[]" /></td>';
          cols += '<td class="col-sm-3 lession"><select name="myGender[]" class="form-control">';
          for(var i=0;i<data.length;i++)
              {
                cols += '<option value="'+ (data[i].key+1) +'">'+data[i].value+'</option>';
              }
              cols += '</select></td>';
              cols +='<td class="col-sm-3 course"><input type="text" class="form-control" Name="mySchool[]" /></td>';
              cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="刪除"></td>';
              newRow.append(cols);
              $("#myTable2").append(newRow);
        }
      );
      }
    );

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


  $("#addrow3").on("click", 
  function () {
   $.getJSON("getStaticData.php?action=WeekType",
    function(data)
    {
     var newRow = $("<tr>");
           var cols = "";
           cols += '<td class="col-sm-4"><select name="myWeek[]" class="form-control">';
           for(var i=0;i<data.length;i++)
      {
         cols += '<option value="'+ (data[i].key+1) +'">'+data[i].value+'</option>';
        }
       cols += '</select></td>';
         cols += '<td class="col-sm-4 starttime"><select  name="myStartTime[]" class="form-control"><option value="0">請選擇</option><option value="700">7:00</option><option value="730">7:30</option><option value="800">8:00</option><option value="830">8:30</option><option value="900">9:00</option><option value="930">9:30</option><option value="1000">10:00</option><option value="1030">10:30</option><option value="1100">11:00</option><option value="1130">11:30</option><option value="1200">12:00</option><option value="1230">12:30</option><option value="1300">13:00</option><option value="1330">13:30</option><option value="1400">14:00</option><option value="1430">14:30</option><option value="1500">15:00</option><option value="1530">15:30</option><option value="1600">16:00</option><option value="1630">16:30</option><option value="1700">17:00</option><option value="1730">17:30</option><option value="1800">18:00</option><option value="1830">18:30</option><option value="1900">19:00</option><option value="1930">19:30</option><option value="2000">20:00</option><option value="2030">20:30</option><option value="2100">21:00</option><option value="2130">21:30</option><option value="2200">22:00</option><option value="2230">22:30</option><option value="2300">23:00</option><option value="2330">23:30</option></select></td>';
           cols += '<td class="col-sm-3 endtime"><select name="myEndTime[]" class="form-control"><option value="0">請選擇</option><option value="700">7:00</option><option value="730">7:30</option><option value="800">8:00</option><option value="830">8:30</option><option value="900">9:00</option><option value="930">9:30</option><option value="1000">10:00</option><option value="1030">10:30</option><option value="1100">11:00</option><option value="1130">11:30</option><option value="1200">12:00</option><option value="1230">12:30</option><option value="1300">13:00</option><option value="1330">13:30</option><option value="1400">14:00</option><option value="1430">14:30</option><option value="1500">15:00</option><option value="1530">15:30</option><option value="1600">16:00</option><option value="1630">16:30</option><option value="1700">17:00</option><option value="1730">17:30</option><option value="1800">18:00</option><option value="1830">18:30</option><option value="1900">19:00</option><option value="1930">19:30</option><option value="2000">20:00</option><option value="2030">20:30</option><option value="2100">21:00</option><option value="2130">21:30</option><option value="2200">22:00</option><option value="2230">22:30</option><option value="2300">23:00</option><option value="2330">23:30</option></select></td>';
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