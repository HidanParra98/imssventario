<?php

$host = 'imssventario17.org';
$usuario = 'imssvent_admin';
$pass = 'admin';
$bd = 'imssvent_hgp';

$conn = new mysqli($host, $usuario, $pass, $bd, 3306);
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $conn->host_info . "   Si se pudo conectar la base de datos\n";


?>