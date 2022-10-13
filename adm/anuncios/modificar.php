<?php

session_start();
require_once("../../include/config.php");
$pagina = 'panel';
$menuAdm = true;
if(!isset($_SESSION['idUser']) || $_SESSION['rol'] != 'admin'){
    header('Location:../../index.php');
}

include('../../include/conexion.php');

$cmd = $conexion->prepare('SELECT * FROM anuncios_posiciones');
$cmd->execute();
$posiciones = $cmd->fetchAll();

if(isset($_GET['id'])){
    $idAnuncio = $_GET['id'];
    $cmd = $conexion->prepare('SELECT * FROM anuncios WHERE id_anuncio = :id');
    $cmd->execute(array(':id'=>$idAnuncio));
    $anuncio = $cmd->fetch();
    $anunciante = $anuncio['anunciante'];
    $posicion = $anuncio['id_posicion_anuncio'];
    $estado = $anuncio['baja_anuncio'];
    $imgActual = $anuncio['url_anuncio'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idAnuncio = $_POST['idAnuncio'];
    $anunciante = $_POST["anunciante"];
    $posicion = $_POST["posicion"];
    $imgPost = $_FILES['img-anuncio']['tmp_name'];
    $imgName = $_FILES['img-anuncio']['name'];
    $imgActual = $_POST['img-actual'] ;
    $estado = $_POST['estado'];


    if (empty($anunciante) || empty($posicion) || empty($imgActual)){
        $notificacion = "Error: No pueden haber campos vacíos";
    }else{
        if(empty($imgName)){
            $imgName = $imgActual;
        }else{
            $archivo_destino='../../img/anuncios/'.$_FILES['img-anuncio']['name'];
            move_uploaded_file($imgPost,$archivo_destino);
        }
    
        $cmd = $conexion->prepare('UPDATE anuncios SET anunciante=:anunciante,id_posicion_anuncio=:posicion,url_anuncio=:imgAnuncio, baja_anuncio=:estado WHERE id_anuncio = :id ');
        $resultado = $cmd->execute(array(':anunciante' => $anunciante,':posicion' => $posicion, ':imgAnuncio' => $imgName, ':estado'=>$estado,':id' => $idAnuncio));
        
        if($resultado){
            header("location:listar.php");
        }else{
            $notificacion = "Ha ocurrido un error al modificar el anuncio";
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

<section class="seccion-alta py-5">
    <div class="container">
        <h2 class="titulo-seccion text-center">Modificar anuncio</h2>
        <div class="row">
            <?php
            if(isset($notificacion)){
                echo '<p class="bg-dark text-white text-center py-3">'.$notificacion.'</p>';
            }
            ?>
            <form action="modificar.php" method="POST" class="col-md-6 mx-auto" enctype="multipart/form-data">
                <input type="hidden" name="idAnuncio" value="<?php echo $idAnuncio;?>">
                <div class="mb-3">
                    <label for="inputAnuncio" class="form-label">Nombre del anunciante</label>
                    <input type="text" class="form-control" id="inputAnuncio" name="anunciante" value="<?php echo $anunciante;?>">
                </div>
                <div class="mb-3">
                    <label for="posicion">Posición: </label>
                    <select class="form-select" name="posicion" id="posicion">
                        <?php 
                        foreach($posiciones as $fila){
                            
                            if($fila['id_posicion_anuncio']==$posicion){
                                 echo '
                                    <option selected value="'.$fila['id_posicion_anuncio'].'">'.$fila['posicion'].'</option>
                                    ';
                            }else{
                                echo '
                                <option value="'.$fila['id_posicion_anuncio'].'">'.$fila['posicion'].'</option>
                                ';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="">Estado</label>
                    <select class="form-select" name="estado" id="">
                        <option value="0" <?php echo ($estado == 0) ? 'selected' : '' ?>>Activo</option>
                        <option value="1" <?php echo ($estado == 1) ? 'selected' : '' ?>>Dado de baja</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Imagen actual: </label>
                    <img src="../../img/anuncios/<?php echo $imgActual;?>" alt="" class="d-block my-2" style="max-width:150px">
                    <label for="imgCategoria" class="form-label">Adjunte imagen de la categoría</label>
                    <input class="form-control" type="file" id="imgCategoria" name="img-anuncio">
                    <input class="form-control" type="hidden" id="imgCategoria" name="img-actual" value="<?php echo $imgActual;?>" >
                </div>
                <button type="submit" class="btn btn-success">
                    Modificar
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