<?php 
            $index= @$_POST["index"];
            if(!isset($_POST["index"]) || empty($_POST["index"]) ){
              $index =  1;  }else{
             $index= $_POST["index"];
             }
            ?>
             <div class="list-group list-group-horizontal">
                <a href="javascript:po(1)" class="list-group-item <?php if($index == 1){ echo "active";}?>">科展師資</a>
                <a href="javascript:po(2)" class="list-group-item <?php if($index == 2){ echo "active";}?>">論文撰寫</a>
                <a href="javascript:po(3)" class="list-group-item <?php if($index == 3){ echo "active";}?>">履歷撰寫</a>
                <a href="javascript:po(4)" class="list-group-item <?php if($index == 4){ echo "active";}?>">各類報告</a>
                <a href="javascript:po(5)" class="list-group-item <?php if($index == 5){ echo "active";}?>">高普考</a>
             </div>