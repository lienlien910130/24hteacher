<?php
	
include_once 'lib/core.php';

class User {

	function checkUser($userData){
		@session_start();
		if(!empty($userData)){
			$pdo = DB_CONNECT();
			//Check whether user data already exists in database
			$prevQuery = "SELECT * FROM member WHERE numbers = '".$userData['oauth_uid']."' ";
			$prevResult =$pdo->query($prevQuery);
			if($row = $prevResult -> fetch(PDO::FETCH_BOTH)){
				//Update user data if already exists

				$query = "UPDATE member SET numbers = '".$userData['oauth_uid']."', account = '".$userData['email']."',lastlogin='".date("Y-m-d H:i:s")."'  WHERE numbers = '".$userData['oauth_uid']."' ";
				$update = $pdo->query($query);
				$_SESSION["id"]=$row["id"];
                $_SESSION["account"]=$userData['email'];
                $_SESSION["login"] = true;
				$_SESSION["pay"] = $row["pay"];
				$_SESSION["type"] = $row["type"];
			}else{
				//Insert user data
				$sql = "INSERT INTO member SET numbers = '".$userData['oauth_uid']."', account = '".$userData['email']."' , type = 2 , lastlogin = '".date("Y-m-d H:i:s")."' ,pay = 0 , paytime = 0 ";
				$rs = $pdo->query($sql);
				$uid = $pdo ->lastInsertId();
                $sql1 = "INSERT INTO 
			                member_list(uid,cid) 
			            VALUES 
			              ('".$uid."',1),
			              ('".$uid."',2),
			              ('".$uid."',3),
			              ('".$uid."',4),
			              ('".$uid."',5),
			              ('".$uid."',6)";

			    $pdo -> query($sql1); 
			    $sql2 = "INSERT INTO 
			                member_list(uid,cid,val) 
			            VALUES 
			              ('".$uid."',7,'".$userData['email']."')";
			    $pdo -> query($sql2); 
				$_SESSION["id"]=$uid;
				$_SESSION["account"]=$userData['email'];
				$_SESSION["login"] = true;
				$sql3 = "SELECT * FROM member WHERE id=".$uid;
				$rs1 = $pdo->query($sql3);
				foreach ($rs1 as $key => $row1) {
					$_SESSION["type"]=$row1["type"];
					$_SESSION["pay"]=$row1["pay"];
				}
			}
			
			//Get user data from the database
			$result = $pdo->query($prevQuery);
			$userData =$result->fetch(PDO::FETCH_ASSOC);
		}
		
		//Return user data
		return 1;
	}
}
?>