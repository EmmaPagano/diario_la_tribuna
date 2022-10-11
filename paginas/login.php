<?php 
session_start();
require_once("../include/config.php");
$pagina = 'login';


if(isset($_SESSION['idUser'])){
    header('location:../adm/panel-adm.php');
}

$notificacion = "";
$error = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $correo = strtolower($_POST['correo']);
    $password = $_POST['password'];

    if(empty($correo) || empty($password)){
        $notificacion = "Por favor rellene todos los campos";
        $error = true;
    }else{
        include('../include/conexion.php');
        /* SELECCIONO EL USUARIO SEGUN EL USERNAME QUE INGRESO EL CLIENTE */
        $cmd = $conexion->prepare('SELECT * FROM usuarios WHERE correo = :correo');
        $cmd->execute(array(':correo'=>$correo));
        $resultado = $cmd->fetch();
        if(!$resultado){
            $notificacion = "El usuario ingresado es incorrecto";
            $error = true;
        }else{
            $cmd = $conexion->prepare('SELECT * FROM usuarios WHERE correo = :correo AND password = :pass');
            $cmd->execute(array(':correo'=>$correo,':pass'=>$password));
            $resultado = $cmd->fetch();
            if($resultado){
                $_SESSION['idUser'] = $resultado['idUsuario'];
                $_SESSION['rol'] = $resultado['rol'];
                if($_SESSION['rol']=='admin'){
                    header('Location:../adm/panel-adm.php');
                } 

            }else{
                $notificacion = "La contraseña ingresada es incorrecta.";
                $error = true;
            }
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
    

    <title>Diario La Tribuna - Home</title>
</head>
<body>

<?php
require_once("../include/header.php")
?>

<section class="login-container py-4">
    <div class="container">

    <?php if(!empty($notificacion)):?>
        <?php if($error):?>
            <p class="notificacion-error"> <?php echo $notificacion; ?> </p>  
        <?php else: ?>
            <p class="notificacion"> <?php echo $notificacion; ?> </p>
        <?php endif; ?>
    <?php endif; ?>

        <div class="row">
            <div class="col-12 col-md-4 mx-auto">
                <h2 class="text-center">Login</h2>

                <form action="login.php" method="POST">
                    <div class="mb-3">
                        <label for="formUser">Correo: </label>
                        <input type="text" class="form-control" id="formUser" name="correo">
                    </div>
                    <div class="mb-3">
                        <label for="formPassword">Contraseña: </label>
                        <input type="password" class="form-control" id="formPassword" name="password">
                    </div>
                    <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
                </form>

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
