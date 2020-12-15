<?php 
            $index= @$_POST["index"];
            if(!isset($_POST["index"]) || empty($_POST["index"]) ){
              $index =  1;  }else{
             $index= $_POST["index"];
             }
            ?>
             <div class="list-group list-group-horizontal">
                <a href="javascript:po(1)" class="list-group-item <?php if($index == 1){ echo "active";}?>">數學師資</a>
                <a href="javascript:po(2)" class="list-group-item <?php if($index == 2){ echo "active";}?>">英文師資</a>
                <a href="javascript:po(3)" class="list-group-item <?php if($index == 3){ echo "active";}?>">國文師資</a>
                <a href="javascript:po(4)" class="list-group-item <?php if($index == 4){ echo "active";}?>">自然師資</a>
                <a href="javascript:po(5)" class="list-group-item <?php if($index == 5){ echo "active";}?>">社會師資</a>
             </div>