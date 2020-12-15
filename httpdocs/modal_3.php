 <?php 
$x = @$_GET["id"];
$arr = @$_POST["arr"];
$arr1 = @$_POST["arr1"];
?>

 <div class="modal fade bs-example-modal-lg" id="myArea" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="" onclick="cancelarea()"><i class="fa fa-times-circle-o" aria-hidden="true"></i></button>
                        <div class="col-lg-12" style="padding: 20px;background-color: rgb(239,239,239);">
                          縣市地區選單：最多選三個
                        </div>
                        <div class="col-lg-12">
                          <div id="se_2">
                          <?php 
                          if($arr != ""){
                            ?>
                            <input type="text" name="se1" id="se1" value="<?php echo $arr?>" style="display: none;">
                            <input type="text" name="se5" id="se5" value="<?php echo $arr1?>" style="display: none;">
                            <?php 
                            }else{
                              ?>
                            <input type="text" name="se1" id="se1" value="" style="display: none;">
                            <input type="text" name="se5" id="se5" value="" style="display: none;">
                            <?php
                            }
                            $out = explode(",", $arr);
                            @session_start();
                            include_once 'lib/core.php';
                            $pdo = DB_CONNECT();
                            if($arr != ""){
                            for ($i=0; $i <count($out) ; $i++) { 
                              $sql = "SELECT a.id as ai,a.value as av,c.cityvalue as cv FROM area a LEFT JOIN city c on a.cid=c.id WHERE a.id=".$out[$i];
                              $rs = $pdo ->query($sql);
                              foreach ($rs as $key => $row) {
                               ?>
                             <a  href="#" onclick="delete_thisa(<?php echo $row["ai"]?>)" class="sv"><i class="fa fa-times-circle" aria-hidden="true"></i>  <?php echo $row["cv"].$row["av"]?>  </a>
                             <?php
                               } 
                            }
                          }
                          ?>
                        </div>
                        </div>
                    </div>
                    <div class="modal-body as" style="max-height: 350px;overflow-y: auto;">
                      <?php 
                        $sql = "SELECT  * FROM city";
                        $rs = $pdo ->query($sql);
                        foreach ($rs as $key => $row) {
                        ?>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 form-group" style="text-align: center;padding: 10px;">
                        <a  href="#" onclick="submit_forms(<?php echo $row["id"]?>)" class="ass"><i class="fa fa-circle" aria-hidden="true"></i>  <?php echo $row["cityvalue"]?>  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        </div>
                        <?php
                        }
                      ?>
                    </div>
                    <div class="modal-footer">
                    <div class="col-lg-12  col-xs-12 col-sm-12 col-md-12">
                         <button type="button" class="btn bu" data-dismiss="modal" onclick="cancelarea()">重新設定</button>
                         <button type="button" class="btn bua" onclick="savearea()" style="">確認送出</button>
                         </div>
                    </div>
                </div>
            </div>
        </div>


  <script type="text/javascript">
     function submit_forms($id){
          var arr = $("#se1").val();
           $.ajax({
                 type:'POST',
                 url :'modal_4.php',
                 data:"id="+$id+"&arr="+arr,
                 dataType:'html',
                 success : function(data){
                $("#m_c").html(data);
                $("#myarea_d").modal("show");
             }
         });
    }
      function delete_thisa($id){
          var arr = $("#se1").val();
          var idArr = arr.split(",");
          for (var i = 0; i < idArr.length; i++) {
            if(idArr[i] == $id){
                var x = i;
            }else{
            }
          }
          idArr.splice(x,1);
          var idsa = idArr.join(',');
          $("#se1").val(idsa);
          var arr = $("#se1").val();
          var arr1 = $("#se5").val();
           $.ajax({
                 type:'POST',
                 url :'printarea.php',
                 data:"arr="+arr+"&arr1="+arr1,
                 dataType:'html', 
                 success : function(data){
                $("#se_2").html(data);
             }
          });
    }
    function cancelarea() {
     
          $(".modal-backdrop").remove();
       
       var arr = $("#se5").val();
      $.ajax({
                 type:'POST',
                 url :'modal_3.php',
                 data:"arr="+arr+"&arr1="+arr,
                 dataType:'html', 
                 success : function(data){
                $("#m_b").html(data);
                $("#myArea").modal("hide");
             }
       });
    }
    function savearea() {
       
          $(".modal-backdrop").remove();
       
       var arr = $("#se1").val();
       var arr1 = $("#se1").val();
       $.ajax({
                 type:'POST',
                 url :'priarea.php',
                 data:"arr="+arr+"&arr1="+arr1,
                 dataType:'html', 
                 success : function(data){
                $("#m_a").html(data);
                $("#m_axs").html(data);
                $("#myArea").modal("hide");
             }
       });
       $.ajax({
                 type:'POST',
                 url :'modal_3.php',
                 data:"arr="+arr+"&arr1="+arr1,
                 dataType:'html', 
                 success : function(data){
                $("#m_b").html(data);
                $("#myArea").modal("hide");
             }
       });
   }
    </script>
   