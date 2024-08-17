<?php
$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);
$mysqli->set_charset("utf8mb4");

if($mysqli->error){
    die("falha ao conectar ao banco de dados: " . $mysqli->error);
}
?>