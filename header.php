<nav id="menu">
	<ul>
		<div id="heading">
			<a href="index.php">Store Tiket</a>
		</div>
		<li> <a href="index.php"> Beranda </a> </li>
		<li> <a href="#"> Pesan Tiket </a>
		<ul>
			<li><a href="pesawat.php">Pesawat</a></li>
			<li><a href="kereta.php">Kereta</a></li>
		</ul>
		</li>
		<li> <a href="pesan.php"> Pesanan Tiket </a></li>
		<?php if (isset($_SESSION['customer'])) : ?>
      	<li> <a href="konfirmasi.php"> Konfirmasi</a></li>
      	<li> <a href="riwayat.php"> Riwayat</a> </li>
				<li> <a href="logout.php"> Logout</a> </li>
      	<li> <a href="#">Kamu Adalah :<?= $_SESSION['customer']['nama']; ?></a></li>

    	<?php else : ?>
    	<li><a href="#">Login</a>
				<ul>
					<li><a href="login.php">Customer</a></li>
					<li><a href="staff.php">Admin</a></li>
				</ul>
			</li>
    	<?php endif; ?>
	</ul>
</nav>
