<?php
session_start();
include 'koneksi.php';
$id_orders = $_GET['id'];

$use = mysql_query("SELECT customer.nama, customer.alamat, customer.telepon, customer.jk, orders.id_orders FROM orders INNER JOIN customer ON orders.id_customers=customer.id_customer WHERE id_orders=$id_orders");
if ($use == FALSE) {
	die(mysql_error());
}
$c = mysql_fetch_array($use);
?>
  <div class='center_title_bar'>Detail Pemesanan</div>
    	  <div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>
          <div class='details_big_cari'>
              <div>
      Data pemesan beserta ordernya adalah sebagai berikut: <br />
      <table>
      <tr><td>Nama Lengkap   </td><td> :<?= $c['nama']; ?> <b></b> </td></tr>
      <tr><td>Alamat Lengkap </td><td> :<?= $c['alamat']; ?> </td></tr>
      <tr><td>Telpon         </td><td> :<?= $c['telepon']; ?> </td></tr>
      <tr><td>E-mail         </td><td> :<?= $c['jk']; ?></td></tr></table><hr /><br />

      Nomor Order: <b><?= $id_orders; ?></b><br /><br />
      <?php $daftartiket = mysql_query("SELECT * FROM orders_detail,tiket
                                 WHERE orders_detail.id_tiket=tiket.id_tiket
                                 AND id_orders='$id_orders'"); ?>

<table cellpadding=10>
      <tr bgcolor=#6da6b1>
				<th>No</th>
				<th>Nama tiket</th>
				<th>Jumlah</th>
				<th>No Kursi</th>
				<th>Harga Tiket</th>
				<th>Sub Total</th>
			</tr>
<?php
        $nokursi = "";
		$s2=mysql_query("SELECT dk.no_kursi FROM detail_kursi dk,orders_detail od,orders o where od.id_orders=dk.id_orders and o.id_orders=od.id_orders and o.id_orders='$id_orders' ORDER BY dk.no_kursi");
		if ($s2 == FALSE) {
			die(mysql_error());
		}
		while ($r2=mysql_fetch_array($s2)){
			$nokursi .= $r2['no_kursi'].",";
		}
$no=1;
while ($d=mysql_fetch_array($daftartiket)){
   $subtotal    = $d['harga'] * $d['jumlah'];

   $total       = $subtotal;
   $subtotal_rp = number_format($subtotal);
   $total_rp    = number_format($total);
   $harga       = number_format($d['harga']);
?>
   <tr bgcolor=#dad0d0>
		 <td><?= $no ?></td>
		 <td><?= $d['nama_tiket']; ?></td>
		 <td align=center><?= $d['jumlah']; ?></td>
		 <td align=center><?= $nokursi; ?></td>
     <td align=right><?= $harga; ?></td>
		 <td align=right><?= $subtotal_rp; ?></td>
	 </tr>

  <?php $no++; } ?>
<?php
$grandtotal    = $d['harga'] * $d['jumlah'];
$grandtotal_rp  = number_format($grandtotal);
?>
</table>
<br />
              </div>
          </div>
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>
          <a href="riwayat.php">Kembali</a>
