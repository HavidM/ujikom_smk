<nav id="menu">
	<ul>
		<div id="heading">
			<a href="main_admin.php">Admin</a>
		</div>
		<li> <a href="#"> Data Transportasi </a>
		<ul>
			<li><a href="data_pesawat.php">Pesawat</a></li>
			<li><a href="data_kereta.php">Kereta</a></li>
		</ul>
		</li>
		<li> <a href="data_customer.php"> Data Customer </a>
		</li>
		<li> <a href="data_reservasi.php"> Data Pemesanan Tiket </a>
		</li>
		<?php if (isset($_SESSION['users'])) : ?>
      	<li> <a href="#">Kamu Adalah : <?= $_SESSION['users']['level']; ?></a></li>
      	<li> <a href="logout_admin.php"> Login</a> </li>
    	<?php else : ?>
    	<li><a href="logout_admin.php">Logout</a></li>
    	<?php endif; ?>
	</ul>
</nav>
