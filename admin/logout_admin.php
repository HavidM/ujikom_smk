<?php
session_start();
session_destroy();
echo "<script>alert('Logout Berhasil, Dadah Admin:)');</script>";
echo "<script>location='../index.php';</script>";
 ?>
