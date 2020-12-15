          
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
                 <h3>管理中心</h3>
                </div>
                <div class="col-lg-12 a123">
                 <a href="member_manage.php">會員管理</a>
                 <a href="man_resume.php">履歷查看</a>
                 <a href="case_manage.php">案件管理</a>
                 <a href="man_inter.php">面試管理</a>
                 <a href="man_deal.php">成交回報</a>
                 <a href="certificate.php">畢業證書審核</a>
                 <a href="card.php">證照證明審核</a>
                 <a href="man_video.php">教學影片審核</a>
                 <a href="man_notes.php">教材&筆記審核</a>
                 <a href="buynotes.php">購買教材&筆記管理</a>
                 <a href="parents.php">家長情報&私校師資文章</a>
                 <a href="article.php">網站文章管理</a>
                 <a href="picture.php">網站圖片管理</a>
                 
                 <a href="fileupload.php">下載表格管理</a>
                 <a href="man_question.php">常見問題管理</a>
                 <a href="reaction.php">意見反應管理</a>
                 <a href="art_newsletter.php">電子報文章管理</a>
                 <a href="man_newsletter.php">電子報訂閱者管理</a>
               </div>
           </div>
          
           