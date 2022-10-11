<?php

session_start();
require_once("../../include/config.php");
$pagina = 'panel';
$menuAdm = true;
if(!isset($_SESSION['idUser']) || $_SESSION['rol'] != 'admin'){
    header('Location:../../index.php');
}

include('../../include/conexion.php');
/* SELECCIONO EL USUARIO SEGUN EL USERNAME QUE INGRESO EL CLIENTE */
$cmd = $conexion->prepare('SELECT * FROM anuncios_posiciones');
$cmd->execute();
$posiciones = $cmd->fetchAll();

$notificacion = "";
$error = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $anunciante = $_POST['anunciante'];
    $posicion = $_POST['posicion'];
    $foto = $_FILES['foto']['name'];
    $fotoTmp = $_FILES['foto']['tmp_name'];
    
    if(empty($anunciante) || empty($posicion) || empty($foto)){
        $notificacion = "Por favor rellene todos los campos";
        $error = true;
    }else{
        $cmd = $conexion->prepare('INSERT INTO anuncios(url_anuncio, id_posicion_anuncio, anunciante, baja_anuncio) VALUES (:url, :id_posicion, :anunciante, 0)');
        $resultado = $cmd->execute(array(':url'=> $foto, ':id_posicion'=> $posicion, ':anunciante'=> $anunciante));
        if($resultado){
            $archivo_destino='../../img/anuncios/'.$_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'],$archivo_destino);
            header('location: listar.php');
        }else{
            $notificacion = "Ha ocurrido un error al intentar cargar el anuncio";
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
        <h2 class="text-center mb-4">Nuevo anuncio</h2>
        <div class="row">
            <form class="col-md-4 mx-auto" action="alta.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="formUser">Anunciante: </label>
                    <input type="text" class="form-control" id="formUser" name="anunciante">
                </div>
                <div class="mb-3">
                    <label for="posicion">Posición: </label>
                    <select class="form-select" name="posicion" id="posicion">
                        <?php 
                        foreach($posiciones as $fila){
                            echo '
                            <option value="'.$fila['id_posicion_anuncio'].'">'.$fila['posicion'].'</option>
                            ';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Foto</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="foto">
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