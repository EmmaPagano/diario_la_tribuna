<?php

session_start();
require_once("../../include/config.php");
$pagina = 'panel';
$menuAdm = true;
if(!isset($_SESSION['idUser']) || $_SESSION['rol'] != 'admin'){
    header('Location:../../index.php');
}

include('../../include/conexion.php');

if(isset($_GET['id'])){
    $idCategoria = $_GET['id'];
    $cmd = $conexion->prepare('SELECT * FROM categorias WHERE id_categoria = :id');
    $cmd->execute(array(':id'=>$idCategoria));
    $resultado = $cmd->fetch();
    $categoria = $resultado['categoria'];
    $estado = $resultado['baja_categoria'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idCategoria = $_POST['id_categoria'];
    $categoria = $_POST['categoria'];
    $estado = $_POST['estado'];


    if (empty($categoria) || empty($idCategoria)){
        $notificacion = "Error: No pueden haber campos vacíos";
    }else{
        

        $cmd = $conexion->prepare('UPDATE categorias SET categoria=:categoria,baja_categoria=:estado WHERE id_categoria = :id ');
        $resultado = $cmd->execute(array(':categoria' => $categoria,':estado' => $estado,':id' => $idCategoria));
        
        if($resultado){
            header("location:listado-categoria.php");
        }else{
            $notificacion = "Ha ocurrido un error al modificar la categoría";
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
    

    <title>Diario La Tribuna - Panel</title>
</head>
<body>

<?php
require_once("../../include/header.php")
?>

<section class="seccion-alta py-5">
    <div class="container">
        <h2 class="titulo-seccion text-center">Modificar categoría</h2>
        <div class="row">
            <?php
            if(isset($notificacion)){
                echo '<p class="bg-dark text-white text-center py-3">'.$notificacion.'</p>';
            }
            ?>
            <form action="modificar-categoria.php" method="POST" class="col-md-6 mx-auto" enctype="multipart/form-data">
                <input type="hidden" name="id_categoria" value="<?php echo $idCategoria;?>">
                <div class="mb-3">
                    <label for="inputAnuncio" class="form-label">Nombre de la categoría</label>
                    <input type="text" class="form-control" id="inputAnuncio" name="categoria" value="<?php echo $categoria;?>">
                </div>
                <div>
                    <label for="">Estado</label>
                    <select class="form-select" name="estado" id="">
                        <option value="0" <?php echo ($estado == 0) ? 'selected' : '' ?>>Activo</option>
                        <option value="1" <?php echo ($estado == 1) ? 'selected' : '' ?>>Dado de baja</option>
                    </select>
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