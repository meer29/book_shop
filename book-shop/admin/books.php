<?php include('header.php');
include "../db/config.php";  
?>


<div class="container" >
<?php 
    if(isset($_SESSION['category_msg'])){
                    
     echo $_SESSION['category_msg'];
    unset($_SESSION['category_msg']);
     }
?>
<a class="btn btn-dark square mt-5" href="addbooks.php">Add Books</a>
<div class="table-responsive">
<table class="table  caption-top">
  <caption>List of categories</caption>
  <thead class="bg-dark text-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Book Name</th>
      <th scope="col">Rating</th>
      <th scope="col">Author</th>
      <th scope="col">Language</th>
      <th scope="col">Publisher</th>
      <th scope="col">ISBN</th>
      <th scope="col">Pages</th>
      <th scope="col">Category</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Featured</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
     <?php 

     $sql = "SELECT * FROM books";
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
                     <tr>
                         <td><?php echo $id ?></td>
                         <td><?php echo $rows['name']; ?></td>
                         <td><?php echo $rows['rating']; ?></td>
                         <td><?php echo $rows['author']; ?></td>
                         <td><?php echo $rows['lang']; ?></td>
                         <td><?php echo $rows['publisher']; ?></td>
                         <td><?php echo $rows['isbn']; ?></td>
                         <td><?php echo $rows['pages']; ?></td>
                         <td><?php echo $rows['category_name']; ?></td>
                         <td><img src="../img/books/<?php echo $rows['image'];?>" height="50px"></td>
                         <td><?php echo $rows['price'];?></td>
                         <td><?php echo $rows['recommended']; ?></td>
                         <td><a href="updatebook.php?id=<?php echo $id; ?>">Update</a></td>
                         
                    <tr>
                <?php

             }
            }
        }
        ?>
   
  </tbody>
</table>
    </div>
</div>



<?php include('footer.php')  ?>
