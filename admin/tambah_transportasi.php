<?php
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
   <title>TAMBAH DATA TRANSPORTASI</title>
  <link rel="stylesheet" href="header_admin.css"></head>
<body>
<?php include 'header_admin.php'; ?>
    <h1>Isi Data Tranportasi Yang Ingin di Tambah</h1><br>
    <form method="post"></FORM>
      Code Transportasi : <input type="text" name="code"> <br>
    Nama Transportasi : <input type="text" name="nama_transportasi"> <br>
    Kode Type         :
                        <select name="id_type">
                          <option value="" selected disabled>Pilih Kode Type Transportasi</option>
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
                          <option value="" selected disabled>Pilih Kode Tiket</option>
                          <?php
                          $tiket = mysql_query ("SELECT tiket.id_tiket,tiket.nama_tiket, kelas.kelas FROM tiket INNER JOIN kelas ON tiket.id_kelas=kelas.id_kelas");
                          while($t = mysql_fetch_assoc($tiket)){
                           ?>
                           <option value="<?= $t['id_tiket']; ?>">
                            Kode Tiket-><?= $t['id_tiket']; ?> || Kelas -> <?= $t['kelas'];?>
                           </option>
                         <?php } ?>
                       </select><br>
      <input type="submit" name="tambah" value="Tambah Data">
    </form>
    <?php
      if (isset($_POST['tambah'])) {
        $kode = $_POST['code'];
        $nama = $_POST['nama_transportasi'];
        $kode = $_POST['id_type'];
        $tiket= $_POST['id_tiket'];

        mysql_query("INSERT INTO transportasi (code,nama_transportasi,id_type,id_tiket) VALUES ('$kode','$nama', '$kode','$tiket')");
        echo "<script>alert('Data Berhasil Di Simpan')</script>";
        echo "<script>location='data_pesawat.php'</script>";
      }
     ?>
      </tbody>
    </table>

  </body>
</html>

</div>
</body>