<?php 
session_start();


if(!isset($_SESSION['idUser'])){
    header('location:../index.php');
}

unset($_SESSION['idUser']);
unset($_SESSION['rol']);

session_destroy();

header('location:../index.php');

?>