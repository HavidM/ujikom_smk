<?php
include '../koneksi.php';
$id_transportasi = $_GET['id'];
$edit = mysql_query("SELECT * FROM transportasi WHERE id_transportasi='$id_transportasi' ");
$tr   = mysql_fetch_array($edit);
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
    <title>Edit Transportasi</title>
  <link rel="stylesheet" href="header_admin.css"></head>
<body>
<?php include 'header_admin.php'; ?>
<form method="post"></form>
    Code Transportasi : <input type="text" name="code" value="<?= $tr['code']; ?>"> <br>
    Nama Transportasi : <input type="text" name="nama_transportasi" value="<?= $tr['nama_transportasi']; ?>"> <br>
    Kode Type         :
                        <select name="id_type">
                          <?php
                          $type = mysql_query("SELECT * FROM type_transportasi");
                          while($tp = mysql_fetch_assoc($type)) {
                           ?>
                           <option value="<?= $tp['id_type']; ?>">
                            Kode Type<?= $tp['id_type']; ?> -> <?= $tp['jenis']; ?>
                           </option>
                           <?php } ?>
                        </select> <br>
    Kode tiket        :
                        <select name="id_tiket">
                          <?php
                          $tiket = mysql_query ("SELECT tiket.id_tiket,tiket.nama_tiket, kelas.kelas FROM tiket INNER JOIN kelas ON tiket.id_kelas=kelas.id_kelas");
                          while($t = mysql_fetch_assoc($tiket)){
                           ?>
                           <option value="<?= $t['id_tiket']; ?>">
                            Kode Tiket-><?= $t['id_tiket']; ?> || Kelas -> <?= $t['kelas'];?>
                           </option>
                         <?php } ?>
                       </select><br>
      <input type="submit" name="ubah" value="Ubah Data">
    </form>
    <?php
      if (isset($_POST['ubah'])) {
        $kode = $_POST['code'];
        $nama = $_POST['nama_transportasi'];
        $kode = $_POST['id_type'];
        $tiket= $_POST['id_tiket'];

        mysql_query("UPDATE transportasi set code='$kode', nama_transportasi='$nama', id_type='$kode', id_tiket='$tiket' WHERE id_transportasi='$id_transportasi' ");
        echo "<script>alert('Data Berhasil Di Ubah');</script>";
        echo "<script>location='main_admin.php'</script>";
      }
     ?>

  </body>
</html>
</div>
</body>
