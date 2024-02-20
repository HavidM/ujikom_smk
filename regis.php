<?php
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
    <title>R E G I S T R A S I</title>
    <link rel="stylesheet" type="text/css" href="header.css">
<body>
  <?php include 'header.php'; ?>
  <h1>Silahkan Isi Formulir Data Diri Anda Dibawah Ini :</h1> <br>
	<form method="post">
	<table>
		<thead>
		<tr>
			<th>Nama Anda :</th>
			<th>Alamat Anda :</th>
			<th>No Telpon :</th>
			<th>Jenis Kelamin :</th>
			<th>Username :</th>
			<th>Password :</th>
		</tr>
		</thead>
      <tbody>
			<tr>
				<td> <input type="text" name="nama"> </td>
				<td> <textarea name="alamat"></textarea> </td>
				<td> <input type="text" name="telepon"> </td>
				<td> <select name="jk">
						<option value="Laki-Laki"> Laki-Laki </option>
						<option value="Perempuan"> Perempuan </option>
					 </select>
			    </td>
				<td> <input type="text" name="username"></td>
				<td> <input type="password" name="password"></td>
			</tr>
		</tbody>
    </table>
    <input type="submit" name="submit" value="Registrasi">
    </form>
	<?php
		if (isset($_POST['submit'])) {
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$notelp = $_POST['telepon'];
			$jk = $_POST['jk'];
			$username = $_POST['username'];
			$password = $_POST['password'];

			mysql_query("INSERT INTO customer (nama, alamat, telepon, jk, username, password) VALUES ('$nama', '$alamat', '$notelp', '$jk', '$username', '$password') ");

		}
	 ?>
</html>

</div>
</body>
