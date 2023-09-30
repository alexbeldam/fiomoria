<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'fiomoria';

$con = new mysqli($host, $usuario, $senha, $database);

if ($con->error) 
    die('Falha ao conectar ao servidor: ' . $con->error);

$sql = file_get_contents(__DIR__ . '\resources\users.sql');

$requests = explode(';', $sql);

foreach($requests as $request) {
    $request = trim($request);

    if (!empty($request) && !$con->query($request)) 
        break;
}

if ($con->error) 
    die('Falha ao importar tabela de dados: ' . $con->error);