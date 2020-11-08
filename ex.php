<?php//uSING SESSION
session_start(); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>TumarShop(Client)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<header>
	<nav style="background-color: yellowgreen" class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="#">TumarShop</a>
        <line x1="9.69" y1="8" x2="21.17" y2="8"></line><a class="py-2 d-none d-md-inline-block" href="">Корзина</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Аккаунт</a>
   <?php 
    //SESSION
    if(isset($_SESSION["name"])) {
        echo '<a class="btn btn" style="background-color:red;color:white" >'.$_SESSION["name"].'</a>';}
    else{header("Location:in.php");}
    ?>
        <a class="py-2 d-none d-md-inline-block" href="out.php">Выход</a>
      </div>
    </nav>
		</header>