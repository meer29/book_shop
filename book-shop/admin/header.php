<?php 
 session_start();              
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Book-Shop| Admin</title>
</head>
<body>
    
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Book Shop | Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="books.php">Books</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="category.php">Category</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="orders.php">Orders</a>
          </li>     
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0 me-2 ">
                <li class="nav-item">
                  <?php
                   if(isset($_SESSION['users']))
                   {
                    $user = $_SESSION['users'];
                    echo '<a class="nav-link  " aria-current="page" href="admin-logout.php"> <i class="fas fa-cart-arrow-down"></i> Logout</a>';
                  }
                  else{
                    echo '<script> location.href = "admin-login.php"; </script>';
                   
                  }
                  
                  ?>
                  
                  </li>
            </ul>
      </div>
    </div>
  </nav>