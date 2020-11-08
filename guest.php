<?php require_once 'pdo.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TumarShop(Guest)</title>
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
        <line x1="9.69" y1="8" x2="21.17" y2="8"></line><a class="py-2 d-none d-md-inline-block" href="in.php">Корзина</a>
        <a class="py-2 d-none d-md-inline-block" href="in.php">Вход</a>
        <a class="py-2 d-none d-md-inline-block" href="add.php">Регистрация</a>
        
      </div>
    </nav>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Tumar Football Shop</h1>
          <h2 class="jumbotron-heading">Welcome to our Website</h2>
          <p class="lead text-muted"></p>
          <p>
            <a href="add.php" class="btn btn-primary my-2">Let's Start</a>
           </p>
        </div>
      </section>




      <div class="album py-5 bg-light">
        <nav class="nav flex-column">
  <a class="nav-link active" href="in.php">Balls</a>
  <a class="nav-link" href="in.php">Kits</a>
  <a class="nav-link" href="in.php">Training Suit</a>
 
</nav>
        <div class="container-fluid" >

          <?php
  require_once "pdo.php";
  $stmt = $pdo->query("SELECT * FROM shop  ");
?>
<div class="col-sm-4">
<?php 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
 echo '<div class="col-md-4">';
      echo '<p class="datenews">' . $row['name'] . '<br /></p>'; ?>
     <img src="<?= $row['img'] ?>"  width="135"> <br><br>
     <h4><?= $row['price'] ?> TG</h4>
     <p><?= $row['comment']  ?></p>
     <a type="submit" href="in.php"><i>Send to</i></a>
     <?php
      echo '</div>';}
?>
            </div>
</div>

    </main>




<footer class="text-muted" style="background-color: yellowgreen">
      <div class="container">
        <p class="float-right">
          <a href="in.php">Back to top</a>
        </p>
        <p>TumarShop&copy;The best football shop!</p>
        <p>Be the best <a href="in.php"></a></p>
      </div>
    </footer>


</body>
</html>