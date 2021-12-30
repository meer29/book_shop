<?php

session_start();
include "db/config.php"; 

if(isset($_SESSION['user'])){

}
else{
    echo '<script> location.href = "login.php"; </script>';
}

$cart_id = $_SESSION['user']['cart_id'];

$id = $_GET['id'];

$sql = "insert into cart (`cart_id`, `book_id`) values($cart_id, $id)";



$res = mysqli_query($conn,$sql);
                          
if($res == TRUE )
{
  
    echo '<script> location.href = "cart.php"; </script>';
    
}
else{
    if(isset($_SESSION['user'])){
        echo '<script> location.href = "book-detail.php?id='.$id.'"; alert("Sorry! Failed to add books to cart!!");</script>';
        }
        else{
            echo '<script> location.href = "login.php"; alert("Please login...");</script>';
        }

   
}

?>

