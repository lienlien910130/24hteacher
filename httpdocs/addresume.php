 <?php 
  include_once 'lib/core.php';
  @session_start();
  $account = getProfile($_SESSION["id"]);
 ?>

 	<form class="form-horizontal" style="" name="resumeForm" id="resumeForm" action="addresumeProc.php" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        <fieldset>
          <h3 class="title">基本資料</h3>
          <div class="col-lg-12 on col-sm-12 col-xs-12 col-md-12">
          	<div class="col-lg-6 col-sm-12 col-xs-12 col-md-12">
          		<?php if($account[5] !=""){
                ?>
                <img src="<?php echo htmlspecialchars($account[5], ENT_QUOTES);?>" style="width: 100%;height: 300px">
                <?php 
                }else{
                  ?>
                  <img src="img/123.jpg" style="width: 100%;height: 300px">
                <?php
                }?>
          	</div>
          	<div class="col-lg-6 col-sm-12 col-xs-12 col-md-12">
          		<div class="col-lg-12 re_o col-sm-12 col-xs-12 col-md-12">
          			<div class="col-lg-4  col-sm-4 col-xs-4 col-md-4">
          			  <h3>真實姓名</h3>
          			</div>
          			<div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
          			   <input id="username" name="username" type="text"  class="form-control input-md" value="<?php echo htmlspecialchars($account[1], ENT_QUOTES);?>" readonly>
          			</div>
          		</div>
          		<div class="col-lg-12 re_t col-sm-12 col-xs-12 col-md-12">
          			<div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
          			  <h3>性別</h3>
          			</div>
          			<div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
          			   <input id="gender" name="gender" type="text"  class="form-control input-md" value="<?php echo htmlspecialchars($account[2], ENT_QUOTES);?>" readonly>
          			</div>
          		</div>
          		<div class="col-lg-12 re_th col-sm-12 col-xs-12 col-md-12">
          			<div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
          			  <h3>出生日期</h3>
          			</div>
          			<div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
          			   <input id="birthday" name="birthday" type="date"  class="form-control input-md" value="<?php echo htmlspecialchars($account[3], ENT_QUOTES);?>" readonly>
          			</div>
          		</div>
          		<div class="col-lg-12 re_fo col-sm-12 col-xs-12 col-md-12">
          			<div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
          			  <h3>手機號碼</h3>
          			</div>
          			<div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
          			   <input id="phone" name="phone" type="text"  class="form-control input-md"  value="<?php echo htmlspecialchars($account[6], ENT_QUOTES);?>" readonly>
          			</div>
          		</div>
              <div class="col-lg-12 re_fo col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
                  <h3>身份證字號</h3>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
                   <input id="numb" name="numb" type="text"  class="form-control input-md"  value="<?php echo htmlspecialchars($account[8], ENT_QUOTES);?>" readonly>
                </div>
              </div>
          		<div class="col-lg-12 re_fi col-sm-12 col-xs-12 col-md-12">
          			<div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
          			  <h3>聯絡信箱</h3>
          			</div>
          			<div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
          			   <input id="email" name="email" type="text"  class="form-control input-md"  value="<?php echo htmlspecialchars($account[7], ENT_QUOTES);?>" readonly>
          			</div>
          		</div>
          		<div class="col-lg-12 re_si col-sm-12 col-xs-12 col-md-12">
          			<div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
          			  <h3>居住地址</h3>
          			</div>
          			<div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
          			   <input id="address" name="address" type="text"  class="form-control input-md"  value="<?php echo htmlspecialchars($account[4], ENT_QUOTES);?>" readonly>
          			</div>
          		</div>
          	</div>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	<h2 style="font-size: 21px;font-weight: bold">上課教學項目(<span style="color: red">＊</span>為必填項目)</h2>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	<h4><span style="color: red">＊</span>上課科目</h4>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	<table id="myTable1" class=" table order-list">
            <thead>
                <tr>
                    <td>類型</td>
                    <td>科目</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sm-5 col-lg-5 col-xs-5 col-md-5">
                        <select name="mySubject[]" class="form-control" onchange="change(this)">
                          <option value="0">類型</option>
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
                    <td class="col-sm-6 lession col-lg-6 col-xs-6 col-md-6">
                      <select name="myLession[]" class="form-control">
                           <option value="0">科目</option>
                       </select>
                    </td>
                    <td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1">
                      <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: center;padding-left: 20%;padding-right: 20%">
                        <input type="button" class="btn btn-lg btn-block bu" id="addrow1" value="新增上課科目" style="width: 100%;padding: 10px;"/>
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	<h4><span style="color: red">＊</span>教學地點</h4>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	 <table id="myTable2" class=" table order-list">
            <thead>
                <tr>
                    <td>縣市</td>
                    <td>鄉鎮</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sm-5 col-lg-5 col-xs-5 col-md-5">
                        <select name="myCity[]"  class="form-control" onchange="changeCity(this)">
                          <option value="0">縣市</option>
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
                    <td class="col-sm-6 town col-lg-6 col-xs-6 col-md-6">
                      <select name="myTown[]" class="form-control">
                           <option value="0">鄉鎮</option>
                        </select>
                    </td>
                     <td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1">
                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: center;padding-left: 20%;padding-right: 20%">
                        <input type="button" class="btn btn-lg btn-block bu" id="addrow2" value="新增教學地點" style="width: 100%;padding: 10px;"/>
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	<h4><span style="color: red">＊</span>對象與期望待遇</h4>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	 <table id="myTable3" class=" table order-list">
            <thead>
                <tr>
                    <td>對象</td>
                    <td>價錢</td>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sm-5 col-lg-5 col-xs-5 col-md-5">
                        <select name="myObject[]" class="form-control" onchange="changeObject(this)">
                            <option value="0">對象</option>
                            <?php
                          $sql ="SELECT * FROM object";
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
                    <td class="col-sm-6 price col-lg-6 col-xs-6 col-md-6">
                      <select name="myPrice[]" class="form-control">
                           <option value="0">價錢</option>
                        </select>
                    </td>
                    <td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1">
                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                      <td colspan="5" style="text-align: center;padding-left: 20%;padding-right: 20%">
                        <input type="button" class="btn btn-lg btn-block bu" id="addrow3" value="新增對象與待遇" style="width: 100%;padding: 10px;"/>
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
	          <div class="col-lg-3 col3 col-sm-3 col-xs-3 col-md-3">
	          	<h4><span style="color: red">＊</span>教學經驗</h4>
	          </div>
	          <div class="col-lg-8 col6 col-sm-8 col-xs-8 col-md-8">
	          	<select id="year" name="year" class="form-control" onchange="changeAll(this)">
		           <option value="0">請選擇經驗年資</option>
		           <option value="1">無經驗</option>
		           <option value="2">一年以下</option>
		           <option value="3">一~三年</option>
		           <option value="4">三~五年</option>
		           <option value="5">五年以上</option>
		        </select>
	          </div>
	          <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
	          	<i class="fa fa-times-circle fa-2x" aria-hidden="true" ></i>
	          </div>
          </div>
           <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          <div class="col-lg-3 col3 col3 col-sm-3 col-xs-3 col-md-3">
          	<h4><span style="color: red">＊</span>教學方式</h4>
          </div>
          <div class="col-lg-8 col6 col-sm-8 col-xs-8 col-md-8">
          	<select id="way" name="way" class="form-control" onchange="changeAll(this)">
	           <option value="0">請選擇方式</option>
	           <option value="1">面對面上課</option>
	           <option value="2">視訊上課</option>
             <option value="3">函授</option>
	        </select>
          </div>
          <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
          	<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
          </div>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          <div class="col-lg-3 col3 col-sm-3 col-xs-3 col-md-3">
          	<h4><span style="color: red">＊</span>試教服務</h4>
          </div>
          <div class="col-lg-8 col6 col-sm-8 col-xs-8 col-md-8">
          	<select id="will" name="will" class="form-control" onchange="changeAll(this)">
           <option value="0">請選擇意願</option>
           <option value="1">願意</option>
           <option value="2">不願意</option>
           </select>
          </div>
          <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
          	<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
          </div>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          <div class="col-lg-3 col3 col-sm-3 col-xs-3 col-md-3">
          	<h4 ><span style="color: red">＊</span>目前身份</h4>
          </div>
          <div class="col-lg-8 col6 col-sm-8 col-xs-8 col-md-8">
          	<select id="identity" name="identity" class="form-control" onchange="changeAll(this)">
	           <option value="0">請選擇</option>
	           <option value="1">無工作</option>
	           <option value="2">上班族</option>
	           <option value="3">在校生</option>
	           <option value="4">教師</option>
	           <option value="5">補習班老師/專職家教</option>
	        </select>
          </div>
          <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
          	<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
          </div>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="">
          	<h4><span style="color: red">＊</span>經驗描述與自傳(限制800字以內)</h4>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          <div class="col-lg-11 col3 col-sm-11 col-xs-11 col-md-11">
          	<textarea class="form-control input-md" id="experience" name="experience" cols="20" rows="10" onkeyup="changeText(this)" size="800" maxlength="800"></textarea>
          </div>
          <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
          	<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
          </div>
          </div>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	<h2 style="font-size: 21px;font-weight: bold">個人進階資訊(<span style="color: red">＊</span>為必填項目)</h2>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="">
          	<h4 ><span style="color: red">＊</span>最高教育程度</h4>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="border-bottom:1px solid #ccc;padding-bottom: 2px;">
            <div class="col-lg-5 col6 col-sm-5 col-xs-5 col-md-5">
            	<h5>學校名稱</h5>
            </div>
            <div class="col-lg-6 col6 col-sm-6 col-xs-6 col-md-6">
            	<h5>學位</h5>
            </div>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12"  style="padding-top: 5px;">
          	<div class="col-lg-5 two col-sm-5 col-xs-5 col-md-5" style="padding-left: 0px;">
            <select name="school"  class="form-control" onchange="changeOne(this)">
             <option value="0" >請選擇學校</option>
            <?php
              $sql ="SELECT * FROM schools";
              $pdo = DB_CONNECT();
              $rs =$pdo->query($sql);
              foreach ($rs as $key => $row) {
            ?>
              <option value="<?php echo $row["id"]?>"><?php echo $row["name"]; ?></option>
            <?php
              }
            ?>
              </select>
          		<!-- <input type="text" class="form-control" id="school" name="school" placeholder="無則填寫無" onkeyup="changeOne(this)" /> -->
          	</div>
          	<div class="col-lg-6 col3 one col-sm-6 col-xs-6 col-md-6">
          		<select id="education" name="education" class="form-control" onchange="changeTwo(this)">
		           <option value="0">請選擇</option>
		           <!-- <option value="1">高中(職)以下</option>
		           <option value="2">高中(職)</option>-->
		           <option value="3">專科</option> 
		           <option value="4">大學</option>
		           <option value="5">碩士</option>
		           <option value="6">博士</option>
               </select>
          	</div>
          	<div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
          		<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
          	</div>
          	</div>
          	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="border-bottom:1px solid #ccc;padding-top: 0px;">
          	<div class="col-lg-5 col6 col-sm-6 col-xs-6 col-md-6">
            	<h5>科系</h5>
            </div>
            <div class="col-lg-6 col6 col-sm-6 col-xs-6 col-md-6">
            	<h5>狀態</h5>
            </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 5px;">
          	<div class="col-lg-5 two col-sm-5 col-xs-5 col-md-5" style="padding-left: 0px;">
          		<input type="text" class="form-control" id="department" name="department" placeholder="無則填寫無" value="" onkeyup="changeOne(this)" />
          	</div>
          	<div class="col-lg-6 col3 one col-sm-6 col-xs-6 col-md-6">
          		<select id="situation" name="situation" class="form-control" onchange="changeTwo(this)">
		           <option value="0">請選擇</option>
		           <option value="1">畢業</option>
		           <option value="2">肄業</option>
		           <option value="3">在學中</option>
		        </select>
          	</div>
          	<div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
          		<i class="fa fa-times-circle fa-2x" aria-hidden="true" ></i>
          	</div>
          </div>
           <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="border-bottom:1px solid #ccc;padding-top: 0px;">
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 0px;">
              <h5>畢業證書<span style="color: red">(若大學未畢業，請上傳高中畢業證書即可)</span></h5>
            </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 5px;">
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 0px;">
              <input id="pic" name="pic" type="file" class="form-control input-md" style="" >
            </div>
            </div>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 20px;">
          	<h4 ><span style="color: red;">＊</span>就學期間</h4>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12"  style="border-bottom:1px solid #ccc;">
            <div class="col-lg-5 col6 col-sm-5 col-xs-5 col-md-5">
            	<h5>始於</h5>
            </div>
            <div class="col-lg-5 col6 col-sm-6 col-xs-6 col-md-6">
            	<h5>結束</h5>
            </div>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12"  style="padding-top: 5px;">
          	<div class="col-lg-5 col-sm-5 col-xs-5 col-md-5 DO" style="padding-left: 0px;">
          		<input id="start" name="start" type="text" class="form-control input-md" size="10" maxlength="10" value="" onkeyup="changeDO(this)" onchange="changeDO(this)" placeholder="xxxx-xx-xx" />
          	</div>
          	<div class="col-lg-6 col3 col-sm-6 col-xs-6 col-md-6 DT">
          		<input id="end" name="end" type="text"  class="form-control input-md" value="" onkeyup="changeDT(this)" onchange="changeDT(this)" size="10" maxlength="10" placeholder="xxxx-xx-xx" >
          	</div>
          	<div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
          		<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
          	</div>
          </div>
          </div>
           <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 20px;">
          	<h4 ><span style="color: red;">＊</span>留學經歷</h4>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	  <table id="myTable4" class=" table order-list">
            <thead>
                <tr>
                    <td>國家</td>
                    <td>留學時間</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sm-5 country col-lg-5 col-xs-5 col-md-5"  >
                        <select name="myCountry[]"  class="form-control" onchange="changeCountry(this)">
                          <option value="0" >請選擇國別</option>
                          <?php
                          $sql ="SELECT * FROM country";
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
                    <td class="col-sm-6 time col-lg-6 col-xs-6 col-md-6 ">
                      <select name="myTime[]"  class="form-control">
                        <option value="0">留學年資</option>
                      </select>
                    </td>
                    <td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1">
                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: center;padding-left: 20%;padding-right: 20%">
                        <input type="button" class="btn btn-lg btn-block bu" id="addrow4" value="新增留學經歷" style="width: 100%;padding: 10px;"/>
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	<h2 style="font-size: 21px;font-weight: bold">已獲取認證資格</h2>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	<h4 ><span style="color: red">＊</span>語言認證</h4>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	  <table id="myTable5" class=" table order-list">
            <thead>
                <tr>
                    <td>種類</td>
                    <td>程度</td>
                    <td>證明</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sm-4 country col-lg-4 col-xs-4 col-md-4">
                        <select name="myLanguages[]"  class="form-control" onchange="changeLanguages(this)">
                          <option value="0">選擇種類</option>
                          <?php
                          $sql ="SELECT * FROM languages";
                          $pdo = DB_CONNECT();
                          $rs =$pdo->query($sql);
                          foreach ($rs as $key => $row) {
                          ?>
                            <option value="<?php echo $row["id"]?>"><?php echo $row["val"]; ?></option>
                          <?php
                          }
                          ?>     
                          </select>
                    </td>
                    <td class="col-sm-4 level col-lg-4 col-xs-4 col-md-4">
                        <select name="myLevel[]"  class="form-control">
                          <option value="0">選擇程度</option>   
                        </select>
                    </td>
                    <td class="col-sm-3 col-lg-3 col-xs-3 col-md-3">
                      <input  type="file" name="card[]" class="form-control"/>
                    </td>
                    <td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1">
                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: center;padding-left: 20%;padding-right: 20%">
                        <input type="button" class="btn btn-lg btn-block bu" id="addrow5" value="新增語言認證" style="width: 100%;padding: 10px;"/>
                    </td>
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	<h2 style="font-size: 21px;font-weight: bold">其它認證補充</h2>
          </div>
          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
             <div class="col-lg-11 col3 col-lg-11 col-xs-11 col-md-11">
          	  <textarea class="form-control input-md " name="other" id="other" cols="20" rows="10"  onkeyup="changeText(this)" size="500" maxlength="500"></textarea>
          	  </div>
          	 <div class="col-lg-1 icon col-lg-1 col-xs-1 col-md-1">
          	  <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
             </div>
          </div>

          <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 20px;text-align: center">
          	<button id="button1id" name="button1id" class="btn bu" onclick="checkaForm()" type="button" style="padding: 10px;width: 40%;margin-right: 5px;">儲存資料</button>
            <button id="button2id" name="button2id" class="btn bu" onclick="cancelForm()" type="button" style="padding: 10px;width: 40%;margin-left: 5px;">取消</button>
          </div>
        </fieldset>
   </form>

<script src="addresume.js"></script>

<script type="text/javascript">

$(function(){
    $('#start').datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: "1950:2017"
    });
    $('#end').datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: "1950:2017"
    });
});
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
    $("#addrow1").on("click", 
		function () {
			$.getJSON("getStaticData.php?action=SubjectType",
				function(data)
				{
					var newRow = $("<tr>");
			        var cols = "";
			        cols += '<td class="col-sm-5 col-lg-5 col-xs-5 col-md-5"><select name="mySubject[]" class="form-control" onchange="change(this)"><option value="0">選擇類型</option>';
			        for(var i=0;i<data.length;i++)
			        {
			        	cols += '<option value="'+ (data[i].key+1) +'">'+data[i].value+'</option>';
			        }
			        cols += '</select></td>';
			        cols += '<td  class="col-sm-6 lession col-lg-6 col-xs-6 col-md-6"><select name="myLession[]"  class="form-control"><option value="0">選擇科目</option></select></td>';
			     	cols+=' <td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1"><i class="fa fa-times-circle fa-2x ibtnDel" aria-hidden="true" type="button"></i></td>';
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
			        cols += '<td class="col-sm-5 col-lg-5 col-xs-5 col-md-5"><select name="myCity[]" class="form-control" onchange="changeCity(this)"><option value="0">選擇縣市</option>';
			        for(var i=0;i<data.length;i++)
			        {
			        	cols += '<option value="'+ (data[i].key+1) +'">'+data[i].value+'</option>';
			        }
			        cols += '</select></td>';
			        cols += '<td class="col-sm-6 town col-lg-6 col-xs-6 col-md-6"><select name="myTown[]"  class="form-control"><option value="0">選擇鄉鎮</option></select></td>';
			        cols += '<td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1"><i class="fa fa-times-circle fa-2x ibtnDel" aria-hidden="true" type="button"></i></td>';
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
			        cols += '<td class="col-sm-5 col-lg-5 col-xs-5 col-md-5"><select name="myObject[]" class="form-control" onchange="changeObject(this)">';
			        for(var i=0;i<data.length;i++)
			        {
			        	cols += '<option value="'+data[i].value+'">'+data[i].key+'</option>';
			        }
			        cols += '</select></td>';
			        cols += '<td  class="col-sm-6 price col-lg-6 col-xs-6 col-md-6"><select name="myPrice[]" class="form-control"><option value="0">選擇價錢</option></select></td>';
			        cols += '<td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1"><i class="fa fa-times-circle fa-2x ibtnDel" aria-hidden="true" type="button"></i></td>';
			        newRow.append(cols);
			        $("#myTable3").append(newRow);
				}
			);
    	}
    );

	$("#addrow4").on("click", 
		function () {
			$.getJSON("getStaticData.php?action=CountryType",
				function(data)
				{
					var newRow = $("<tr>");
			        var cols = "";
			        cols += '<td class="col-sm-5 col-lg-5 col-xs-5 col-md-5"><select name="myCountry[]" class="form-control" onchange="changeCountry(this)"><option value="0" >請選擇國別</option>';
			        for(var i=0;i<data.length;i++)
			        {
			        	cols += '<option value="'+ (data[i].key+1) +'">'+data[i].value+'</option>';
			        }
        			cols += '</select></td>';
			        cols += '<td  class="col-sm-6 time col-lg-6 col-xs-6 col-md-6"><select name="myTime[]" class="form-control"><option value="0">留學年資</option></select></td>';
        			cols += '<td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1"><i class="fa fa-times-circle fa-2x ibtnDel" aria-hidden="true" type="button"></i></td>';
			        newRow.append(cols);
			        $("#myTable4").append(newRow);
				}
			);
    	}
    );
	
	$("#addrow5").on("click", 
		function () {
			$.getJSON("getStaticData.php?action=LanguagesType",
				function(data)
				{
					var newRow = $("<tr>");
			        var cols = "";
			        cols += '<td class="col-sm-4 col-lg-4 col-xs-4 col-md-4"><select name="myLanguages[]" class="form-control" onchange="changeLanguages(this)"><option value="0">選擇種類</option>';
			        for(var i=0;i<data.length;i++)
			        {
			        	cols += '<option value="'+ (data[i].key+1) +'">'+data[i].value+'</option>';
			        }
			        cols += '</select></td>';
        			cols += '<td  class="col-sm-4 level col-lg-4 col-xs-4 col-md-4"><select name="myLevel[]" class="form-control"><option value="0">選擇程度</option></select></td>';
              cols += '<td  class="col-sm-3 col-lg-3 col-xs-3 col-md-3"><input  type="file" name="card[]" class="form-control"/></td>';
			        cols += '<td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1"><i class="fa fa-times-circle fa-2x ibtnDel" aria-hidden="true" type="button"></i></td>';
			        newRow.append(cols);
			        $("#myTable5").append(newRow);
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