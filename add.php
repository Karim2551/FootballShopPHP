<?php 
session_start();
require_once 'pdo.php';
?>
 
<?php
//ADD USER 
if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['city']) && isset($_POST['password']) )
{  
    
    
	$insert_sql = "INSERT INTO shop_user (name,email,city,password) VALUES (:name, :email, :city, :password)";
	
	$stmt = $pdo->prepare($insert_sql);
	$stmt->execute
	(
		array
		(
			':name'=>$_POST['name'],
			':email'=>$_POST['email'],
			':city'=>$_POST['city'],
			':password'=>$_POST['password']
		)
	);
		
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AD</title>
</head>
<body>
	<center><h2>Registration</h1>
		<form method="post" action="">
			<input type="text" name="name" required><br><br>
			<input type="email" name="email" required=""><br><br>
			<input type="text" name="city" required=""><br><br>
			<input type="password" name="password" required=""><br><br>
			<input type="submit">
			<a href="in.php">Sign In</a>
		</form></center>
	

</body>
</html>