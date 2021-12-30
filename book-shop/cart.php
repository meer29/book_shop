<?php include('header.php'); 
include "db/config.php"; 
if(isset($_SESSION['user'])){

}
else{
    echo '<script> location.href = "login.php"; </script>';
}
$total_amount = 0;

?>


<div class="container " style="margin-top: 150px; margin-bottom: 150px;">
          <div class="row">
              <div class="col-lg-8">
                <div class="mb-5 d-flex justify-content-between">
                    <h3>YOUR BAG <span class="lead" style="color: rgb(76, 76, 76); font-size: 60%;"><?php echo $cartItemCount; ?> ITEMS</span></h3>
                    <a class="btn square btn-my-primary" href="books.php?q=all&type=a">Continue Shopping</a>
                </div>
                <hr>
                
                <?php
                $sql1 = "select * from cart where cart_id = $cart_id";
                $res1 = mysqli_query($conn, $sql1);

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
                           ?>


                <div class="row border pt-3 pb-3 m-2">
        
                    <div class="col-sm-3 d-flex justify-content-center">
                        <img src="img/books/<?php echo $book['image']; ?>"  width="100px; " />
                    </div>
                    <div class="col-sm-5" style="line-height: 0.7;">
                        <p class="lead" style="font-weight: bold;"><?php echo $book['name']; ?></p>
                        <p><span style="color: rgb(115, 115, 115);">Author:</span><?php echo $book['author']; ?></p>
                        <p><span style="color: rgb(115, 115, 115);">ISBN:</span> <?php echo $book['isbn']; ?></p>
                        <p><span style="color: rgb(115, 115, 115);">Publisher:</span><?php echo $book['publisher']; ?></p>
                    </div>
                    <div class="col-sm-2">
                        <a href="deletecartitem.php?id=<?php echo $u_id;?>">Delete</a>
                    </div>
                    <div class="col-sm-2">
                    ₹ <?php echo $book['price']; ?>
                    </div>
                </div>
                <?php
                        }
                    }
                }

                ?>
             
                </div>
           
              <div class="col-lg-4 bg-light">
                  <h6 class="btn-my-primary  p-3 " style="padding-left: 10px;">ORDER SUMMARY </h6>
                  <p class="text-center" style="padding-left: 20px; padding-right: 20px;">By placing your order, you agree to the Delivery Terms</p>
                  
                  <div class="" style="background-color: white;">
                      <p class="p-3"><?php echo $cartItemCount; ?> PRODUCT</p>
                  </div>
                 
                  <div class="d-flex justify-content-between" style="background-color: white; border-bottom: 1px solid rgba(223, 223, 223, 0.483);">
                    <p class="p-2">Product Total</p>
                    <p class="p-2">₹ <?php echo $total_amount; ?> </p>
                </div>
               
                <div class="d-flex justify-content-between" style="background-color: white; border-bottom: 1px solid rgba(223, 223, 223, 0.483);">
                    <p class="p-2">Tax</p>
                    <p class="p-2">₹ 0.00</p>
                </div>
               
                <div class="d-flex justify-content-between" style="background-color: white; border-bottom: 1px solid rgba(223, 223, 223, 0.483);">
                    <p class="p-2">Delivery</p>
                    <p class="p-2">₹ 0.00</p>
                </div>
                <div class="d-flex justify-content-between" style="background-color: white; border-bottom: 1px solid rgba(223, 223, 223, 0.483);">
                    <p class="p-2"><b>Total</b></p>
                    <p class="p-2"><b>₹ <?php echo $total_amount; ?> </b></p>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="payment.php" class="btn mt-3 btn-my-primary square">PROCEED TO CHECKOUT &rarr;</a>
                </div>
              <div class="border mt-5 text-center">
                <h4 class=" lead">ACCEPTED PAYMENT METHODS</h4>
                <img src="img/cards.png"/ width="70%;">
              </div>
               
              </div>
          </div>
      </div>

<?php include('footer.php'); ?>