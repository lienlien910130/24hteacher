<?php 
include_once 'lib/core.php';
$pdo = DB_CONNECT();
if(!isset($_POST["id"]) || empty($_POST["id"]) ){
   $id = 0;
 }else{
  $id = $_POST["id"];
 }
$p = getProfile($id);

?> 
<div class="modal fade" id="myProfiless" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content log" style="height: 730px;">
                    <div class="modal-header" style="border:0;padding-bottom: 0PX;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="" onclick="cancelregi()">
                        <!-- <span style="font-size: 24px;">×</span> -->
                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body as">

                   <div class="log" style="margin: 0 auto">
                   
                     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align: center;">
                      <h2 style="color: rgb(239,97,0);">會員資料</h2>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 tp">
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" style="text-align: right;font-weight: bold;">
                          <h4>照片</h4>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="text-align: left;">
                          <img src="<?php echo $p[5]?>" class="img-responsive" style="width: 100%;height: 300px;">
                        </div>
                      </div>
                      </div>
                     <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 tp">
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" style="text-align: right;font-weight: bold;">
                          <h4>會員姓名</h4>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="text-align: left;">
                          <h4><?php echo $p[1]?></h4>
                        </div>
                      </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 tp">
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" style="text-align: right;font-weight: bold;">
                          <h4>性別</h4>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="text-align: left;">
                          <h4><?php echo $p[2]?></h4>
                        </div>
                      </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 tp">
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" style="text-align: right;font-weight: bold;">
                          <h4>生日</h4>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="text-align: left;">
                          <h4><?php echo $p[3]?></h4>
                        </div>
                      </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 tp">
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" style="text-align: right;font-weight: bold;">
                          <h4>手機號碼</h4>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="text-align: left;">
                          <h4><?php echo $p[6]?></h4>
                        </div>
                      </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 tp">
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" style="text-align: right;font-weight: bold;">
                          <h4>信箱</h4>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="text-align: left;">
                          <h4><?php echo $p[7]?></h4>
                        </div>
                      </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 tp">
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" style="text-align: right;font-weight: bold;">
                          <h4>身份證字號</h4>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="text-align: left;">
                          <h4><?php echo $p[8]?></h4>
                        </div>
                      </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 tp">
                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" style="text-align: right;font-weight: bold;">
                          <h4>地址</h4>
                        </div>
                        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="text-align: left;">
                          <h4><?php echo $p[4]?></h4>
                        </div>
                      </div>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">
  
</script>