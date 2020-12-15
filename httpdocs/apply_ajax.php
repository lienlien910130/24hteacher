<?php 
include_once 'lib/core.php';
@session_start();
$pdo = DB_CONNECT();
$caid = $_POST["caid"];
$sql = "SELECT * FROM applytogether  WHERE caid = ".$caid;
$rs = $pdo ->query($sql);
?>
       <table id="example3" class="table table-bordered table-hover col-lg-12">
            <thead>
              <tr>
                <td>聯絡人姓名</td>
                <td>電話</td>
                <td>
                </td>
              </tr>
            </thead>
            <tbody>
               <?php 
               foreach ($rs as $key => $row) {
               		$account = getProfile($row["uid"]);
               	?>
               	<td><?php echo $account[1]?></td>
               	<td><?php echo $account[6]?></td>
               	<td>
               	<?php 
               	if($row["deal"] == 0 ){
               		?>
               		<button id='button2id' name='button2id' class='btn btn-default' onclick='changeadeal(<?php echo $row["id"]?>,2)' type='button'>成交</button><button id='button2id' name='button2id' class='btn btn-default' onclick='changeadeal(<?php echo $row["id"]?>,1)' type='button'>婉拒</button>
				<?php
               	}if($row["deal"] == 1){
               		echo "婉拒";
               }
               if($row["deal"] == 2){
               	    echo "成交";
               }
               echo '</td>';
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
      "autoWidth": true,
      "language": {
          "emptyTable": "查無資料",
           "paginate": {
               "previous": "上一頁",
               "next": "下一頁"
           },
           "info": "顯示 _PAGE_ 到 _PAGES_ 筆資料",
            "infoEmpty": "0筆資料"
        }
    });
  });

          	  function changeadeal($id,$deal){

          	  	 $.ajax({
                        type: "POST",
                        url: 'applyProc.php',
                        cache: false,
                        data:'id='+$id+'&deal='+$deal,
                        error: function(){
                            alert('Ajax request 發生錯誤');
                        },
                        success: function(data){
                            alert("修改成功");
                            location.href="apply.php";
                        }
                    });

          	  }
          </script>