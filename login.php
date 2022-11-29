<?php 
session_start();
error_reporting(0);

include 'includes/conecta.php';
if(isset($_POST['entrar'])){
$ruser = $conecta->real_escape_string($_POST['usuario']);
$rpass = $conecta->real_escape_string(md5($_POST['pass']));

$consulta = "SELECT * FROM usuarios  WHERE Nick = '$ruser' and Password = '$rpass'";
if($resultado = $conecta->query($consulta)){
    while($row = $resultado->fetch_array()){
        $userok = $row['Nick'];
        $passwordok = $row['Password'];
    }
    $resultado->close();
}
$conecta->close();
if(isset($ruser) && isset($rpass)){
    if($ruser == $userok && $rpass == $passwordok ){
        $_SESSION['login'] = TRUE;
        $_SESSION['Nick'] = $usuario;
        header("location:principal.php");
    }
    else {
        $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error no se encontraron tus datos</strong> Por favor verifica tus datos.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
        <span aria-hidden='true'>&times;</span>
        </div>";

    }
}
    else {
         $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
         <strong>Error no se encontraron tus datos</strong> Por favor verifica tus datos.
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'></button>
         <span aria-hidden='true'>&times;</span>
         </div>";


        }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/preloader.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos.css">
</head>  

<body>
    <form class="formulario">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
    
    <h1>Iniciar Sesión</h1>
    <div class="contenedor">
     
     
         
         <div class="input-contenedor">
         <i class="fas fa-envelope icon"></i>
         <input type="text" name="usuario" placeholder="Correo Electronico">
         
         </div>
         
         <div class="input-contenedor">
         <i class="fas fa-key icon"></i>
         <input type="password" name="pass" placeholder="Contraseña">
         
         </div>
         <input type="submit"  name="entrar" value="Entrar" class="button">
         <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
         <p>¿No tienes una cuenta? <a class="link" href="registrarvista.html">Registrate </a></p>
         <?php echo $mensaje; ?>

        </div>
    </form>
</body>
</html>