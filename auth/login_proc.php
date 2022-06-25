<?php
include "../db/connection.php";

// Inialize session 
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT user_email, user_password FROM user WHERE user_email='$email'";
$sql = mysqli_query($conn, $query);
$hasil = mysqli_fetch_array($sql);

if ($email != '' && $password != '') {
  $hash = md5($password);
  // Check email and password match
  if ($email == $hasil['user_email'] && $hash == $hasil['user_password']) {
    // Set email session variable 
    $_SESSION['email'] = $email;
    echo '<script language="javascript">';
    echo 'alert("Login berhasil!");window.location.href = "../index.php";';
    echo '</script>';
  } else {
    echo '<script language="javascript">';
    echo 'alert("Data user yang anda isikan salah!");window.location.href = "login.php";';
    echo '</script>';
  }
} else {
  echo '<script language="javascript">';
  echo 'alert("Terdapat field yang kosong!");window.location.href = "login.php";';
  echo '</script>';
}
