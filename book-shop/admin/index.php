
  <?php include('header.php') ;
  
  include "../db/config.php"; 
  
  
  ?>

  <div class="container" style="margin-top: 200px; margin-bottom: 300px;">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
          <div class="card">
            <h3 class="text-center pt-4 pb-4" style="background-color: rgba(230, 230, 230, 0.409);">TOTAL USER</h3>
            
            <div class="card-body" >   
            <h1 class="card-title text-center"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as c from user"))['c'];?></h1> 
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card">
              <h3 class="text-center pt-4 pb-4" style="background-color: rgba(230, 230, 230, 0.409);">TOTAL BOOKS</h3>
              
              <div class="card-body" >   
              <h1 class="card-title text-center"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as c from books"))['c'];?></h1> 
              </div>
            </div>
          </div>
        
          <div class="col">
            <div class="card">
              <h3 class="text-center pt-4 pb-4" style="background-color: rgba(230, 230, 230, 0.409);">TOTAL ORDER</h3>
              
              <div class="card-body" >   
              <h1 class="card-title text-center"><?php echo mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as c from orders"))['c'];?></h1> 
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <h3 class="text-center pt-4 pb-4" style="background-color: rgba(230, 230, 230, 0.409);">TOTAL REVENUE</h3>
              
              <div class="card-body" >   
              <h1 class="card-title text-center">₹<?php echo mysqli_fetch_assoc(mysqli_query($conn, "select sum(total_amount) as c from orders"))['c'];?></h1> 
              </div>
            </div>
          </div>
    </div>
  </div>
<?php include('footer.php') ?>