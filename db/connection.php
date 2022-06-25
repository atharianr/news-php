<?php
$host = "localhost";
$username = "admin";
$password = "123456";
$db = "2210181054";

$conn = mysqli_connect($host, $username, $password);

if ($conn) {
  $openDb = mysqli_select_db($conn, $db);

  if (!$openDb) {
    die("Database tidak dapat dibuka");
  }
} else {
  die("Server MySQL tidak terhubung");
}
