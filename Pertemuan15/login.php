<?php
require 'functions.php';

if(isset($_POST["login"])){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user
                                 WHERE
                                 username = '$username'");

  // cek Username
  if(mysqli_num_rows($result) === 1) { // apakah ada baris yang dikembalikan ? jika 1 ada

    // cek Paswword
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row["password"])){
      header("location: index.php");
      exit;
    }
  }
  $error = true;
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <h1>Halaman Login</h1>

    <?php    if(isset($error)) :   ?>
     <p style="color : red; font-style: italic;">Username atau Password salah !!</p>
   <?php endif; ?>

    <form action="" method="post">
        <ul>
          <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">
          </li>
          <br>
          <li>
            <label for="password">Paswword :</label>
            <input type="password" name="password" id="password">
          </li>
          <br>
          <li>
            <button type="sumbit" name="login">Login</button>
          </li>
        </ul>

    </form>

  </body>
</html>
