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
    

    <title>Diario La Tribuna - Home</title>
</head>
<body>

<?php
require_once("../include/header.php")
?>

<section class="seccion-panel py-4 bg-dark">
    <h2 class="text-center mb-5 text-white mt-5 pt-5">Panel administrativo</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center mb-3">
                <h3 class="mb-3 text-white">Anuncios</h3>
                <div class="botonera d-flex justify-content-center">
                    <a class="btn btn-outline-secondary me-3" href="categorias/alta-categoria.php">Nuevo</a>
                    <a class="btn btn-outline-secondary ms-3" href="categorias/listar-categoria.php">Listar</a>
                </div>
            </div>
            <div class="col-md-6 text-center mb-3">
                <h3 class="mb-3 text-white">Noticias</h3>
                <div class="botonera d-flex justify-content-center">
                    <a class="btn btn-outline-secondary me-3" href="subcategorias/alta-subcategoria.php">Nuevo</a>
                    <a class="btn btn-outline-secondary ms-3" href="subcategorias/listar-subcategoria.php">Listar</a>
                </div>
        </div>
    </div>
</section>


<?php
require_once("../include/footer.php")
?>
<!-- Bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
