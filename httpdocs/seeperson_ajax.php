<?php 
include_once 'lib/core.php';
@session_start();
$pdo = DB_CONNECT();
$cid = $_POST["cid"];
$sql = "SELECT * FROM interview  WHERE cid = ".$cid;
$rs = $pdo ->query($sql);
?>
       <table id="example2" class="table table-bordered table-hover col-lg-12">
            <thead>
              <tr>
                <td>聯絡人姓名</td>
                <td>電話</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
               <?php 
               foreach ($rs as $key => $row) {
               		$account = getProfile($row["uid"]);
               	?>
                <tr>
               	<td><?php echo $account[1]?></td>
               	<td><?php echo $account[6]?></td>
               	<td></td>
                </tr>
                <?php
           }
               ?>
            </tbody>
          </table>

          <script type="text/javascript">
          	  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });

          </script>