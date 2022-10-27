<?php

session_start();
require_once("../../include/config.php");
$pagina = 'panel';
$menuAdm = true;
if(!isset($_SESSION['idUser']) || $_SESSION['rol'] != 'admin'){
    header('Location:../../index.php');
}

include('../../include/conexion.php');
$cmd = $conexion->prepare('SELECT * FROM categorias');
$cmd->execute();
$categorias = $cmd->fetchAll();

$notificacion = "";
$error = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
$titulo = trim($_POST['titulo']);
$categoria = $_POST['categoria'];
$introduccion = trim($_POST['introduccion']);
$destacada = (isset($_POST['destacada'])) ? 1 : 0 ;
$contenidoPrincipal = $_POST['editor'];
$foto = $_FILES['foto']['name'];
$fotoTmp = $_FILES['foto']['tmp_name'];

if(empty($titulo) || empty($categoria) || empty($foto) || empty($introduccion) || empty($destacada) || empty($contenidoPrincipal) ){
    $notificacion = "Por favor rellene todos los campos";
    $error = true;
}else{
    $cmd = $conexion->prepare('INSERT INTO noticias( tituloNoticia, introduccionNoticia, contenidoNoticia, imgPrincipal, noticiaDestacada, idCategoria, baja_noticia) VALUES (:titulo, :introduccion, :contenido, :img, :destacada, :idCategoria, 0)');
        $resultado = $cmd->execute(array(':titulo'=> $titulo, ':introduccion'=> $introduccion, ':contenido'=> $contenidoPrincipal, ':img'=> $foto, ':destacada'=> $destacada, ':idCategoria'=> $categoria ));
        if($resultado){
            $archivo_destino='../../img/noticias/'.$_FILES['foto']['name'];
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
    <!-- Editor -->
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
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
        <h2 class="text-center mb-4">Nueva noticia</h2>
        <div class="row">
            <form class="col-md-6 mx-auto" action="alta.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="formUser">Título: </label>
                    <input type="text" class="form-control" id="formUser" name="titulo">
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Foto</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="foto">
                </div>
                <div class="mb-3">
                    <label for="posicion">Categoria: </label>
                    <select class="form-select" name="categoria" id="categoria">
                        <?php 
                        foreach($categorias as $fila){
                            echo '
                            <option value="'.$fila['id_categoria'].'">'.$fila['categoria'].'</option>
                            ';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="introduccion">Introducción</label>
                    <textarea class="form-control" name="introduccion" id="introduccion" rows="4">
                    </textarea>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="destacada" id="destacada">
                    <label class="form-check-label" for="destacada">Noticia destacada:</label>
                </div>
                <div class="mb-3">
                    <label for="editor">Contenido principal</label>
                    <textarea class="form-control" id="editor" name="editor"></textarea>
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
<!-- Editor de contenido -->
<script>
            CKEDITOR.replace( 'editor' );
    </script>
</body>
</html>