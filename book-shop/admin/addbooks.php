<?php include('header.php');
include "../db/config.php";  
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
                        <input type="text" class="form-control" name="book_name" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                          *Please enter book name
                        </div>
            </div>
            <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Rating</label>
                        <input type="number" class="form-control" name="rating" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                          *Important field can't left blank
                        </div> 
            </div>
            <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Author</label>
                        <input type="text" class="form-control" name="author" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                          *Important field can't left blank
                        </div> 
            </div>
            <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Language</label>
                        <input type="text" class="form-control" name="lang" id="validationCustom01"  required>
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
                        <input type="text" class="form-control" name="publisher" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                        </div>
                      </div>
                    <div class="col-md-12">
                      <label for="validationCustom01" class="form-label">ISBN</label>
                      <input type="text" class="form-control" name="isbn" id="validationCustom01"  required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div  class="invalid-feedback">
                      *Important field can't left blank
                      </div>
                    </div>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Pages</label>
                        <input type="number" class="form-control" name="pages" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                          </div>
                      </div>
                      <div class="col-md-12">
                      
                        <label for="validationCustom01" class="form-label">Category</label>
                        <select class="form-control" name="category" id="validationCustom01"  required >
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
                                    ?>
                                        <option><?php echo $id; ?>-<?php echo $name; ?></option>
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
                        <input type="file" class="form-control" name="image" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                          </div>
                      </div>
                      <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                          </div>
                      </div>
                      <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Recommended</label>
                        <input type="number" class="form-control" name="recommended" id="validationCustom01"  required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div  class="invalid-feedback">
                        *Important field can't left blank
                          </div>
                      </div>
              </div>
              <div class="col-12 d-flex justify-content-center">
                        
                        <button style="width: 150px;" class="square mb-5  btn btn-block btn-dark" type="submit">Add Book</button>
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

$name = $rating = $author = $language = $publisher = $isbn = $pages = $category = $image = "";
$price = $recommended = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_FILES['image']['name']))
    {
            $image = $_FILES['image']['name'];
            $source_path = $_FILES['image']['tmp_name'];
            $dest = "../img/books/".$image;

            $upload = move_uploaded_file($source_path ,$dest);

    }

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



    $sql = "insert into books set name = '$name', rating = $rating, author = '$author' ,lang = '$language', publisher = '$publisher', isbn='$isbn', pages= $pages, category_id = $category_id, category_name = '$category_name', image='$image', price=$price, recommended = $recommended ";
    $res = mysqli_query($conn,$sql);
                          
    if($res == TRUE )
    {
        $_SESSION['book_msg'] = "<p class='alert alert-success'>Book added successfully</p>";
        echo '<script> location.href = "addbooks.php"; </script>';
        
    }
    else{
        $_SESSION['book_msg'] = "<p class='alert alert-danger'>Failed to add Book</p>";
        echo '<script> location.href = "addbooks.php"; </script>';
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