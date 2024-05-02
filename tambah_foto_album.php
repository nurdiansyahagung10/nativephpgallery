<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:login.php");
}
?>

<!doctype html>
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

  <style>
    .img-opsi:hover{
      opacity: 1;
    }
    .img-opsi{
      opacity: 0;
      transition: 0.3s;
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
<form method="post" action = 'proses_tambah_foto_album.php'class=" ">
<button class="btn btn-danger ">add album</button>
<input type="hidden" name="albumid" value="<?= $_GET['albumid']?>">
    <div class="row row-cols-5">
<?php
 require "koneksi.php";
 $user = $_SESSION['user']['userid'];
$albumid = $_GET['albumid'];
 $query=mysqli_query($conn,"SELECT * FROM foto WHERE userid = '$user'");
$totalfoto = mysqli_num_rows($query);
$hitungan = 0;
 while($foto = mysqli_fetch_assoc($query)){
  if($foto['albumid'] != $albumid){
$hitungan++;
?>
<div  style="max-height: 200px" class='p-3 overflow-hidden'>
<div class= "position-relative  " style="padding-bottom: 100% ; ">
    <img src="<?= $foto['lokasifile']?>" class=" position-absolute  h-100 w-100" style="object-fit: cover;" ></img>
   <div class="w-100 d-flex align-items-center img-opsi  justify-content-center h-100 position-absolute" style="background-color: rgba(0, 0, 0, 0.5); ">
<div class="">
<button class = 'btn'><span class="fs-5 text-white"> </span><input type="checkbox" class="form-check" name="idfoto<?= $hitungan ?>" value="<?= $foto['fotoid']?>" id="">
</button>

</div>  
  </div>
  </div>
    </div>
<?php
}
 }
?>
<input type="hidden" name="totalfoto" value="<?= $totalfoto?>">
</div>
</form>
</div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>