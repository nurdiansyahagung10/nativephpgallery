<?php
 require "koneksi.php";
session_start();
if( !isset($_SESSION["user"])){
    header("location:login.php");

 }elseif(  $_SERVER["REQUEST_METHOD"] == "GET"){
    header("location:profile.php");

} else{
$idfoto = $_POST['idfoto'];
$judulfoto = $_POST["judulfoto"];
$deskripsifoto = $_POST["deskripsifoto"];


$query = mysqli_query($conn, "update foto set judulfoto = '$judulfoto', deskripsifoto = '$deskripsifoto' where fotoid = $idfoto  ");

if($query){
    move_uploaded_file($tmp_file,$lokasifile);
    header("location:profile.php");

}
}
?>