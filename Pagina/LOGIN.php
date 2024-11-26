<?php
session_start();

include 'conexion.php';

$conexion = OpenConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $correo = $_POST['InputInicioCorreo'];
    $password = $_POST['InputInicioContrasena'];

    $sesion_comp = sqlsrv_query($conexion, "SELECT * FROM USUARIOS WHERE Correo_Electronico='$correo' AND Contrasena='$password'");

    if($sesion_comp && sqlsrv_has_rows($sesion_comp)){
        $_SESSION['usuario']=$correo;
        header("location: index.html");
        exit;
    }else{
        echo '
            <script>
                alert("Usuario no existente, revisar los datos ingresados");
                window.location = "Inicio de Sesion.html";
            </script>
        ';
        exit;
    }
}

?>