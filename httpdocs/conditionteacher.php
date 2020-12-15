<?php
include_once 'lib/core.php';
include_once 'lib/core.php';
$pdo=DB_CONNECT();
@session_start();
$uid = @$_SESSION["id"];

$obj = $_POST["obj"];
$sub = $_POST["sub"];
$area= $_POST["area"];
$exper= $_POST["exper"];
$sala= $_POST["sala"];
$iden= $_POST["iden"];

if($obj == "" || empty($obj)){ $obj="_"; } //對象 []
if($sub == "" || empty($sub)){ $sub="_"; } //科目 []
if($area == "" || empty($area)){ $area="_"; } //地區 []
if($exper == "" || empty($exper)){ $exper="r.exper"; } //經驗
if($sala == "" || empty($sala)){ $sala="_"; } //薪水 []
if($iden == "" || empty($iden)){ $iden="r.iden"; } //身分
?>
<table id="example3" class="table table-bordered table-hover col-lg-12" style="border: 2px solid #F4A460">
                            <thead>
                              <tr>
                                <td>老師名</td>
                                <td>科目</td>
                                <td>教育背景</td>
                                <td>經驗</td>
                                <td>成交人數</td>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 $sql =  "SELECT * FROM search_teacher r WHERE r.exper =".$exper." AND r.iden =".$iden." AND r.obj LIKE '%".$obj."%' AND r.sub LIKE '%".$sub."%' AND r.area LIKE '%".$area."%' AND r.sala LIKE '%".$sala."%' ";
				                         $rs = $pdo ->query($sql);
				                         $rr = getResumes();
				                         foreach ($rs as $key => $row) {
				                         $sql1 =  "SELECT * FROM resume WHERE id='".$row["resumeid"]."' ORDER BY addtime DESC ";
				                         $rs1 = $pdo ->query($sql1);
				                         foreach ($rs1 as $key => $row1) {
				                         $course = gettsub($row1["id"]);
				                         $account = getProfile($row1["uid"]);
				                         ?>
				                         <tr>
				                         <td><a href="secase.php?id=<?php echo $row1["id"]?>"><?php echo $account[1]?></a></td>
				                         <td><?php 
				                         $t="";
				                         for ($x=0; $x < count($course[$row1["id"]]); $x++) { 
				                            $t=$t.$course[$row1["id"]][$x]."/";
				                         }
				                         echo substr($t,0,-1);
				                         ?></td>
				                         <td><?php echo $rr[$row1["id"]][10]?>，<?php echo $rr[$row1["id"]][17]?></td>
				                         <td><?php echo $rr[$row1["id"]][4]?></td>
				                         <td><?php echo $row1["deal"]?></td>
				                         </tr>
				                         <?php
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
      "searching": false,
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