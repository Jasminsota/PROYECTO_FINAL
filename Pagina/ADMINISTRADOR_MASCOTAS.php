<?php

include "conexion.php";

$conn = OpenConnection();

$query = "SELECT ID_Mascota, ID_Usuario, ID_Tipo, ID_Raza, ID_Caracter, ID_Tamano, Nombre, Edad, Personalidad, Ruta_FotoMascota FROM MASCOTAS";

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
    <!-- NAVBAR OFFCANVAS -->
    <navbar class="navbar navbar-expand-lg navbar-primary bg-primary mb-2 sticky-top">
        <div class="container">
            <a class="navbar-brand text-white" href="./index.html">
                <img src="./IMG/LOGO.png" alt="Logo" height="50">
                <span>Hogar para todos</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#MenuLateral">
                <span class="navbar-toggler-icon"></span>
            </button>

            <section class="offcanvas offcanvas-start bg-primary w-75 p-1" id="MenuLateral" tabindex="-1">
                <div class="offcanvas-header bg-white rounded m-3 text-center text-primary" data-bs-theme="primary">
                    <img src="./IMG/LOGO.png" alt="Logo" height="50">
                    <h5>Hogar para todos</h5>
                    <button class="btn-close" type="button" aria-label="Cerrar" data-bs-dismiss="offcanvas">
                    </button>
                </div>
                <div class="offcanvas-body d-flex flex-column justify-content-between px-0">
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item p-2 py-md-1 my-auto">
                            <a href="./ADMINISTRADOR_STOCK.html" class="nav-link btn bg-white rounded w-100 text-center">Productos</a>
                        </li>
                        <li class="nav-item p-2 py-md-1 my-auto">
                            <a href="./ADMINISTRADOR_MASCOTAS.php" class="nav-link btn bg-white rounded w-100 text-center"><b>Mascotas en adopción</b></a>
                        </li>
                        <li class="nav-item p-2 py-md-1 my-auto">
                            <a href="./ADMINISTRADOR_SOLICITUDES.html" class="nav-link btn bg-white rounded w-100 text-center">Solicitudes de adopción</a>
                        </li>
                        <li class="nav-item p-2 py-md-1 my-auto">
                            <a href="./REPORTE_VENTAS.html" class="nav-link btn bg-white rounded w-100 text-center">Reporte de ventas</a>
                    </ul>
                </div>
            </section>
        </div>
    </navbar>

    <!-- CONTENEDOR POR MASCOTA -->
    <div class="container">
                    <?php

                    while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){
                        echo '<div class="row m-2">';
                        echo '<div class="col-12 bg-primary text-white text-center rounded p-2 w-100">';
                        echo '<div class="row">';

                        echo '<div class="col-sm-2">';
                        echo '<h5>ID MASCOTA</h5>';
                        echo '<P>' . $row['ID_Mascota'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>ID USUARIO</h5>';
                        echo '<P>' . $row['ID_Usuario'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>TIPO</h5>';
                        echo '<P>' . $row['ID_Tipo'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>ID RAZA</h5>';
                        echo '<P>' . $row['ID_Raza'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>ID Caracter</h5>';
                        echo '<P>' . $row['ID_Caracter'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>ID MASCOTA</h5>';
                        echo '<P>' . $row['ID_Mascota'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>MEDIDA</h5>';
                        echo '<P>' . $row['ID_Tamano'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>ID MASCOTA</h5>';
                        echo '<P>' . $row['ID_Mascota'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>NOMBRE</h5>';
                        echo '<P>' . $row['Nombre'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>Edad</h5>';
                        echo '<P>' . $row['Edad'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>PERSONALIDAD</h5>';
                        echo '<P>' . $row['Personalidad'] . '</P>';
                        echo '</div>';

                        echo '<div class="col-sm-2">';
                        echo '<h5>RUTA FOTO</h5>';
                        echo '<P>' . $row['Ruta_FotoMascota'] . '</P>';
                        echo '</div>';

                        echo '</div class="row">';
                        echo '<div clas="col-sm-3">';
                        echo '<h5>RUTA FOTO</h5>';
                        echo '<P>' . $row['Ruta_FotoMascota'] . '</P>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
        <div class="row m-2 text-center">
            <div class="col w-100">
                <button type="button" class="btn btn-primary btn-lg"><i class="bi bi-pencil w-100"></i></button>
                <button type="button" class="btn btn-primary btn-lg"><i class="bi bi-x-lg"></i></button>
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#AddPet">Agregar mascota</button>
                
                <div class="modal fade" id="AddPet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de la mascota</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="AgregaMascota" action="AGREGAR_MASCOTA.php" method="POST">
                                <div class="row mb-3">
                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example" name="Tipo">
                                            <option selected>Tipo de mascota</option>
                                            <option value="1">Perro</option>
                                            <option value="2">Gato</option>
                                            <option value="3">Ave</option>
                                          </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example" name="Raza">
                                            <option selected>Raza del animal</option>
                                            <option value="1">Calico</option>
                                            <option value="2">Rothweiler</option>
                                            <option value="3">Tucan</option>
                                          </select>
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example" name="Caracter">
                                            <option selected>Caracter de la masctoa</option>
                                            <option value="1">Amigable</option>
                                            <option value="2">Gruñon</option>
                                            <option value="3">Hiperactivo</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example" name="Size">
                                            <option selected>Tamaño de la mascota</option>
                                            <option value="1">Pequeño</option>
                                            <option value="2">Mediano</option>
                                            <option value="3">Grande</option>
                                          </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Nombre..." aria-label="Nombre Mascota" name="MNombre" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="Edad..." aria-label="Edad Mascota" name="MEdad" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Personalidad..." aria-label="Personalidad" name="MPersonality" required>
                                    </div>
                                </div>
        
                                <button class="btn btn-light text-primary mt-2" type="submit"><b>Registrarse</b></button>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white pt-2">
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