<?php
require 'functions.php';

//ambil data di urldecode
$id = $_GET["id"];
// query data mahasiswa bedasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol sumbit sudah ditekan atau belum
if (isset($_POST["submit"])){
  //cek apakah data berhasil atau tidak
  if(ubah($_POST)>0){
    echo "
      <script>
          alert('data berhasil diubah');
          document.location.href='index.php';
      </script>
    ";
}else{
  echo "
    <script>
        alert('data gagal diubah');
        document.location.href='index.php';
    </script>
  ";
}
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ubah Data Mahasiswa</title>
  </head>
  <body>
    <h1>Ubah data Mahasiswa</h1>
      <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"];?>">
          <ul>
            <li>
              <label for="nama">NAMA : </label>
                <input type="text" name="nama" id="nama" required
                 value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
              <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required
                value="<?= $mhs["nim"]; ?>">
            </li>
            <li>
              <label for="email">EMAIL : </label>
                <input type="text" name="email" id="email"required
                value="<?= $mhs["email"]; ?>">
            </li>
            <li>
              <label for="jurusan">JURUSAN : </label>
                <input type="text" name="jurusan" id="jurusan"required
                value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
              <label for="gambar">GAMBAR : </label>
                <input type="text" name="gambar" id="gambar"required
                value="<?= $mhs["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
          </ul>
      </form>

  </body>
</html>
