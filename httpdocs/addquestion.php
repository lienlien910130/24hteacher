
<script src="ckeditor/ckeditor.js"></script>

    <form name='addquestionProc' action='addquestionProc.php' method='post'>
        <div class="col-lg-12">
          <div class="col-lg-2 spl">
            <h4>標題</h4>
          </div>
          <div class="col-lg-10 spr">
            <input type="text" name="title" value="" class="form-control input-md">
          </div>
        </div>

       <!--  <div class="col-lg-12 pt">
        <textarea class="ckeditor" name="content" id="content" rows="100" cols="100">
        </textarea>
        <script>
           CKEDITOR.replace( 'content', {width:100%});
        </script>
        </div> -->
        
        <div class="col-lg-12" style="text-align: center;">
              <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="addquestionpar()">送出</button>
              <button id="button2id" name="button2id" class="btn bu" onclick="cancel()" type="button">返回</button>
        </div>
        
    </form>	
    