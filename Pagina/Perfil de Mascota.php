<?


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
                        <a class="nav-link text-white" href="./Perfil.php">Perfil</a>
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
     <div class="container-fluid">
        <div class="row mt-4">
            <?php
            include "conexion.php";
            $conn = OpenConnection();
            
            $petID = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            
            if($petID <=0){
                echo "ID invalido";
                exit;
            }
            
            $query = 'SELECT MASCOTAS.Edad, MASCOTAS.Personalidad, TIPOS_MASCOTAS.Tipo, RAZA_MASCOTAS.Raza, CARACTER_MASCOTA.Caracter_Mascota, MASCOTAS.Ruta_FotoMascota, MASCOTAS.Nombre
                      FROM MASCOTAS
                      JOIN TIPOS_MASCOTAS ON MASCOTAS.ID_Tipo = TIPOS_MASCOTAS.ID_Tipo
                      JOIN RAZA_MASCOTAS on MASCOTAS.ID_Raza = RAZA_MASCOTAS.ID_Raza
                      JOIN CARACTER_MASCOTA ON MASCOTAS.ID_Caracter = CARACTER_MASCOTA.ID_Caracter
                      WHERE MASCOTAS.ID_MASCOTA=?';
            
            $params = array($petID);
            
            $resultado = sqlsrv_query($conn, $query, $params);
            
            if(!$resultado){
                die(print_r(sqlsrv_errors(), true));
            }
            while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){
                echo '<div class="col-lg-4 m-auto text-center p-4">';
                echo '<img src="' . $row['Ruta_FotoMascota'] . '" class="img-fluid rounded border border-primary">';
                echo '</div>';
                echo '<div class="col-lg-7 mx-auto">';
                echo '<div class="row">
                        <a href="./Catalogo_adopcion.php" class="text-black fs-2">
                            <i class="bi bi-arrow-left"></i>
                            <span>Volver</span>
                        </a>
                      </div>';
                echo '<div class="row m-3">
                    <div class="container bg-primary text-white p-3 rounded">
                        <h4 class="text-center" id="NombreMascota">' . $row['Nombre'] . '</h3>
                        <p class="fs-5"><b>Tipo: </b></p>
                        <p id="TipoMascota">' . $row['Tipo'] . '<br></p>
                        <p class="fs-5"><b>Raza:</b></p>
                        <p id="RazaMascota">' . $row['Raza'] . '</p>
                        <p class="fs-5"><b>Caracter:</b></p>
                        <p id="CaracterMascota">' . $row['Caracter_Mascota'] .'</p>
                        <p class="fs-5"><b>Edad:</b></p>
                        <p id="EdadMascota">' . $row['Edad'] . '</p>
                        <p class="fs-5"><b>Descripción:</b></p>
                        <p id="DescripcionMascota">' . $row['Personalidad'] . '</p>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
     </div>
     <div class="container text-center p-3">
        <h4 class="text-primary"> ¿Deseas adoptar a esta mascota?</h4>
        <p>Si has encontrado a tu nuevo compañero ideal, estamos encantados de que quieras darle un hogar 
            lleno de amor. Para continuar, solo necesitas escribir en el campo de texto una breve 
            justificación sobre por qué te gustaría adoptar a esta mascota.<br><br>
            Tu solicitud será revisada cuidadosamente por nuestro equipo, asegurándonos 
            de encontrar el mejor hogar para cada peludo. Nos pondremos en contacto contigo 
            lo antes posible para darte una respuesta y, con suerte, ¡darle la bienvenida a un nuevo 
            miembro de tu familia!</p>
            <form class="w-100">
                <label for="DescripcionUsuario" class="form-label"><b>¿Por qué deseas adoptar a esta mascota?: </b></label>
                <textarea id="DescripcionUsuario" name="Descripcion" class="form-control"  rows="6" placeholder="Describe por qué deberías ser aceptado como adoptante de esta mascota..." required></textarea>
                <input class="btn btn-primary mt-3" type="submit" value="Mandar solicitud de adopción">
            </form>
            
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