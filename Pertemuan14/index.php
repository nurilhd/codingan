<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari ditekan
if(isset($_POST["cari"]) ) {
  $mahasiswa = cari($_POST["keyword"]);
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Admin</title>
  </head>
  <body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post">
      <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keywoard pencarian..." autocomplete="off">
      <button type="sumbit" name="cari">Cari</button>
    </form>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">

      <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Nama</th>
        <th>Nim</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Gambar</th>
      </tr>

<?php foreach ($mahasiswa as $row):
?>

      <tr>
        <td><?= $row["id"]; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah </a>
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?');">hapus</a>
        </td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["nim"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["jurusan"]; ?></td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
      </tr>


<?php endforeach;
 ?>

  </body>
</html>
