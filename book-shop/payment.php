<?php include('header.php'); 
include "db/config.php"; 

$Address = $_SESSION['user']['address'];
if($Address == "")
{
  $_SESSION['update_msg'] = "<p class='alert alert-danger'>Please provide Shipping address to continue order process</p>";
  echo '<script> location.href = "profile.php"; </script>';
}



$sql1 = "select * from cart where cart_id = $cart_id";
$res1 = mysqli_query($conn, $sql1);
$total_amount =0;

if($res1 == TRUE)
{
    $count1 = mysqli_num_rows($res1);

    if($count1 > 0)
    {
        while($rows = mysqli_fetch_assoc($res1) )
        {
            $book_id = $rows['book_id'];
            $cart_id = $rows['cart_id'];
            $u_id = $rows['id'];
            $book =  mysqli_fetch_assoc(mysqli_query($conn, "select * from books where id = $book_id"));
            $total_amount = $total_amount + $book['price'];
          
        }
    }
}


?>


<div class="container" style="margin-top: 150px; margin-bottom: 150px;">
          <div class="row">
            <div class="col-sm-4"></div>
              <div class="col-sm-4" style="background-color:rgba(224, 224, 224, 0.204); padding: 0;">
                <div class="bg-my-primary">
                    <h1 class="text-light lead text-center pt-3 pb-3" style="font-size: 24px;">Payment Details </h1>
                 </div>
                <form action="process.php" method="post" class="row g-3 needs-validation p-3" novalidate>
                    <div class="col-md-12">
                      <label for="validationCustom01" class="form-label">Amount</label>
                      <input type="text" disabled class="form-control" id="validationCustom01" value="₹ <?php echo $total_amount; ?>" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>
                
                 
                      <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Card Number</label>
                        <div class="d-flex">
                            <input type="text" id="card_number" maxlength="19" style="display: inline;"  class="square form-control" id="validationCustom01" placeholder="0000 0000 0000 0000" required>
                            <img src="img/card-color.png"/ width="10%">
                        </div>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="d-flex justify-content-between">
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">Expiration Date</label>
                        
                                <input type="text" style="display: inline;" id="expiry"  maxlength="7" class="square form-control" id="validationCustom01" placeholder="MM/YYYY" required>
                    
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label for="validationCustom01" class="form-label">CVV</label>
                        
                                <input type="text" style="display: inline;"  maxlength="3" class="square form-control" id="validationCustom01" placeholder="000" required>
                    
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                          </div>
                      </div>
                      <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Card Holder Name</label>
                        <input type="text"  class="form-control" id="validationCustom01" placeholder="John Doe" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    <div class="col-12 d-grid">
                      <button class="btn square btn-block btn-my-primary" type="submit">Proceed</button>
                    </div>
                  </form>
              </div>
              <div class="col-sm-4"></div>
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

            document.querySelector('#card_number').addEventListener('keypress', function () {
                card_number = document.querySelector('#card_number').value;
                if (card_number.length == 4 || card_number.length == 9 || card_number.length == 14) {
                    document.querySelector('#card_number').value = card_number + " ";
                }
            })
            document.querySelector('#expiry').addEventListener('keypress', function () {
                card_number = document.querySelector('#expiry').value;
                if (card_number.length == 2 ) {
                    document.querySelector('#expiry').value = card_number + "/";
                }
            })
            
      </script>
<?php include('footer.php'); ?>