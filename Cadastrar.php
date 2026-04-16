<?php

  include_once "./connect.php";

?>

<!DOCTYPE html>

<html lang="pt-br">
  <head>
    <title>Cadastro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <h1>Cadastrar</h1>
    <form action="processar.php" method="post">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" placeholder="Digite seu Nome Completo" size="45" requered><br>
      <small>No campo acima é necessário ter nome completo com até 500 caractéres.</small><br><br>

      <label for="e-mail">E-mail:</label>
      <input type="email" id="email" name="email" placeholder="Digite seu E-mail" size="50" value="cursodetionlineoficial1@gmail.com" requered><br><br>

      <label for="idade">Idade:</label>
      <input type="radio" name="idade" id="idade1" requered>
      <label for="idade1">Entre 10 a 20 anos</label>
      <input type="radio" name="idade" id="idade2" requered>
      <label for="idade2">Entre 20 a 40 anos</label>
      <input type="radio" name="idade" id="idade3" requered>
      <label for="idade3">40 a 60</label>
      <input type="radio" name="idade" id="idade+" requered>
      <label for="idade+">60 +</label><br><br>
      
      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" placeholder="Digite sua senha" requered><br><br>

      <label for="cpf">CPF:</label>
      <input type="text" name="cpf" id="cpf" requered title="Digite o CPF no formato xxx.xxx.xxx-xx" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" maxlength="40"><br><br>

      <input type="submit" name="btnCadastrar" value="Salvar">
    </form>
  </body>
</html>