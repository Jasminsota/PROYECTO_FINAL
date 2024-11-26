<?php

include 'conexion.php';

$conexion = OpenConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rol = 1;
    $nombre = $_POST['InputRegNombre'];
    $apellido = $_POST['InputRegApellido'];
    $telefono = $_POST['InputRegTelefono'];
    $ciudad = $_POST['InputRegCiudad'];
    $direccion = $_POST['InputRegDireccion'];
    $cpostal = $_POST['InputRegCP'];
    $email = $_POST['InputRegEmail'];
    $password = $_POST['InputRegContrasena'];

    if(!$conexion){
        die(print_r(sqlsrv_errors(), true));
    }

    $query = "INSERT INTO USUARIOS (ID_ROL, Nombre, Apellido, Telefono, Ciudad, Direccion, Codigo_Postal, Correo_Electronico, Contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $params = array($rol, $nombre, $apellido, $telefono, $ciudad, $direccion, $cpostal, $email, $password);

    $AntiDuplicado = sqlsrv_query($conexion, "SELECT * FROM USUARIOS WHERE Correo_Electronico='$email'");

    if($AntiDuplicado === false){
        die(print_r(sqlsrv_errors(), true));
    }

    if(sqlsrv_has_rows($AntiDuplicado)){
        echo '
            <script>
                alert("El correo electronico ya esta registrado en una cuenta, intente con uno diferente");
                window.location = "Inicio de Sesion.html";
            </script>
        ';
        exit();
    }

    $stmt = sqlsrv_query($conexion, $query, $params);
    
    echo '
        <script>
            window.location = "Inicio de Sesion.html";
            alert("Cuenta creada con exito");
            
        </script>
        ';

    if(!$stmt){
        die(print_r(sqlsrv_errors(), true));
    }

}

?>