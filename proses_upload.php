<?php
 require "koneksi.php";
session_start();
if( !isset($_SESSION["user"])){
    header("location:login.php");

 }elseif(  $_SERVER["REQUEST_METHOD"] == "GET"){
    header("location:profile.php");

} else{

$user = $_SESSION['user'];
$judulfoto = $_POST["judulfoto"];
$deskripsifoto = $_POST["deskripsifoto"];
$tanggalunggah = date('Y-m-d');
$id = $user['userid'];
$foto=$_FILES['foto']['name'];
$tmp_file = $_FILES['foto']['tmp_name'];

$query_foto = mysqli_query($conn, "SELECT * FROM foto order by fotoid desc");
$hitungan = 0;

if(mysqli_num_rows($query_foto) != 0){
    $tabelfoto = mysqli_fetch_assoc($query_foto);
    $hitungan = $tabelfoto['fotoid'] + 1;
}
$lokasifile = 'media/'.$user['username'].'_'.$hitungan.'.png';


$query = mysqli_query($conn, "INSERT INTO foto (judulfoto, deskripsifoto, tanggalunggah, lokasifile, userid) VALUES ('$judulfoto', '$deskripsifoto', '$tanggalunggah','$lokasifile','$id' )");

if($query){
    move_uploaded_file($tmp_file,$lokasifile);
    header("location:profile.php");

}
}
?>