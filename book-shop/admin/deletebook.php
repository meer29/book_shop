<?php include('header.php');
include "../db/config.php";  

$id = $_GET['id'];
$sql = "delete from books where id = $id";

$res = mysqli_query($conn, $sql);

if($res === TRUE )
{
    $_SESSION['book_msg'] = "<p class='alert alert-success'>Book deleted successfully</p>";
    echo $sql;
    echo '<script> location.href = "books.php"; </script>';
    
}
else{
    $_SESSION['book_msg'] = "<p class='alert alert-danger'>Failed to delete Book</p>";
    echo '<script> location.href = "books.php"; </script>';
}

?>