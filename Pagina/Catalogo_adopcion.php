<?php

include "conexion.php";

$conn = OpenConnection();

$query = "SELECT MASCOTAS.ID_MASCOTA, MASCOTAS.Ruta_FotoMascota, MASCOTAS.Nombre, MASCOTAS.Edad, MASCOTAS.Personalidad, TAMANOS_MASCOTA.Tamano_Mascota
          FROM MASCOTAS
          JOIN TAMANOS_MASCOTA ON MASCOTAS.ID_Tamano = TAMANOS_MASCOTA.ID_Tamano";

$resultado = sqlsrv_query($conn, $query);

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
                        <i class="bi bi-person-fill"></i>
                        Iniciar Sesión</a>
                    </li>

                    <li class="nav-item mx-3">
                        <a class="nav-link text-white" href="./Perfil.php"> Perfil </a>
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
                        <a class="nav-link text-white" href="./Acerca_De_Nosotros.html"> Acerca de nosotros </a>
                    </li>

                    <li class="nav-item mx-3">
                        <a class="nav-link text-white" href="./Contactanos.html"> Contactanos/Sucursales </a>
                    </li>

                    <li class="nav-item mx-3">
                        <a class="nav-link text-white" href="./tienda_en_linea.html"> Tienda en linea </a>
                    </li>

                    <li class="nav-item mx-3">
                        <a class="nav-link text-black" href="./Catalogo_adopcion.php"><b>Conoce a nuestras mascotas</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- AREA DE MUESTRA DE MASCOTAS-->
    <div class="container-fluid p-4 ">
        <div class="container bg-primary text-white rounded p-3 container-fluid">
            <div class="row g-3 mb-1">
                <div class="col-md-3 col-12 col"></div>
                <div class="col-md-3 col-12 col">
                    <select name="" id="" class="form-select">
                        <option selected>Edad</option>
                        <option value="1">Cachorros (0-1 año)</option>
                        <option value="2">Jóvenes (1-3 años)</option>
                        <option value="3">Adultos (3-7 años)</option>
                        <option value="4">Mayores (7+años)</option>
                    </select>
                </div>
                <div class="col-md-3 col-12 col">
                    <select name="" id="" class="form-select">
                        <option selected>Genero</option>
                        <option value="0">Macho</option>
                        <option value="1">Hembra</option>
                    </select>
                </div>
                <div class="col-md-3 col-12 col">
                    <select name="" id="" class="form-select">
                        <option selected>Tamaño</option>
                        <option value="1">Pequeños (max 10 kg)</option>
                        <option value="2">Medianos (10-25 kg)</option>
                        <option value="3">Grandes (25-40)</option>
                    </select>
                </div>
            </div>
            <div class="row g-3 mt-1">
                <?php
                while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){
                echo '<div class="col-12 col-md-6 col-lg-3">';
                echo '<div class="card w-100 p-1 w-75">';
                echo '<img src="' . $row['Ruta_FotoMascota'] . '" alt="" class="pet_photo">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title text-center">' . $row['Nombre'] . '</h5>';
                echo '<p class="card-text text-center">Edad: ' . $row['Edad'] . ' | Tamaño: ' . $row['Tamano_Mascota'] . ' | ' . $row['Personalidad'] . '</p>';
                echo '<div class="text-center">';
                echo '<a href="./Perfil de Mascota.php?id=' . $row['ID_MASCOTA'] . '" class="btn btn-primary ">ADOPCION</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                }


                ?>
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