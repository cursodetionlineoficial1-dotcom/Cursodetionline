<?php

$host = "localhost:8081";
$user = "root";
$pass = "";
$dbname = "cursodetionline";
$port = 3307;

// Conexão com a porta
 //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

// Conexão sem a porta
$conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);



