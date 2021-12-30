<?php include('header.php');
include "db/config.php"; 
?>
      <div class="container-fluid bg-my-primary my-background-img text-light">
          <div class="row my-background-color pb-5 pt-5">
              <div class="container">
                  <div class="col-lg-12 mx-auto text-center pt-5">
                      <h1 class="mb-5 lead " style="font-size: 64px;">Book Shop</h1>
                      <form class="row g-3 needs-validation"  method="POST" action="searchbooks.php" novalidate>

                        <div class="col-md-4 position-relative mx-auto">
                          <input type="text" name="searchkey" class="square form-control" id="validationTooltip01" placeholder="Search books" required>
                          <div class="valid-tooltip">
                            Looks good!
                          </div>
                        </div>
                        
                        <div class="col-12">
                          <button class="square btn btn-outline-light" type="submit">Search</button>
                        </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

      <div class="container p-5">
        <h1 class="mb-5 lead text-center mt-5" style="font-size: 32px;">Most Recommended Books</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">

          <?php
            $sql = "SELECT * FROM books where recommended = 1";
            $res = mysqli_query($conn, $sql);
            
            if($res == TRUE)
            {
                $count = mysqli_num_rows($res);
            
                if($count > 0)
                {
                    while($rows = mysqli_fetch_assoc($res) )
                    {
                     $id = $rows['id'];
                      
            ?>

                            


                           <div class="col " >
                              <div class="card  h-100">
                              
                                    <img src="img/books/<?php echo $rows['image'];?>" height=350px;  class="card-img-top pl-4 pr-4 pt-4  book-img mx-auto"   alt="...">
                                    <div class="card-body">
                                      <h5 class="card-title"><a style="text-decoration:none;" href="book-detail.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></a></h5>
                                      <p class="card-text"><?php echo $rows['lang']; ?>,<?php echo $rows['publisher']; ?>,<?php echo $rows['author']; ?></p>
                                      <span class="badge bg-success"><?php echo $rows['rating']; ?> <i class="fas fa-star"></i></span>
                                      <h4 >Rs. <?php echo $rows['price'];?></h4> 
                                    
                                      <div class="d-grid ">
                                      <a href="addtocart.php?id=<?php echo $id; ?>" class="btn btn-sm btn-my-primary btn-block">Add To Cart</a> 
                        
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
      </div>
      <?php include('footer.php'); ?>