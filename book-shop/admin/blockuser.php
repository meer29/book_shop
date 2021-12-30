<?php
include "../db/config.php";
session_start();
$id = $_GET['id'];
$type = $_GET['type'];

$sql = "update user set status = $type where id = $id";

$res = mysqli_query($conn, $sql);

if($res == TRUE)
{
    $_SESSION['block'] ="<p class='alert alert-success'>User Blocked Successfully</p>";
    header("Location: {$hostname}/admin/users.php");
}
else{
    $_SESSION['block'] ="<p class='alert alert-danger'>Failed to block user. Try again later</p>";
    header("Location: {$hostname}/admin/users.php");
}

?>