<?php
include "./db/connection.php";

// Inialize session 
session_start();

?>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php"><b>Halaman Depan</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./news/news_list.php">Arsip Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./news/news_input.php">Input Berita</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <?php
          if (!isset($_SESSION['email'])) {
            echo '<li class="nav-item"><a class="btn btn-primary btn-sm mr-1 pr-2 pl-2" href="./auth/login.php">Login</a></li>';
            echo '<li class="nav-item"><a class="btn btn-outline-primary btn-sm mr-1 pr-2 pl-2" href="./auth/register.php">Register</a></li>';
          } else {
            echo '<li class="navbar-item"><a class="btn btn-danger btn-sm mr-1 pr-2 pl-2" href="./auth/logout.php">Logout</a></li>';
          }
          ?>
        </ul>
    </div>
  </nav>

  <br>
  <div class="container-fluid">
    <h2>Berita Terbaru!</h2>
    <br>

    <div class="row">
      <?php
      $query = "SELECT * FROM news LIMIT 0,6";
      $sql = mysqli_query($conn, $query);
      if (mysqli_num_rows($sql) > 0) {
        while ($hasil = mysqli_fetch_array($sql)) {
          $id_berita = $hasil['news_id'];
          $judul = stripslashes($hasil['news_title']);
          $pengirim = stripslashes($hasil['news_creator']);
          $tanggal = stripslashes($hasil['news_created_at']);

          echo "<div class='col-sm-6 mb-4'>";
          echo "<div class='card'>";
          echo "<div class='card-body'>";
          echo "<h5 class='card-title'>$judul</h5>";
          echo "<p class='card-text'>Berita dikirimkan oleh <b>$pengirim</b> pada tanggal <b>$tanggal</b></p>";
          echo "<a href='./news/news_detail.php?id=$id_berita' class='btn btn-primary btn-sm'>Detail</a>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<p>Belum ada data...</p>";
      }
      ?>
    </div>
  </div>
</body>

</html>