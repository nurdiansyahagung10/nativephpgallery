<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location:login.php");
}

session_destroy();
header("location:login.php");
?>