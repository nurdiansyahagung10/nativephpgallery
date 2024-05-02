<?php
session_start();
if (!isset($_SESSION["user"])) {
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

    <style>
      .masonry {
        column-count: 2;
        column-gap: 1em;
      }

      @media only screen and (min-width: 576px) {
        .masonry {
          column-count: 3;
        }
      }

      @media only screen and (min-width: 768px) {
        .masonry {
          column-count: 4;
        }
      }

      @media only screen and (min-width: 1200px) {
        .masonry {
          column-count: 5;
        }
      }

      @media only screen and (min-width: 1400px) {
        .masonry {
          column-count: 6;
        }
      }

      .item {
        display: inline-block;
        margin: 0 0 1em;
        width: 100%;
        box-sizing: border-box;
      }
    </style>

    </style>
    <div class="masonry">
      <?php
      require "koneksi.php";

      $query = mysqli_query($conn, "SELECT * FROM foto ");
      while ($foto = mysqli_fetch_assoc($query)) {
        ?>
        <div class="item">
          <img src="<?= $foto['lokasifile'] ?>" class="w-100 rounded-4 "></img>
          <div class="card-body mt-1">
            <div class="d-flex align-items-center justify-content-between">
              <span class=" text-dark "><?= $foto['judulfoto'] ?></span>
              <div class="d-flex gap-2">
                <div class=""><a class="d-flex gap-1 text-decoration-none text-dark" data-bs-toggle="offcanvas"
                    href="#offcanvasBottom<?= $foto['fotoid'] ?>" role="button" aria-controls="offcanvasBottom"><span
                      class=""><i class="fa-solid fa-comment"></i></span>
                    <span>
                      <?php
                      $idfoto = $foto['fotoid'];
                      $totalkomentar = mysqli_query($conn, "SELECT * FROM komentarfoto where fotoid = '$idfoto'");                      
                      echo mysqli_num_rows($totalkomentar);
                      ?>
                    </span>
                  </a>
                </div>
                <div class="d-flex gap-1">
                  <?php
                  $idfoto = $foto['fotoid'];
                  $user = $_SESSION['user']['userid'];
                  $likefoto = mysqli_query($conn, "SELECT * FROM likefoto where fotoid='$idfoto' and userid='$user' ");
                  if (mysqli_num_rows($likefoto) != 0) {
                    ?>
                    <a class="text-decoration-none text-danger" href="like.php?idfoto=<?= $foto['fotoid'] ?>"><span
                        class=""><i class="fa-solid fa-heart"></i></span></a>
                    <?php
                  } else {
                    ?>
                    <a class="text-decoration-none text-dark" href="like.php?idfoto=<?= $foto['fotoid'] ?>"><span
                        class=""><i class="fa-solid fa-heart"></i></span></a>

                    <?php
                  }
                  ?>
                  <span><?php
                  $totallike = mysqli_query($conn, "SELECT * FROM likefoto where fotoid='$idfoto'  ");
                  echo mysqli_num_rows($totallike);
                  ?></span>
                </div>
              </div>
            </div>
            <span class="small text-secondary"><?=$foto['deskripsifoto'] ?></span>
          </div>
        </div>
        <?php
      }
      ?>
    </div>

    <?php
    $query = mysqli_query($conn, "SELECT * FROM foto ");
    while ($foto = mysqli_fetch_assoc($query)) {

      ?>
      <div class="h-100 offcanvas offcanvas-bottom bg-transparent" tabindex="-1"
        id="offcanvasBottom<?= $foto['fotoid'] ?>" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header bg-transparent">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small bg-white ">
          <div class="container ">
            <div class="pb-3 mb-2 border-bottom text-center">
              <span class="fs-5">comments</span>
            </div>
            <div class="d-flex flex-column w-100 position-relative h-100 gap-2">
              <?php
              $idfoto = $foto['fotoid'];
              $komentarfoto = mysqli_query($conn, "SELECT * FROM komentarfoto inner join user on komentarfoto.userid=user.userid  where fotoid='$idfoto' ");
              while ($komentar = mysqli_fetch_assoc($komentarfoto)) {

                ?>

                <div class="d-flex mb-3 flex-column">
                  <div class="d-flex gap-1">
                    <span><?= $komentar['username'] ?></span>
                    <span class="text-secondary"><?= $komentar['tanggalkomentar'] ?></span>
                  </div>
                  <p><?= $komentar['isikomentar'] ?></p>
                </div>
                <?php
              }
              ?>
              <div class="flex-fill"></div>
              <div class="position-static bottom-0 w-100">
                <form class=" d-flex gap-2 w-100" action="tambah_komentar.php" method="post">
                  <input class="form-control w-100" type="text" name="komentar" id="" placeholder="tambahkan komentar">
                  <button class="btn border"><span><i class="fa-regular fa-paper-plane"></i></span></button>
                  <input type="hidden" name="idfoto" value="<?= $foto['fotoid'] ?>">
                  <input type="hidden" name="lokasiback" value="offcanvasBottom<?= $foto['fotoid'] ?>">
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>

      <?php
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>