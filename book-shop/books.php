<?php include('header.php');
include "db/config.php"; 
$s = ($_GET['q']);
$type="";
try {
  $type = $_GET['type'];
}
catch(Exception $e) {

}

if($s == 'all')
{
  $sql = "SELECT * FROM books";

}
else if($type == 'c')
{
  $sql = "SELECT * from books where category_name = '$s' ";
}
else{
  $sql = "SELECT * from books where name like '%$s%'";
}



?>
 

<div class="container-fluid p-5">
        <h1 class="lead text-center mt-5" style="font-size: 32px;">Search Books</h1>
        <form class="mb-5 row g-3 needs-validation "  method="POST" action="searchbooks.php" novalidate>
            <div class="d-flex justify-content-center">
               
                <input type="text" name="searchkey" class="square form-control" value="" placeholder="Search books..." id="validationCustom01" style="width: 400px;" required>
                <input type="submit" class="square btn btn-sm btn-my-primary" value="Search"/>
              </div>
          </form>
          <div class="row mt-5">
            <div class="col-sm-2 bg-light" style="padding: 0 0;">
                <p class="bg-my-primary text-light p-2" >CATEGORIES</p>
               

                <div class="bg-light " style="line-height: .7; padding-left: 10px;">
                  
                  <?php 

              $sql1 = "SELECT * FROM category";
              $res1 = mysqli_query($conn, $sql1);

              if($res1 == TRUE)
              {
                  $count1 = mysqli_num_rows($res1);

                  if($count1 > 0)
                  {
                      while($rows = mysqli_fetch_assoc($res1) )
                      {
                          $id = $rows['id'];
                          $name = $rows['name'];
                          $r = mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as c from books where category_id = $id"));
                          $total = $r['c'];
                          ?>
                           <p class=""><a style="text-decoration: none;" href="books.php?q=<?php echo $name; ?>&type=c"><?php echo $name; ?>(<?php echo $total; ?>)</a></p>
                             
                        <?php

                      }
                    }
                }
                ?>
            
              
                </div>
                
            </div>
            <div class="col-sm-8">Showing you results from: 
            <span class="badge rounded-pill bg-primary mb-2"><?php echo $s; ?> </span>
              <div class="row row-cols-1 row-cols-md-3 g-4">
              <?php
           
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
                              
                                    <img src="img/books/<?php echo $rows['image'];?>" height=380px;  class="card-img-top pl-4 pr-4 pt-4  book-img mx-auto"   alt="...">
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

                     
                <nav class="mt-4 d-flex justify-content-end" aria-label="Page navigation example">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
            </div>
         
            </div>
          </div>
        

       
<?php include('footer.php'); ?>