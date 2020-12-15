<?php 
$x = @$_GET["id"];
$arr= @$_POST["arr"];
$arr1= @$_POST["arr1"];
?>

 <div class="modal fade bs-example-modal-lg" id="myTime" role="dialog" style="top:20%" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="" ><i class="fa fa-times-circle-o" aria-hidden="true"></i></button>
                        <div class="col-lg-12" style="padding: 20px;background-color: rgb(239,239,239);">
                          星期選單選單：最多選三個
                        </div>
                        <div id="m_ti" class="col-lg-12">
                        <?php 
                        if($arr != "undefined" || $arr != ""){
                          ?>
                          <input type="text" name="ggg" id="ggg"  value="<?php echo $arr?>" style="display: none">
                          <input type="text" name="iii" id="iii"  value="<?php echo $arr1?>" style="display: none">
                          <?php
                        }else{
                          ?>
                          <input type="text" name="ggg" id="ggg" style="display: none">
                          <input type="text" name="iii" id="iii" style="display: none">
                          <?php
                          }
                          ?>
                          <input type="text" name="hhh" id="hhh" style="display: none">
                          <?php
                          $out = explode(",", $arr);
                            @session_start();
                            include_once 'lib/core.php';
                            $pdo = DB_CONNECT();
                            if($arr != ""){
                            for ($i=0; $i <count($out) ; $i++) { 
                              $sql = "SELECT * FROM week WHERE id =".$out[$i];
                              $rs = $pdo ->query($sql);
                              foreach ($rs as $key => $row) {
                               ?>
                             <a  href="#" onclick="delete_thist(<?php echo $row["id"]?>)" class="sv"><i class="fa fa-times-circle" aria-hidden="true"></i>  <?php echo $row["val"]?>  </a>
                             <?php
                               } 
                            }
                          }
                        ?>
                         
                        </div>
                    </div>
                    <div class="modal-body as">
                        <?php 
                        include_once 'lib/core.php';
                        $sql = "SELECT * FROM week ";
                        $pdo = DB_CONNECT();
                        $rs = $pdo ->query($sql);
                        foreach ($rs as $key => $row) {
                        ?>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 form-group" style="text-align: center;padding: 10px;">
                        <a  href="#" class="a4 ass" id="<?php echo $row["id"]?>">
                        <i class="fa  fa-circle faa fwe<?php echo $row["id"]?>" aria-hidden="true" id="fa<?php echo $row["id"]?>"></i>  <?php echo $row["val"]?>  
                        </a>
                        </div>
                        <?php
                        }
                      ?>
                    </div>
                    <div class="modal-footer" style="padding: 30px;">
                      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
                         <button type="button" class="btn bu" data-dismiss="modal" onclick="">重新設定</button>
                         <button type="button" class="btn bua" onclick="senttoti()" style="">確認送出</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>

     

    <script type="text/javascript">
   
  $(function() {
    $('#myTime').on('hide.bs.modal',function() {
      var arr = $("#ggg").val();
      $.ajax({
                 type:'POST',
                 url :'modal_5.php',
                 data:"arr="+arr+"&arr1="+arr,
                 dataType:'html', 
                 success : function(data){
                $("#m_d").html(data);
                //$("#myTime").modal("hide");
                $(".modal-backdrop").remove();
               // $("body").removeClass("modal-open"); 
             }
       });
    })
});
    $(document).ready(function () {

        var idArrs = new Array();
      $(".a4").click(function () {
          var value = $(this).attr("id"); 
          hamburger_crossti(value);  
      });
     
      function hamburger_crossti($id) {
          var trigger = $(".fwe"+$id);
          var triggerS = $(".fa-check-circle");
          if (trigger.hasClass('fa-check-circle') == true) { 
            
            alert("請重新設定");
          }
          else{   
              var c = $("#hhh").val();
              var arrc = c.split(",");
              var g = $("#iii").val();
              var arrg = g.split(",");
              var h = $("#ggg").val();
              var arrh = h.split(",");
              if(arrc.length>=3 || arrg.length>=3){
                alert("最多只能選擇三個");
                if(c == ""){
                  $("#hhh").val($("#ggg").val());
                }
              }else{
                if(arrc.indexOf($id) != -1 ){
                  alert("已選擇");
                }else{
                  trigger.removeClass('fa-circle');
                  trigger.addClass('fa-check-circle');
                  idArrs.push($id);
                   var idsa = idArrs.join(',');
               $("#iii").val(idsa);
              if($("#ggg").val() != "" && $("#iii").val() != ""){
                if(arrc.length>=3){
                }else{
                  if($("#hhh").val() == ""){
                     if(arrh.length>=3){
                      $("#hhh").val($("#iii").val());
                    }else{
                      if($("#hhh").val() == "" && $("#iii").val() == ""){
                        $("#hhh").val($("#iii").val());
                      }else{
                        $("#hhh").val($("#ggg").val()+","+$("#iii").val());
                      }
                     
                    }
                    
                  }else{
                    $("#hhh").val($("#hhh").val()+","+$("#iii").val());
                     var sArrs_1 = $("#hhh").val().split(",");
                     var sArrs_2 = new Array();
                      for (var i = 0; i < sArrs_1.length; i++) {
                        if ((jQuery.inArray(sArrs_1[i], sArrs_2)) == -1) {
                          sArrs_2.push(sArrs_1[i]);
                        }
                      }
                      var idsa_1 = sArrs_2.join(',');
                      $("#hhh").val(idsa_1);
                  }
                }
             }else if($("#ggg").val() != "" && $("#iii").val() == ""){
              if(arrc.length>=3){
              }else{
                  $("#hhh").val($("#ggg").val());
              }
             }else{
              if(arrc.length>=3){
              }else{
                $("#hhh").val($("#iii").val());
              }
            }

                }
                
              }
             
          }
      }
});

      function senttoti() {
    
          $(".modal-backdrop").remove();
         
           var arr = $("#hhh").val();
           $.ajax({
                     type:'POST',
                     url :'pritime.php',
                     data:"arr="+arr+"&arr1="+arr,
                     dataType:'html', 
                     success : function(data){
                    $("#m_time").html(data);
                    $("#m_timexs").html(data);
                    $("#myTime").modal("hide");
                 }
           });
           $.ajax({
                 type:'POST',
                 url :'modal_5.php',
                 data:"arr="+arr+"&arr1="+arr,
                 dataType:'html', 
                 success : function(data){
                $("#m_d").html(data);
                $("#myTime").modal("hide");
             }
       });
      }
      function canceltime() {
       
      var arr = $("#ggg").val();
      $.ajax({
                 type:'POST',
                 url :'modal_5.php',
                 data:"arr="+arr+"&arr1="+arr,
                 dataType:'html', 
                 success : function(data){
                $("#m_d").html(data);
                $("#myTime").modal("hide");
             }
       });
    }

     function delete_thist($id){
          var arr = $("#hhh").val();
          if(arr ==""){
            var arr = $("#ggg").val();
          }else{
            var arr = $("#hhh").val();
          }
          var idArr = arr.split(",");
          for (var i = 0; i < idArr.length; i++) {
            if(idArr[i] == $id){
               // var x = i;
                idArr.splice(i,1);
            }
          }
          //idArr.splice(idArr.indexOf($id),1);
          var idsa = idArr.join(',');
         // alert(idsa);
          $("#hhh").val(idsa);
          $("#iii").val(idsa);
          var arr = $("#ggg").val();
          var arr1 = $("#hhh").val();
           $.ajax({
                 type:'POST',
                 url :'printime.php',
                 data:"arr="+arr+"&arr1="+arr1,
                 dataType:'html', 
                 success : function(data){
                $("#m_ti").html(data);
             }
          });
          var trigger = $(".fwe"+$id);
          if (trigger.hasClass('fa-check-circle') == true){ 
            trigger.removeClass('fa-check-circle');
            trigger.addClass('fa-circle');
          }
    }
    </script>