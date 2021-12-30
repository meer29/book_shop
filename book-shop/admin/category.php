<?php include('header.php');
include "../db/config.php";  
?>


<div class="container" style="max-width: 800px; padding-top: 50px;" >
<?php 
                    if(isset($_SESSION['category_msg'])){
                    
                    echo $_SESSION['category_msg'];
                    unset($_SESSION['category_msg']);
                    }
                    ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="row g-3 needs-validation p-3" novalidate>
                    <div class="col-md-6" style="margin-left:0;">
                      <label for="validationCustom01" class="form-label">Add new Category</label>
                      <input type="text" name="category" placeholder="Enter new category name" class="form-control" id="validationCustom01"  required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div  class="invalid-feedback">
                        *Please input your registered email address
                      </div>
                    </div>
                    <div class="col-md-2">
                
                    <label style="visibility: hidden; " for="validationCustom01" class="form-label">Email</label>
                        <button style="width: 150px;" class="square btn btn-block btn-dark" type="submit">Add</button>
                     
                    </div>
                    

                  </form>
<div class="table-responsive">
<table class="table  caption-top">
  <caption>List of categories</caption>
  <thead class="bg-dark text-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Number of books</th>
    </tr>
  </thead>
  <tbody>
  
     <?php 

     $sql = "SELECT * FROM category";
     $res = mysqli_query($conn, $sql);

     if($res == TRUE)
     {
         $count = mysqli_num_rows($res);
     
         if($count > 0)
         {
             while($rows = mysqli_fetch_assoc($res) )
             {
                 $id = $rows['id'];
                 $name = $rows['name'];
                 $total = $rows['total_books'];
                 $r = mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as c from books where category_id = $id"));
                 ?>
                     <tr>
                         <td><?php echo $id; ?></td>
                         <td><?php echo $name; ?></td>
                         <td><?php echo $r['c']; ?></td>
                         
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

<?php

$name = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){


  $name = test_input($_POST["category"]);
  $stmt = $conn->prepare("INSERT INTO category (name) VALUES (?)");
  $stmt->bind_param("s", $name);

  if($stmt->execute())
  {

        $_SESSION['category_msg'] = "<p class='alert alert-success'>Category added successfully</p>";
        echo '<script> location.href = "category.php"; </script>';

  }
  else{
    $_SESSION['category_msg'] = "<p class='alert alert-danger'>Failed to add category</p>";
    echo '<script> location.href = "category.php"; </script>';
  }



  
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<?php include('footer.php')  ?>
