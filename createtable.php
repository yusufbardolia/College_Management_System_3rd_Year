 <?php
 // DB connection info
 $host = "yusuf-database-server.database.windows.net";
 $user = "yusuf";
 $pwd = "bardolia@8378";
 $db = "yusuf sql database";
 try{
 	$conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
 	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
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
