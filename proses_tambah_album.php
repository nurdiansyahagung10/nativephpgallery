<?php
 require "koneksi.php";
session_start();
if( !isset($_SESSION["user"])){
    header("location:login.php");

 }elseif(  $_SERVER["REQUEST_METHOD"] == "GET"){
    header("location:profile.php");

} else{

$user = $_SESSION['user'] ['userid'];
$namaalbum= $_POST["namaalbum"];
$deskripsialbum = $_POST["deskripsialbum"];
$tanggal = date('Y-m-d');
$query = mysqli_query($conn, "INSERT INTO album(namaalbum, deskripsi, tanggaldibuat, userid) VALUES ('$namaalbum', '$deskripsialbum', '$tanggal','$user' )");


if($query){
    move_uploaded_file($tmp_file,$lokasifile);
    header("location:profile.php");

}
}
?>