
          <?php 
          $_SERVER['PHP_SELF'];
          $out = explode("/", $_SERVER['PHP_SELF']);
          ?>
           <div class="col-lg-12 am_o" style="">
             <h3 style="word-break: break-all;">Hi! <?php echo $_SESSION["account"]?></h3>
             <br>
             <?php 
             @session_start();
             include_once 'lib/core.php';
             ?>
           </div>

           <div class="col-lg-12 am_t" style="";>
                <div class="col-lg-12" style="">
                 <h3>會員資料管理</h3>
                </div>
                <div class="col-lg-12 a123">
                <?php 
                if($out[2] == "account.php"){
                  ?>
                   <a href="account.php" class="ins">修改基本資料</a>
                  <?php
                }else{
                  ?>
                   <a href="account.php">修改基本資料</a>
                  <?php
                }
                if($out[2] == "change_password.php"){
                  ?>
                   <a href="change_password.php" class="ins">更改密碼</a>
                  <?php
                }else{
                  ?>
                   <a href="change_password.php">更改密碼</a>
                  <?php
                }
                ?>
               </div>
           </div>
          
           <div class="col-lg-12 am_th" style="";>
                <div class="col-lg-12" style="">
                 <h3>老師履歷管理</h3>
                </div>
                <div class="col-lg-12 a123">
                <?php 
                if($out[2] == "resume.php"){
                  ?>
                   <a href="resume.php" class="ins">修改履歷表</a>
                  <?php
                }else{
                  ?>
                   <a href="resume.php">修改履歷表</a>
                  <?php
                }
                ?>
                 <?php 
                if($out[2] == "clouds.php"){
                  ?>
                   <a href="clouds.php" class="ins">教學影片/教材&筆記</a>
                  <?php
                }else{
                  ?>
                   <a href="clouds.php">教學影片/教材&筆記</a>
                  <?php
                }
                ?>
               </div>
           </div>

            <div class="col-lg-12 am_fo" style="";>
                <div class="col-lg-12" style="">
                 <h3>應徵案件管理</h3>
                </div>
                <div class="col-lg-12 a123">
                 <?php 
                if($out[2] == "interview_one.php"){
                  ?>
                   <a href="interview_one.php" class="ins">面試管理</a>
                  <?php
                }else{
                  ?>
                   <a href="interview_one.php">面試管理</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "favorite.php"){
                  ?>
                   <a href="favorite.php" class="ins">我的最愛案件</a>
                  <?php
                }else{
                  ?>
                   <a href="favorite.php">我的最愛案件</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "matchcase.php"){
                  ?>
                   <a href="matchcase.php" class="ins">最新合適案件</a>
                  <?php
                }else{
                  ?>
                   <a href="matchcase.php">最新合適案件</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "commentteacher.php"){
                  ?>
                   <a href="commentteacher.php" class="ins">評價紀錄</a>
                  <?php
                }else{
                  ?>
                   <a href="commentteacher.php">評價紀錄</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "casedeal_tea.php"){
                  ?>
                   <a href="casedeal_tea.php" class="ins">成交回報</a>
                  <?php
                }else{
                  ?>
                   <a href="casedeal_tea.php">成交回報</a>
                  <?php
                }
                ?>
                </div>
           </div>       

           <div class="col-lg-12 am_fi" style="";>
                <div class="col-lg-12" style="">
                 <h3>家長案件管理</h3>
                </div>
                <div class="col-lg-12 a123">
                <?php 
                if($out[2] == "case.php"){
                  ?>
                   <a href="case.php" class="ins">新增案件</a>
                  <?php
                }else{
                  ?>
                   <a href="case.php">新增案件</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "history.php"){
                  ?>
                   <a href="history.php" class="ins">案件管理</a>
                  <?php
                }else{
                  ?>
                   <a href="history.php">案件管理</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "buy.php"){
                  ?>
                   <a href="buy.php" class="ins">購買紀錄</a>
                  <?php
                }else{
                  ?>
                   <a href="buy.php">購買紀錄</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "interview_two.php"){
                  ?>
                   <a href="interview_two.php" class="ins">面試管理</a>
                  <?php
                }else{
                  ?>
                   <a href="interview_two.php">面試管理</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "favorite_tea.php"){
                  ?>
                   <a href="favorite_tea.php" class="ins">我的最愛老師</a>
                  <?php
                }else{
                  ?>
                   <a href="favorite_tea.php">我的最愛老師</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "matchteacher.php"){
                  ?>
                   <a href="matchteacher.php" class="ins">最新媒合老師</a>
                  <?php
                }else{
                  ?>
                   <a href="matchteacher.php">最新媒合老師</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "commentcase.php"){
                  ?>
                   <a href="commentcase.php" class="ins">評價紀錄</a>
                  <?php
                }else{
                  ?>
                   <a href="commentcase.php">評價紀錄</a>
                  <?php
                }
                ?>
                <?php 
                if($out[2] == "casedeal.php"){
                  ?>
                   <a href="casedeal.php" class="ins">成交回報</a>
                  <?php
                }else{
                  ?>
                   <a href="casedeal.php">成交回報</a>
                  <?php
                }
                ?>
                   <!-- <a href="apply.php">揪團案件</a> -->
                  
                </div>
           </div>   
           
           <!-- <div class="col-lg-12 am_si" style="";>
                <div class="col-lg-12" style="">
                 <h3>帳務管理</h3>
                </div>
                <div class="col-lg-12 a123">
                   <a href="addpay.php"> 我要付款</a>
                   <a href="pay.php">  付款紀錄</a>
                </div>
           </div>  --> 


