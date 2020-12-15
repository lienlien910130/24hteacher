function change(obj){

		var l = $(obj).parent().parent().find(".lession").children();
	    var v = $(obj).find(":selected").val();
        var i = $(obj).parent().parent().parent().find(".icon").children();
      
		$.ajax({
            type: "POST",
            url: 'Subj_ajax.php',
            cache: false,
            data:'CNo='+v,
            error: function(){
                alert('Ajax request 發生錯誤');
            },
            success: function(data){
                $(l).html(data);
                var lv = $(l).find(":selected").val();
                if(lv == 0){
                $(i).removeClass("fa-check-circle");
                $(i).addClass("fa-times-circle");
                }else{
                    $(i).removeClass("fa-times-circle");
                    $(i).addClass("fa-check-circle");  
                }
            }
        });

        $(l).change(function(){
            var lv = $(l).find(":selected").val();
                if(lv == 0){
                $(i).removeClass("fa-check-circle");
                $(i).addClass("fa-times-circle");
                }else{
                    $(i).removeClass("fa-times-circle");
                    $(i).addClass("fa-check-circle");  
                }
        });
 			
}
function changeCity(obj){
        var t = $(obj).parent().parent().find(".town").children();
        var i = $(obj).parent().parent().parent().find(".icon").children();
        var v = $(obj).find(":selected").val();

            $.ajax({
            type: "POST",
            url: 'Town_ajax_2.php',
            cache: false,
            data:'CNo='+v,
            error: function(){
                alert('Ajax request 發生錯誤');
            },
            success: function(data){
                $(t).html(data);
                var lv = $(t).find(":selected").val();
                if(lv == 0){
                $(i).removeClass("fa-check-circle");
                $(i).addClass("fa-times-circle");
                }else{
                    $(i).removeClass("fa-times-circle");
                    $(i).addClass("fa-check-circle");  
                }
            }
           });

            $(t).change(function(){
            var lv = $(t).find(":selected").val();
                if(lv == 0){
                $(i).removeClass("fa-check-circle");
                $(i).addClass("fa-times-circle");
                }else{
                    $(i).removeClass("fa-times-circle");
                    $(i).addClass("fa-check-circle");  
                }
        });

}
function changeAll(obj) {
    var v = $(obj).find(":selected").val();
    var i = $(obj).parent().parent().find(".icon").children();
    if(v == 0){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else{
        $(i).removeClass("fa-times-circle");
        $(i).addClass("fa-check-circle");  
    }
}
function changeText(obj) {
    var v = $(obj).val();
    var i = $(obj).parent().parent().find(".icon").children();
    if(v.length == 0){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else{
        $(i).removeClass("fa-times-circle");
        $(i).addClass("fa-check-circle");  
    }
}
function changeSalary(obj) {
   // var v = $(obj).find(":selected").val();
    var s = $(obj).parent().parent().parent().find(".highs").find(".high").children().find(":selected").val();
    var f = $(obj).parent().parent().parent().find(".lows").find(".low").children().find(":selected").val();
    var i = $(obj).parent().parent().parent().parent().find(".icon").children();
    if(s == 0 || f == 0){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else{
        $(i).removeClass("fa-times-circle");
        $(i).addClass("fa-check-circle");  
    }
}
function changeRO(obj) {
   var index = $(obj).val();
   var i = $(obj).parent().parent().parent().parent().find(".icon").children();
   if(index == 1){
      $(i).removeClass("fa-times-circle");
      $(i).addClass("fa-check-circle"); 
   }else{
        var day = $("#datetext").val();
        if(day.length != 10 ){
            $(i).removeClass("fa-check-circle");
            $(i).addClass("fa-times-circle"); 
        }else{
            $(i).removeClass("fa-times-circle");
            $(i).addClass("fa-check-circle"); 
        }
        
   } 
}
function changeROt(obj){
  var index = $(obj).val();
  var i = $(obj).parent().parent().parent().parent().find(".icon").children();
  if(index.length != 10 ){
    $(i).removeClass("fa-check-circle");
    $(i).addClass("fa-times-circle"); 
  }else{
    $(i).removeClass("fa-times-circle");
    $(i).addClass("fa-check-circle"); 
  }
}
function changeWeek(obj) {
    var v = $(obj).find(":selected").val();
    var s = $(obj).parent().parent().find(".starttime").children().find(":selected").val();;
    var e = $(obj).parent().parent().find(".endtime").children().find(":selected").val();;
    var i = $(obj).parent().parent().find(".icon").children();
    if(v == 0){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else{
        if(s==0 || e==0){
            $(i).removeClass("fa-check-circle");
            $(i).addClass("fa-times-circle");
        }else{
            $(i).removeClass("fa-times-circle");
            $(i).addClass("fa-check-circle"); 
          
        }
    }
}
function changeTime(obj) {
    var v = $(obj).find(":selected").val();
    var s = $(obj).parent().parent().find(".weeks").children().find(":selected").val();;
    var e = $(obj).parent().parent().find(".endtime").children().find(":selected").val();;
    var i = $(obj).parent().parent().find(".icon").children();
    if(v == 0){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else{
        if(s==0 || e==0){
            $(i).removeClass("fa-check-circle");
            $(i).addClass("fa-times-circle");
        }else{
            $(i).removeClass("fa-times-circle");
            $(i).addClass("fa-check-circle"); 
          
        }
    }
}
function changeEnd(obj) {
    var v = $(obj).find(":selected").val();
    var s = $(obj).parent().parent().find(".weeks").children().find(":selected").val();;
    var e = $(obj).parent().parent().find(".starttime").children().find(":selected").val();;
    var i = $(obj).parent().parent().find(".icon").children();
    if(v == 0){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else{
        if(s==0 || e==0){
            $(i).removeClass("fa-check-circle");
            $(i).addClass("fa-times-circle");
        }else{
            $(i).removeClass("fa-times-circle");
            $(i).addClass("fa-check-circle"); 
          
        }
    }
}
 function cancelForm()
{
    location.href="case.php";
}

 function checkcaseForm()
{
    var frm = document.forms["caseForm"];
    var t = $(".fa-times-circle");
    re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i;
    var rule3=/^09\d{2}\d{6}$/;
    var Today=new Date();
    var year_n = Today.getFullYear();
    if(frm.myName.value=="" ||frm.myIdentity.value==0 ||
        frm.myGender.value==0 ||  frm.mySchool.value=="" || 
        frm.extent.value == "" ||  frm.connectionName.value=="" ||
        frm.connectionPhone.value=="" || frm.myCity.value==0 ||
        frm.myTown.value==0 || frm.location.value == 0 ||
        frm.load.value=="" || frm.schooltext.value==0 ||
        frm.departmenttext.value=="" || frm.mySubject.value==0 ||
        frm.myLession.value==0 ||
        frm.goal.value == 0 || frm.way.value == 0 || 
        frm.person.value==0 || frm.rang.value == 0 ||
        frm.experience.value==0 || frm.identity.value == 0 || 
        frm.low.value == "" || frm.high.value == "" ||  
        frm.other.value ==""  || frm.time.value ==0 || t.length>=6
        ){
        alert("欄位不可空白");
    }else if(frm.time.value == 2){
      var k = frm.datetext.value.split("-");
      if(frm.datetext.value.length > 10 || frm.datetext.value.length < 10){
        alert("開始上課日期輸入錯誤");
      }else if(  k[0] > year_n || k[0] < 1911 || k[1] > 12 || k[1] < 01 || k[2] >31 || k[2] <01 || k[0].length!= 4 ||k[1].length !=2 || k[2].length !=2 || k[0] <1912 || (k[1] == 02 && k[2]>29) ||
       (k[1] == 04 && k[2]>30) || (k[1] == 06 && k[2]>30) 
       || (k[1] == 09 && k[2]>30) || (k[1] == 11 && k[2]>30) ){
        alert("開始上課日期輸入錯誤");
      }
    }else if(!rule3.test(frm.connectionPhone.value)){
         alert("手機號碼格式錯誤");
    }else if( re.test(frm.myName.value.toLowerCase()) || re.test(frm.mySchool.value.toLowerCase()) ||
        re.test(frm.extent.value.toLowerCase()) || re.test(frm.connectionName.value.toLowerCase()) ||
        re.test(frm.connectionPhone.value.toLowerCase()) || re.test(frm.load.value.toLowerCase()) ||
         re.test(frm.departmenttext.value.toLowerCase()) || re.test(frm.low.value.toLowerCase()) ||
         re.test(frm.high.value.toLowerCase()) || re.test(frm.other.value.toLowerCase()) ){
         alert("欄位不可輸入無效字元");
    }else{
        
         frm.submit();
    }
}


