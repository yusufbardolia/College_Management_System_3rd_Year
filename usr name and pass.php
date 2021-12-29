 // DB connection info
 $host = "localhost\sqlexpress";
 $user = "user name";
 $pwd = "password";
 $db = "registration";
 // Connect to database.
 try {
 	$conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
 	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 }
 catch(Exception $e){
 	die(var_dump($e));
 }
