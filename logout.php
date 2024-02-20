<?php 
session_start();
session_destroy();

echo "<script>alert('Anda Berhasil Logout, Dadah Customer');</script>";
echo "<script>location='index.php';</script>";
 ?>