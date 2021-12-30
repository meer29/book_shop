<?php include('header.php');
include "../db/config.php";  





$id = $_GET['id'];




$name = $rating = $author = $language = $publisher = $isbn = $pages = $category = $image = "";
$price = $recommended = $category_id = "";
$sql = "SELECT * FROM books where id = $id";
$res = mysqli_query($conn, $sql);

if($res == TRUE)
{
    $count = mysqli_num_rows($res);

    if($count > 0)
    {
        while($rows = mysqli_fetch_assoc($res) )
        {
                    $name = $rows['name'];
                    $rating = $rows['rating'];
                    $author =   $rows['author'];
                    $language =   $rows['lang'];
                    $publisher =  $rows['publisher'];
                    $isbn =  $rows['isbn'];
                    $pages =  $rows['pages'];
                    $category_name =   $rows['category_name'];
                    $category_id = $rows['category_id'];
                    $image =   $rows['image'];
                    $price =   $rows['price'];
                    $recommended =   $rows['recommended'];
        }
       }
   }




   ?>




<div class="container" >
    <h3 class="text-center pt-5">Add Books </h3>
          <div class="row">
          <?php 
                    if(isset($_SESSION['book_msg'])){
                    
                    echo $_SESSION['book_msg'];
                    unset($_SESSION['book_msg']);
                    }
            ?>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>
            <div class="col-sm-4 ">
          
            <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Book Name</label>
                        <input type="text" class="form-control" name="book_name" value="<?php echo $name; ?>" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                          *Please enter book name
                        </div>
            </div>
            <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Rating</label>
                        <input type="number" class="form-control" value="<?php echo $rating; ?>" name="rating" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                          *Important field can't left blank
                        </div> 
            </div>
            <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Author</label>
                        <input type="text" class="form-control" name="author" value="<?php echo $author; ?>" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                          *Important field can't left blank
                        </div> 
            </div>
            <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Language</label>
                        <input type="text" class="form-control" name="lang" value="<?php echo $language; ?>" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                          *Important field can't left blank
                        </div> 
            </div>
            </div>
              <div class="col-sm-4">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Publisher</label>
                        <input type="text" class="form-control" name="publisher" value="<?php echo $publisher; ?>" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                        </div>
                      </div>
                    <div class="col-md-12">
                      <label for="validationCustom01" class="form-label">ISBN</label>
                      <input type="text" class="form-control" value="<?php echo $isbn; ?>" name="isbn" id="validationCustom01"  required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div  class="invalid-feedback">
                      *Important field can't left blank
                      </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Pages</label>
                        <input type="number" class="form-control" name="pages" value="<?php echo $pages; ?>" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                          </div>
                      </div>
                      <div class="col-md-12">
                      
                        <label for="validationCustom01" class="form-label">Category</label>
                        <select class="form-control" name="category" id="validationCustom01"   required >
                        <option selected><?php echo $category_id; ?>-<?php echo $category_name; ?></option>
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
                                    $iid = $rows['id'];
                                    $name = $rows['name'];
                                    $total = $rows['total_books'];
                                    ?>
                                        <option><?php echo $iid; ?>-<?php echo $name; ?></option>
                                  <?php

                                }
                              }
                          }
                          ?>
                          </select>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                          </div>
                      </div>

              </div>
              <div class="col-sm-4 ">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Image</label>
                        <input type="file" class="form-control"  value="<?php echo $image; ?>" name="image">
                       
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                          </div>
                      </div>
                      <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Price</label>
                        <input type="number" class="form-control" value="<?php echo $price; ?>" name="price" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                          </div>
                      </div>
                      <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Recommended</label>
                        <input type="number" class="form-control" name="recommended" value="<?php echo $recommended; ?>" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                          </div>
                      </div>
                      <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Book ID</label>
                        <input type="number" readonly  class="form-control" name="book_id" value="<?php echo $id; ?>" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                          *Please enter book name
                        </div>
            </div>
              </div>
              <div class="col-12 d-flex justify-content-center">
              <button style="width: 150px;" class="square mb-5  btn btn-block btn-danger" type="button">
              <a href="deletebook.php?id=<?php echo $id; ?>" style="text-decoration:none; color:white;">Delete Book</a>
              </button>
                       
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <button style="width: 150px;" class="square mb-5  btn btn-block btn-dark" type="submit">Update Book</button>
            </div>
              </form>
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
      </script>
<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $image = "";
    if(isset($_FILES['image']['name']))
    {
            $image = $_FILES['image']['name'];
            $source_path = $_FILES['image']['tmp_name'];
            $dest = "../img/books/".$image;

            $upload = move_uploaded_file($source_path ,$dest);

    }
    else{

    }
    $id = test_input($_POST["book_id"]);
  $name = test_input($_POST["book_name"]);
  $rating = (int)test_input($_POST["rating"]);
  $author = test_input($_POST["author"]);
  $language = test_input($_POST["lang"]);
  $publisher = test_input($_POST["publisher"]);
  $isbn = test_input($_POST["isbn"]);
  $pages = (int)test_input($_POST["pages"]);
  $category = test_input($_POST["category"]);
  $arr = explode("-",$category);
  $category_name = $arr[1];
  $category_id = $arr[0];
  $price = (float)test_input($_POST["price"]);
  $recommended = (int)test_input($_POST["recommended"]);

  if($image != "")
    $sql = "update books set name = '$name', rating = $rating, author = '$author' ,lang = '$language', publisher = '$publisher', isbn='$isbn', pages= $pages, category_id = $category_id, category_name = '$category_name', image='$image', price=$price, recommended = $recommended  where id = $id";
    else
    $sql = "update books set name = '$name', rating = $rating, author = '$author' ,lang = '$language', publisher = '$publisher', isbn='$isbn', pages= $pages, category_id = $category_id, category_name = '$category_name', price=$price, recommended = $recommended  where id = $id";

    $res = mysqli_query($conn,$sql);
                      
    if($res == TRUE )
    {
        $_SESSION['book_msg'] = "<p class='alert alert-success'>Book updated successfully</p>";
    
        echo '<script> location.href = "updatebook.php?id='.$id.'"; </script>';
        
    }
    else{
        $_SESSION['book_msg'] = "<p class='alert alert-danger'>Failed to update Book</p>";
       
       echo '<script> location.href = "updatebook.php?id='.$id.'"; </script>';
    }



  
}






function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>




<?php include('footer.php'); ?>