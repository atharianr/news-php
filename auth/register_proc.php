<?php
include "../db/connection.php";

// Inialize session 
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT user_email FROM user WHERE user_email='$email'";
$sql = mysqli_query($conn, $query);
$hasil = mysqli_fetch_array($sql);

if ($email != '' && $password != '') {
  // Check email and password match
  if ($email != $hasil['user_email']) {
    $hash = md5($password);
    $query = "INSERT INTO user VALUES('','$email','$hash')";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
      $_SESSION['email'] = $email;
      echo '<script language="javascript">';
      echo 'alert("User berhasil terdaftar!");window.location.href = "../index.php";';
      echo '</script>';
    } else {
      echo '<script language="javascript">';
      echo 'alert("Gagal: Terjadi kesalahan!");window.location.href = "register.php";';
      echo '</script>';
    }
  } else {
    echo '<script language="javascript">';
    echo 'alert("User telah terdaftar!");window.location.href = "register.php";';
    echo '</script>';
  }
} else {
  echo '<script language="javascript">';
  echo 'alert("Terdapat field yang kosong!");window.location.href = "register.php";';
  echo '</script>';
}
