<?php
  session_start();
  include 'koneksi.php';
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
   <title>K O N F I R M A S I P E M B A Y A R A N</title>
  <link rel="stylesheet" href="header.css">
<body>
<?php include 'header.php'; ?>
  <table border="1">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Customer</th>
          <th>Tanggal Pesanan</th>
          <th>Jam</th>
          <th>Kode Boking</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
          $no = 1;
          $orders = mysql_query("SELECT * FROM orders where id_customers = '".$_SESSION['customer']['id_customer']."'");
          while($o = mysql_fetch_array($orders)) {
         ?>
        <tr>
          <td><?= $no; ?></td>
          <td><?= $o['id_customers']; ?></td>
          <td><?= $o['tanggal_pesan']; ?></td>
          <td><?= $o['jam_pesan']; ?></td>
          <td><?= $o['kode_boking']; ?></td>
          <td><?= $o['status']; ?></td>
          <?php if ($o['status'] == 'Belum Bayar') : ?>
            <td> <a href="upload_bukti.php?id=<?= $o['id_orders'] ?>">Bayar</a> </td>
        <?php elseif($o['status'] == 'Lunas') : ?>
            <td> <a href="cetak_nota.php?id=<?= $o['id_orders'] ?>">Cetak</a> </td>
        <?php endif; ?>
        </tr>
        <?php $no++; } ?>
        </tbody>
    </table>

  </body>
</html>

</div>
</body>
