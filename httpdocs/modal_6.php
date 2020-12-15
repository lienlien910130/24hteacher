<?php  
$i =substr(strip_tags(addslashes(trim(@$_POST["i"]))),0,40);
 //$i =@$_POST["i"];
?>
 <style type="text/css">
    	.after_read {
    		display: none;
    	}
    	.before_read {
    		display: block;
    	}
</style>
<div class="modal fade" id="myRegister" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content log" style="height: 650px;">
                    <div class="modal-header" style="border:0;padding-bottom: 0PX;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="" onclick="cancelregi()">
                       <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body as" style="text-align: center;">

                   <div class="log" style="margin: 0 auto">
                   <form method="POST" action="registerProc.php" accept-charset="UTF-8" id="registerForm">
                     <div class="col-lg-12">
                     
                      <h2 style="color: rgb(239,97,0);">會員註冊</h2>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                      <button type="button" class="btn bf" data-dismiss="modal" onclick="reglogins()" style="width:80%;height: 50px;margin: 0 auto;margin-bottom: 20px;background-color: rgb(59,89,152);color: white;font-size: 21px;">facebook 登入</button>
                      </div>
                       <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                       <?php 
                      include_once 'gpConfig.php';
                      include_once 'User.php';
                        if(isset($_GET['code'])){
                            $gClient->authenticate($_GET['code']);
                            $_SESSION['token'] = $gClient->getAccessToken();
                            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
                        }

                        if (isset($_SESSION['token'])) {
                            $gClient->setAccessToken($_SESSION['token']);
                        }
                       $authUrl = $gClient->createAuthUrl();
								 $regoogle =  filter_var($authUrl, FILTER_SANITIZE_URL);
                       ?>
                      <!-- <button type="button" class="btn bg" data-dismiss="modal" onclick="" style="width: 80%;height: 50px;margin: 0 auto;margin-bottom: 20px;background-color: rgb(209,67,55);color: white;font-size: 21px;">Google+ 登入</button> -->
                      <a href="<?php echo  filter_var($authUrl, FILTER_SANITIZE_URL);?>"  type="button" class="btn bg after_read"  id="after_read"  style="width: 80%;height: 50px;margin: 0 auto;margin-bottom: 20px;background-color: rgb(209,67,55);color: white;font-size: 21px;"  onclick="javascript:regooglefu($regoogle)">Google+ 登入</a>
						   		 <button type="button" class="btn bg before_read" id="before_read"  onclick="regooglefu()" style="width:80%;height: 50px;margin: 0 auto;margin-bottom: 20px;background-color:rgb(209,67,55);color: white;font-size: 21px;">Google+ 登入</button>
                      </div>
                      <div class="col-lg-12">
                      <input type="text" id="username" class="span4 form-control form-group" name="username" placeholder="email 帳號" style="width: 80%;height: 50px;margin: 0 auto;margin-bottom: 20px;font-size: 21px;" size="35" maxlength="35" >
                      </div>
                      <div class="col-lg-12">
                      <input type="password" id="password1" class="span4 form-control form-group" name="password1" placeholder="密碼" style="width: 80%;height: 50px;margin: 0 auto;margin-bottom: 20px;font-size: 21px" size="12" maxlength="12">
                      </div>
                      <div class="col-lg-12">
                      <input type="password" id="password2" class="span4 form-control form-group" name="password2" placeholder="確認密碼" style="width: 80%;height: 50px;margin: 0 auto;margin-bottom: 20px;font-size: 21px" size="12" maxlength="12">
                      </div>
                      <div class="col-lg-12">
                      <button type="button" class="btn bu" onclick="checkreform()" style="width: 80%;margin-bottom: 20px;height: 50px;;font-size: 21px">註冊</button><br>
                      </div>
                      <div class="col-lg-12" style="font-size: 21px;color: black;" id="chan">
                      <span style="color: red;font-size: 14px;">*請先閱讀服務條款再進行資料填寫</span><br>
                      <a class="myclau" data-toggle="modal" href="#myClause">
                      <?php 
                      if($i != ""){
                        ?>
                        <input type="checkbox" name="check" value="1" id="check" onclick="" checked readonly disabled>
                        <?php
                      }else{
                        ?>
                        <input type="checkbox" name="check" value="1" id="check" onclick="">
                        <?php
                      }
                      ?>
                       我已閱讀完會員服務條款</a>
                      </div>
                      </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
      function checkreform(){
        var frm = document.forms["registerForm"];
        var ch=document.getElementById('check');
        re= /select|update|delete|exec|count|'|"|=|;|>|<|!|-|&|%/i;
        if(ch.checked){
          if(frm.username.value == "" || frm.password1.value == "")
          {
              alert("欄位不可空白");
          }else if(re.test(frm.username.value.toLowerCase()) || re.test(frm.password1.value.toLowerCase())){
              alert("欄位不可輸入無效字元");
          }
          else if(!frm.username.value.match(/^[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*@[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*\.+[a-zA-Z]+$/)){
              alert("請輸入正確的email格式"); 
          }
          else if(frm.password1.value.length <8 || frm.password1.value.length >12){
              alert("密碼長度不對"); 
          }
          else if(frm.password1.value != frm.password2.value){
            alert("密碼輸入錯誤");
          }
          else{
              frm.submit();
          }
        }else{
          alert("請先閱讀會員服務條款再填寫註冊資料");
        }
    
  }
  function cancelregi() {
    $(".modal-backdrop").remove();
       $.ajax({
                 type:'POST',
                 url :'modal_6.php',
                 data:"i=",
                 dataType:'html', 
                 success : function(data){
                $("#chang").html(data);
                $("#myRegister").modal("hide");
                $("#myClause").modal("hide");
             }
       });
  }
			$(document).ready(function() {   
           var ch=document.getElementById('check');
			   if(ch.checked){
			  	$("#before_read").removeClass("before_read");
				$("#before_read").addClass("after_read");
				$("#after_read").removeClass("after_read");
				$("#after_read").addClass("before_read");
			   }
        });
			function regooglefu(){
			  var ch=document.getElementById('check');
			  if(!ch.checked){
			    alert("請先閱讀會員服務條款再進行註冊");
			  }
			}
        </script>