<?php
  session_start();
  if(!$_SESSION['admin']){
     header("Location: http://localhost/ecomm.oop/admin");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <h1>
                <span class="sm">OOP</span>
                <span class="lg">ECOMM</span>
            </h1>
            <ul>
                <li><a href="./products.php">Products</a></li>
                <li><a href="./categories.php">Categories</a></li>
                <li><a href="./orders.php">Orders</a></li>
            </ul>
            <a href="logout.php">Logout</a>
        </nav>
    </header>