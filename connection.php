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
