<?php

session_start();
include "db/config.php"; 


$id = $_GET['id'];

$sql = "delete from cart where id = $id";



$res = mysqli_query($conn,$sql);
                          
if($res == TRUE )
{
  
    echo '<script> location.href = "cart.php"; </script>';
    
}
else{
 

    echo '<script> location.href = "cart.php"; alert("Sorry! Failed to delete book from cart. Try again!!");</script>';
}

?>

