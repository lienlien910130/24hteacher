 <?php 
$cid = $_POST["cid"];
include_once 'lib/core.php';
$c = getCase();
$r = getResumes();
$course = getCourse($cid);
 ?>

 <table  id="example3" class="table table-bordered table-hover col-lg-12">
            <thead>
              <tr>
                                <td>老師編號</td>
                                <td>教授科目</td>
                                <td>老師身分</td>
                                <td>學歷科系</td>
                                <td>上課地點</td>
                                <td>經驗/試教</td>
              </tr>
            </thead>
            <tbody>
               <?php
                          $pdo = DB_CONNECT();
                          $sql = "SELECT * FROM resume";
                          $rs = $pdo->query($sql);
                          $uid = $_SESSION["id"];
                          foreach ($rs as $key => $row) {
                             for ($i=0; $i <count($course[$cid]) ; $i++) { 
                               $sql1 ="SELECT * FROM resume_list WHERE rid=1 AND val ='".$course[$cid][$i]."' AND reid = '".$row["id"]."' ";
                               $rs1 = $pdo->query($sql1);
                                foreach ($rs1 as $key => $row1) {
                                   $sql2 ="SELECT * FROM resume_list WHERE  rid=4 AND val='".$c[$cid][11]."' AND reid = '".$row1["reid"]."' GROUP BY reid ";
                                   $rs2 = $pdo->query($sql2);
                                   foreach ($rs2 as $key => $row2) {
                                        $sql3 ="SELECT * FROM resume_list WHERE  rid=2 AND val='".$c[$cid][19]."' AND reid = '".$row2["reid"]."' GROUP BY reid ";
                                        $rs3 = $pdo->query($sql3);
                                        foreach ($rs3 as $key => $row3) {
                                        $sql4 ="SELECT * FROM resume_list WHERE  rid=14 AND val ='".$c[$cid][12]."' AND reid = '".$row3["reid"]."' GROUP BY reid ";
                                        $rs4 = $pdo->query($sql4); 
                                        foreach ($rs4 as $key => $row4) {
?>
                                     <tr>
                                          <td><a href="seteacher.php?id=<?php echo $row["id"]?>"><?php echo $row["numbers"]?></a></td>
                                          <td><?php echo $course[$cid][$i]?></td>
                                          <td><?php echo $row4["val"]?></td>
                                          <td><?php echo $r[$row["id"]][8]?></td>
                                          <td><?php echo $r[$row["id"]][2]?></td>
                                          <td><?php echo $r[$row["id"]][4]."/".$r[$row["id"]][7]?></td>
                                     </tr>

<?php
                                            }
                                          }
                                       
                                    
                                     }
                                 
                                }

                             }

                          }
                          ?>
                         

            </tbody>
            </table>
<script type="text/javascript">
            $(function () {
    $("#example1").DataTable();
   
    $("#example3").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });

  });
  </script>