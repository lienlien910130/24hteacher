<?php
include_once 'lib/core.php';
$pdo = DB_CONNECT();
$id = @$_GET["id"];

$sql = "SELECT m.id AS id,m.numbers AS numbers,m.account AS account,p.id AS pid,p.cases AS cases,p.resumes AS resumes,p.invite AS invite,p.application AS application,p.certification as certif,p.invitenum as inum,p.applicnum as anum,p.updatetime as updatetime,p.lasttype as lasttype FROM member m LEFT JOIN power p ON m.id = p.uid  WHERE m.id = ".$id;
$rs = $pdo -> query($sql);
foreach ($rs as $row) {

    ?> 
	  <td class="col-lg-2" style="background-color:rgb(202,202,202);word-break: break-all""><?php echo $row["numbers"]?></td>
	  <td class="col-lg-2" style="background-color:rgb(202,202,202);word-break: break-all"><?php echo $row["account"]?></td>
	  <!-- <td class="col-lg-1" style="background-color:rgb(202,202,202)">
	      <?php 
	  	    if($row["certi"] == 0){  
	  	       $sql1 = "SELECT * FROM certification WHERE uid = '".$row["id"]."'";
                 $rs1 = $pdo->query($sql1);
               if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
                    echo "未審核";
                }else{
                    echo "未提供";
                }
	  	   }else if ($row["certi"] == 2) {
	  	        echo "<i class='fa fa-times' aria-hidden='true'></i>";
	  	   }else{
                echo "<i class='fa fa-check' aria-hidden='true'></i>";
	  	   }
	  	  ?>
	  </td> -->
	  <td class="col-lg-1" style="background-color:rgb(202,202,202)">
	  	<select id="resumes">
	  	    <?php 
	  	    if($row["resumes"] == 0){  
	  	    ?>
	  	    <option value="0" selected>關閉</option>
	  	    <option value="1">開放</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>開放</option>
	  	    <option value="0">關閉</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
	  </td>
	  <td class="col-lg-1" style="background-color:rgb(202,202,202)">
	  	<select id="cases">
	  	    <?php 
	  	    if($row["cases"] == 0){  
	  	    ?>
	  	    <option value="0" selected>關閉</option>
	  	    <option value="1">開放</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>開放</option>
	  	    <option value="0">關閉</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
	  </td>
	  
	  <td class="col-lg-1" style="background-color:rgb(202,202,202)">
	  	<select id="invite">
	  	    <?php 
	  	    if($row["invite"] == 0){  
	  	    ?>
	  	    <option value="0" selected>關閉</option>
	  	    <option value="1">開放</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>開放</option>
	  	    <option value="0">關閉</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
	  </td>
	  <td class="col-lg-1" style="background-color:rgb(202,202,202)">
	  	<select id="application">
	  	    <?php 
	  	    if($row["application"] == 0){  
	  	    ?>
	  	    <option value="0" selected>關閉</option>
	  	    <option value="1">開放</option>
	  	    <?php
	  	    }else{
	  	    ?>
	  	    <option value="1" selected>開放</option>
	  	    <option value="0">關閉</option>
	  	    <?php
	  	    }
	  	    ?>
	  	</select>
	  </td>
	   <td class="col-lg-2" style="background-color:rgb(202,202,202)">
	  	<?php 
                  echo $row["updatetime"];
                   if($row["lasttype"] == 1){
                    echo "<br>更新履歷";
                  }else if($row["lasttype"] == 2){
                    echo "<br>刊登案件";
                  }else if($row["lasttype"] == 3){
                    echo "<br>主動邀請";
                  }else if($row["lasttype"] == 4){
                    echo "<br>主動應徵";
                  }else if($row["lasttype"] == 5){
                    echo "<br>上傳教材&筆記/影片";
                  }else if($row["lasttype"] == 6){
                    echo "<br>購買筆記";
                  }else if($row["lasttype"] == 7){
                    echo "<br>給予評論";
                  }else if($row["lasttype"] == 8){
                    echo "<br>回覆面試";
                  }else if($row["lasttype"] == 9){
                    echo "<br>成交回報";
                  }
                  ?>    
	  </td>
	  <td class="col-lg-2" style="background-color:rgb(202,202,202)">
		  <a href="javascript:power(<?php echo $row["id"]?>)">
		   <button class="btn tbu">儲存</button>
		  </a>
		  <a href="javascript:cancel()">
		   <button class="btn tbu">取消</button>
		  </a>
	  </td>
	
	

    	<?php
    
}
?>

<script type="text/javascript">
	function power($id) {
       var certi = 0;
       var cases = $("#cases").val();
       var resumes = $("#resumes").val();
       var invite = $("#invite").val();
       var application = $("#application").val();
       //alert(certi+"/"+cases+"/"+resumes+"/"+invite+"/"+application+"/");
       $.ajax({
        type: "POST",
        url: 'editpowerProc.php',
        cache: false,
        data:'id='+$id+'&certi='+certi+'&cases='+cases+'&resumes='+resumes+'&invite='+invite+'&application='+application,
        error: function(){
            alert('Ajax request 發生錯誤');
        },
        success: function(data){
            alert("更改成功");
            location.href="member_manage.php";
        }
    });
   }
</script>