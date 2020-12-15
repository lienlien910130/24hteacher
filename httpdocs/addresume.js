//table1
function change(obj){

		var l = $(obj).parent().parent().find(".lession").children();
	    var v = $(obj).find(":selected").val();
        var i = $(obj).parent().parent().find(".icon").children();
      
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
            // $.ajax({
            //     type: "POST",
            //     url: 'Less_ajax.php',
            //     cache: false,
            //     data: 'TNo='+lv,
            //     error: function(){
            //         alert('Ajax request 發生錯誤');
            //     },
            //     success: function(data){
            //         if(lv == 0){
            //           $(i).removeClass("fa-check-circle");
            //           $(i).addClass("fa-times-circle");
            //         }else{
            //           $(i).removeClass("fa-times-circle");
            //           $(i).addClass("fa-check-circle");  
            //         }
            //     }
            // });
        });
 			
}
          
//table2
function changeCity(obj){
	    var t = $(obj).parent().parent().find(".town").children();
	    var v = $(obj).find(":selected").val();
        var i = $(obj).parent().parent().find(".icon").children();
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
//table3
function changeObject(obj){
		var p = $(obj).parent().parent().find(".price").children();
		var v = $(obj).find(":selected").text();
        var i = $(obj).parent().parent().find(".icon").children();
		$.ajax({
            type: "POST",
            url: 'Object_ajax.php',
            cache: false,
            data:'Obj='+v,
            error: function(){
                alert('Ajax request 發生錯誤');
            },
            success: function(data){
                $(p).html(data);
                var lv = $(p).find(":selected").val();
                if(lv == 0){
                    $(i).removeClass("fa-check-circle");
                    $(i).addClass("fa-times-circle");
                }else{
                    $(i).removeClass("fa-times-circle");
                    $(i).addClass("fa-check-circle");  
                }
            }
        });
        $(p).change(function(){
            var lv = $(p).find(":selected").val();
            if(lv == 0){
                $(i).removeClass("fa-check-circle");
                $(i).addClass("fa-times-circle");
            }else{
                $(i).removeClass("fa-times-circle");
                $(i).addClass("fa-check-circle");  
            }
           
        });

        
}


//table5
function changeLanguages(obj){
        var le = $(obj).parent().parent().find(".level").children();
        var v = $(obj).find(":selected").val();
        var vl = $(obj).find(":selected").text();
        var i = $(obj).parent().parent().find(".icon").children();
        $.ajax({
            type: "POST",
            url: 'Languages_ajax.php',
            cache: false,
            data:'CNo='+v,
            error: function(){
                alert('Ajax request 發生錯誤');
            },
            success: function(data){
                $(le).html(data);
                var lev = $(le).find(":selected").val();
                if(lev == 0){
                    $(i).removeClass("fa-check-circle");
                    $(i).addClass("fa-times-circle");
                }else{
                    $(i).removeClass("fa-times-circle");
                    $(i).addClass("fa-check-circle");  
                }
            }
        });

        $(le).change(function(){
            
            var lev = $(le).find(":selected").val();
            if(lev == 0){
                $(i).removeClass("fa-check-circle");
                $(i).addClass("fa-times-circle");
            }else{
                $(i).removeClass("fa-times-circle");
                $(i).addClass("fa-check-circle");  
            } 
            
        });   
}
function changeCountry(obj){
        var le = $(obj).parent().parent().find(".time").children();
        var v = $(obj).find(":selected").val();
        var vl = $(obj).find(":selected").text();
        var i = $(obj).parent().parent().find(".icon").children();
        $.ajax({
            type: "POST",
            url: 'Country_ajax.php',
            cache: false,
            data:'CNo='+v,
            error: function(){
                alert('Ajax request 發生錯誤');
            },
            success: function(data){
                $(le).html(data);
                var lev = $(le).find(":selected").val();
                if(lev == 0){
                    $(i).removeClass("fa-check-circle");
                    $(i).addClass("fa-times-circle");
                }else{
                    $(i).removeClass("fa-times-circle");
                    $(i).addClass("fa-check-circle");  
                } 
            }
        });
        $(le).change(function(){
            var lev = $(le).find(":selected").val();
            if(lev == 0){
                $(i).removeClass("fa-check-circle");
                $(i).addClass("fa-times-circle");
            }else{
                $(i).removeClass("fa-times-circle");
                $(i).addClass("fa-check-circle");  
            } 
        });
                
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
function changeDO(obj) {
    var v = $(obj).val();
    var v1 = $(obj).parent().parent().find(".DT").children().val();
    var i = $(obj).parent().parent().find(".icon").children();
    if(v.length<10){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else if(v.length==10){
        if(v1.length<10){
          $(i).removeClass("fa-check-circle");
          $(i).addClass("fa-times-circle");
        }else if(v1.length==10){
          $(i).removeClass("fa-times-circle");
          $(i).addClass("fa-check-circle"); 
        }else{
          $(i).removeClass("fa-check-circle");
          $(i).addClass("fa-times-circle");
        }
    }else{
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }
}
function changeDT(obj) {
    var v = $(obj).val();
    var v1 =$(obj).parent().parent().find(".DO").children().val();
    var i = $(obj).parent().parent().find(".icon").children();
    if(v.length<10){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else if(v.length==10){
        if(v1.length<10){
          $(i).removeClass("fa-check-circle");
          $(i).addClass("fa-times-circle");
        }else if(v1.length==10){
          $(i).removeClass("fa-times-circle");
          $(i).addClass("fa-check-circle"); 
        }else{
          $(i).removeClass("fa-check-circle");
          $(i).addClass("fa-times-circle");
        }
    }else{
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }
}
function changeOne(obj) {
    var v = $(obj).val();
    var v1 = $(obj).find(":selected").val();
    var t = $(obj).parent().parent().find(".one").children().find(":selected").val();
    var i = $(obj).parent().parent().find(".icon").children();
    if(v == "" || v1 == 0){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else{
        if(t == 0){
          $(i).removeClass("fa-check-circle");
          $(i).addClass("fa-times-circle");
        }else{
         $(i).removeClass("fa-times-circle");
         $(i).addClass("fa-check-circle");   
        }
        
    }
}

function changeTwo(obj) {
    var v = $(obj).find(":selected").val();
    var t = $(obj).parent().parent().find(".two").children().val();
    var i = $(obj).parent().parent().find(".icon").children();
    if(v == 0){
        $(i).removeClass("fa-check-circle");
        $(i).addClass("fa-times-circle");
    }else{
        if(t == ""){
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
    location.href="resume.php";
}
 function checkaForm()
{
    var frm = document.forms["resumeForm"];
    var trigger = $(".fa-times-circle");
    var Today=new Date();
    var year_n = Today.getFullYear();
	 var month = Today.getMonth()+1
	 var day = Today.getDate();
    var k = frm.start.value.split("-");
    var e = frm.end.value.split("-");
    re= /select|update|delete|exec|count|'|"|=|;|>|<|%/i;
	 var input = document.getElementById("pic");  
    if(frm.year.value == 0 || frm.experience.value == "" || 
        frm.way.value == 0 || frm.will.value==0 || 
        frm.education.value == 0 ||frm.situation.value==0 || 
        frm.school.value == 0 || frm.start.value == "" || 
        frm.end.value == "" || frm.identity.value == 0 || 
        frm.other.value =="" || trigger.length >=5 
        || frm.department.value ==""){
        if( frm.end.value.length >10 || frm.start.value.length >10 ){
          alert("就學期間日期格式錯誤");
        }else{
          alert("欄位不可空白");
        }
    }else if(re.test(frm.experience.value.toLowerCase()) || 
        re.test(frm.start.value.toLowerCase()) || 
        re.test(frm.end.value.toLowerCase()) || 
        re.test(frm.other.value.toLowerCase()) || 
        re.test(frm.department.value.toLowerCase())){
        alert("欄位不可輸入無效字元");
    }else if( k[0] > year_n || k[0] < 1911 || k[1] > 12 || k[1] < 01 || k[2] >31 || k[2] <01 || k[0].length!= 4 ||k[1].length !=2 || k[2].length !=2 || k[0] <1912 || (k[1] == 02 && k[2]>29) ||
       (k[1] == 04 && k[2]>30) || (k[1] == 06 && k[2]>30) 
       || (k[1] == 09 && k[2]>30) || (k[1] == 11 && k[2]>30) || (k[0] == year_n && k[1] > month) || (k[0] == year_n && k[1] == month && k[2] > day )  ){
       alert("就學期間日期輸入錯誤");
    }else if( e[0] > year_n || e[0] < 1911 || e[1] > 12 || e[1] < 01 || e[2] >31 || k[2] <01 || k[0].length!= 4 ||k[1].length !=2 || k[2].length !=2 || k[0] <1912 || (k[1] == 02 && k[2]>29) ||
       (e[1] == 04 && e[2]>30) || (e[1] == 06 && e[2]>30) 
       || (e[1] == 09 && e[2]>30) || (e[1] == 11 && e[2]>30) ||
       k[0]> e[0] || (e[0] == year_n && e[1] > month) || (e[0] == year_n && e[1] == month && e[2] > day ) ){
        alert("就學期間日期輸入錯誤");
    }else if(frm.experience.value.length>800){
        alert("經驗與自傳描述超過800字!");
    }else if(frm.start.value.length>10 || 
        frm.end.value.length>10){
        alert("就學期間日期格式輸入錯誤");
    }else if(input.value != ""){
		 var name = input.value;
		  var ar_name = name.split('.');
		  var ar_ext = ['png', 'jpg', 'gif']; 
		  for(var i=0; i<ar_ext.length; i++){
			if(ar_ext[i] == ar_name[1]) {
			  re = 1;
			  break;
			}
		  }
		 if(re == 1){
			 frm.submit();							
		}else{
			alert("畢業證書檔案類型上傳錯誤，請重新選擇");						
		}
		
    }else{
         frm.submit();
        
    }

}