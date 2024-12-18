<?php
session_start();

include "conexion.php";

$conexion = OpenConnection();

$correo = $_SESSION['usuario'];
$query = "SELECT Nombre, Apellido, Telefono, Ciudad, Direccion, Codigo_Postal, Correo_Electronico FROM USUARIOS WHERE Correo_Electronico=?";
$params = array($correo);
$datos = sqlsrv_query($conexion, $query, $params);

if($datos === false){
    die("Error en la consulta: " . print_r(sqlsrv_errors(), true));
}
$row = sqlsrv_fetch_array($datos, SQLSRV_FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hogar para todos</title>
    <!-- Importamos el CSS de Bootstrap v5.3.3 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Iconos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <!-- Barras de navegación -->
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary my-2 pt-0 mt-0">
        <div class="container ">
            <a class="navbar-brand text-white" href="./index.html">
                <img src="./IMG/LOGO.png" alt="Logo" height="50">
                <span>Hogar para todos</span>
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".MenuColapsar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse MenuColapsar fs-5">

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-3">
                        <a class="nav-link text-white" href="./Inicio de Sesion.html"> 
                        <i class="bi bi-person-fill"></i>Iniciar sesión</a>
                    </li>

                    <li class="nav-item mx-3">
                        <a class="nav-link text-black active" href="./Perfil.html"> <b>Perfil</b> </a>
                    </li>

                    <li class="nav-item mx-3">
                        <a class="nav-link text-white" href="./Carrito de compras.html">
                        <i class="bi bi-cart2"></i>
                        Carrito compra </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-primary bg-primary my-2 sticky-top">
        <div class="container ">
            <div class="collapse navbar-collapse MenuColapsar">
                <ul class="navbar-nav mx-auto text-white fs-5">
                    <li class="nav-item mx-3">
                        <a class="nav-link text-white" href="./Acerca_De_Nosotros.html">Acerca de nosotros</a>
                    </li>

                    <li class="nav-item mx-3">
                        <a class="nav-link text-white" href="./Contactanos.html">Contactanos/Sucursales</a>
                    </li>

                    <li class="nav-item mx-3">
                        <a class="nav-link text-white" href="./tienda_en_linea.html"> Tienda en linea </a>
                    </li>

                    <li class="nav-item mx-3">
                        <a class="nav-link text-white" href="./Catalogo_adopcion.php"> Conoce a nuestras mascotas </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- PERFIL -->
    <div class="container-fluid p-4">
        <div class="container bg-primary text-white rounded p-5 container-fluid">
            <div class="row">
                <h4 class="text-center p-0 mb-3">PERFIL</h4>
                <div class="col">
                    <a href="./index.html" class="text-white fs-2">
                        <i class="bi bi-arrow-left"></i>
                        <span>Volver</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 my-auto text-center">
                    <img src="./IMG/LOGO.png" class=" img-fluid bg-white rounded">
                </div>
                <div class="col-lg-7 align-content-center mt-4 text-center pb-4">
                    <h4> Tu Perfil </h5>
                    <p>
                        Consulta tu información personal. Toda tu información está segura con nosotros
                         y lista para que la revises cuando lo necesites.<br>
                    </p>
                    <form action="Perfil.php" method="POST">
                        <div class="row my-3">
                            <div class="col">
                                <label for="Nombre" class="form-label"><b>Nombre:</b></label>
                              <input type="text" class="form-control-plaintext bg-white rounded text-center" id="Nombre" value="<?php if($row){echo $row['Nombre'];}else{echo '';} ?>" readonly>
                            </div>
                            <div class="col">
                              <label for="Apellido" class="form-label"><b>Apellido: </b></label>
                              <input type="text" class="form-control-plaintext bg-white rounded text-center" id="Apellido" value="<?php if($row){echo $row['Apellido'];}else{echo '';} ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="Telefono" class="form-label"><b>Telefono:</b></label>
                                <input type="text" class="form-control-plaintext bg-white rounded text-center" id="Telefono" value="<?php if($row){echo $row['Telefono'];}else{echo '';} ?>" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="Ciudad" class="form-label"><b>Ciudad:</b></label>
                                <input type="text" class="form-control-plaintext bg-white rounded text-center" id="Ciudad" value="<?php if($row){echo $row['Ciudad'];}else{echo '';} ?>" readonly>
                            </div>
                            <div class="col">
                                <label for="Direccion" class="form-label"><b>Direccion</b></label>
                                <input type="text" class="form-control-plaintext bg-white rounded text-center" id="Direccion" value="<?php if($row){echo $row['Direccion'];}else{echo '';} ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col">
                                <label for="CP" class="form-label"><b>Código Postal:</b></label>
                                <input type="text" class="form-control-plaintext bg-white rounded text-center" id="CP" value="<?php if($row){echo $row['Codigo_Postal'];}else{echo '';} ?>" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="Email" class="form-label"><b>Email: </b></label>
                                <input type="email" class="form-control-plaintext bg-white rounded mb-3 text-center" id="Email" value="<?php if($row){echo $row['Correo_Electronico'];}else{echo '';} ?>" readonly>
                            </div>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
     <footer class="bg-primary text-white pt-2 sticky-bottom">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <p>&copy; 2024 HogarParaTodos. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
     </footer>

    <!-- Importamos el JS de Bootstrap v5.3.3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
    integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>