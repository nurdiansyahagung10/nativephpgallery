<?php
require "koneksi.php";
session_start();
if (!isset($_SESSION["user"])) {
    header("location:login.php");

} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("location:profile.php");

} else {
    $idfoto = array();
    $totalfoto = $_POST['totalfoto'];
    for ($i = 1; $i <= $totalfoto; $i++) {
        $idfoto[] = $_POST["idfoto$i"];
    }
    $albumid = $_POST['albumid'];
    foreach ($idfoto as $data) {
        $query = mysqli_query($conn, "UPDATE foto SET albumid='$albumid' WHERE fotoid = '$data' ");
    }


    header("location:profile.php");


}
?>