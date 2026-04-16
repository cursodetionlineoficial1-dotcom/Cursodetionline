<?php

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

$senha = filter_input(INPUT_POST, 'senha', PASSWORD_DEFAULT);

$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//echo "Nome: $nome <br>";
//echo "Email: $email <br>";

// CPF - Verificar no banco se existe o CPF
$cpf = $_POST['cpf'];
$cpf = mysqli_real_escape_string($connect, $cpf);
$sql = "SELECT cpf FROM cursodetionline.dados_usuarios WHERE cpf='$connect'";
$return = mysqli_query($connect, $sql);

if(mysqli_num_rows($return) > 0)
{
    echo "Este CPF já existe em nosso sistema! Insira um novo.<br/>";
}else
  // Cadastrar novo usuário
{
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $idade = $_POST['idade'];
  $senha = $_POST['senha'];
  $cpf = $_POST['cpf'];

  $sql = "INSERT INTO cursodetionline.dados_usuarios(nome, email, idade, senha, cpf) VALUES ('$nome', '$email', '$idade', '$senha', '$cpf')";

  $result = mysqli_query($connect, $sql);
  echo "Parabéns! Você cadastrou um novo usuário!<br/>";
}


