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
   <title>K E R E T A</title>
  <link rel="stylesheet" type="text/css" href="header.css"></head>
<body>
<?php include 'header.php'; ?>
  <table border="1">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Transportasi</th>
          <th>Type</th>
          <th>Asal</th>
          <th>Tujuan</th>
          <th>Tanggal Berangkat</th>
          <th>Berangkat</th>
          <th>Sampai</th>
          <th>Kelas</th>
          <th>Harga</th>
          <th>Tersedia</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no  = 1;
          $get = mysql_query("SELECT transportasi.nama_transportasi, transportasi.id_type, transportasi.id_tiket,
            tiket.nama_tiket, tiket.id_kelas, tiket.asal, tiket.tujuan, tiket.tanggal_go, tiket.jam_go, tiket.jam_tiba,
              tiket.harga, kelas.kelas, kelas.jumlah_kursi, type_transportasi.jenis, transportasi.id_transportasi,kelas.id_kelas, tiket.id_tiket FROM transportasi JOIN tiket ON transportasi.id_tiket=tiket.id_tiket JOIN kelas ON tiket.id_kelas=kelas.id_kelas JOIN type_transportasi ON transportasi.id_type=type_transportasi.id_type");
          while($t = mysql_fetch_assoc($get)){
            if ($t['jenis'] == 'Kereta') {
         ?>
         <tr>
          <td><?= $no; ?></td>
          <td><?= $t['nama_transportasi']; ?></td>
          <td><?= $t['jenis']; ?></td>
          <td><?= $t['asal']; ?></td>
          <td><?= $t['tujuan']; ?></td>
          <td><?= $t['tanggal_go']; ?></td>
          <td><?= $t['jam_go']; ?></td>
          <td><?= $t['jam_tiba']; ?></td>
          <td><?= $t['kelas']; ?></td>
          <td><?= number_format($t['harga']); ?></td>
          <td class="text-center"><?= $t['jumlah_kursi']; ?> Kursi</td>
          <td>
              <a href="tambah.php?id=<?= $t['id_transportasi']; ?>">Pesan</a>
          </td>

        </tr>
        <?php $no++;
        }
          } ?>
      </tbody>
    </table>

  </body>
</html>

</div>
</body>
