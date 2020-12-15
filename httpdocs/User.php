<?php
  include_once 'lib/core.php';
date_default_timezone_set('Asia/Taipei');
@session_start();


class User {
    private $dbHost     = "db01.coowo.com:3355";
    private $dbUsername = "24teacher";
    private $dbPassword = "tutor53949572";
    private $dbName     = "tutor";
  //  private $userTbl    = 'tutor';
    
    function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
				     
            }
        }
    }

    function checkUser($userData = array()){
        if(!empty($userData)){
            //Check whether user data already exists in database
            $sql = "SELECT * FROM member WHERE account='".$userData['account']."' AND type != 3 ";
            $prevResult = $this->db->query($sql);
            if($prevResult->num_rows > 0){
					header("Location:index.php?msg=10");
					die();
				}else{
			
					 $sql1 = "SELECT * FROM member WHERE  getid = '".$userData['oauth_uid']."'  ";
					 $prevResult1 = $this->db->query($sql1);
					 if($prevResult1->num_rows > 0){
						
                //Update user data if already exists
                $query = "UPDATE member SET 
                lastlogin = '".date("Y-m-d H:i:s")."'
                WHERE  getid = '".$userData['oauth_uid']."'  ";
                $update = $this->db->query($query);
     
					}else{
                //Insert user data
                $query = "INSERT INTO member(numbers,account,password,type,lastlogin,getid) VALUES ('".$userData['oauth_uid']."','".$userData['account']."','0qjsdpgm0',3,'".date("Y-m-d H:i:s")."','".$userData['oauth_uid']."')";
                $insert =  $this->db->query($query);
                $query1 = "SELECT * FROM member WHERE  
                getid = '".$userData['oauth_uid']."' ";
                $ss =  $this->db->query($query1);
                $ss1 = $ss->fetch_assoc();
                $uid = $ss1['id'];
                $yy=str_pad($uid, 3, "0", STR_PAD_LEFT);
                $xx = substr(uniqid(rand(),true),0,4);
                $dd = date('d');
                $nn =$dd.$xx.$yy;
                $sql1="UPDATE member SET numbers='".$nn."' WHERE id ='".$uid."'";
                $this->db -> query($sql1);
                $sql2 = "INSERT INTO 
                      member_list(uid,cid) 
                  VALUES 
                    ('".$uid."',1),
                    ('".$uid."',2),
                    ('".$uid."',3),
                    ('".$uid."',4),
                    ('".$uid."',5),
                    ('".$uid."',6),
                    ('".$uid."',8)";
                $this->db -> query($sql2); 
                $sql3 = "INSERT INTO 
                      member_list(uid,cid,val) 
                  VALUES 
                    ('".$uid."',7,'".$userData['account']."') ";
                $this->db -> query($sql3); 
                
                $sql4 = "INSERT INTO 
                power(uid,cases,resumes,invite,application,certification) 
                    VALUES 
                      ('".$uid."',1,1,1,1,0)";
               $this->db -> query($sql4); 
            }
            
            //Get user data from the database
            $result = $this->db->query($sql);
            $userData = $result->fetch_assoc();
            $_SESSION["id"]=$userData['id'];
            $_SESSION["account"]=$userData['account'];
            $_SESSION["login"] = true;
            $_SESSION["type"] = 3;
        }}
        
        //Return user data
        return $userData;
    }
}
?>