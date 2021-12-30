
<?php 
include "../db/config.php";  
$id = $status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){


  $id = test_input($_POST["order_id"]);
  $status = test_input($_POST["status"]);

  $sql = "Update orders set status= '$status' where id = $id";

  $res1 = mysqli_query($conn, $sql);
  if($res1 == TRUE)
  {

     echo '<script> alert("Updated Successfully!"); location.href = "orders.php";  </script>';

    
  }
  else{
  
    echo '<script> alert("Failed to Update");  location.href = "orders.php";  </script>';
  }

  
}






function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>