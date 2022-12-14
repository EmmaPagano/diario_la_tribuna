<?php 
session_start();
$pagina = 'noticia';
require_once("../include/config.php");


$notificacion = "";
$error = false;

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $nombreConsulta = ucfirst(strtolower($_POST['nombre']));
      $emailConsulta = strtolower($_POST['correo']);
      $telefonoConsulta = $_POST['telefono'];
      $consulta = ucfirst(strtolower($_POST['consulta']));

        if($nombreConsulta == "" || $emailConsulta == "" || $telefonoConsulta == "" || $consulta == ""  ){
            $notificacion = "Por favor complete todos los campos";
            $error = true;
        }
        else { 

            // INDICO EL DESTINATARIO
            $email_to = "contacto@diariolatribuna.com.ar";
            // ASUNTO DEL CORREO
            $email_subject = "Mensaje enviado desde el formulario Web";
            // REMITENTE
            $email_from="contacto@diariolatribuna.com.ar";
            // ARMO EL MENSAJE O EL CUERPO DEL CORREO
            $email_message = "<b>Detalles de la consulta realizada a traves del formulario:</b><br><br>";
            $email_message .= "<b>Nombre</b>: " . $nombreConsulta . "<br>";
            $email_message .= "<b>E-mail</b>: " . $emailConsulta. "<br>";
            $email_message .= "<b>Telefono</b>: " . $telefonoConsulta . "<br>";
            $email_message .= "<b>Mensaje</b>: " . $consulta . "<br><br>";
  
  
        // ENCABEZADOS PARA BRINDAR INFORMACION EXTRA SOBRE EL CORREO A ENVIAR (TIPO DE CONTENIDO, CODIFICACION DE CARACTERES, ETC)
  
            $headers = 'From: '.$email_from."\r\n".
            'Reply-To: '.$email_from."\r\n" .
            'Content-Type: text/html; charset=utf-8\r\n'.
            'X-Mailer: PHP/' . phpversion();

            // UNA VEZ ARMADAS MIS VARIABLES, EJECUTO LA FUNCION MAIL 
            if (mail($email_to, $email_subject, $email_message, $headers)){
                $notificacion = "El mensaje ha sido enviado con exito!";
            }else {
                $notificacion = "Ha ocurrido un error, el mensaje no pudo enviarse. Por favor vuelva a intentarlo";
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
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v15.0" nonce="5hJdCbtn"></script>

<?php
require_once("../include/header.php");
?>

<main class="mt-4">

<section >
    <div class="container">
    <div class="row py-4">
          <div class="contenedor-form py-4 col-12 col-md-6 mx-auto col-form">
            <form method="POST" action="index.php">
              <div class="mb-3">
                <label for="inputNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="inputNombre" name="nombre" required>
              </div>
              <div class="mb-3">
                <label for="inputCorreo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="inputCorreo" name="correo" required>
              </div>
              <div class="mb-3">
                <label for="inputTelefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="inputTelefono" name="telefono" required>
              </div>
              <div class="mb-3">
                <label for="inputComentarios" class="form-label">Consulta</label>
                <textarea class="form-control" id="inputComentarios" name="consulta" rows="4" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-enviar">Enviar</button>
            </form>
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

<script src="../js/noticia.js"></script>
</body>
</html>

