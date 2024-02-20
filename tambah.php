<?php
session_start();
include 'koneksi.php';
$no = 1;
$id_trans = $_GET['id'];
$cid = session_id();
if (!isset($_SESSION['customer'])) {
  echo "<script>alert('Login Terlebih Dahulu!');</script>";
  echo "<script>location='login.php';</script>";
}

$get = mysql_query("SELECT * FROM see_ve where id_transportasi='$id_trans'");
if ($get == FALSE) {
  die(mysql_error());
}
$t   = mysql_fetch_array($get);
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
</head>
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
          <tr>
          <form method="post">
            <td><?= $no++; ?></td>
            <td><?= $t['nama_transportasi']; ?></td>
            <td><?= $t['jenis']; ?></td>
            <td><?= $t['asal']; ?></td>
            <td><?= $t['tujuan']; ?></td>
            <td><?= $t['tanggal_go']; ?></td>
            <td><?= $t['jam_go']; ?></td>
            <td><?= $t['jam_tiba']; ?></td>
            <td><?= $t['kelas']; ?></td>
            <td><?= number_format($t['harga']); ?></td>
            <td ><input type="text" name="jumlah_kursi" value="<?= $t['jumlah_kursi']; ?>" readonly>Kursi</td>
              <td align="center">
                  <select name="jumlah">
                    <?php
                    $a = 1;
                    while ($a <= $t['jumlah_kursi']) {
                    ?>
                    <option value="<?= $a; ?>"><?= $a; ?></option>
                    <?php $a++; } ?>
                  </select>
                  Kursi
              </td>
              <td>
                  <button type="submit" name="pesan" class="btn btn-primary">Pesan</button>
              </td>
            </form>
            <?php
              if (isset($_POST['pesan'])) {
                $id_tiket = $t['id_tiket'];
                $jumlah   = $_POST['jumlah'];
                $harga    = $t['harga'];
                //di cek dulu apakah barang yang di beli sudah ada di tabel keranjang
                $sql = mysql_query("SELECT id_transportasi FROM keranjang WHERE id_transportasi='$id_trans' AND id_session='$cid'");
                    $ketemu=mysql_num_rows($sql);
                    if ($ketemu==0){
                        // kalau barang belum ada, maka di jalankan perintah insert
                        mysql_query("INSERT INTO keranjang (id_transportasi,id_tiket, jumlah,harga, id_session)
                                VALUES ($id_trans,$id_tiket, $jumlah,$harga, '$cid')");
                    } else {
                        //  kalau barang ada, maka di jalankan perintah update
                        mysql_query("UPDATE keranjang
                                SET jumlah = jumlah + $jumlah
                                WHERE id_session ='$cid' AND id_transportasi='$id_trans'");
                    }

                $sisabangku = $_POST['jumlah_kursi'] - $jumlah;

                mysql_query("UPDATE kelas set jumlah_kursi=$sisabangku where id='$id_tiket'");

                echo "<script>alert('Sukses!');</script>";
                echo "<script>location='pesan.php';</script>";
              }
             ?>
          </tr>
        </tbody>
    </table>

  </body>
</html>

</div>
</body>