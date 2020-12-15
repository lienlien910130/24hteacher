 <?php 
  include_once 'lib/core.php';
  @session_start();

 ?>
 	<form class="form-horizontal" style="" name="caseForm" id="caseForm" action="addcaseProc.php" method="POST" accept-charset="UTF-8">
         <fieldset>
              <h3 class="title">新增案件</h3>
       	      <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
          	     <h2 style="font-size: 21px;font-weight: bold">上課學生資料(<span style="color: red">＊</span>為必填項目)</h2>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>學生姓名</h4>
                </div>  
                <div class="col-lg-8  col-sm-8 col-xs-8 col-md-8 col6">
                  <input type="text" class="form-control" id="myName" name="myName" placeholder="" onkeyup="changeText(this)" size="25" maxlength="25" />
                </div>
                 <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
		          	<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
		        </div>
              </div>

              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>學生身份</h4>
                </div>
                <div class="col-lg-8  col-sm-8 col-xs-8 col-md-8 col6">
                 <select name="myIdentity" class="form-control" onchange="changeAll(this)">
			           <option value="0">選擇身分</option>
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
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
		          	<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
		        </div>
              </div>

              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>學生性別</h4>
                </div>
                <div class="col-lg-8  col-sm-8 col-xs-8 col-md-8 col6">
                 <select name="myGender" class="form-control" onchange="changeAll(this)" >
			           <option value="0">選擇性別</option>
			           <option value="1">女</option>
			           <option value="2">男</option>
			       </select>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
		          	<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
		        </div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>學校名稱</h4>
                </div>
                <div class="col-lg-8  col-sm-8 col-xs-8 col-md-8 col6" >
                  <input type="text" class="form-control" id="mySchool" name="mySchool" placeholder="" onkeyup="changeText(this)" size="10" maxlength="10" />
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
		          	<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
		        </div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>程度說明<br><h5>(限200字以內)</h5></h4>
                </div>
                <div class="col-lg-8  col-sm-8 col-xs-8 col-md-8 col6">
                <textarea class="form-control input-md" id="extent" name="extent" cols="10" rows="5" onkeyup="changeText(this)" size="200" maxlength="200" ></textarea>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
		          	<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
		        </div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                 <h2 style="font-size: 21px;font-weight: bold">上課條件需求(<span style="color: red">＊</span>為必填項目)</h2>
			  </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>上課目的</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <select id="goal" name="goal" class="form-control" onchange="changeAll(this)">
        				   <option value="0">請選擇目的</option>
        				   <option value="1">升學考試</option>
        				   <option value="2">課業輔導</option>
        				   <option value="3">個人進修</option>
        				   <option value="4">興趣培養</option>
        				</select>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
		          	<i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
		        </div>
              </div>

              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4><span style="color: red">＊</span>上課科目</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col3" style="padding-right: 5px;">
                	<select name="mySubject" class="form-control" onchange="change(this)">
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
                </div>
                <div class="col-lg-6 lession col-sm-6 col-xs-6 col-md-6 col3"  style="padding-left: 5px;">
                	<select name="myLession" class="form-control">
			           <option value="0">科目</option>
			        </select>
                </div>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>

              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>上課方式</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <select id="way" name="way" class="form-control" onchange="changeAll(this)">
        				   <option value="0">請選擇</option>
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
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4><span style="color: red">＊</span>應徵人數</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <select id="person" name="person" class="form-control" onchange="changeAll(this)">
        				   <option value="0">請選擇</option>
        				   <option value="10">10</option>
        				   <option value="20">20</option>
        				   <option value="30">30</option>
        				   <option value="40">40</option>
        				</select>
                </div>
                 <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>

               <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>聯絡人</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <input  name="connectionName" type="text"  class="form-control input-md"  onkeyup="changeText(this)" size="6" maxlength="6" >
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>

              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4><span style="color: red">＊</span>聯絡電話</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <input  name="connectionPhone" type="text"  class="form-control input-md"  onkeyup="changeText(this)" size="15" maxlength="15" >
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>

              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>上課地點</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 country col3"  style="padding-right: 5px;">
                	<select name="myCity"  class="form-control" onchange="changeCity(this)">
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
                </div>
                 <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 town col3"  style="padding-left: 5px;">
                 	<select  name="myTown" class="form-control">
				     <option value="0">鄉鎮</option>
				    </select>
                 </div>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>上課地方</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <select id="location" name="location" class="form-control" onchange="changeAll(this)">
        				   <option value="0">請選擇</option>
        				   <option value="1">家裡上課</option>
        				   <option value="2">外面上課</option>
        				   <option value="3">老師家上課</option>
        				</select>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>

              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>附近地標</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <input  name="load" type="text"  class="form-control input-md"  onkeyup="changeText(this)" size="20" maxlength="20" >
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>

              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3  col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>上課期限</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <select id="rang" name="rang" class="form-control" onchange="changeAll(this)">
				   <option value="0">請選擇</option>
				   <option value="1">上短期(2個月以內)</option>
				   <option value="2">希望上長期</option>
				</select>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 20px;">
	          	<h4 ><span style="color: red;">＊</span>上課時間</h4>
	          </div>
			  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 0px;">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 0px;">
                  <table id="myTable3" class=" table order-list">
				    <thead>
				        <tr>
				            <td>星期</td>
				            <td>開始時間</td>
				            <td>結束時間</td>
				        </tr>
				    </thead>
				    <tbody>
				        <tr>
				            <td class="col-lg-3 weeks col-sm-3 col-xs-3 col-md-3 we">
				                <select name="myWeek[]" class="form-control" onchange="changeWeek(this)">
				                    <option value="0">請選擇</option>
				                    <?php
			                          $sql ="SELECT * FROM week";
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
				            <td class="col-lg-4 starttime col-sm-4 col-xs-4 col-md-4 stt">
				              <select  name="myStartTime[]" class="form-control" onchange="changeTime(this)"><option value='0'>請選擇</option><option value='700'>7:00</option><option value='730'>7:30</option><option value='800'>8:00</option><option value='830'>8:30</option><option value='900'>9:00</option><option value='930'>9:30</option><option value='1000'>10:00</option><option value='1030'>10:30</option><option value='1100'>11:00</option><option value='1130'>11:30</option><option value='1200'>12:00</option><option value='1230'>12:30</option><option value='1300'>13:00</option><option value='1330'>13:30</option><option value='1400'>14:00</option><option value='1430'>14:30</option><option value='1500'>15:00</option><option value='1530'>15:30</option><option value='1600'>16:00</option><option value='1630'>16:30</option><option value='1700'>17:00</option><option value='1730'>17:30</option><option value='1800'>18:00</option><option value='1830'>18:30</option><option value='1900'>19:00</option><option value='1930'>19:30</option><option value='2000'>20:00</option><option value='2030'>20:30</option><option value='2100'>21:00</option><option value='2130'>21:30</option><option value='2200'>22:00</option><option value='2230'>22:30</option><option value='2300'>23:00</option><option value='2330'>23:30</option></select>
				            </td>
				            <td class="col-lg-4 endtime col-sm-4 col-xs-4 col-md-4 ent">
				                <select name="myEndTime[]" class="form-control" onchange="changeEnd(this)">
			                     <option value='0'>請選擇</option><option value='700'>7:00</option><option value='730'>7:30</option><option value='800'>8:00</option><option value='830'>8:30</option><option value='900'>9:00</option><option value='930'>9:30</option><option value='1000'>10:00</option><option value='1030'>10:30</option><option value='1100'>11:00</option><option value='1130'>11:30</option><option value='1200'>12:00</option><option value='1230'>12:30</option><option value='1300'>13:00</option><option value='1330'>13:30</option><option value='1400'>14:00</option><option value='1430'>14:30</option><option value='1500'>15:00</option><option value='1530'>15:30</option><option value='1600'>16:00</option><option value='1630'>16:30</option><option value='1700'>17:00</option><option value='1730'>17:30</option><option value='1800'>18:00</option><option value='1830'>18:30</option><option value='1900'>19:00</option><option value='1930'>19:30</option><option value='2000'>20:00</option><option value='2030'>20:30</option><option value='2100'>21:00</option><option value='2130'>21:30</option><option value='2200'>22:00</option><option value='2230'>22:30</option><option value='2300'>23:00</option><option value='2330'>23:30</option>
			                  </select>
				            </td>
				            <td class="col-lg-1 icon col-lg-1 col-xs-1 col-md-1">
		                    <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
		                </td>
				        </tr>
				    </tbody>
				    <tfoot>
				        <tr>
				            <td colspan="5" style="text-align: center;padding-left: 20%;padding-right: 20%">
		                        <input type="button" class="btn btn-lg btn-block bu" id="addrow3" value="新增上課時間" style="width: 100%;padding: 10px;"/>
		                </td>
				        </tr>
				    </tfoot>
				</table>
                </div>
              </div>

               <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-12 col-xs-12 col-md-12 col3">
                <h4 ><span style="color: red">＊</span>開始上課日</h4>
                </div>
                <div class="col-lg-8 col-sm-11 col-xs-11 col-md-11 col6" style="vertical-align:middle;">
                <div class="col-lg-3 col3 col-sm-3 col-xs-3 col-md-3 " style="padding-top: 10px;">
                  <div class="col-lg-6 col3 col-sm-6 col-xs-6 col-md-6" style="text-align: right;padding-right: 5px;vertical-align:middle;">
                    <input type="radio" name="time" onchange="changeRO(this)" value="1">
                  </div>
                  <div class="col-lg-6 col6 col-sm-6 col-xs-6 col-md-6" style="vertical-align:middle;">
                    <span>立即</span>
                  </div>
                </div>
                <div class="col-lg-9 col6 col-sm-9 col-xs-9 col-md-9" style="vertical-align:middle;">
                  <div class="col-lg-2 col3 col-sm-2 col-xs-2 col-md-2"  style="text-align: right;padding-right: 5px;padding-top: 10px;">
                    <input type="radio" name="time" value="2" onchange="changeRO(this)">
                  </div>
                  <div class="col-lg-10 col3 col-sm-10 col-xs-10 col-md-10" style="padding-top: 5px;">
                    <input  name="datetext" id="datetext" type="text"  class="form-control input-md datetext" oncheck size="10" maxlength="10" onkeyup="changeROt(this)" onchange="changeROt(this)">
                  </div>
                </div>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1 ">
                <i class="fa fa-times-circle fa-2x time_icon" aria-hidden="true"></i>
                </div>
              </div>

              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                 <h2 style="font-size: 21px;font-weight: bold">老師條件需求(<span style="color: red">＊</span>為必填項目)</h2>
			  </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4><span style="color: red">＊</span>教學經驗</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <select  name="experience" class="form-control" onchange="changeAll(this)">
				   <option value="0">請選擇</option>
				   <option value="1">無經驗</option>
				   <option value="2">一年以下</option>
				   <option value="3">一~三年</option>
				   <option value="4">三~五年</option>
				   <option value="5">五年以上</option>
				</select>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>身分要求</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <select name="identity" class="form-control" onchange="changeAll(this)">
        				   <option value="0">請選擇</option>
        				   <option value="1">不拘</option>
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
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4><span style="color: red">＊</span>學歷門檻</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <!-- <input type="text" class="form-control"  name="schooltext" placeholder="" onkeyup="changeText(this)" /> -->
                <select name="schooltext"  class="form-control" onchange="changeAll(this)">
                   <option value="0">請選擇</option>
                   <option value="1">不拘</option>
                   <?php
                    $sql ="SELECT * FROM school";
                    $pdo = DB_CONNECT();
                    $rs =$pdo->query($sql);
                    foreach ($rs as $key => $row) {
                  ?>
                    <option value="<?php echo $row["id"]?>"><?php echo $row["val"]; ?></option>
                  <?php
                    }
                  ?>
                 </select>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x school_icon" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4><span style="color: red">＊</span>科系要求<br><h5>(以逗號區分)</h5></h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <input type="text" class="form-control"  name="departmenttext" placeholder="" onkeyup="changeText(this)" />
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x department_icon" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>薪資待遇</h4>
                </div>
                <div class="col-lg-8 col-sm-11 col-xs-11 col-md-11 col6">

                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col6 lows">
                  <div class="col-lg-4 col6 col-sm-4 col-xs-4 col-md-4" style="text-align: right;padding-right: 10px;padding-top: 5px;">
                    <span>最低</span>
                  </div>
                  <div class="col-lg-8 col6 col-sm-8 col-xs-8 col-md-8 low">
                    <!-- <input name="low" type="text"  class="form-control input-md" onkeyup="changeSalaryl(this)"> -->
                    <select name="low" class="form-control" onchange="changeSalary(this)">
                       <option value="0">請選擇</option>
                       <option value="100">NT.100</option>
                       <option value="200">NT.200</option>
                       <option value="300">NT.300</option>
                       <option value="400">NT.400</option>
                       <option value="500">NT.500</option>
                       <option value="600">NT.600</option>
                       <option value="700">NT.700</option>
                       <option value="800">NT.800</option>
                       <option value="900">NT.900</option>
                       <option value="1000">NT.1000</option>
                       <option value="1100">NT.1100</option>
                       <option value="1200">NT.1200</option>
                       <option value="1300">NT.1300</option>
                       <option value="1400">NT.1400</option>
                       <option value="1500">NT.1500</option>
                       <option value="1600">NT.1600</option>
                       <option value="1700">NT.1700</option>
                       <option value="1800">NT.1800</option>
                       <option value="1900">NT.1900</option>
                       <option value="2000">NT.2000</option>
                       <option value="2100">NT.2100</option>
                       <option value="2200">NT.2200</option>
                       <option value="2300">NT.2300</option>
                       <option value="2400">NT.2400</option>
                       <option value="2500">NT.2500</option>
                       <option value="3000">NT.2500以上</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col6 highs">
                  <div class="col-lg-4 col6 col-sm-4 col-xs-4 col-md-4" style="text-align: right;padding-right: 10px;padding-top: 5px;">
                    <span>最高</span>
                  </div>
                  <div class="col-lg-8 col6 col-sm-8 col-xs-8 col-md-8 high">
                   <!--  <input name="high" type="text"  class="form-control input-md" onkeyup="changeSalaryh(this)"> -->
                   <select name="high" class="form-control" onchange="changeSalary(this)">
                       <option value="0">請選擇</option>
                       <option value="100">NT.100</option>
                       <option value="200">NT.200</option>
                       <option value="300">NT.300</option>
                       <option value="400">NT.400</option>
                       <option value="500">NT.500</option>
                       <option value="600">NT.600</option>
                       <option value="700">NT.700</option>
                       <option value="800">NT.800</option>
                       <option value="900">NT.900</option>
                       <option value="1000">NT.1000</option>
                       <option value="1100">NT.1100</option>
                       <option value="1200">NT.1200</option>
                       <option value="1300">NT.1300</option>
                       <option value="1400">NT.1400</option>
                       <option value="1500">NT.1500</option>
                       <option value="1600">NT.1600</option>
                       <option value="1700">NT.1700</option>
                       <option value="1800">NT.1800</option>
                       <option value="1900">NT.1900</option>
                       <option value="2000">NT.2000</option>
                       <option value="2100">NT.2100</option>
                       <option value="2200">NT.2200</option>
                       <option value="2300">NT.2300</option>
                       <option value="2400">NT.2400</option>
                       <option value="2500">NT.2500</option>
                       <option value="3000">NT.2500以上</option>
                    </select>
                  </div>
                </div>

                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-11 col-sm-11 col-xs-11 col-md-11 pr">
                 <span class="pull-right"><a  data-toggle="modal" href="#salarys">行情查看</a></span>
                </div>
                <div class="col-lg-1 col-sm-1 col-xs-1 col-md-1">
                </div>
                </div>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>其他條件<br><h5>(限200字以內)</h5></h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">
                <textarea class="form-control input-md " name="other" id="other" cols="20" rows="10" onkeyup="changeText(this)" size="200" maxlength="200"></textarea>
                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1">
                <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                </div>
              </div>
             <!--  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col3">
                <h4 ><span style="color: red">＊</span>揪團</h4>
                </div>
                <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col6">

                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col6" style="padding-top: 8px;">
                  <div class="col-lg-4 col6 col-sm-4 col-xs-4 col-md-4" style="text-align: right;padding-right: 5px;">
                    <input type="radio" name="open" value="0">
                  </div>
                  <div class="col-lg-8 col6 col-sm-8 col-xs-8 col-md-8">
                    <span>關閉</span>
                  </div>
                </div>

                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col6" style="padding-top: 8px;">
                  <div class="col-lg-4 col6 col-sm-4 col-xs-4 col-md-4" style="text-align: right;padding-right: 5px;">
                    <input type="radio" name="open" value="1">
                  </div>
                  <div class="col-lg-8 col6 col-sm-8 col-xs-8 col-md-8">
                    <span>開放</span>
                  </div>
                </div>

                </div>
                <div class="col-lg-1 icon col-sm-1 col-xs-1 col-md-1" style="padding-top: 5px;">
                <i class="fa fa-times-circle fa-2x open_icon" aria-hidden="true"></i>
                </div>
              </div> -->
            
             <!--  <div class="form-group">
                <div class="col-md-8">
                  <button id="button1id" name="button1id" class="btn btn-success" onclick="checkcaseForm()" type="button">刊登</button>
                  <button id="button2id" name="button2id" class="btn btn-default" onclick="cancelForm()" type="button">取消</button>
                </div>
              </div> -->
	            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12" style="padding-top: 20px;text-align: center">
	          	<button id="button1id" name="button1id" class="btn bu" onclick="checkcaseForm()" type="button" style="padding: 10px;width: 40%;margin-right: 5px;">儲存資料</button>
	            <button id="button2id" name="button2id" class="btn bu" onclick="cancelForm()" type="button" style="padding: 10px;width: 40%;margin-left: 5px;">取消</button>
	           </div>

        <div class="modal fade" id="salarys" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content" style="height:300px;top:150px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="">
                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                        </button>
                        <h3 style="color: black;">薪資行情</h3>
                    </div>
                    <div class="modal-body as" style="text-align: center;">
                    <div class="" style="width: 100%;margin: 0 auto">
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </fieldset>
   </form>

<script src="addcase.js"></script>

<script type="text/javascript">
$(function(){
    $('#datetext').datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: "1950:2017"
    });
});
	$(document).ready(function () {
 
// $("input[name='time']").change(function(){
//     if($(".time_icon").hasClass('fa-times-circle') == true){
//       $(".time_icon").removeClass('fa-times-circle');
//       $(".time_icon").addClass('fa-check-circle');
//      }else{
//      }
// });


	$("#addrow3").on("click", 
  function () {
   $.getJSON("getStaticData.php?action=WeekType",
    function(data)
    {
      var newRow = $("<tr>");
      var cols = "";
      cols += '<td class="col-lg-3 weeks col-sm-3 col-xs-3 col-md-3"><select name="myWeek[]" class="form-control" onchange="changeWeek(this)">';
           for(var i=0;i<data.length;i++)
			{
			   cols += '<option value="'+ (data[i].key+1) +'">'+data[i].value+'</option>';
		    }
		   cols += '</select></td>';
     	   cols += '<td class="col-lg-4 starttime col-sm-4 col-xs-4 col-md-4"><select  name="myStartTime[]" class="form-control" onchange="changeTime(this)"><option value="0">請選擇</option><option value="700">7:00</option><option value="730">7:30</option><option value="800">8:00</option><option value="830">8:30</option><option value="900">9:00</option><option value="930">9:30</option><option value="1000">10:00</option><option value="1030">10:30</option><option value="1100">11:00</option><option value="1130">11:30</option><option value="1200">12:00</option><option value="1230">12:30</option><option value="1300">13:00</option><option value="1330">13:30</option><option value="1400">14:00</option><option value="1430">14:30</option><option value="1500">15:00</option><option value="1530">15:30</option><option value="1600">16:00</option><option value="1630">16:30</option><option value="1700">17:00</option><option value="1730">17:30</option><option value="1800">18:00</option><option value="1830">18:30</option><option value="1900">19:00</option><option value="1930">19:30</option><option value="2000">20:00</option><option value="2030">20:30</option><option value="2100">21:00</option><option value="2130">21:30</option><option value="2200">22:00</option><option value="2230">22:30</option><option value="2300">23:00</option><option value="2330">23:30</option></select></td>';
           cols += '<td class="col-lg-4 endtime col-sm-4 col-xs-4 col-md-4"><select name="myEndTime[]" class="form-control" onchange="changeEnd(this)"><option value="0">請選擇</option><option value="700">7:00</option><option value="730">7:30</option><option value="800">8:00</option><option value="830">8:30</option><option value="900">9:00</option><option value="930">9:30</option><option value="1000">10:00</option><option value="1030">10:30</option><option value="1100">11:00</option><option value="1130">11:30</option><option value="1200">12:00</option><option value="1230">12:30</option><option value="1300">13:00</option><option value="1330">13:30</option><option value="1400">14:00</option><option value="1430">14:30</option><option value="1500">15:00</option><option value="1530">15:30</option><option value="1600">16:00</option><option value="1630">16:30</option><option value="1700">17:00</option><option value="1730">17:30</option><option value="1800">18:00</option><option value="1830">18:30</option><option value="1900">19:00</option><option value="1930">19:30</option><option value="2000">20:00</option><option value="2030">20:30</option><option value="2100">21:00</option><option value="2130">21:30</option><option value="2200">22:00</option><option value="2230">22:30</option><option value="2300">23:00</option><option value="2330">23:30</option></select></td>';
           cols += '<td class="col-sm-1 icon col-lg-1 col-xs-1 col-md-1"><i class="fa fa-times-circle fa-2x ibtnDel" aria-hidden="true" type="button"></i></td>';
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


</script>