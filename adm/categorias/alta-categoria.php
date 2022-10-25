<?php

session_start();
require_once("../../include/config.php");
$pagina = 'panel';
$menuAdm = true;
if(!isset($_SESSION['idUser']) || $_SESSION['rol'] != 'admin'){
    header('Location:../../index.php');
}

include('../../include/conexion.php');


$notificacion = "";
$error = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $categoria = $_POST['categoria'];

    
    if(empty($categoria) ){
        $notificacion = "Por favor indique el nombre de la nueva categoría";
        $error = true;
    }else{
        $cmd = $conexion->prepare('INSERT INTO categorias (categoria, baja_categoria) VALUES (:categoria, 0)');
        $resultado = $cmd->execute(array('categoria'=> $categoria));
        if($resultado){
            header('location: listado-categoria.php');
        }else{
            $notificacion = "Ha ocurrido un error al intentar cargar la categoría";
            $error = true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Css personalizado -->
    <link rel="stylesheet" href="../../css/styles.css">
    

    <title>Diario La Tribuna - Home</title>
</head>
<body>

<?php
require_once("../../include/header.php")
?>

<section class="py-4">
    <div class="container">
        <h2 class="text-center mb-4">Nueva categoría</h2>
        <div class="row">
            <form class="col-md-4 mx-auto" action="alta-categoria.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="formUser">Categoría: </label>
                    <input type="text" class="form-control" id="formUser" name="categoria">
                </div>
                <button type="submit" class="btn btn-success">
                        Enviar
                </button>  
            </form>
        </div>
    </div>
</section>

<?php
require_once("../../include/footer.php")
?>
<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>