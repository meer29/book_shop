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
<div class="container" style="margin-top: 200px; margin-bottom: 200px;">
          <div class="row">
            <div class="col-sm-4 "></div>
              <div class="col-sm-4 "  style="background-color:rgba(224, 224, 224, 0.204); padding: 0;">
                  <div class="bg-my-primary">
                     <h1 class="text-light lead text-center pt-3 pb-3" style="font-size: 24px;">Login</h1>
                  </div>
                  <div class="m-3">
                    <?php 
                    if(isset($_SESSION['register_msg'])){
                    echo "<p class='alert alert-success p-2'>".$_SESSION['register_msg']."</p>";
                    unset($_SESSION['register_msg']);
                    }
                    ?>
                    <?php 
                    if(isset($_SESSION['login_msg'])){
                    echo "<p class='alert alert-danger p-2'>".$_SESSION['login_msg']."</p>";
                    unset($_SESSION['login_msg']);
                    }
                    ?>
                  </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="row g-3 needs-validation p-3" novalidate>
                    <div class="col-md-12">
                      <label for="validationCustom01" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="validationCustom01"  required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div  class="invalid-feedback">
                        *Please input your registered email address
                      </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                            *Please input your correct password
                          </div>
                      </div>
                    <div class="col-12 d-flex justify-content-center">
                        
                      <button style="width: 150px;" class="square btn btn-block btn-my-primary" type="submit">Login</button>
                    </div>

                  </form>
                  <p class="text-center lead">Don't have an account? <a style="text-decoration: none;" href="register.php">Register</a></p>
              </div>
              <div class="col-sm-4 "></div>
          </div>
      </div>

      <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict'
            
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')
            
                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
            
                    form.classList.add('was-validated')
                    }, false)
                })
            })()
      </script>



<?php 

$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $email = test_input($_POST["email"]);
  $password = MD5(test_input($_POST["password"]));
  $status = 'active';
  $sql = "SELECT * FROM USER WHERE  email = ? and password = ? and status = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $email, $password, $status);

  if($stmt->execute())
  {
    $result = $stmt->get_result();
    $count = mysqli_num_rows($result);
    if($count > 0)
    {
      $user = $result->fetch_assoc();
      $_SESSION['user'] = $user;
      echo '<script> location.href = "index.php"; </script>';
    } 
    else{
      $_SESSION['login_msg'] = "Invalid Credentials or your account is blocked";
      echo '<script> location.href = "login.php"; </script>';
    }
   
   
  }
}






function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


</body>
</html>