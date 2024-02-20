<?php
include '../koneksi.php';
$id_customer = $_GET['id'];

mysql_query("DELETE FROM customer where id_customer = '$id_customer' ");

echo "<script>alert('Data Berhasil di Hapus Oleh Admin');</script>";
echo "<script>location='data_customer.php'</script>";
 ?>
