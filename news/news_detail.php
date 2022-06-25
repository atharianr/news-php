<?php
include "../db/connection.php";

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
  <title>Detail Berita</title>
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
          <a class="nav-link active" href="news_list.php">Arsip Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="news_input.php">Input Berita</a>
        </li>
      </ul>
    </div>
  </nav>

  <br>
  <div class="container-fluid">
    <?php
    $query = "SELECT * FROM news WHERE news_id='$id_berita'";
    $sql = mysqli_query($conn, $query);
    $hasil = mysqli_fetch_array($sql);
    $id_berita = $hasil['news_id'];
    $judul = stripslashes($hasil['news_title']);
    $isi = nl2br(stripslashes($hasil['news_content']));
    $pengirim = stripslashes($hasil['news_creator']);
    $tanggal = stripslashes($hasil['news_created_at']);

    //tampilkan berita
    echo "<h1>$judul</h1>";
    echo "<p>$isi</p><br>";
    echo "<small>Berita dikirimkan oleh <b>$pengirim</b> pada tanggal <b>$tanggal</b></small>";
    ?>
  </div>


</body>

</html>