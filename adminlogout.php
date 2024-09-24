<?php
session_start();

unset($_SESSION['admin']);

session_destroy();

echo '<script> window.location.href="index.php"; </script>';
?>