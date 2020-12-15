<?php
    include_once 'lib/core.php';
	$action = @$_GET["action"];
	$p1 = @$_GET["p1"];
    $reid = @$_GET["reid"];
    $rid = @$_GET["rid"];
    $cid = @$_GET["cid"];
    $caid = @$_GET["caid"];
    $scid = @$_GET["scid"];
    $fbid = @$_GET["fbid"];
    $fbname = @$_GET["fbname"];
    $fbemail = @$_GET["fbemail"];
    $fbgender = @$_GET["fbgender"];

	if($action=="StudentType")
	{
		$ary = ["選擇對象","學齡前兒童","國小生","國中生","高中生","大學生","社會人士"];
		$vary = [0,1,2,3,4,5,6];

		$data = array();
		for($i=0;$i<count($ary);$i++)
		{
			$o = new stdClass();
			$o->key = $ary[$i];
			$o->value = $vary[$i];
			array_push($data, $o);
		}

		echo json_encode($data);
	}

	if($action=="CityType")
	{

		$sql ="SELECT * FROM city";
		$pdo = DB_CONNECT();
		$rs =$pdo->query($sql); 
		$data = array();
		foreach ($rs as $key => $row){
			$o = new stdClass();
			$o->key = $key;
			$o->value = $row["cityvalue"];
			array_push($data, $o);
		}

		echo json_encode($data);
	}

	if($action=="SubjectType")
	{
		$sql ="SELECT * FROM subjects";
		$pdo = DB_CONNECT();
		$rs =$pdo->query($sql);
		$data = array();
		foreach ($rs as $key => $row){
			$o = new stdClass();
			$o->key = $key;
			$o->value = $row["val"];
			array_push($data, $o);
		}

		echo json_encode($data);
	}	

	if($action=="CountryType")
	{
		$sql ="SELECT * FROM country";
		$pdo = DB_CONNECT();
		$rs =$pdo->query($sql); 
		$data = array();
		foreach ($rs as $key => $row){
			$o = new stdClass();
			$o->key = $key;
			$o->value = $row["val"];
			array_push($data, $o);
		}
		echo json_encode($data);
	}


		if($action=="LanguagesType")
	{
		$sql ="SELECT * FROM languages";
		$pdo = DB_CONNECT();
		$rs =$pdo->query($sql);
		$data = array();
		foreach ($rs as $key => $row){
			$o = new stdClass();
			$o->key = $key;
			$o->value = $row["val"];
			array_push($data, $o);
		}

		echo json_encode($data);
	}	


		if($action=="StType")
	{
		$ary = ["選擇性別","女","男"];
		$vary = [0,1,2];
        $data = array();
		for($i=0;$i<count($ary);$i++)
		{
			$o = new stdClass();
			$o->key = $vary[$i];
			$o->value = $ary[$i];
			array_push($data, $o);
		}
		echo json_encode($data);
	}	
	
	if($action=="WeekType")
	{
		$ary = ["選擇星期","週一","週二","週三","週四","週五","週六","週日"];
		$vary = [0,1,2,3,4,5,6,7];

		$data = array();
		for($i=0;$i<count($ary);$i++)
		{
			$o = new stdClass();
			$o->key = $vary[$i];
			$o->value = $ary[$i];
			array_push($data, $o);
		}

		echo json_encode($data);
	}

	if($action=="AccountType")
	{
      $ary = ["選擇性別","女","男"];
		$vary = [0,1,2];
      $data = array();
		for($i=0;$i<count($ary);$i++)
		{
			$o = new stdClass();
			$o->key = $vary[$i];
			$o->value = $ary[$i];
			array_push($data, $o);
		}
		caseinterview($reid,$rid,$cid,$caid);

		echo json_encode($data);
	}


	if($action=="SeepersonType")
	{
        $sql ="SELECT * FROM interview WHERE ";
		$pdo = DB_CONNECT();
		$rs =$pdo->query($sql);
		$data = array();
		foreach ($rs as $key => $row){
			$o = new stdClass();
			$o->key = $key;
			$o->value = $row["val"];
			array_push($data, $o);
		}

		echo json_encode($data);
	}

	if($action=="FbType")
	{
        $ary = ["選擇星期","週一","週二","週三","週四","週五","週六","週日"];
		$vary = [0,1,2,3,4,5,6,7];

		$data = array();
		for($i=0;$i<count($ary);$i++)
		{
			$o = new stdClass();
			$o->key = $vary[$i];
			$o->value = $ary[$i];
			array_push($data, $o);
		}
		fblogin($fbid,$fbname,$fbemail,$fbgender);
		
		echo json_encode($data);
		
	}
?>