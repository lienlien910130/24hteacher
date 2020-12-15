<?php
	ob_start();
	include_once 'lib/core.php';
  	$pdo =DB_CONNECT();
  	@session_start();
	$id = @$_POST["id"];
	$val = @$_POST["val"];
	$vid = @$_POST["vid"];
	$result = new stdClass();
    if($id==1){
    	switch ($vid) {
                    case 1:
                      $val = "學齡前兒童";
                      break;
                    case 2:
                      $val = "國小生";
                      break;
                    case 3:
                      $val = "國中生";
                      break;
                    case 4:
                      $val = "高中生";
                      break;
                    case 5:
                      $val = "大學生";
                      break;
                    case 6:
                      $val = "社會人士";
                      break;
                    default:
                      break;
      }
      echo $val;
    }
    if($id==2){
    	$sql="SELECT * FROM lessions WHERE id =".$vid;
    	$rs = $pdo ->query($sql);
    	foreach ($rs as $key => $row) {
    		$sql1="SELECT * FROM subjects WHERE id =".$row["sid"];
    	    $rs1 = $pdo ->query($sql1);
    	    foreach ($rs1 as $key => $row1) {
    	    	echo $row1["val"].$row["val"];
    	    }
    		
    	}
    }
    if($id==3){
    	$sql="SELECT * FROM area WHERE id=".$vid;
    	$rs = $pdo->query($sql);
    	foreach ($rs as $key => $row) {
    		$sql1="SELECT * FROM city WHERE id =".$row["cid"];
    	    $rs1 = $pdo ->query($sql1);
    	    foreach ($rs1 as $key => $row1) {
    	    	echo $row1["cityvalue"].$row["value"];
    	    }
    	}
    }
    if($id==4){
    	switch ($vid) {
			    case 1:
			      $yearval = "無經驗";
			      break;
			    case 2:
			      $yearval = "一年以下";
			      break;
			    case 3:
			      $yearval = "一年以上~三年以下";
			      break;
			    case 4:
			      $yearval = "三年以上~五年以下";
			      break;
			    case 5:
			      $yearval = "五年以上";
			      break;
			    default:
			      break;			     
  		}
  		echo $yearval;
    }
    if($id==5){
    	switch ($vid) {
			    case 1:
			      $salary = "0~200";
			      break;
			    case 2:
			      $salary = "201~500";
			      break;
			    case 3:
			      $salary = "501~800";
			      break;
			    case 4:
			      $salary = "801~1000";
			      break;
			    case 5:
			      $salary = "1001以上";
			      break;
			    default:
			      break;			     
  		}
  		echo $salary;
    }
    if($id==6){
      switch ($vid) {
          case 2:
            $identity = "在校生";
            break;
          case 3:
            $identity = "上班族";
            break;
          case 4:
            $identity = "教師";
            break;
          case 5:
            $identity = "補習班老師/家教";
            break;
          default:
            break;           
      }
      echo $identity;
    }
?>