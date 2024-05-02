<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <script src="https://kit.fontawesome.com/ed62b02aac.js" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <title>Hello, world!</title>
</head>

<style>
  * {
    font-family: "Poppins", sans-serif;
  }
</style>

<body>
  <div class="container-xxl">

    <nav class="navbar navbar-expand-lg  navbar-light bg-white">
      <div class="container-fluid my-2">
        <a class="navbar-brand text-danger" style="font-weight: 500 !important;" href="#">KYURREST</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">profile</a>
            </li>
          </ul>
          <form class="d-flex w-100">
            <input class="form-control bg-light rounded-5 border-0 flex-fill me-2 ms-4" type="search" placeholder="search" aria-label="Search">
            <button class="btn btn-dark rounded-5" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>
      </div>
    </nav>


    <div class="container-xxl">
        <form class="d-flex flex-column" action="proses_tambah_album.php" method="post">
            <input class="form-control my-2" type="text" name="namaalbum" placeholder="namaalbum" id="">
            <label for="">deskripsialbum</label><textarea name="deskripsialbum" class="form-control" id="" cols="30" rows="10"></textarea>
            <button class='my-2 btn btn-danger'>tambah album</button>

        </form>
    </div>
</body>

</html>