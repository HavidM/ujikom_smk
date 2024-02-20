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
    <title>L O G I N A D M I N</title>
    <link rel="stylesheet" href="header.css">
<body>
  <?php include 'header.php'; ?><br>
	<form method="POST">
		Username : <input type="text" name="username"> <br>
		Password : <input type="password" name="password"> <br>
		<input type="submit" name="submit" value="submit">
	</form>
	<?php
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$get = mysql_query("SELECT * FROM users WHERE username ='$username' AND password = '$password' ");
		$cek = mysql_num_rows($get);

		if ($cek == 1 ) {
			$acces = mysql_fetch_assoc($get);
			$_SESSION['user']=$acces;
		if ($acces['level']=='Admin') {
			echo "<script>alert('Hello, Selamat Datang Admin :)');</script>";
			echo "<script>location='admin/main_admin.php';</script>";
		}
		elseif ($acces['level']=='Super Admin') {
			echo "<script>alert('Hello, Selamat Datang Super Admin :)';<script>";
			echo "<script>location='super/main_super.php';</script";
		}
		}
		else {
			echo "<script>alert('Anda Gagal Login, Silahkan Login Kembali');</script>";
            echo "<script>location='staff.php';</script>";
		}

	} ?>
  </body>
</html>