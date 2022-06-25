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

$query = "SELECT * FROM news WHERE news_id='$id_berita'";
$sql = mysqli_query($conn, $query);
$hasil = mysqli_fetch_array($sql);
$id_berita = $hasil['news_id'];
$judul = stripslashes($hasil['news_title']);
$isi = stripslashes($hasil['news_content']);
$pengirim = stripslashes($hasil['news_creator']);
$tanggal = stripslashes($hasil['news_created_at']);

//proses edit berita
if (isset($_POST['input'])) {
  $id_berita = $hasil['news_id'];
  $judul = addslashes(strip_tags($_POST['title']));
  $isi = addslashes(strip_tags($_POST['content']));
  $pengirim = addslashes(strip_tags($_POST['creator']));

  //update berita
  $query = "UPDATE news SET news_title='$judul', news_content='$isi', news_creator='$pengirim' WHERE news_id='$id_berita'";
  $sql = mysqli_query($conn, $query);
  if ($sql) {
    echo '<script language="javascript">';
    echo 'alert("Berita telah berhasil diubah");window.location.href = "news_list.php";';
    echo '</script>';
  } else {
    echo '<script language="javascript">';
    echo 'alert("Berita gagal diubah");';
    echo '</script>';
  }
}
?>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Berita</title>
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

  <br>

  <div class="container-fluid">
    <h2>Ubah Berita</h2>
    <br>
    <form action="" method="POST" name="input">

      <div class="mb-3">
        <label for="title" class="form-label">Judul Berita</label>
        <input type="text" class="form-control" name="title" value="<?= $judul ?>">
      </div>

      <div class="form-group">
        <label for="content">Isi Berita</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"><?= $isi ?></textarea>
      </div>

      <div class="mb-3">
        <label for="creator" class="form-label">Penulis</label>
        <input type="text" class="form-control" name="creator" value="<?= $pengirim ?>">
      </div>

      <div class="float-right">
        <button class="btn btn-primary" type="submit" name="input">Submit</button>
        <button type="reset" name="reset" class="btn btn-outline-primary">Urungkan</button>
      </div>
    </form>
  </div>
</body>

</html>