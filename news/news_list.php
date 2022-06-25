<?php
include "../db/connection.php";

// Inialize session 
session_start();
if (!isset($_SESSION['email'])) {
  echo '<script language="javascript">';
  echo 'alert("Mohon login terlebih dahulu.");window.location.href = "../auth/login.php";';
  echo '</script>';
}
?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Arsip Berita</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script language="javascript">
    function tanya() {
      if (confirm("Apakah Anda yakin akan menghapus berita ini?")) {
        return true;
      } else {
        return false;
      }
    }
  </script>
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
    <h2>Arsip Berita</h2>
    <br>

    <?php
    $query = "SELECT * FROM news";
    $sql = mysqli_query($conn, $query);
    if (mysqli_num_rows($sql) > 0) {
      while ($hasil = mysqli_fetch_array($sql)) {
        $id_berita = $hasil['news_id'];
        $judul = stripslashes($hasil['news_title']);
        $pengirim = stripslashes($hasil['news_creator']);
        $tanggal = stripslashes($hasil['news_created_at']);

        echo "<div class='card'>";
        echo "<p class='card-header'>$tanggal</p>";
        echo "<div class='card-body'>";
        echo "<h3 class='card-title'><b>$judul</b></h3>";
        echo "<p class='card-text'>Berita dikirimkan oleh $pengirim</p>";
        echo "<a href='news_edit.php?id=$id_berita' class='btn btn-primary btn-sm mr-1'>Ubah</a>";
        echo "<a href='news_delete.php?id=$id_berita'class='btn btn-outline-danger btn-sm' onClick='return tanya()'>Hapus</a>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
      }
    } else {
      echo "Belum ada data, tambahkan berita <a href='news_input.php'>di sini</a>";
    }
    ?>
  </div>
</body>

</html>