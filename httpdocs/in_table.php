 <?php
 include_once 'lib/core.php';
 $pdo = DB_CONNECT();
   $results_per_page = 5; 
   if (isset($_GET["page"])) { 
    switch ($_GET["page"]) {
      case '1':
        $limit = "0,5";
        break;
      case '2':
        $limit = "6,5";
        break;
      case '3':
        $limit = "11,5";
        break;  
      case '4':
        $limit = "16,5";
        break; 
      case '5':
        $limit = "21,5";
        break;   
      default:
        break;
    }
    $page  = $_GET["page"]; 
  } else { 
    $limit = "0,5";
    $page=1; 
  };
   $start_from = ($page-1) * $results_per_page;
   // $sql = "SELECT * FROM cases ORDER BY addtime DESC LIMIT $start_from, ".$results_per_page;
   $sql = "SELECT * FROM cases ORDER BY addtime DESC LIMIT ".$limit." ";
   $rs = $pdo->query($sql);
   
 
?> 
  <table  style="width: 100%;padding-top: 20px;padding-bottom: 20px;">
  <?php 
  $c = getCase();
     foreach ($rs as $key => $row) {

   ?> 
      <tr style="padding-top: 20px;padding-bottom: 20px;border-bottom: 1px solid white">
       <td class="trr" style="padding-top: 20px;padding-bottom: 20px;font-size: 10px"><a href="secase.php?id=<?php echo $row["id"]?>" target="_blank">
           <?php echo "科：".substr($c[$row["id"]][4], 0,6)." | 地：".substr($c[$row["id"]][19], 0,9)." | 薪：".$c[$row["id"]][15]."-".$c[$row["id"]][16]?>
         </a>
         </td>
         <!-- <td><?php echo $row["id"]?></td> -->
      </tr>
   <?php 
      }
   ?> 
   </table>
    <div class="col-lg-12 tp col-md-12 col-xs-12 col-sm-12" style="padding-top: 10px;">
   <?php 
    $sql = "SELECT count(*) AS n FROM cases";
    $rs = $pdo->query($sql);
   foreach ($rs as $key => $row) {
         $n = $row["n"];
    }

 	   
       for ($i=1; $i<=1; $i++) { 
            echo "<a href='javascript:cha(".$i.")' style='padding-left:10px;padding-right:10px'";
            if ($i==$page)  echo "class='curPage'";
            echo ">".$i."</a> "; 
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