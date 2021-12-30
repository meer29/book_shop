<?php

session_start();
session_unset();
session_destroy();
if(isset($_SESSION['users']))
{
    echo '<script> location.href = "index.php"; </script>';
}
else
{
    echo '<script> location.href = "admin-login.php"; </script>';
}

?>
