<?php

session_start();
require_once("../../include/config.php");
$pagina = 'panel';
$menuAdm = true;
if(!isset($_SESSION['idUser']) || $_SESSION['rol'] != 'admin'){
    header('Location:../../index.php');
}

include("../../include/conexion.php");
if(isset($_GET['id'])){
    $idNoticia = $_GET['id'];
    $cmd = $conexion->prepare('SELECT * FROM noticias WHERE idNoticia = :id');
    $cmd->execute(array(':id'=>$idNoticia));
    $noticia = $cmd->fetch();

}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idNoticia = $_POST['idNoticia'];
    if(empty($idNoticia)){
        $notificacion = "Error: el ID no puede estar vacío";
    }  else{
        $cmd = $conexion->prepare('UPDATE noticias SET baja_noticia = 1 WHERE idNoticia = :id');
        $resultado = $cmd->execute(array(':id'=>$idNoticia));
        if($resultado){
            header("location: listar.php");
        } else {
            $notificacion = "Error: No se ha podido eliminar la noticia";
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

<section class="bajas py-5">
    <div class="container">
    <h2 class="titulo-seccion text-center">Dar de baja noticia</h2>
    <div class="row">
            <?php
            if(isset($notificacion)){
                echo '<p class="bg-dark text-white text-center py-3">'.$notificacion.'</p>';
            }
            ?>
        <form action="baja.php" method="POST" class="col-md-6 mx-auto text-center p-4 mt-4 bg-light">
            <input type="hidden" name="idNoticia" value="<?php echo $idNoticia ?>">
            <p>¿Está seguro de que desea eliminar la noticia?</p>
            <button type="submit" class="btn btn-danger">Eliminar</button>

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