
<?php
include('../koneksi.php');


           header("Content-Type: application/xls");
           header("Content-Disposition: attachment; filename=laporan.xls");

           $sql_baca='select * FROM orders';
$data_baca = mysql_query($sql_baca);
  ?>
  <div class="container">
  <h3>Laporan Reservasi</h3>
  <table width='' class="table table-bordered" border='1'>
    <tr>
     <th>Kode Pelanggan</th>
     <th>Tanggal Pesan</th>
     <th>Jam Pesan</th>
     <th>Kode Booking</th>
     <th>Status</th>
     >
    </tr>

  <?php
while($data_tampil=mysql_fetch_array($data_baca)){

  $baca_id_customers  =$data_tampil['id_customers'];
  $baca_tanggal_pesan =$data_tampil['tanggal_pesan'];
  $baca_jam_pesan     =$data_tampil['jam_pesan'];
  $baca_kode_boking   =$data_tampil['kode_boking'];
  $baca_status       =$data_tampil['status'];


  ?>

  <tr >
  <td><?php  echo $baca_id_customers; ?></td>
  <td><?php  echo $baca_tanggal_pesan; ?></td>
  <td><?php  echo $baca_jam_pesan; ?></td>
  <td><?php  echo $baca_kode_boking; ?></td>
  <td><?php  echo $baca_status; ?></td>
  </tr>
<?php
}
