<?php 

/* CONEXION A LA BASE DE DATOS */
try{
    $conexion = new PDO('mysql:host=localhost;dbname=la_tribuna', "root", "");
}
catch (PDOException $e){
    echo "Error: ". $e->getMessage();
}

?>