<?php
 require "koneksi.php";
session_start();
if( !isset($_SESSION["user"])){
    header("location:login.php");

 }elseif(  $_SERVER["REQUEST_METHOD"] == "POST"){
    header("location:profile.php");

} else{
$fotoid = $_GET['idfoto'];
$user = $_SESSION['user'] ['userid'];
$tanggal = date('Y-m-d');
$cek = mysqli_query($conn, "SELECT * FROM likefoto where fotoid = '$fotoid' and userid = '$user'");

if(mysqli_num_rows($cek)  == 0){
    $query = mysqli_query($conn, "INSERT INTO likefoto(fotoid, userid, tanggallike) VALUES ('$fotoid', '$user', '$tanggal' )");

}else{
    $query = mysqli_query($conn, "DELETE FROM likefoto where fotoid = '$fotoid' and userid= '$user'");

}


if($query){
    header("location:index.php#$fotoid");

}
}
?>