<?php
include "../db/connection.php";

// Inialize session 
session_start();
if (!isset($_SESSION['email'])) {
  echo '<script language="javascript">';
  echo 'alert("Mohon login terlebih dahulu.");window.location.href = "../auth/login.php";';
  echo '</script>';
}

if (isset($_GET['id'])) {
  $id_berita = $_GET['id'];
} else {
  die("Error. No Id Selected! ");
}
?>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hapus Berita</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="../index.php">Halaman Depan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="news_list.php"><b>Arsip Berita</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="news_input.php">Input Berita</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid">
    <br>
    <?php

    // proses delete berita
    if (!empty($id_berita) && $id_berita != "") {
      $query = "DELETE FROM news WHERE news_id='$id_berita'";
      $sql = mysqli_query($conn, $query);
      if ($sql) {
        echo "<h2>Berita telah berhasil dihapus</h2>";
      } else {
        echo "<h2>Berita gagal dihapus</h2>";
      }
      echo "Klik <a href='news_list.php'>di sini</a> untuk kembali ke halaman arsip berita";
    } else {
      die("Access Denied");
    }
    ?>
  </div>
</body>

</html>