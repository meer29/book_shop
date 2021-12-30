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
                     <h1 class="text-light lead text-center pt-3 pb-3" style="font-size: 24px;">Register</h1>
                  </div>
                  <div class="m-3">
                    <?php 
                    if(isset($_SESSION['register_msg'])){
                    
                    echo "<p class='alert alert-danger'>".$_SESSION['register_msg']."</p>";
                    unset($_SESSION['register_msg']);
                    }
                    ?>
                  </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="row g-3 needs-validation p-3" novalidate>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="uname" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                          *Please enter your full name
                        </div>
                      </div>
                    <div class="col-md-12">
                      <label for="validationCustom01" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="validationCustom01"  required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div  class="invalid-feedback">
                        *Please input your working email address
                      </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                            *Please input strong password
                          </div>
                      </div>
                    <div class="col-12 d-flex justify-content-center">
                        
                      <button style="width: 150px;" class="square btn btn-block btn-my-primary" type="submit">Login</button>
                    </div>

                  </form>
                  <p class="text-center lead">Already have an account? <a style="text-decoration: none;" href="login.php">Login</a></p>
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

$name = $email = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){


  $name = test_input($_POST["uname"]);
  $email = test_input($_POST["email"]);
  $password = MD5(test_input($_POST["password"]));
  $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $password);

  if($stmt->execute())
  {
    $last_id = $conn->insert_id;
    $sql = "UPDATE user set cart_id = $last_id, status = 'active' where id = $last_id ";
    
      $res = mysqli_query($conn, $sql);

      if($res == TRUE)
      {
        $_SESSION['register_msg'] = "Account created Successfully";
        echo '<script> location.href = "login.php"; </script>';
      }
      else{
        $_SESSION['register_msg'] = "Failed to create account ";
        echo '<script> location.href = "register.php"; </script>';
      }

   
  }else{
    
    if(strpos($stmt->error, 'Duplicate entry') !== false)
      $_SESSION['register_msg'] = "Email Id already exit";
    else
      $_SESSION['register_msg'] = "Failed to create account ";
    echo '<script> location.href = "register.php"; </script>';
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