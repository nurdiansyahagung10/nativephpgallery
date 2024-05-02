<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>

    <div class="container-xxl">
        <form class="d-flex flex-column" enctype="multipart/form-data" action="proses_upload.php" method="post">
            <input class="form-control my-2" type="text" name="judulfoto" placeholder="judulfoto" id="">
            <label for="">deskripsifoto</label><textarea name="deskripsifoto" id="" cols="30" rows="10"></textarea>
<label for="">pilih gambar ini</label><input type="file" name="foto">
            <button class='my-2 btn btn-primary'>tambah foto</button>

        </form>
    </div>
</body>

</html>