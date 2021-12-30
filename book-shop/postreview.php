<?php

session_start();
include "db/config.php"; 

$id = $_POST['id'];

$comment = $_POST['review'];

$user = $_SESSION['user'];

$user_name = $user['name'];

$date = date('Y-m-d', time());

$sql = "INSERT INTO `bookreview`(`book_id`, `comment`, `date`, `user_name`) VALUES ($id,'$comment','$date','$user_name')";




$res = mysqli_query($conn,$sql);
                          
if($res == TRUE )
{
  
    echo '<script> location.href = "book-detail.php?id='.$id.'"; </script>';
    
}
else{
 
   
    echo '<script> location.href = "book-detail.php?id='.$id.'"; alert("Sorry! Failed to save review!!");</script>';
}

?>