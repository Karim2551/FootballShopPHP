<?php session_start(); ?>
<?php require_once 'pdo.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TumarShop(Admin)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<header>
	<nav style="background-color: yellowgreen" class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="#">Главная</a>
        
        
        <a class="py-2 d-none d-md-inline-block" href="out.php">Выход</a>
    <?php 
    //SESSION
    if(isset($_SESSION["name"])) {
        echo '<a class="btn btn" style="background-color:red;color:white" >'.$_SESSION["name"].'</a>';}
    else{header("Location:in.php");}
    ?>
    </div>
    </nav>
		</header>

     <?php
     //PDO USING 
     //SHOW GOODS FROM DB
  require_once "pdo.php";
  $stmt = $pdo->query("SELECT * FROM shop ");
?>
<div class="pow" style="width: 45%" >
  <table  class="table table-hover" ><tr style="background-color: blue;color: red"><th>Name</th><th>Photo</th><th>Price</th><th>Description</th></tr>
  <?php
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
    echo($row['name']);
    echo "</td>";

   
    echo "<td>";
    ?>
    <img src="<?= $row['img'] ?>"  width="165">
    <?php
    echo "</td>";
    
    echo "<td>";
echo($row['price']);
    echo "</td>";
    

     echo "<td>";
echo($row['comment']);
    echo "</td>";

    echo "</tr>";
  }
  ?>
  </table>

<center>
  
    
  <?php
  require_once "pdo.php";
  $stmt = $pdo->query("SELECT * FROM shop_user ");
?>    

<hr>
             <h1>Users</h1>
             
  <table  class="table table-hover" style="margin-left:40%"><tr style="background-color: green;color: red; margin-bottom: 20%"><th>ID</th><th>Name</th><th>Email</th><th>Password</th></tr>
  <?php
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
    echo($row['user_id']);
    echo "</td>";


    echo "<td>";
    echo($row['name']);
    echo "</td>";

    echo "<td>";
    echo($row['email']);
    echo "</td>";
    

    echo "<td>";
    echo($row['password']);
    echo "</td>";

    echo "</tr>";
  }
  ?>
  </table>
</center>
</main>
</body>
</html>