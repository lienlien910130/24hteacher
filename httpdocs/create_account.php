<div class="col-lg-12" style="border: 1px solid #e5e5e5;padding-bottom: 10px;margin-bottom: 10px">
    <h1>會員註冊</h1>
    <form method="POST" action="registerProc.php" accept-charset="UTF-8" id="registerForm">
            <label>帳號</label>
            <input type="text" id="username" class="span4" name="username" placeholder="請輸入信箱">
            <br>
            <label>密碼</label>
            <input type="password" id="password" class="span4" name="password" placeholder="請輸入長度為8~12的密碼">
            <br>
            <label>確認密碼</label>
            <input type="password" id="password1" class="span4" name="password1" placeholder="請輸入密碼">
            <br>
            <button onclick="checkreForm()" name="login" class="btn" style="width: 300px" type="button">註冊</button>
   </form>    
</div>

<script type="text/javascript">

  function checkreForm()
{
    var frm = document.forms["registerForm"];
    if(frm.username.value == "" || frm.password.value == "")
    {
        alert("欄位不可空白");
    }
    else if(!frm.username.value.match(/^[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*@[0-9a-zA-Z]([-._]*[0-9a-zA-Z])*\.+[a-zA-Z]+$/)){
        alert("請輸入正確的email格式"); 
    }
    else if(frm.password.value.length <8 || frm.password.value.length >12){
    	  alert("密碼長度不對"); 
    }
    else if(frm.password1.value != frm.password.value){
    	alert("密碼輸入錯誤");
    }
    else{
        frm.submit();
    }
}
</script>