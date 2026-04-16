<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "cursodetionline";
$port = 3306;

//Conexão com a porta
$connect = new mysqli($server, $user, $password, $db, $port);

//Conexão sem a porta
//$connect = new mysqli($server, $user, $password, $db);

if($connect->connect_errno){
  
  echo "Você não esta conectado ao bd";
}else {
  echo "Conectado ao BD";
}

