<?php 
session_start();
$pagina = 'noticia';
require_once("../include/config.php");

include('../include/conexion.php');

$cmd = $conexion->prepare('SELECT * FROM anuncios WHERE id_posicion_anuncio IN (1,2) AND baja_anuncio = 0 ORDER BY id_posicion_anuncio');
$cmd->execute();
$anunciosLaterales = $cmd->fetchAll();

if(isset($_GET['id'])){
    $idNoticia = $_GET['id'];
    $cmd = $conexion->prepare('SELECT * FROM noticias INNER JOIN categorias ON categorias.id_categoria = noticias.idCategoria WHERE idNoticia = :id AND baja_noticia = 0');
    $cmd->execute(array(':id'=>$idNoticia));
    $noticia = $cmd->fetch();
    $titulo = trim($noticia['tituloNoticia']);
    $categoria = $noticia['categoria'];
    $idCategoria = $noticia['idCategoria'];
    $introduccion = trim($noticia['introduccionNoticia']);
    $destacada = (isset($noticia['noticiaDestacada'])) ? 1 : 0 ;
    $contenidoPrincipal = $noticia['contenidoNoticia'];
    $fotoActual = $noticia['imgPrincipal'];
    $baja = $noticia['baja_noticia'];

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
    <link rel="stylesheet" href="../css/styles.css">


    

    <title>Diario La Tribuna - Noticias</title>
</head>
<body>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v15.0" nonce="b0wCyG1W"></script>

<?php
require_once("../include/header.php");
?>

<main class="pagina-noticia contenido-principal mt-4">

    <section class="seccion-noticia">
        <div class="container">
            
            <div class="row py-4">
                <div class="col-12 col-md-1">
                    <ul class="listado-redes">
                        <li style="position:relative;"><a title="Copiar enlace de la noticia" href="" id="btnCopiar"><i class="fa-regular fa-copy"></i></a>
                        <div class="bg-primary text-white p-2" id="btnCopiado">Copiado!</div>
                    </li>
                        <li><a title="Enviar la noticia por Whastapp" target="_blank" href="https://api.whatsapp.com/send?text=http://localhost<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?id=<?php echo $idNoticia; ?>"><i class="fa-brands fa-whatsapp"></i></a></li>
                        <li><a title="Compartir la noticia en Facebook" href=""><i class="fa-brands fa-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-8">
                    <h2 class="titulo-noticia"><?php echo $titulo; ?></h2>
                    <p class="introduccion-noticia"><?php echo $introduccion; ?></p>
                    <img class="img-noticia img-fluid" src="../img/noticias/<?php echo $fotoActual; ?>" alt="">
                    <p><?php echo $contenidoPrincipal; ?></p>
                </div>
                <div class="col-12 col-md-3 contenedor-anuncios">
                    <?php 
                        foreach ($anunciosLaterales as $fila) {
                        echo '
                        <div class="anuncio">
                        <img src="../img/'.$fila['url_anuncio'].'" alt="imágen publicitaria" class="img-fluid">
                        </div>
                        
                        ';
                        }
                    ?>
                </div>
            </div>

            <div class="fb-share-button" data-href="http://localhost/La_Tribuna/paginas/noticia.php?id=15" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FLa_Tribuna%2Fpaginas%2Fnoticia.php%3Fid%3D15&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>

        </div>
    </section>

</main>


<?php
require_once("../include/footer.php");
?>

<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 

<script src="../js/noticia.js"></script>
</body>
</html>

