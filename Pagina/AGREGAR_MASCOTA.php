<?php

include "conexion.php";

$conn = OpenConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idusuario = 3;
    $idtipo = $_POST['Tipo'];
    $idraza = $_POST['Raza'];
    $idcaracter = $_POST['Caracter'];
    $size = $_POST['Size'];
    $nombre = $_POST['MNombre'];
    $edad = $_POST['MEdad'];
    $personalidad = $_POST['MPersonality'];

    $direccion = "IMG/" . $nombre . ".png";

    if(!$conn){
        die(print_r(sqlsrv_errors(), true));
    }

    $query = "INSERT INTO MASCOTAS (ID_Usuario, ID_Tipo, ID_Raza, ID_Caracter, ID_Tamano, Nombre, Edad, Personalidad, Ruta_FotoMascota) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $params = array($idusuario, $idtipo, $idraza, $idcaracter, $size, $nombre, $edad, $personalidad, $direccion);

    $AntiDuplicado = sqlsrv_query($conn, "SELECT * FROM MASCOTAS WHERE Nombre='$nombre'");

    if($AntiDuplicado === false){
        die(print_r(sqlsrv_errors(), true));
    }

    if(sqlsrv_has_rows($AntiDuplicado)){
        echo '
            <script>
                alert("Mascota ya incluida");
                window.location = "ADMINISTRADOR_MASCOTAS.php";
            </script>
        ';
        exit();
    }

    $stmt = sqlsrv_query($conn, $query, $params);
    
    echo '
        <script>
            window.location = "ADMINISTRADOR_MASCOTAS.php";
            alert("Mascota agregada");
            
        </script>
        ';

    if(!$stmt){
        die(print_r(sqlsrv_errors(), true));
    }

}

?>