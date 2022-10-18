<?php 
session_start();
$pagina = 'noticia';
require_once("../include/config.php");

include('../include/conexion.php');

$cmd = $conexion->prepare('SELECT * FROM anuncios WHERE id_posicion_anuncio IN (1,2) AND baja_anuncio = 0 ORDER BY id_posicion_anuncio');
$cmd->execute();
$anunciosLaterales = $cmd->fetchAll();

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

<?php
require_once("../include/header.php");
?>

<main class="pagina-noticia contenido-principal mt-4">

    <section class="seccion-noticia">
        <div class="container">
            
            <div class="row py-4">
                <div class="col-12 col-md-1">
                    <ul class="listado-redes">
                        <li><a title="Copiar enlace de la noticia" href=""><i class="fa-regular fa-copy"></i></a></li>
                        <li><a title="Enviar la noticia por Whastapp" href=""><i class="fa-brands fa-whatsapp"></i></a></li>
                        <li><a title="Compartir la noticia en Facebook" href=""><i class="fa-brands fa-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-8">
                    <h2 class="titulo-noticia">Título noticia</h2>
                    <p class="introduccion-noticia">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque temporibus quam aperiam facere reiciendis molestias.</p>
                    <img class="img-noticia img-fluid" src="../img/publi1.jpg" alt="">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis eos, aliquam magnam facilis maiores ratione ad fuga harum possimus quas consectetur pariatur. Impedit beatae, perferendis asperiores doloremque hic rem sunt!</p>
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

        </div>
    </section>

</main>


<?php
require_once("../include/footer.php");
?>

<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 


</body>
</html>

