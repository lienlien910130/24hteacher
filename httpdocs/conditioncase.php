<?php
include_once 'lib/core.php';
$pdo=DB_CONNECT();
@session_start();

$uid = @$_SESSION["id"];
$obj = $_POST["obj"];
$sub = $_POST["sub"];
$area= $_POST["area"];
$exper= $_POST["exper"];
$sala= $_POST["sala"];

if($obj == "" || empty($obj)){ $obj="c.obj"; } //對象
if($sub == "" || empty($sub)){ $sub="_"; } //科目 []
if($area == "" || empty($area)){ $area="c.area"; } //地區
if($exper == "" || empty($exper)){ $exper="c.exper"; } //經驗
if($sala == "" || empty($sala)){ $sala="c.sala"; } //薪水

?>

<table id="example3" class="table table-bordered table-hover col-lg-12" style="border: 2px solid #F4A460">
                            <thead>
                              <tr>
                                <td>聯絡人</td>
                                <td>科目/對象</td>
                                <td>地點</td>
                                <td>經驗/起薪</td>
                                <td>應徵人數</td>
                                <td></td>
                                <td></td>
                              </tr>
                            </thead>
                            <tbody>
                            <?php 

                                $c = getCase();
                            	$sql = "SELECT * FROM search_case c WHERE c.obj =".$obj." AND c.sub  LIKE '%".$sub."%'  AND c.area =".$area." AND c.exper =".$exper." AND c.sala =".$sala;
                            	$rs = $pdo ->query($sql);
                            	foreach ($rs as $key => $row) {
                            	$course = getCourse($row["caseid"]);
                            	$sql1 = "SELECT * FROM cases WHERE id = ".$row["caseid"];
                            	$rs1 = $pdo ->query($sql1);
                            	foreach ($rs1 as $key => $row1) {
                            	?>
                            	<tr>
				                <td><a href="secase.php?id=<?php echo $row["caseid"]?>"><?php echo $row1["name"]?></a></td>
				                <td><?php 
				                for ($x=0; $x < count($course[$row["caseid"]]); $x++) { 
				                   echo $course[$row["caseid"]][$x]."/";
				                }
				                echo $c[$row["caseid"]][20]
				                ?></td>
				                <td><?php echo $c[$row["caseid"]][19]?></td>
				                <td><?php echo $c[$row["caseid"]][11]?>/<?php echo $c[$row["caseid"]][15]?></td>
				                <td><?php echo $row1["applicants"]?></td>
				                <td>
				                <?php if($row1["uid"] != $uid){
                                ?>
				                <button id="button2id" name="button2id" class="btn btn-default" onclick="addfavoritecase(<?php echo $row["caseid"]?>,<?php 
				                    if (empty($_SESSION["id"])) { echo 0; }else { echo $uid ;}?>)" type="button">加入最愛</button>
				                <?php
                                }
                                ?>
				                </td>
				                <td>
                                    <?php if($row1["open"] == 1 && $row1["uid"] != $uid){
                                      ?>
                                      <button id="button2id" name="button2id" class="btn btn-default" onclick="addapply(<?php
                                        if(empty($_SESSION["id"])){echo 0 ;}else{echo $uid;}?>,<?php echo $row1["id"]?>,<?php echo $row1["uid"]?>)">加入揪團</button>
                                      <span>目前人數:<?php echo $row1["apply"]?></span>
                                      <?php
                                      }
                                    ?>
                                </td>
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