<?php
session_start();
$sid = session_id();
include "koneksi.php";
if (!isset($_SESSION['customer'])) {
  echo "<script>alert('Silahkan Anda Login Terlebih Dahulu!');</script>";
  echo "<script>location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-color:maroon;
}

h1 {
    color: white;
    text-align: center;
}

p {
    font-family: verdana;
    font-size: 20px;
}
</style>
</head>
<body>


</body>
</html>


<head>
  <meta charset="utf-8">
    <title>P E S A N T I K E T</title>
    <link rel="stylesheet" href="header.css">
<body>
  <?php include 'header.php'; ?>
  <h1>Total Tiket</h1>
  <table border=1 class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Transportasi</th>
          <th>Kode Tiket</th>
          <th>Memesan</th>
          <th>Harga</th>
          <th>Sub Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no =1;
        //jalankan perintah inner join dari tabel keranjang dan produk
        $sql = mysql_query("SELECT * FROM keranjang,see_ve  WHERE id_session='$sid' AND keranjang.id_transportasi=see_ve.id_transportasi");
        while($d=mysql_fetch_array($sql)){
        ?>
         <tr>
          <td><?= $no; ?></td>
          <td><?=$d['nama_transportasi']; ?></td>
          <td><?=$d['id_tiket']; ?></td>
          <td><?=$d['jumlah']; ?>Kursi</td>
          <td><?= number_format($d['harga']); ?></td>
          <td><?= number_format($d['harga'] * $d['jumlah']); ?></td>
        </tr>
        <?php $no++; }?>
      </tbody>
    </table>
    <h2>Total Harga Tiket : <b>Rp. <?= number_format($d['harga'] * $d['jumlah']); ?></b></h2>
        
    <center>
    <a href='kereta.php' class="btn btn-primary">Tambah Tiket</a></li>
    <a href='selesai.php' class="btn btn-success">Selesai Pesan</a></li>
  </center>
    </table>

  </body>
</html>

</div>
</body>
