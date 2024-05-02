<?php
require "koneksi.php";
session_start();
if (!isset($_SESSION["user"]) || $_SERVER["REQUEST_METHOD"] == "POST") {


    $username = $_POST["username"];
    $password = md5($_POST["password"]) ;
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    $namalengkap = $_POST["nama_depan"] . ' ' . $_POST["nama_belakang"];


    $query = mysqli_query($conn, "INSERT INTO user (username, password, email, alamat, namalengkap) VALUES ('$username', '$password', '$email','$alamat','$namalengkap' )");
    header("location:login.php");

}

?>