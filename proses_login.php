<?php
 require "koneksi.php";
 session_start();
 if( !isset($_SESSION["user"]) || $_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST["username"];
$password = md5($_POST["password"]) ;

$query=mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

if(mysqli_num_rows($query) == 1){
    $user =mysqli_fetch_assoc($query);
    if($user["password"] == $password){
        $_SESSION["user"] =$user;
        header("location:index.php");
    }   else{
        echo"<script>alert('password  not valid'); window.location.href = 'login.php'</script>";

    }
}else{
    echo"<script>alert('username not valid'); window.location.href = 'login.php'</script>";
}
 } else{
    header("location:login.php");
}
?>