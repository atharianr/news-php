<?php
// Inialize session 
session_start();
// Check, if user is already login, then jump to secured page 
if (isset($_SESSION['email'])) {
  header('Location: ../index.php');
} ?> <html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="../index.php"><b>Halaman Depan</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../news/news_list.php">Arsip Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../news/news_input.php">Input Berita</a>
        </li>
      </ul>
    </div>
  </nav>

  <br>

  <div class="container-fluid">
    <h2>User Register</h2>
    <br>
    <form method="POST" action="register_proc.php" style="width: 300px;">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary mt-4">Register</button>
    </form>
  </div>
</body>

</html>