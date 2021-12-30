<?php
 include "db/config.php";

 
 if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $searchkey = test_input($_POST["searchkey"]);
    
    echo '<script> location.href = "books.php?q='.$searchkey.'" </script>';
     
 }
  
  
  
  
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }



?>