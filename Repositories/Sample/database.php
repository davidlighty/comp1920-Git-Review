<?php
	/*
		David Lighty
		Comp 1920
		Oct 30, 2013

		Database handling

	*/

	// DB Methods
	$mysqli;

	function doSQLQuery($sql){
		global $mysqli;
		//echo($sql);
		if($result = $mysqli->query($sql)){
			//echo("--True-<br/>");
			return $result;
		}else{
			//echo("--False--<br/>");
			return false;
		}
	}

	function openDatabase(){
		global $mysqli;
		$mysqli=new mysqli("localhost","root","") or die("no connection to database");
		$mysqli->select_db("a5737630_1920") or die(mysqli_error($mysqli));
	}

	function closeDatabase(){
		// global $mysqli;
		// mysqli_kill();
		// mysqli_close($mysqli);
	}

	function createTable(){
		$sql="CREATE TABLE IF NOT EXISTS dlighty(
			id int primary key not null auto_increment,
			title varchar(250) not null,
			authorLastName varchar(250) null,
			authorFirstName varchar(250) null,
			description varchar(2000) null
			)";
		openDatabase();
		$result = doSQLQuery($sql);
		if($result){
			// Created!
			closeDatabase();
			return true;
		}else{
			// Error
			closeDatabase();
			return false;
		}
	}

	function dumpTable(){
		$sql="DROP TABLE IF EXISTS dlighty";
		$result=doSQLQuery($sql);
		if($result){
			// Created!
			return true;
		}else{
			// Error
			return false;
		}
	}

	function initDatabase(){
		openDatabase();
		dumpTable();
		createTable();
		createDummyData();
		closeDatabase();
	}

	function checkDatabase(){
		global $mysqli;
		openDatabase();
		if(!$mysqli->select_db("a5737630_1920")){
			closeDatabase();
			initDatabase();
		}
		closeDatabase();
	}

	// CRUD
	function insertRecord($bookData){
		$sql = "INSERT INTO dlighty VALUES( 
			NULL,
			'". $bookData['title'] ."',
			'". $bookData['authorLastName']."',
			'". $bookData['authorFirstName']."',
			'". $bookData['description']."'
			)";
		openDatabase();
		$result=doSQLQuery($sql);
		if($result){
			// Created!
			closeDatabase();
			return true;
		}else{
			// Error
			closeDatabase();
			return false;
		}
	}
	function deleteRecord($bookID){
		openDatabase();
		$result=doSQLQuery($sql);
		if($result){
			// Created!
			closeDatabase();
			return true;
		}else{
			// Error
			closeDatabase();
			return false;
		}
	}
	//
	function updateRecord($bookData){
		openDatabase();
		$result=doSQLQuery($sql);
		if($result){
			// Created!
			closeDatabase();
			return true;
		}else{
			// Error
			closeDatabase();
			return false;
		}
	}
	// GET ID or ALL
	function getRecord($bookID){
		$sql = "SELECT * FROM dlighty";
		if(!empty($bookID)){
			$sql = $sql." WHERE id=".$bookID;
		}
		openDatabase();
		$result=doSQLQuery($sql);
		if($result){
			// Created!
			$allRows =  $result->fetch_all(MYSQLI_ASSOC);
			//print_r($allRows);
			return $allRows;
		}else{
			// Error
			closeDatabase();
			return null;
		}
	}


		/* BOOK DATA
			$bookData['title'] 
			$bookData['authorLastName']
			$bookData['authorFirstName']
			$bookData['description']
	*/
	// Insert book data
	function createDummyData(){
		// 10 different books
		$book1=createBookDataArray('A Game of Thrones','Martin','George R. R.','In a world where the approaching winter will last four decades, kings and queens, knights and renegades struggle for control of a throne. Some fight with sword and mace, others with magic and poison. Beyond the Wall to the north, meanwhile, the Others are preparing their army of the dead to march south as the warmth of summer drains from the land.');
		insertRecord($book1);
		$book2=createBookDataArray('A Clash of Kings','Martin','George R. R.','In a world where the approaching winter will last four decades, kings and queens, knights and renegades struggle for control of a throne. Some fight with sword and mace, others with magic and poison. Beyond the Wall to the north, meanwhile, the Others are preparing their army of the dead to march south as the warmth of summer drains from the land.');
		insertRecord($book2);
		$book3=createBookDataArray('A Storm of Swords','Martin','George R. R.','In a world where the approaching winter will last four decades, kings and queens, knights and renegades struggle for control of a throne. Some fight with sword and mace, others with magic and poison. Beyond the Wall to the north, meanwhile, the Others are preparing their army of the dead to march south as the warmth of summer drains from the land.');
		insertRecord($book3);
		$book4=createBookDataArray('A Feast for Crows','Martin','George R. R.','In a world where the approaching winter will last four decades, kings and queens, knights and renegades struggle for control of a throne. Some fight with sword and mace, others with magic and poison. Beyond the Wall to the north, meanwhile, the Others are preparing their army of the dead to march south as the warmth of summer drains from the land.');
		insertRecord($book4);
		$book5=createBookDataArray('A Dance with Dragons','Martin','George R. R.','In a world where the approaching winter will last four decades, kings and queens, knights and renegades struggle for control of a throne. Some fight with sword and mace, others with magic and poison. Beyond the Wall to the north, meanwhile, the Others are preparing their army of the dead to march south as the warmth of summer drains from the land.');
		insertRecord($book5);
		$book6=createBookDataArray('Enders Game','Card','Orson Scott','In order to develop a secure defense against a hostile alien races next attack, government agencies breed child geniuses and train them as soldiers. ');
		insertRecord($book6);
		$book7=createBookDataArray('Speaker for the Dead','Card','Orson Scott','In order to develop a secure defense against a hostile alien races next attack, government agencies breed child geniuses and train them as soldiers. ');
		insertRecord($book7);
		$book8=createBookDataArray('Xenocide','Card','Orson Scott','In order to develop a secure defense against a hostile alien races next attack, government agencies breed child geniuses and train them as soldiers. ');
		insertRecord($book8);
		$book9=createBookDataArray('Children of the Mind','Card','Orson Scott','In order to develop a secure defense against a hostile alien races next attack, government agencies breed child geniuses and train them as soldiers. ');
		insertRecord($book9);
		$book10=createBookDataArray('Ender in Exile','Card','Orson Scott','In order to develop a secure defense against a hostile alien races next attack, government agencies breed child geniuses and train them as soldiers. ');
		insertRecord($book10);
	}

	function createBookDataArray($title,$authorLastName,$authorFirstName,$description){
		return ['title'=>$title,
				'authorLastName'=>$authorLastName,
				'authorFirstName'=>$authorFirstName,
				'description'=>$description];
	}

?>