<?php
session_start();
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
   <title>D A T A C U S T O M E R</title>
  <link rel="stylesheet" href="header_admin.css"></head>
<body>
<?php include 'header_admin.php'; ?>
    <h1>Data Customer</h1><br>
    <table border="1">
      <thead>
        <tr>
          <tr>
          <th>No</th>
          <th>Nama Customer</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Username</th>
          <th>Password</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no  = 1;
          $get = mysql_query("SELECT * FROM customer ");
          while($t = mysql_fetch_assoc($get)){
         ?>
         <tr>
          <td><?= $no; ?></td>
          <td><?= $t['nama']; ?></td>
          <td><?= $t['jk']; ?></td>
          <td><?= $t['alamat']; ?></td>
          <td><?= $t['telepon']; ?></td>
          <td><?= $t['username']; ?></td>
          <td><?= $t['password']; ?></td>
          <td>
              <a href="hapus_customer.php?id=<?= $t['id_customer']; ?>">Hapus</a>
          </td>

        </tr>
        <?php $no++;
          } ?>
      </tbody>
    </table>

  </body>
</html>

</div>
</body>