<?php
include 'koneksi.php';
session_start();
// fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM keranjang WHERE id_session='$sid'");

	while ($r=mysql_fetch_array($sql)) {
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}
//Fungsi mengabil no booking
function kode_book($panjang) {
  $karakter = '0123456789'; // tentukan karakter
  $string   = ''; //variable kosong sebagai nilai

  //lakukan proses looping
  for ($i=0; $i < $panjang ; $i++) {
    $pos = rand(0, strlen($karakter)-1); //lakukan random data dengan nilai awal NOL dan nilai akhir sebanyak value '$karakter'
    $string .= $karakter{$pos}; // Melakukan penggabungan antara nilai dikiri dengan nilai dikanan
  }
  return $string; // Kembalikan nilai dari function ke Echo
}

$tgl_skrg = date("Y-m-d");
$jam_skrg = date("H:i:s");
$kode			= kode_book(6);
$status		= 'Belum Bayar';

// mendapatkan nomor kustomer
$id_kustomer=$_SESSION['customer']['id_customer'];

// simpan data pemesanan
mysql_query("INSERT INTO orders(id_customers,tanggal_pesan,jam_pesan,kode_boking,status) VALUES('$id_kustomer','$tgl_skrg','$jam_skrg','$kode','$status')");


// mendapatkan nomor orders
$id_orders = mysql_insert_id();

// panggil fungsi isi_keranjang dan hitung jumlah tiket yang dipesan
$isikeranjang = isi_keranjang();
$jml          = count($isikeranjang);

// simpan data detail pemesanan
for ($i = 0; $i < $jml; $i++){
  mysql_query("INSERT INTO orders_detail(id_orders, id_tiket, jumlah,harga)
               VALUES('$id_orders',{$isikeranjang[$i]['id_tiket']}, {$isikeranjang[$i]['jumlah']},{$isikeranjang[$i]['harga']})");
	$hariini = date("Y-m-d");
	$ceknomor=mysql_fetch_array(mysql_query("SELECT dk.no_kursi FROM detail_kursi dk,orders_detail od,orders o where od.id_orders=dk.id_orders and o.id_orders=od.id_orders and o.tanggal_pesan='$hariini' and dk.id_tiket='{$isikeranjang[$i]['id_tiket']}' ORDER BY dk.no_kursi DESC LIMIT 1"));
	$cekrow=mysql_num_rows(mysql_query("SELECT dk.no_kursi FROM detail_kursi dk,orders_detail od,orders o where od.id_orders=dk.id_orders and o.id_orders=od.id_orders and o.tanggal_pesan='$hariini' and dk.id_tiket='{$isikeranjang[$i]['id_tiket']}' ORDER BY dk.no_kursi DESC LIMIT 1"));
	if ($cekrow > 0){
		$no_kursi = $ceknomor['no_kursi'];
	}else{
		$no_kursi = 0;
	}
$jumlahtiket = $isikeranjang[$i]['jumlah'];
for ($j = 0; $j < $jumlahtiket; $j++){
	$no_kursi = $no_kursi + 1;
  mysql_query("INSERT INTO detail_kursi(id_orders, id_tiket, no_kursi)
               VALUES('$id_orders',{$isikeranjang[$i]['id_tiket']}, '$no_kursi')");
}
}

// setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
for ($i = 0; $i < $jml; $i++) {
  mysql_query("DELETE FROM keranjang
	  	         WHERE id_keranjang = {$isikeranjang[$i]['id_keranjang']}");
}
echo "<script>alert('Silahkan Menuju Konfirmasi Pembayaran')</script>";
echo "<script>location='konfirmasi.php'</script>";
 ?>
