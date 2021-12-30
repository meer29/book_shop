<?php include('header.php');
include "db/config.php"; 

$id = $_GET['id'];
$r = mysqli_fetch_assoc(mysqli_query($conn, "select * from books where id = $id"));


?>

<div class="container" style="margin-top: 150px; margin-bottom: 150px;">

<div class="row ">
    <div class="col-lg-2 "></div>
    <div class="col-lg-4  p-3" style="background-color: rgb(248, 248, 248);">
        <center>
            <img src="img/books/<?php echo $r['image'];?>" width="300px; " />
        </center>
    </div>
    <div class="col-lg-4  p-3" style="background-color: rgb(248, 248, 248);">
        <h1 style="font-size: 32px; " class="lead"><?php echo $r['name']; ?></h1>
        <span class="badge bg-success"><?php echo $r['rating']; ?> <i class="fas fa-star"></i></span>
        <h3>₹<?php echo $r['price']; ?></h3>
        <p><span style="color: rgb(115, 115, 115);">Author:</span> <?php echo $r['author']; ?></p>
        <p><span style="color: rgb(115, 115, 115);">Language:</span> <?php echo $r['lang']; ?></p>
        <p><span style="color: rgb(115, 115, 115);">Publisher:</span> <?php echo $r['publisher']; ?></p>
        <p><span style="color: rgb(115, 115, 115);">ISBN:</span> <?php echo $r['isbn']; ?></p>
        <p><span style="color: rgb(115, 115, 115);">Pages:</span> <?php echo $r['pages']; ?></p>
        <div class="d-grid ">
        <a href="addtocart.php?id=<?php echo $id; ?>" class="btn btn-sm btn-my-primary btn-block">Add To Cart</a> 

        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
<div class="row mt-5 ">
    <div class="col-lg-2"></div>
    <div class="col-lg-8 border">
    <?php 
        if(isset($_SESSION['user'])){
            ?>
                    
        <form method="POST" action="postreview.php" class="row g-3 needs-validation" novalidate>
            <input type="text" style="display:none;" value="<?php echo $id;?>" name="id"/>
            <div class="col-md-12">
                <div class="form-outline">
                    <label for="validationCustom01" class="form-label">Write a review: </label>
                    <textarea class="form-control" name="review" id="validationCustom01" required></textarea>
                    <div class="valid-feedback">Looks good!</div>
                </div>
            </div>
            <div class="col-12 mb-5 d-flex justify-content-end">
                <button class="btn btn-sm btn-my-primary" style="width: 100px;" type="submit">Post</button>
            </div>
        </form>

        <?php
             }
                    ?>

<?php 

$sql1 = "SELECT * FROM bookreview where book_id = $id ORDER BY id DESC;";
$res1 = mysqli_query($conn, $sql1);

if($res1 == TRUE)
{
    $count1 = mysqli_num_rows($res1);

    if($count1 > 0)
    {
        while($rows = mysqli_fetch_assoc($res1) )
        {
          
            ?>
            <div class="mt-2 d-flex">
                        <!-- Image -->
                        <img src="img/user_icon.jpg" alt="John Doe" class="me-3 rounded-circle"
                            style="width: 60px; height: 60px;" />
                        <!-- Body -->
                        <div>
                            <h5 class="fw-bold">
                                <?php echo $rows['user_name']?>
                                <small class="text-muted">Posted on <?php echo $rows['date']?></small>
                            </h5>
                            <p>
                            <?php echo $rows['comment']?>
                            </p>
                        </div>
                    </div>
                    <hr>

            
          <?php

        }
      }
  }
  ?>
       
    </div>
    <div class="col-lg-2"></div>
</div>
</div>



<?php include('footer.php'); ?>