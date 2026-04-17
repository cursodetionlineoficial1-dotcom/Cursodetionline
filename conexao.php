<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "cursodetionline";
$port = 3306;

// Conexão sem a porta
$con = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);



