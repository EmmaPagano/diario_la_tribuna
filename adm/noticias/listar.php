<?php

session_start();
require_once("../../include/config.php");
$pagina = 'panel';
$menuAdm = true;
if(!isset($_SESSION['idUser']) || $_SESSION['rol'] != 'admin'){
    header('Location:../../index.php');
}

include('../../include/conexion.php');
$cmd = $conexion->prepare('SELECT * FROM noticias INNER JOIN categorias ON categorias.id_categoria = noticias.idCategoria ORDER BY fechaPublicacion DESC ');
$cmd->execute();
$noticias = $cmd->fetchAll();



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

<section>
    <div class="container">
        <h2 class="text-center py-4">Listado de noticias</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Destacada</th>
                <th scope="col">Título</th>
                <th scope="col">Introducción</th>
                <th scope="col">Categoría</th>
                <th scope="col">Estado</th>
                <th scope="col">Publicación</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                foreach ($noticias as $fila){
                    $estado = ($fila["baja_noticia"]) ? 'Dado de baja' : 'Activo';
                    echo '
                    <tr>
                    <td> <img style="max-width: 80px;" src="../../img/noticias/'.$fila["imgPrincipal"].'" alt=""></td>
                    <td>'.$fila["tituloNoticia"].'</td>
                    <td>'.$fila["introduccionNoticia"].'</td>
                    <td>'.$fila["categoria"].'</td>
                    <td>'.$estado.'</td>
                    <td>'.date("d/m/Y", strtotime($fila["fechaPublicacion"])).'</td>
                    <td class="text-center">
                    <a href="baja.php?id='.$fila["idNoticia"].'" class="btn btn-danger">Eliminar</a>
                    <a href="modificar.php?id='.$fila["idNoticia"].'" class="btn btn-secondary">Modificar</a>
                    </td>


                    </tr>
                    
                    
                    ';
                }
                ?>
            </tbody>
        </table>
    </div>
</section>


<?php
require_once("../../include/footer.php")
?>
<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>