<?php 
include('header.php');
include "db/config.php";

$user_id = $_SESSION['user']['id'];
$order_status = 'ordered';
$amt = 0.0;
$payment_status = "Successful";
$sql_order = "INSERT INTO `orders`(`user_id`, `status`, `total_amount`, `payment_status`) VALUES ($user_id, '$order_status', $amt, '$payment_status')";
$res_order = mysqli_query($conn,$sql_order);
$total_amount = 0; 
$last_id;                       
if($res_order == TRUE )
{
    $last_id = $conn->insert_id;
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
            $order_details = "insert into order_details values($last_id,$cart_id,$book_id)";
            $res_order = mysqli_query($conn,$order_details);
            $book =  mysqli_fetch_assoc(mysqli_query($conn, "select * from books where id = $book_id"));
            $total_amount = $total_amount + $book['price'];
        }
    }
}
    $sql_update = "update orders set total_amount = $total_amount where id = $last_id";
    $update_order = mysqli_query($conn,$sql_update);
  $sql_delete_cart = "delete from cart where cart_id = $cart_id";
  $del_cart = mysqli_query($conn,$sql_delete_cart);

}
else{
 

    
}




?>

<div class="container" style="margin-top: 150px; margin-bottom: 500px;">
          <center>
              <img id="load-img" src="img/loading.gif""/>
              <p id="msg" style="font-size: 48px;" class="lead">Your order is placed successfully!!</p>
              <br>
              <a href="#" id="order-id">Order Id: #000<?php echo $last_id; ?></a>
              <br>
              <a id="order-btn" href="order.php" class="square btn btn-my-primary" >Go to Orders</a>
          </center>
      </div>

      <script>
        const img = document.querySelector('#load-img');
        const msg = document.querySelector('#msg');
        const oid = document.querySelector('#order-id');
        const orderBtn = document.querySelector('#order-btn');
  
        msg.style.display = "none"
        oid.style.display = "none"
        orderBtn.style.display = "none"
     
        setTimeout(function() { 
            img.src = "img/tick.png";
            img.style.width = "270px"
           
            msg.style.display = "block"
            orderBtn.style.display = "inline-block"
            oid.style.display = "block"
         }, 4500)
      </script>


<?php include('footer.php'); ?>