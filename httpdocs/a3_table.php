 <?php
 include_once 'lib/core.php';
 $pdo = DB_CONNECT();
   $results_per_page = 12; 
   if (isset($_GET["page"])) { $page  = addslashes($_GET["page"]); } else { $page=1; };
   $start_from = ($page-1) * $results_per_page;
   $sql = "SELECT * FROM parents WHERE types = 1 ORDER BY addtime DESC LIMIT $start_from, ".$results_per_page;
   $rs =$pdo ->query($sql);
   $x = 1;
   foreach ($rs as $key => $row) {
      // if($x%3==1){
      //         echo "<div class ='row'><div class='col-lg-12 col-sm-12 col-xs-12 col-md-12' style=''>";
      //     }
             ?>
              <div class="col-lg-4 col-sm-12 col-xs-12 col-md-12" style="margin-top: 10px;">
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <a href="parentartic.php?id=<?php echo htmlspecialchars($row["id"], ENT_QUOTES);?>" target="_blank">
                <img src="<?php echo htmlspecialchars($row["paths"], ENT_QUOTES);?>" class="img-responsive" style="border-radius: 10px;margin: auto;height: 220px;width: 353px"></a>
              </div>
              <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <h4 style="font-weight: bold;"><?php echo htmlspecialchars($row["contitle"], ENT_QUOTES);?></h4>
                </div>
               <!--  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                <?php echo $row["description"]?>
                </div> -->
                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12"
                 style="bottom:0px">
                <span class="pull-right">
                <?php
                $out = explode(" ", $row["addtime"]);
                echo $out[0];
                 ?>
                </span>
                </div>
              </div>
              </div>
              <?php
             
             
              }
           ?>
    <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="padding-top: 10px;text-align: center;margin-bottom: 20px">
   <?php 
    $sql = "SELECT count(*) AS n FROM parents  WHERE types = 1";
    $rs = $pdo->query($sql);
       foreach ($rs as $key => $row) {
         $n = $row["n"];
         $total_pages = ceil( $n / $results_per_page);
         for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='javascript:cha3(".$i.")' style='padding-left:10px;padding-right:10px'";
            if ($i==$page)  echo "class='curPage'";
            echo ">".$i."</a> "; 
            }
         }
    ?>
    </div>

    <style type="text/css">
.trr>a:hover{
    text-decoration:none;
    color: black;
    background-color: white;
    font-size: 18px;
   }
   .trr:hover{
    text-decoration:none;
    color: black;
    background-color: white;
    font-size: 18px;
   }
 
    </style>