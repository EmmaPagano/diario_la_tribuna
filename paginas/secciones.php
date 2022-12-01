<?php 
session_start();
$pagina = 'inicio';
require_once("../include/config.php");

if(isset($_GET['id'])){

    $idCategoria = $_GET['id'] ;

    include('../include/conexion.php');
    $cmd = $conexion->prepare('SELECT * FROM anuncios WHERE id_posicion_anuncio IN (1,2) AND baja_anuncio = 0 ORDER BY id_posicion_anuncio');
    $cmd->execute();
    $anunciosLaterales = $cmd->fetchAll();

    $cmd = $conexion->prepare('SELECT * FROM anuncios WHERE id_posicion_anuncio IN (3,4,5) AND baja_anuncio = 0 ORDER BY id_posicion_anuncio');
    $cmd->execute();
    $anunciosBanners = $cmd->fetchAll();

    $cmd = $conexion->prepare('SELECT * FROM noticias INNER JOIN categorias ON categorias.id_categoria = noticias.idCategoria WHERE baja_noticia = 0 AND idCategoria = :idCategoria ORDER BY fechaPublicacion DESC LIMIT 9');
    $cmd->execute(array(':idCategoria'=>$idCategoria));
    $noticiasSecundarias = $cmd->fetchAll();
    $categoria = $noticiasSecundarias[0]['categoria'];

} else {
    header('location:../index.php');
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
    

    <title>Diario La Tribuna </title>
</head>
<body>

<?php
require_once("../include/header.php");
?>

<div class="contenedor-apis">
  <div class="container align-items-center">
    <div class="api-dolar">
      <p><span class="titulo-dolar">Dólar oficial: </span><span id="oficialCompra"></span> / <span id="oficialVenta"></span></p>
      <p><span class="titulo-dolar">Dólar blue: </span><span id="blueCompra"></span> / <span id="blueVenta"> </span> </p>
    </div>
    <div class="api-clima">
      <p><b id="tempActual"> </b> <img style="max-width: 30px ;" id="imgClima"></img> Buenos Aires</p>
    </div>
  </div>
</div>

<!-- Contenedor principal -->
<main class="contenido-principal py-4">
  <div class="container">
    <h2 style="color:#0250c9;"> <?php echo $categoria; ?> </h2>
    <div class="row">
      <div class="col-md-8 contenedor-noticias p-3">
         <!-- NOTICIAS SECUNDARIAS -->
        <div class="row">
          <?php 
            for ($i=0; $i < 3; $i++) { 
              echo '
                <div class="col-md-4">
                <a href="noticia.php?id='.$noticiasSecundarias[$i]['idNoticia'].'">
                  <img class="img-fluid" src="../img/noticias/'.$noticiasSecundarias[$i]['imgPrincipal'].'" alt="">
                  <h3>'.$noticiasSecundarias[$i]['tituloNoticia'].'</h3>
                  <p>'.$noticiasSecundarias[$i]['introduccionNoticia'].'</p>
                  </a>
                </div>
              ';
            }
          
          ?>

        </div>
        <!-- Anuncio - banner-->
        <div class="anuncio-horizontal my-4">
          <?php 
          if (isset($anunciosBanners[0])){
            echo '
            <img class="img-fluid" src="../img/'.$anunciosBanners[0]['url_anuncio'].'" alt="">
            ';
          }
          
          ?>

        </div>
        <!-- Fin Anuncio - banner-->
         <!-- NOTICIAS SECUNDARIAS -->
        <div class="row">
          <?php 
              for ($i=3; $i < 6; $i++) { 
                echo '
                <div class="col-md-4">
                <a href="noticia.php?id='.$noticiasSecundarias[$i]['idNoticia'].'">
                  <img class="img-fluid" src="../img/noticias/'.$noticiasSecundarias[$i]['imgPrincipal'].'" alt="">
                  <h3>'.$noticiasSecundarias[$i]['tituloNoticia'].'</h3>
                  <p>'.$noticiasSecundarias[$i]['introduccionNoticia'].'</p>
                  </a>
                </div>
              ';
              }
            
            ?>
        </div>
        <!-- Anuncio - banner-->
        <div class="anuncio-horizontal my-4">
          <?php 
          if (isset($anunciosBanners[1])){
            echo '
            <img class="img-fluid" src="../img/'.$anunciosBanners[1]['url_anuncio'].'" alt="">
            ';
          }
          
          ?>

        </div>
        <!-- Fin Anuncio - banner-->
         <!-- NOTICIAS SECUNDARIAS -->
        <div class="row">
        <?php 
            for ($i=6; $i < 9; $i++) { 
              echo '
                <div class="col-md-4">
                <a href="noticia.php?id='.$noticiasSecundarias[$i]['idNoticia'].'">
                  <img class="img-fluid" src="../img/noticias/'.$noticiasSecundarias[$i]['imgPrincipal'].'" alt="">
                  <h3>'.$noticiasSecundarias[$i]['tituloNoticia'].'</h3>
                  <p>'.$noticiasSecundarias[$i]['introduccionNoticia'].'</p>
                  </a>
                </div>
              ';
            }
          
          ?>

        </div>
      </div>
<!-- Anuncios - laterales-->
      <div class="col-md-4 py-3 contenedor-anuncios">
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
</main>

<?php
require_once("../include/footer.php");
?>

<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 
<!-- JS -->
<script src="../JS/api-dolar.js"> </script>
<script src="../JS/api-clima.js"> </script>

</body>
</html>