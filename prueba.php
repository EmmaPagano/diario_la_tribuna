
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo $_POST['editor1'];
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

    <title>Editor de texto</title>
</head>
<body>


<form action="prueba.php" method="POST">

    <textarea name="editor1"></textarea>

    <button type="submit">Cargar noticia</button>

</form>


    <script>
            CKEDITOR.replace( 'editor1' );
    </script>

</body>
</html>