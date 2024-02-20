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
    <title>L O G I N</title>
    <link rel="stylesheet" href="header.css">
<body>
  <?php include 'header.php'; ?><br>
	<form method="POST">
		Username : <input type="text" name="username"> <br>
		Password : <input type="password" name="password"> <br>
		<input type="submit" name="submit" value="submit"> <a href="regis.php">Anda Belum Punya Akun?</a>
	</form>
	<?php
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$get = mysql_query("SELECT * FROM customer WHERE username ='$username' AND password = '$password' ");
		$cek = mysql_num_rows($get);

		if ($cek == 1 ) {
			$acces = mysql_fetch_assoc($get);
			$_SESSION['customer'] = $acces;

			echo "<script>alert('Anda Berhasil Login');</script>";
            echo "<script>location='index.php';</script>";
		}
		else {
			echo "<script>alert('Anda Gagal Login');</script>";
            echo "<script>location='login.php';</script>";
		}

	} ?>
  </body>
</html>
