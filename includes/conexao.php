<?php

// Detecta ambiente
if ($_SERVER['SERVER_NAME'] == "localhost") {

    // CONFIGURAÇÃO LOCAL (XAMPP)
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "dieta_db";

} else {

    // CONFIGURAÇÃO DO SERVIDOR
    $host = "mysql.railway.internal";
    $user = "root";
    $pass = "cvaksVdxvSXALPuYQWyjDWlMYmFWotwp";
    $db   = "railway";

}

$conn = new mysqli($host, $user, $pass, $db);

// Verificar erro
if ($conn->connect_error) {
    die("Erro na conexão com o banco: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");