<?php 
$x = $_POST["id"];
$arr= @$_POST["arr"];
?>

 <div class="modal fade bs-example-modal-lg" id="myarea_d" role="dialog" style="top:10%" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="">
                        <i class="fa fa-times-circle-o" aria-hidden="true"></i></button>
                        <div class="col-lg-12" style="padding: 20px;background-color: rgb(239,239,239);">
                          <?php
                          @session_start();
                          include_once 'lib/core.php';
                          $pdo = DB_CONNECT();
                          $sql = "SELECT  * FROM city WHERE id=".$x;
                          $rs = $pdo ->query($sql);
                          foreach ($rs as $key => $row) {
                            echo $row["cityvalue"];
                            }
                          ?>
                        </div>
                        <div id="m_p">
                        <?php 
                        if($arr != "undefined"){
                          ?>
                          <input type="text" name="ddd" id="ddd" style="display: none;" value="<?php echo $arr?>" >
                          <?php
                        }else{
                          ?>
                          <input type="text" name="ddd" id="ddd" style="display: none;" value="">
                          <?php
                        }
                        ?>
                          <input type="text" name="eee" id="eee" style="display: none;">
                          <input type="text" name="fff" id="fff" style="display: none;">
                        </div>
                    </div>
                    <div class="modal-body as">
                        <?php 
                        $sql = "SELECT * FROM area WHERE cid =".$x;
                        $rs = $pdo ->query($sql);
                        foreach ($rs as $key => $row) {
                        ?>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 form-group" style="text-align: center;padding: 10px;">
                        <a  href="#" class="a3 ass" id="<?php echo $row["id"]?>">
                        <i class="fa  fa-circle faa fae<?php echo $row["id"]?>" aria-hidden="true" id="fa<?php echo $row["id"]?>"></i>  <?php echo $row["value"]?>  
                        </a>
                        </div>
                        <?php
                        }
                      ?>
                    </div>
                    <div class="modal-footer" style="padding: 30px;">
                      <div class="col-lg-12  col-xs-12 col-sm-12 col-md-12">
                         <button type="button" class="btn bu" data-dismiss="modal">重新設定</button>
                         <button type="button" class="btn bua" onclick="senttoa()" style="">確認送出</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>

     

    <script type="text/javascript">
    $(document).ready(function () {

        var idArr = new Array();
      $(".a3").click(function () {
          var value = $(this).attr("id"); 
          hamburger_crosss(value);  
      });
     
      function hamburger_crosss($id) {
          var trigger = $(".fae"+$id);
          if (trigger.hasClass('fa-check-circle') == true) { 
            if(idArr.indexOf($id) != -1){
              idArr.splice(idArr.indexOf($id),1);
              trigger.removeClass('fa-check-circle');
              trigger.addClass('fa-circle');
            }else{
              alert("error");
            }

          }else{   
            if(idArr.length>=3){
              alert("最多只能選擇三個");
            }else{
              var c = $("#fff").val();
              var arrc = c.split(",");
              var a = $("#ddd").val();
              var arra = a.split(",");
              if(arra.length>=3 || arrc.length>=3){
                alert("最多只能選擇三個");
              }else{
                if(arra.indexOf($id) != -1 || arrc.indexOf($id) != -1){
                  alert("已選擇");
                }else{
                  trigger.removeClass('fa-circle');
                  trigger.addClass('fa-check-circle');
                  idArr.push($id);
                }
                
              }
            }
          }
          var idsa = idArr.join(',');
          $("#eee").val(idsa);
          if($("#ddd").val() != "" && $("#eee").val() != ""){
             $("#fff").val($("#ddd").val()+","+$("#eee").val());
          }else if($("#ddd").val() != "" && $("#eee").val() == ""){
             $("#fff").val($("#ddd").val());
          }else{
            $("#fff").val($("#eee").val());
          }
      }
});

      function senttoa() {

        

        var arr = $("#fff").val();
        var arr1 = $("#ddd").val();
        $(".modal-backdrop").remove();
          $.ajax({
                  type:'POST',
                  url :'modal_3.php',
                  data:"arr="+arr+"&arr1="+arr1,
                  dataType:'html', 
                  success : function(data){
                  $("#m_b").html(data);
                  $("#myarea_d").modal("hide");
                  $("#myArea").modal("show");
              }
          });
      }
    </script>