<?php include('header.php');
include "db/config.php"; 


if(isset($_SESSION['user'])){

}
else{
    echo '<script> location.href = "login.php"; </script>';
}

?>


<div class="container" style="margin-top: 150px;margin-bottom: 250px;">
<?php 
                    if(isset($_SESSION['update_msg'])){
                    
                    echo $_SESSION['update_msg'];
                    unset($_SESSION['update_msg']);
                    }
                    ?>
    <div class="row">
    <div class="col-sm-2" ></div>
        <div class="col-sm-4  " style="border-right:1px solid grey; padding-left: 10px; " >
        <h3 >Update Profile</h3>  
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name:<br> <input type="text" style="padding-left: 10px;" name="uname" value="<?php echo $_SESSION['user']['name'];?>" required><br><br>
        Email:<br> <input type="text" style="padding-left: 10px;" name="uemail" value="<?php echo $_SESSION['user']['email'];?>" required><br><br>
        Address:<br><textarea type="text"  style="padding-left: 10px; width:80%;" name="address"  required><?php echo $_SESSION['user']['address'];?></textarea><br><br>
        <input type="submit" class="square btn btn-sm btn-my-primary" value="Update Account">
        </form>
        </div>
        <div class="col-sm-4 "  style="padding-left: 10px;" >
          <h3 >Change Password</h3>  
        <form method="post" action="updatepassword.php">
        Current Password:<br> <input type="password" style="padding-left: 10px;" name="old_pass" required><br><br>
        New Password:<br> <input type="password" style="padding-left: 10px;" name="new_pass" required><br><br>
        Confirm Password:<br> <input type="password" style="padding-left: 10px;" name="confirm_pass"  required><br><br>
        <input type="submit" class="square btn btn-sm btn-my-primary" value="Change Password">
        </form>
        </div>
        <div class="col-sm-2" ></div>

       
</div>
</div>

<?php 

$name = $email = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){


  $name = test_input($_POST["uname"]);
  $email = test_input($_POST["uemail"]);
  $address = test_input($_POST["address"]);
  $user_id = $_SESSION['user']['id'];
  $stmt = $conn->prepare("Update user set name= ?,email = ?, address = ? where id = $user_id" );
  $stmt->bind_param("sss", $name, $email, $address);

  if($stmt->execute())
  {

        echo '<script>alert("Updated Successfully! Please login again to continue."); location.href = "login.php"; </script>';
    
  }else{
    
    if(strpos($stmt->error, 'Duplicate entry') !== false)
        $_SESSION['update_msg'] = "<p class='alert alert-danger'>Email Already exist!!</p>";
    else
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


<?php include('footer.php'); ?>