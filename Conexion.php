<?php
require_once "./ProveedoresEnum.php";
class Conexion{
    public static function getConexion($proveedor,$host, $username, $password, $bd, $port=null){
        $conn = null;
        switch ($proveedor) {
            case ProveedoresEnum::MYSQL:
                try {
                    $conn = new mysqli($host,$username, $password, $bd);
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;
            case ProveedoresEnum::PGSQL:
                try {
                    $dsn = "pgsql:host=$host;port=5432;dbname=$bd;user=$username;password=$password";
                    $conn = new PDO($dsn);
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;
            case ProveedoresEnum::SQLSRV:
                try {
                    $dsn = "sqlsrv:Server=$host;Database=$bd;Trusted_Connection=yes;";
                    $conn = new PDO($dsn, $username, $password);
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;            
            default:
                print("Elija un proveedor valido, consulte ProveedoresEnum.PHP");
                break;
        }
    }
}

?>