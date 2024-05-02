<?php
 require "koneksi.php";
session_start();
if( !isset($_SESSION["user"])){
    header("location:login.php");

 }elseif(  $_SERVER["REQUEST_METHOD"] == "GET"){
    header("location:index.php");

} else{
$fotoid = $_POST['idfoto'];
$user = $_SESSION['user'] ['userid'];
$komentar = $_POST['komentar'];
$tanggal = date('Y-m-d');
$lokasiback = $_POST['lokasiback'];
    $query = mysqli_query($conn, "INSERT INTO komentarfoto(fotoid, userid, isikomentar, tanggalkomentar ) VALUES ('$fotoid', '$user', '$komentar','$tanggal' )");


if($query){
    header("location:index.php#$lokasiback");

}
}
?>