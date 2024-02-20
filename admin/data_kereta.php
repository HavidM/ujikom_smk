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
   <title>D A T A K E R E T A</title>
  <link rel="stylesheet" href="header_admin.css"></head>
<body>
<?php include 'header_admin.php'; ?>
    <h1>Data Kereta</h1><br>
    <a href="tambah_transportasi.php"> Tambah Data</a><br>
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
          $get = mysql_query("SELECT transportasi.id_transportasi,transportasi.nama_transportasi, transportasi.id_type, transportasi.id_tiket,
            tiket.nama_tiket, tiket.id_kelas, tiket.asal, tiket.tujuan, tiket.tanggal_go, tiket.jam_go, tiket.jam_tiba,
              tiket.harga, kelas.kelas, kelas.jumlah_kursi, type_transportasi.jenis FROM transportasi JOIN tiket ON transportasi.id_tiket=tiket.id_tiket JOIN kelas ON tiket.id_kelas=kelas.id_kelas JOIN type_transportasi ON transportasi.id_type=type_transportasi.id_type");
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
              <a href="edit_transportasi.php?id=<?= $t['id_transportasi']; ?>">Edit</a> ||
              <a href="hapus.php?id=<?= $t['id_transportasi']; ?>">Hapus</a>
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
