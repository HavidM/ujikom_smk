<?php
session_start();
include '../koneksi.php';
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
   <title>D A T A R E S E R V A S I</title>
  <link rel="stylesheet" href="header_admin.css"></head>
<body>
<?php include 'header_admin.php'; ?>
    <h1>Data Reservasi Tiket</h1><br>
    <a href="cetak.php">Cetak Report</a>
    <table border="1">
      <thead>
        <tr>
          <tr>
          <th>No</th>
          <th>Nama Customer</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Username</th>
          <th>Password</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no  = 1;
          $get = mysql_query("SELECT * FROM orders ");
          while($t = mysql_fetch_assoc($get)){
         ?>
         <tr>
          <td><?= $no; ?></td>
          <td><?= $t['id_customers']; ?></td>
          <td><?= $t['tanggal_pesan']; ?></td>
          <td><?= $t['jam_pesan']; ?></td>
          <td><?= $t['kode_boking']; ?></td>
          <td> <img src="../fotobuyar/<?= $t['bukti_bayar']; ?>" width="100"> </td>
          <td><?= $t['status']; ?></td>
          <td>
              <?php if ($t['status'] == 'Menunggu Konfirmasi') : ?>
                <a href="acc.php">Acc</a> || <a href="detail.php?id=<?= $t['id_orders'];?>">Detail</a>
              <?php else : ?>
                <a href="detail.php?id=<?= $t['id_orders']; ?>">Detail</a>
              <?php endif; ?>
          </td>
         </tr>
        <?php $no++;
          } ?>
      </tbody>
    </table>

  </body>
</html>

</div>
</body>