 
      <?php 
                while(($authnum=rand()%10000)<1000);
                ?>
                 <input type=hidden name=authnum value=<?php echo $authnum;?> >
                 <img src=authimg.php?authnum=<?php echo $authnum; ?> >