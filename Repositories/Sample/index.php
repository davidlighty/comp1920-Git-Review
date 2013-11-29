<?php
	/*
		David Lighty
		Comp 1920
		Oct 30, 2013

		Database handling

	*/

	$errorMsg;

	// DB Methods
	require_once('./database.php');
	
	// Init DB
	checkDatabase();

	// Check for POST Data
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if(!isset($_POST["title"])){
					$errorMsg="Please enter a title";
				}else if(!isset($_POST["aFirstName"])){
					$errorMsg="Please enter a first name for the author.";
				}else if(!isset($_POST["aLastName"])){
					$errorMsg="Please enter a last name for the author";
				}else if(!isset($_POST["descrip"])){
					$errorMsg="Please enter a description.";
				}else{
					$postData =createBookDataArray(
									 	$_POST['title'],
									 	$_POST['aLastName'],
									 	$_POST['aFirstName'],
									 	$_POST['descrip']
				 				);
					//print_r($postData);
				 insertRecord($postData);
				}		
		}

	// Finally get DB Data (will have new record if any)
	$dbBookData = getRecord(NULL); //blank for all
	//print_r($dbBookData);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Database</title>
</head>
<body>
<div>
	<p>Lesson for handling a database</p>
</div>

<div class="error-message">
	<?php if(isset($errorMsg) && !empty($errorMsg)){
		echo $errorMsg;
		} 
		?>
</div>

<div class="add-record">
<form method="POST">
	<label>Title</label><input type="text" name="title"/>
		<label>Author First Name</label><input type="text" name="aFirstName"/>
		<label>Author Last Name</label><input type="text" name="aLastName"/>
			<label>Description</label><input type="text" name="descrip"/>
			<button>Submit</button>
</form>

</div>
<table>
	<thead>
		<th>Title</th>
		<th>Author</th>
		<th>Description</th>
	</thead>
	<tbody>
		<?php 
	// Loop and display db data
	foreach($dbBookData as $book){
			echo"<tr>";
			echo "<td>". $book['title'] ."</td>"; // Title
			echo "<td>". $book['authorFirstName'] ."</td>"; // Author
			echo "<td>". $book['description'] ."</td>"; // Description
			echo"</tr>";
	}

 ?>
	</tbody>
</table>
</body>
</html>