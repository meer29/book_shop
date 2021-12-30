<?php
 include "db/config.php";
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/c2077facb3.js" crossorigin="anonymous"></script>
    <title>Online Book Shop</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-my-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">   <img src="img/logo.png" alt="" width="30" height="24"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
            <ul class="navbar-nav mb-2 mb-lg-0 me-auto  ">
              <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="books.php?q=<?php echo ('all');?>">Books</a>
              </li>
<li class="nav-item">
                <a class="nav-link" href="http://localhost/book-shop/admin/admin-login.php">Admin</a>
              </li>

              <li class="nav-item">
              <?php 
                      if(isset($_SESSION['user'])){
                          echo ' <a class="nav-link" href="order.php">Orders</a>';
                      }
                    
                    ?>
               
              </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 me-2 ">
                  
                <li class="nav-item">
                    <?php 
                      if(isset($_SESSION['user'])){

                      $cart_id = $_SESSION['user']['cart_id'];
                      $cartItemCount = mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as c from cart where cart_id = $cart_id "))['c'];
                      echo '<a class="nav-link  " aria-current="page" href="cart.php"> <i class="fas fa-cart-arrow-down"></i> Cart ['.$cartItemCount.']</a>';
                      }
                    
                    ?>
                   
                  </li>
                <li class="nav-item">
                    <?php 
                      if(isset($_SESSION['user'])){
                        $user = $_SESSION['user'];
                        echo '<a class="nav-link" aria-current="page" href="profile.php"> <i class="fas fa-user-circle"></i> '.$user['name'].'</a>';
                      }
                      else{
                        echo '<a class="nav-link  " aria-current="page" href="login.php">  <i class="fas fa-sign-in-alt"></i> Login</a>';
                      }
                    ?>
                   
                </li>
                <li class="nav-item">
                    <?php 
                      if(isset($_SESSION['user'])){
                        $user = $_SESSION['user'];
                        echo '<a class="nav-link" aria-current="page" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>';
                      }
                    
                    ?>
                   
                  </li>
            </ul>
          </div>
        </div>
      </nav>
