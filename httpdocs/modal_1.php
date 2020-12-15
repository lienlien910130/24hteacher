<?php 
$x = $_POST["id"];
$arr= @$_POST["arr"];
?>

 <div class="modal fade bs-example-modal-lg" id="myobj_d" role="dialog" style="top:20%" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="" ><i class="fa fa-times-circle-o" aria-hidden="true"></i></button>
                        <div class="col-lg-12" style="padding: 20px;background-color: rgb(239,239,239);">
                          <?php
                          @session_start();
                          include_once 'lib/core.php';
                          $pdo = DB_CONNECT();
                          $sql = "SELECT  * FROM subjects WHERE id=".$x;
                          $rs = $pdo ->query($sql);
                          foreach ($rs as $key => $row) {
                            echo $row["val"];
                            }
                          ?>
                        </div>
                        <div id="m_q">
                        <?php 
                        if($arr != "undefined"){
                          ?>
                          <input type="text" name="aaa" id="aaa" style="display: none;" value="<?php echo $arr?>">
                          <?php
                        }else{
                          ?>
                          <input type="text" name="aaa" id="aaa" style="display: none;" value="">
                          <?php
                        }
                        ?>
                          <input type="text" name="bbb" id="bbb" style="display: none;">
                          <input type="text" name="ccc" id="ccc" style="display: none;">
                        </div>
                    </div>
                    <div class="modal-body as">
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <?php 
                        $sql = "SELECT * FROM lessions WHERE sid =".$x;
                        $rs = $pdo ->query($sql);
                        $o = explode(",", $arr);
                        foreach ($rs as $key => $row) {
                          
                              ?> 
                       <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 form-group" style="text-align: center;padding-top: 5px;padding-right: 5px;padding-left: 5px;">
                        <a  href="#" class="a2 ass" id="<?php echo $row["id"]?>">
                        <i class="fa fa-circle faa fa<?php echo $row["id"]?>" aria-hidden="true" id="fa<?php echo $row["id"]?>"></i>  <?php echo $row["val"]?>  
                        </a>
                        </div>
                       
                        <?php
                        }
                      ?>
                      </div>
                    </div>
                    <div class="modal-footer" style="padding: 30px;">
                      <div class="col-lg-12  col-xs-12 col-sm-12 col-md-12">
                         <button type="button" class="btn bu" data-dismiss="modal">重新設定</button>
                         <button type="button" class="btn bua" onclick="sentto()" style="">確認送出</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>

     

    <script type="text/javascript">
    $(document).ready(function () {

        var idArr = new Array();

      $(".a2").click(function () {
          var value = $(this).attr("id"); 
          hamburger_cross(value);  
      });
     
      function hamburger_cross($id) {
          var trigger = $(".fa"+$id);
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
              var c = $("#ccc").val();
              var arrc = c.split(",");
              var a = $("#aaa").val();
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
          $("#bbb").val(idsa);
          if($("#aaa").val() != "" && $("#bbb").val() != ""){
             $("#ccc").val($("#aaa").val()+","+$("#bbb").val());
          }else if($("#aaa").val() != "" && $("#bbb").val() == ""){
             $("#ccc").val($("#aaa").val());
          }else{
            $("#ccc").val($("#bbb").val());
          }
      }
});

      function sentto() {
        var arr = $("#ccc").val();
        var arr1 = $("#aaa").val();
          $.ajax({
                  type:'POST',
                  url :'modal_2.php',
                  data:"arr="+arr+"&arr1="+arr1,
                  dataType:'html', 
                  success : function(data){
                  $("#m_t").html(data);
                  $("#myobj_d").modal("hide");
                  $("#myObj").modal("show");
              }
          });
      }
    </script>