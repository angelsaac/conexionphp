<?php
require_once "./Conexion.php";

$conn = Conexion::getConexion(ProveedoresEnum::PGSQL,"localhost","postgres","1234", "postgres", "5433");

?>