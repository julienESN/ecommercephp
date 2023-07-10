<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
  <title>E-Commerce Site</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../design/header/header.css" /> 

</head>
<body>
  <div id="header">
    <nav>
      <div class="nav-items">
        <span class="sneakers">sneakers</span>
        <span>Collections</span>
        <span>Men</span>
        <span>Women</span>
        <span>About</span>
        <span>Contact</span>
      </div>
      <div class="icons">
        <img class="cart-icon" src="../images/icon-cart.svg" alt="Cart Icon" />
        <img class="profile-picture" src="../images/image-avatar.png" alt="Profile Picture"/>
      </div>
    </nav>
  </div>
</body>
</html>
