 <?php 
$x = @$_GET["id"];
$arr = @$_POST["arr"];
$arr1 = @$_POST["arr1"];
 ?>

 <div class="modal fade bs-example-modal-lg" id="myObj" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="" onclick="cancel()">
                          <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                        </button>
                        <div class="col-lg-12" style="padding: 20px;background-color: rgb(239,239,239);">
                          科目類別選單：最多選三個
                        </div>
                        <div class="col-lg-12">
                          <div id="se_1">
                          <?php 
                          if($arr != ""){
                            ?>
                            <input type="text" name="se" id="se" value="<?php echo $arr?>" style="display: none;">
                            <input type="text" name="se4" id="se4" value="<?php echo $arr1?>" style="display: none;">
                            <?php 
                            }else{
                              ?>
                            <input type="text" name="se" id="se" value="" style="display: none;">
                            <input type="text" name="se4" id="se4" value="" style="display: none;">
                            <?php
                            }
                            $out = explode(",", $arr);
                            @session_start();
                            include_once 'lib/core.php';
                            $pdo = DB_CONNECT();
                            if($arr != ""){
                            for ($i=0; $i <count($out) ; $i++) { 
                              $sql = "SELECT l.id as li,s.val as sv,l.val as lv FROM lessions l LEFT JOIN subjects s on l.sid=s.id WHERE l.id=".$out[$i];
                              $rs = $pdo ->query($sql);
                              foreach ($rs as $key => $row) {
                               ?>
                             <a  href="#" onclick="delete_this(<?php echo $row["li"]?>)" class="sv"><i class="fa fa-times-circle" aria-hidden="true"></i>  <?php echo $row["sv"].$row["lv"]?>  </a>
                             <?php
                               } 
                            }
                          }
                          ?>
                        </div>
                        </div>
                    </div>
                    <div class="modal-body as">
                      <?php 
                      @session_start();
                        include_once 'lib/core.php';
                        $sql = "SELECT  * FROM subjects";
                        $pdo = DB_CONNECT();
                        $rs = $pdo ->query($sql);
                        foreach ($rs as $key => $row) {
                        ?>
                        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 form-group" style="text-align: center;padding-top: 5px;padding-right: 5px;padding-left:5px;">
                        <a  href="#" onclick="submit_form(<?php echo $row["id"]?>)" class="ass"><i class="fa fa-circle" aria-hidden="true"></i>  <?php echo $row["val"]?>  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        </div>
                        <?php
                        }
                      ?>
                    </div>
                    <div class="modal-footer">
                      <div class="col-lg-12  col-xs-12 col-sm-12 col-md-12">
                         <button type="button" class="btn bu" data-dismiss="modal" onclick="cancel()">重新設定</button>
                         <button type="button" class="btn bua" onclick="save()" style="">確認送出</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>


  <script type="text/javascript">
     function submit_form($id){
       
          var arr = $("#se").val();
           $.ajax({
                 type:'POST',
                 url :'modal_1.php',
                 data:"id="+$id+"&arr="+arr,
                 dataType:'html',
                 success : function(data){
                $("#m_o").html(data);
                $("#myobj_d").modal("show");
             }
         });
    }
      function delete_this($id){
          var arr = $("#se").val();
          var idArr = arr.split(",");
          for (var i = 0; i < idArr.length; i++) {
            if(idArr[i] == $id){
                var x = i;
            }else{
            }
          }
          idArr.splice(x,1);
          var idsa = idArr.join(',');
          $("#se").val(idsa);
          var arr = $("#se").val();
          var arr1 = $("#se4").val();
           $.ajax({
                 type:'POST',
                 url :'print.php',
                 data:"arr="+arr+"&arr1="+arr1,
                 dataType:'html', 
                 success : function(data){
                $("#se_1").html(data);
             }
          });
    }
    function cancel() {
      // $("#myObj").modal("hide");
      //  $("#myobj_d").modal("hide");
       
          

      $(".modal-backdrop").remove();
       
      var arr = $("#se4").val();
    
      $.ajax({
                 type:'POST',
                 url :'modal_2.php',
                 data:"arr="+arr+"&arr1="+arr,
                 dataType:'html', 
                 success : function(data){
                $("#m_t").html(data);
                $("#myObj").modal("hide");
               // $("body").removeClass("modal-open");
             }
       });
    }
    function save() {
       
          $(".modal-backdrop").remove();
       
       var arr = $("#se").val();
       var arr1 = $("#se").val();
       $.ajax({
                 type:'POST',
                 url :'pri.php',
                 data:"arr="+arr+"&arr1="+arr1,
                 dataType:'html', 
                 success : function(data){
                $("#m_l").html(data);
                $("#m_lxs").html(data);
                $("#myObj").modal("hide");
               // $("body").removeClass("modal-open");
             }
       });
       $.ajax({
                 type:'POST',
                 url :'modal_2.php',
                 data:"arr="+arr+"&arr1="+arr1,
                 dataType:'html', 
                 success : function(data){
                $("#m_t").html(data);
                $("#myObj").modal("hide");
               // $("body").removeClass("modal-open");
             }
       });
   }
    </script>
   