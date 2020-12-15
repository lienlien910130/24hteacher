
<script src="ckeditor/ckeditor.js"></script>

    <form name='addsubscript' action='addsubscriptProc.php' method='post'>
        <div class="col-lg-12">
          <div class="col-lg-2 spl">
            <h4>標題</h4>
          </div>
          <div class="col-lg-10 spr">
            <input type="text" name="title" value="" class="form-control input-md">
          </div>
        </div>

        <div class="col-lg-12 pt">
          <div class="col-lg-2 spl">
            <h4>對象</h4>
          </div>
          <div class="col-lg-10 spr">
            <select name="mytype" id="mytype"  class="form-control" >
                <option value="0">選擇對象</option>
                <option value="1">案件</option> 
                <option value="2">老師</option>   
                <option value="3">網站</option>  
            </select>
          </div>
        </div>

        <div class="col-lg-12 pt">
        <textarea class="ckeditor" name="content" id="content" rows="100" cols="100">
        </textarea>
        <script>
           CKEDITOR.replace( 'content', {width:100%});
        </script>
        </div> 

        <div class="col-lg-12" style="text-align: center;">
              <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="save()">送出</button>
              <button id="button2id" name="button2id" class="btn bu" onclick="cancel()" type="button">返回</button>
        </div>
        
    </form>	
    