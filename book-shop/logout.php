<?php

session_start();
session_unset();
session_destroy();
if(isset($_SESSION['user']))
{
    echo '<script> location.href = "home.php"; </script>';
}
else
{
    echo '<script> location.href = "login.php"; </script>';
}

?>
