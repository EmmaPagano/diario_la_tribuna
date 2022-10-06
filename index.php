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
    <link rel="stylesheet" href="css/styles.css">
    

    <title>Diario La Tribuna - Home</title>
</head>
<body>

<?php
require_once("include/header.php")
?>

<div class="contenedor-apis">
  <div class="container">
    <div class="api-dolar">
      <p><span>Dólar oficial: </span>$146,75/$154,75</p>
      <p><span>Dólar blue: </span>$280,00/$284,00</p>
    </div>
    <div class="api-clima">
      <p><i class="fa-solid fa-cloud"></i><b> 18.6° </b> Buenos Aires</p>
    </div>
  </div>
</div>

<!-- Contenedor principal -->
<main class="contenido-principal py-4">
  <div class="container">

    <div class="row">
      <div class="col-md-8 contenedor-noticias p-3">
        <article class="noticia noticia-principal">
          <h1>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, eum.
          </h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, nobis adipisci autem iusto hic fugiat nihil perferendis voluptate pariatur possimus.</p>
          <img src="img/corredor.jpg" alt="" class="img-fluid">
        </article>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <img class="img-fluid" src="img/publi1.jpg" alt="">
            <h3>Lorem ipsum dolor sit, amet consectetur adipisi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eum unde sequi blanditiis sapiente rem, eveniet eos reprehenderit in quia.</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid" src="img/publi1.jpg" alt="">
            <h3>Lorem ipsum dolor sit, amet consectetur adipisi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eum unde sequi blanditiis sapiente rem, eveniet eos reprehenderit in quia.</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid" src="img/publi1.jpg" alt="">
            <h3>Lorem ipsum dolor sit, amet consectetur adipisi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eum unde sequi blanditiis sapiente rem, eveniet eos reprehenderit in quia.</p>
          </div>
        </div>
        <div class="anuncio-horizontal my-4">
          <img class="img-fluid" src="img/publiHorizontal.gif" alt="">
        </div>
        <div class="row">
          <div class="col-md-4">
            <img class="img-fluid" src="img/publi1.jpg" alt="">
            <h3>Lorem ipsum dolor sit, amet consectetur adipisi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eum unde sequi blanditiis sapiente rem, eveniet eos reprehenderit in quia.</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid" src="img/publi1.jpg" alt="">
            <h3>Lorem ipsum dolor sit, amet consectetur adipisi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eum unde sequi blanditiis sapiente rem, eveniet eos reprehenderit in quia.</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid" src="img/publi1.jpg" alt="">
            <h3>Lorem ipsum dolor sit, amet consectetur adipisi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eum unde sequi blanditiis sapiente rem, eveniet eos reprehenderit in quia.</p>
          </div>
        </div>
        <div class="anuncio-horizontal my-4">
          <img class="img-fluid" src="img/publiHorizontal.gif" alt="">
        </div>
        <div class="row">
          <div class="col-md-4">
            <img class="img-fluid" src="img/publi1.jpg" alt="">
            <h3>Lorem ipsum dolor sit, amet consectetur adipisi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eum unde sequi blanditiis sapiente rem, eveniet eos reprehenderit in quia.</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid" src="img/publi1.jpg" alt="">
            <h3>Lorem ipsum dolor sit, amet consectetur adipisi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eum unde sequi blanditiis sapiente rem, eveniet eos reprehenderit in quia.</p>
          </div>
          <div class="col-md-4">
            <img class="img-fluid" src="img/publi1.jpg" alt="">
            <h3>Lorem ipsum dolor sit, amet consectetur adipisi</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eum unde sequi blanditiis sapiente rem, eveniet eos reprehenderit in quia.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4 py-3 contenedor-anuncios">
        <div class="anuncio">
          <img src="img/publi1.jpg" alt="imágen publicitaria" class="img-fluid">
        </div>
        <div class="anuncio">
          <img src="img/publi1.jpg" alt="imágen publicitaria" class="img-fluid">
        </div>
      </div>

    </div>

  </div>
</main>

<?php
require_once("include/footer.php")
?>

<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>