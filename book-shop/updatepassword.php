<?php 
include "db/config.php"; 
session_start();
$old =  $new = $confirm = $new_p=  "";
$user_id = $_SESSION['user']['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST"){


  $old = MD5(test_input($_POST["old_pass"]));
  if($old != $_SESSION['user']['password'])
  {
    $_SESSION['update_msg'] = "<p class='alert alert-danger'>Current Password is not correct</p>";
   echo '<script> location.href = "profile.php"; </script>';
  }
  $new = test_input($_POST["new_pass"]);
  $confirm = test_input($_POST["confirm_pass"]);
  if($new != $confirm)
  {
    $_SESSION['update_msg'] = "<p class='alert alert-danger'>Old Password and Confirm Password are not matching!</p>";
    echo '<script> location.href = "profile.php"; </script>';
  }
  $new_p = MD5($confirm);
  $stmt = $conn->prepare("Update user set password = ? where id = $user_id" );
  $stmt->bind_param("s", $new_p);

  if($stmt->execute())
  {

       echo '<script>alert("Password Changed Successfully! Please login again to continue."); location.href = "login.php"; </script>';
    
  }else{
    

      $_SESSION['update_msg'] = "Failed to update account";
      echo '<script> location.href = "profile.php"; </script>';
  }



  
}






function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
