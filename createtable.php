<?php
 // DB connection info
 $host = "localhost\sqlexpress";
 $user = "user name";
 $pwd = "password";
 $db = "registration";
 try{
 	$conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
 	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  catch(Exception $e){
 	die(var_dump($e));
 }
 	$sql = "CREATE TABLE registration_tbl(
 	id INT NOT NULL IDENTITY(1,1) 
 	PRIMARY KEY(id),
 	name VARCHAR(30),
 	email VARCHAR(30),
 	date DATE)";
 	$conn->query($sql);
 }
 catch(Exception $e){
 	die(print_r($e));
 }
 echo "<h3>Table created.</h3>";
 ?>
 if(!empty($_POST)) {
 try {
 	$name = $_POST['name'];
 	$email = $_POST['email'];
 	$date = date("Y-m-d");
 	// Insert data
 	$sql_insert = "INSERT INTO registration_tbl (name, email, date) 
 				   VALUES (?,?,?)";
 	$stmt = $conn->prepare($sql_insert);
 	$stmt->bindValue(1, $name);
 	$stmt->bindValue(2, $email);
 	$stmt->bindValue(3, $date);
 	$stmt->execute();
 }
 catch(Exception $e) {
 	die(var_dump($e));
 }
 echo "<h3>Your're registered!</h3>";
 }
 $sql_select = "SELECT * FROM registration_tbl";
 $stmt = $conn->query($sql_select);
 $registrants = $stmt->fetchAll(); 
 if(count($registrants) > 0) {
 	echo "<h2>People who are registered:</h2>";
 	echo "<table>";
 	echo "<tr><th>Name</th>";
 	echo "<th>Email</th>";
 	echo "<th>Date</th></tr>";
 	foreach($registrants as $registrant) {
 		echo "<tr><td>".$registrant['name']."</td>";
 		echo "<td>".$registrant['email']."</td>";
 		echo "<td>".$registrant['date']."</td></tr>";
     }
  	echo "</table>";
 } else {
 	echo "<h3>No one is currently registered.</h3>";
 }
