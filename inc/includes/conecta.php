<?php 

$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "dlyp07";
$conecta = mysqli_connect($servidor, $usuario, $password, $bd);
if($conecta->connect_error){
    die("Error al conectar la base de datos de la pagina".$conecta->connect_error);
}

?>