<?php
include "../db/connection.php";

// Inialize session 
session_start();
if (!isset($_SESSION['email'])) {
  echo '<script language="javascript">';
  echo 'alert("Mohon login terlebih dahulu.");window.location.href = "../auth/login.php";';
  echo '</script>';
}

// proses input berita
if (isset($_POST['input'])) {
  $title = addslashes(strip_tags($_POST['title']));
  $content = addslashes(strip_tags($_POST['content']));
  $creator = addslashes(strip_tags($_POST['creator']));

  // insert ke tabel
  $query = "INSERT INTO news VALUES('','$title','$content','$creator', now())";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo '<script language="javascript">';
    echo 'alert("Berita telah berhasil ditambahkan");window.location.href = "news_list.php";';
    echo '</script>';
  } else {
    echo '<script language="javascript">';
    echo 'alert("Berita gagal ditambahkan");';
    echo '</script>';
  }
}
?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Berita</title>
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
          <a class="nav-link active" href="news_input.php"><b>Input Berita</b></a>
        </li>
      </ul>
    </div>
  </nav>

  <br>

  <div class="container-fluid">
    <h2>Input Berita</h2>
    <br>
    <form action="" method="POST" name="input">

      <div class="mb-3">
        <label for="title" class="form-label">Judul Berita</label>
        <input type="text" class="form-control" name="title">
      </div>

      <div class="form-group">
        <label for="content">Isi Berita</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
      </div>

      <div class="mb-3">
        <label for="creator" class="form-label">Penulis</label>
        <input type="text" class="form-control" name="creator">
      </div>

      <div class="float-right">
        <button class="btn btn-primary" type="submit" name="input">Submit</button>
        <button type="reset" name="reset" class="btn btn-outline-primary">Urungkan</button>
      </div>
    </form>
  </div>
</body>

</html>