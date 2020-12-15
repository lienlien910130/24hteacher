
<script src="ckeditor/ckeditor.js"></script>

    <form name='addparent' action='addparentProc.php' method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        <div class="col-lg-12">
          <div class="col-lg-2 spl">
            <h4><span style="color: red">＊</span>圖片</h4>
          </div>
          <div class="col-lg-10 col-md-10 col-xs-10 col-sm-10 spr">
            <input id="pic" name="pic" type="file" class="form-control input-md">
          </div>
        </div>
        <div class="col-lg-12 pt">
          <div class="col-lg-2 spl">
            <h4><span style="color: red">＊</span>標題</h4>
          </div>
          <div class="col-lg-10 spr">
            <input type="text" name="title" value="" class="form-control input-md">
          </div>
        </div>
        <div class="col-lg-12 pt">
          <div class="col-lg-2 spl">
            <h4><span style="color: red">＊</span>類型</h4>
          </div>
          <div class="col-lg-10 spr">
            <select name="types" id="types"  class="form-control" >
                <option value="0">家長情報</option>
                <option value="1">私校師資</option> 
            </select>
          </div>
        </div>
        <div class="col-lg-12 pt">
          <div class="col-lg-2 spl">
            <h4><span style="color: red">＊</span>內文標題</h4>
          </div>
          <div class="col-lg-10 spr">
            <input type="text" name="contitle" value="" class="form-control input-md">
          </div>
        </div>
        <div class="col-lg-12 pt">
          <div class="col-lg-2 spl">
            <h4><span style="color: red">＊</span>簡介<br><span style="font-size: 14px">( 限60字以內 )</span></h4>
          </div>
          <div class="col-lg-10 spr">
            <textarea class="form-control input-md" name="descript" cols="10" rows="5"></textarea>
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
              <button id="button1id" name="button1id" class="btn bu"  type="button" onclick="savesubss()">送出</button>
              <button id="button2id" name="button2id" class="btn bu" onclick="cancel()" type="button">返回</button>
        </div>
        
    </form>	
    

   