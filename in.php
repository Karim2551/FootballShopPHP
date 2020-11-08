<?php
 session_start();
require_once('pdo.php');
 $message="";
 
 try {
     $connect = $pdo;
     $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
     if(isset($_POST["in"]))
     {
         if(empty($_POST["name"]) && empty($_POST["password"]))
         {
             $message = 'INPUT ALL';
         } else 
         {
             $query="SELECT * FROM shop_user WHERE name = :name AND password = :password";
             $stmt=$connect->prepare($query);
             $stmt->execute(
                 array(
                     'name' => $_POST["name"],
                     'password' => $_POST["password"]
                 )
            );
            $count=$stmt->rowCount();
            if($count>0)
            {
                $_SESSION['name'] = $_POST["name"];
                header("Location:user.php");
                exit();
            }
            elseif($_POST["name"] === "adminka" && $_POST["password"] === "karim")
            {
                $_SESSION["name"] = $_POST["name"];
                header("Location:admin.php");
            }
            else 
            {
                $message = 'INCORRECT DATA';
            }
         }
     }
 } catch (PDOException $error) {
     $message = $error->getMessage();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Autho</title>
</head>
<body>

    <h1>Please do SIGN-IN</h1>
    
<form method="POST">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <button type="submit" name="in" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
