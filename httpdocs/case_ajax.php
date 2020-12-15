
<?php
include_once 'lib/core.php';
@session_start();
$userid = $_SESSION["id"];
$cid = $_POST["cid"];

$sql = "SELECT * from interview where cid='".$cid."' GROUP BY rid,reid,cid,caid";
$pdo = DB_CONNECT();
$rs =$pdo->query($sql);
$rs1 =$pdo->query($sql);
$rs2 =$pdo->query($sql);
$rs3 =$pdo->query($sql);
?>

<ul id="tabs" class="nav nav-tabs pull-right" data-tabs="tabs">
  <li class="active"><a href="#tab1" data-toggle="tab">未處理</a></li>

  <li><a href="#tab3" data-toggle="tab">已回報</a></li>
  <li><a href="#tab4" data-toggle="tab">已婉拒</a></li>
</ul>
<br>
<br>
<div id="my-tab-content" class="tab-content">
  <div class="tab-pane active" id="tab1">
      <table id='example2' class='table table-bordered table-hover col-lg-12'>
      <thead>
		      <tr>
			      <td>老師名</td>
			      <td>科目</td>
			      <td>教育背景</td>
			      <td>經驗</td>
			      <td>來源</td>
			      <td></td>
		      </tr>
      </thead>
      <tbody>
      		<?php 
      			foreach ($rs as $key => $row) {   
					if($row["status"] == 0){
					   $r = getResumes();
					   $sub = gettsub($row["rid"]);
					   $acc = getProfile($row["reid"]);
					   echo "<tr><td><a href='seteacher.php?id=".$row['rid']."'>".$acc[1]."</td><td>";
					   for ($i=0; $i < count($sub[$row["rid"]]) ; $i++) { 
					   	 echo $sub[$row["rid"]][$i]."<br>";
					   }
					   echo "</td><td>".$r[$row["rid"]][8].",".$r[$row["rid"]][9].",".$r[$row["rid"]][10]."</td><td>".$r[$row["rid"]][4]."</td><td>";
					   if($row["source"] == 0 ){ echo "案主";}else{ echo "老師";}
					   echo "</td><td><button id='button2id' name='button2id' class='btn btn-default' onclick='changedeal(".$row["id"].",2)' type='button'>成交回報</button><button id='button2id' name='button2id' class='btn btn-default' onclick='changestatus(".$row["id"].",3)' type='button'>婉拒</button></td></tr>";
				  }
				}
      		?>
      </tbody>
      </table>           
  </div>
  <div class="tab-pane" id="tab3">
          <table id='example4' class='table table-bordered table-hover col-lg-12'>
      <thead>
		      <tr>
			      <td>老師名</td>
			      <td>科目</td>
			      <td>教育背景</td>
			      <td>經驗</td>
			      <td>來源</td>
			      <td></td>
		      </tr>
      </thead>
      <tbody>
      		<?php 
      			foreach ($rs2 as $key => $row2) {   
					if($row2["status"] == 2){
					   $r = getResumes();
					   $sub = gettsub($row2["rid"]);
					   $acc = getProfile($row2["reid"]);
					   echo "<tr><td><a href='seteacher.php?id=".$row2['rid']."'>".$acc[1]."</td><td>";
					   for ($i=0; $i < count($sub[$row2["rid"]]) ; $i++) { 
					   	 echo $sub[$row2["rid"]][$i]."<br>";
					   }
					   echo "</td><td>".$r[$row2["rid"]][8].",".$r[$row2["rid"]][9].",".$r[$row2["rid"]][10]."</td><td>".$r[$row2["rid"]][4]."</td><td>";
					   if($row["source"] == 0 ){ echo "案主";}else{ echo "老師";}
					   echo "</td><td></td></tr>";
				  }
				}
      		?>
      </tbody>
      </table>            
  </div>
  <div class="tab-pane" id="tab4">
          <table id='example5' class='table table-bordered table-hover col-lg-12'>
      <thead>
		      <tr>
			      <td>老師名</td>
			      <td>科目</td>
			      <td>教育背景</td>
			      <td>經驗</td>
			      <td>來源</td>
			      <td></td>
		      </tr>
      </thead>
      <tbody>
      		<?php 
      			foreach ($rs3 as $key => $row3) {   
					if($row3["status"] == 3){
					   $r = getResumes();
					   $sub = gettsub($row3["rid"]);
					   $acc = getProfile($row3["reid"]);
					   echo "<tr><td><a href='seteacher.php?id=".$row3['rid']."'>".$acc[1]."</td><td>";
					   for ($i=0; $i < count($sub[$row3["rid"]]) ; $i++) { 
					   	 echo $sub[$row3["rid"]][$i]."<br>";
					   }
					   echo "</td><td>".$r[$row3["rid"]][8].",".$r[$row3["rid"]][9].",".$r[$row3["rid"]][10]."</td><td>".$r[$row3["rid"]][4]."</td><td>";
					   if($row["source"] == 0 ){ echo "案主";}else{ echo "老師";}
					   echo "</td><td></td></tr>";
				  }
				}
      		?>
      </tbody>
      </table>         
  </div>
</div>

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
   $(function () {
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": true,
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
    $("#example3").DataTable({
      "paging": true,
      "lengthChange": true,
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
    $("#example4").DataTable({
      "paging": true,
      "lengthChange": true,
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
    $("#example5").DataTable({
      "paging": true,
      "lengthChange": true,
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

  </script>