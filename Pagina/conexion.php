<?php

function OpenConnection(){
    $serverName = 'localhost';
    $connectionOptions = [
        "Database" => "PIA_LBPROWEB",
    ];

    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == false){
        echo "Error al conectar con la base de datos: <br/>";
        die(print_r(sqlsrv_errors(), true));
    }
    return $conn;
}

?>