<?php include('header.php'); 
include "db/config.php";

if(isset($_SESSION['user'])){

}
else{
    echo '<script> location.href = "login.php"; </script>';
}
?>


<div class="container" style="margin-top:150px; margin-bottom: 200px;">
    <h2 class="text-center mb-5">Your Orders </h2>


    <?php
        $user_id = $_SESSION['user']['id'];
        $sql = "select * from orders where user_id = $user_id order by id desc";
        $res1 = mysqli_query($conn, $sql);

        if($res1 == TRUE)
        {
            $count1 = mysqli_num_rows($res1);

            if($count1 > 0)
            {
                while($rows = mysqli_fetch_assoc($res1) )
                {
                    $id = $rows['id'];
                    ?>
                    <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="h<?php echo $rows['id']; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c<?php echo $rows['id'];?>" aria-expanded="true" aria-controls="collapseOne">
                            Order Id: 000<?php echo $rows['id']; ?> | Order Status: <?php echo $rows['status']; ?> | Amount: ₹<?php echo $rows['total_amount']; ?> | Payment: <?php echo $rows['payment_status']; ?>  
                        </button>
                        </h2>
                        <div id="c<?php echo $rows['id'];?>" class="accordion-collapse collapse " aria-labelledby="h<?php echo $rows['id']; ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h6>Order Details </h6>
                            <?php
                                $mySql = "select * from order_details where order_id = $id";
                                $resm = mysqli_query($conn, $mySql);

                                if($resm == TRUE)
                                {
                                    $countm = mysqli_num_rows($resm);
                                    if($countm > 0)
                                    {
                                        while($rowm = mysqli_fetch_assoc($resm))
                                        {
                                            $book_id = $rowm['book_id'];
                                            $mybook= mysqli_fetch_assoc(mysqli_query($conn, "select * from books where id = $book_id"));
                                            echo '<p><b>Book Name:</b> '.$mybook['name'].' | <b>Price</b> ₹'.$mybook['price'].'</p>';
                                        
                                          
                                        }
                                    }
                                }                
                            ?>
                        </div>
                        </div>
                    </div>
                </div>
                    <?php
                }
            }
        }
?>





</div>

<?php include('footer.php') ?>