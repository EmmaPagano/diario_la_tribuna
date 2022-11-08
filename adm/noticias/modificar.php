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

if(isset($_GET['id'])){
    $idNoticia = $_GET['id'];
    $cmd = $conexion->prepare('SELECT * FROM noticias WHERE idNoticia = :id');
    $cmd->execute(array(':id'=>$idNoticia));
    $noticia = $cmd->fetch();
    $titulo = trim($noticia['tituloNoticia']);
    $categoria = $noticia['idCategoria'];
    $introduccion = trim($noticia['introduccionNoticia']);
    $destacada = (isset($noticia['noticiaDestacada'])) ? 1 : 0 ;
    $contenidoPrincipal = $noticia['contenidoNoticia'];
    $fotoActual = $noticia['imgPrincipal'];
    $baja = $noticia['baja_noticia'];

}


if($_SERVER['REQUEST_METHOD'] == "POST"){

$idNoticia = $_POST['idNoticia'];    
$titulo = trim($_POST['titulo']);
$categoria = $_POST['categoria'];
$introduccion = trim($_POST['introduccion']);
$destacada = (isset($_POST['destacada'])) ? 1 : 0 ;
$baja = (isset($_POST['baja'])) ? 1 : 0 ;
$contenidoPrincipal = $_POST['editor'];
$foto = $_FILES['foto']['name'];
$fotoTmp = $_FILES['foto']['tmp_name'];
$fotoActual = $_POST['fotoActual'];

if(empty($titulo) || empty($categoria) || empty($introduccion) || empty($contenidoPrincipal) ){
    $notificacion = "Por favor rellene todos los campos";
    $error = true;
}else{
    if(empty($foto)){
        $foto = $fotoActual;
    }else{
        $archivo_destino='../../img/noticias/'.$_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'],$archivo_destino);
    }
    $cmd = $conexion->prepare('UPDATE noticias SET tituloNoticia = :titulo,introduccionNoticia= :introduccion,contenidoNoticia= :contenido,imgPrincipal= :img,noticiaDestacada= :destacada,idCategoria= :idCategoria,baja_noticia= :baja WHERE idNoticia = :id');
        $resultado = $cmd->execute(array(':titulo'=> $titulo, ':introduccion'=> $introduccion, ':contenido'=> $contenidoPrincipal, ':img'=> $foto, ':destacada'=> $destacada, ':idCategoria'=> $categoria, ':baja'=> $baja, ':id'=>$idNoticia ));
        if($resultado){
            header('location: listar.php');
        }else{
            $notificacion = "Ha ocurrido un error al intentar modificar la noticia";
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
            <form class="col-md-6 mx-auto" action="modificar.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idNoticia" value="<?php echo $idNoticia; ?>">
                <div class="mb-3">
                    <label for="formUser">Título: </label>
                    <input type="text" class="form-control" id="formUser" name="titulo" value="<?php echo $titulo; ?>">
                </div>
                <div class="mb-3">
                    <input type="hidden" name="fotoActual" value="<?php echo $fotoActual; ?>">
                    <label for="formFileMultiple" class="form-label">Foto</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="foto">
                </div>
                <div class="mb-3">
                    <label for="posicion">Categoria: </label>
                    <select class="form-select" name="categoria" id="categoria">
                        <?php 
                        foreach($categorias as $fila){
                            if($categoria == $fila['id_categoria']){
                                echo '
                                <option selected value="'.$fila['id_categoria'].'">'.$fila['categoria'].'</option>
                                ';
                            } else {
                                echo '
                                <option value="'.$fila['id_categoria'].'">'.$fila['categoria'].'</option>
                                ';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="introduccion">Introducción</label>
                    <textarea class="form-control" name="introduccion" id="introduccion" rows="4"><?php echo $introduccion; ?></textarea>
                </div>
                <div class="mb-3 form-check">
                    <?php 
                        if($destacada){
                            echo '
                            <input checked class="form-check-input" type="checkbox" name="destacada" id="destacada">
                            ';
                        } else {
                            echo '
                            <input class="form-check-input" type="checkbox" name="destacada" id="destacada">';
                        }

                    ?>

                    <label class="form-check-label" for="destacada">Noticia destacada</label>
                </div>
                <div class="mb-3 form-check">
                    <?php 
                        if($baja){
                            echo '
                            <input checked class="form-check-input" type="checkbox" name="baja" id="baja">
                            ';
                        } else {
                            echo '
                            <input class="form-check-input" type="checkbox" name="baja" id="baja">';
                        }

                    ?>
                    <label class="form-check-label" for="baja">Dado de baja</label>
                </div>
                <div class="mb-3">
                    <label for="editor">Contenido principal</label>
                    <textarea class="form-control" id="editor" name="editor"><?php echo $contenidoPrincipal; ?></textarea>
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