<?php
 require "koneksi.php";
session_start();
if( !isset($_SESSION["user"])){
    header("location:login.php");

 }elseif(  $_SERVER["REQUEST_METHOD"] == "POST"){
    header("location:profile.php");

} else{
    $idfoto = $_GET['idfoto'];
    $query = mysqli_query($conn,"delete from foto where fotoid = $idfoto "  );
    header("location:profile.php");
    
}


?>