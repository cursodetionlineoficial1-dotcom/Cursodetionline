<?php
  session_start();
  ob_start(); // Limpar buffer de saída
  include_once "./conexao.php";

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
    <a href="./Listar.php">Lista de Usuários</a>
    <h1>Cadastrar</h1>

    <?php
      // Receber os dados do formulário
      $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

      //Verificar se o usuário clicou no botão
      if(!empty($dados['btnCadastrar']))
      {
        //var_dump($dados);
        $empty_input = false; //Significa que não surgiu erro

        $dados = array_map('trim', $dados);
        if(in_array("", $dados))
        {
          $empty_input = true;
          echo "<p style='color: #f00;'>Erro! Necessário preencher todos os campos.</p>";
        }
        //Validando email. Se o usuário digitar o email incorretamente, não será permitido realizar o cadastro
        //Ele verificará se o usuário digitou o campo com as características de um e-mail válido ou correto.
        elseif(!filter_var($dados['email'], FILTER_VALIDATE_EMAIL))
        {
          $empty_input = true;
          echo "<p style='color: #f00;'>Erro! Necessário preencher o campo com um e-mail válido.</p>";
        }
        
        // Se for diferente da váriavel empty_input = true, então o usuário poderá cadastrar
        if(!$empty_input)
        {
          // Inserindo os dados no banco de dados
          $query_usuario = "INSERT INTO dados_usuarios (nome, email) VALUES (:nome, :email)";

          $cad_usuario = $conexao->prepare($query_usuario);
          $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
          $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
          $cad_usuario->execute();

          if($cad_usuario->rowCount())
          {
            unset($dados);
            $_SESSION['msg'] = "<p style='color: #00ff55;'>Parabéns! Seu cadastro foi feito com sucesso!</p>";
            header("Location: Listar.php");
          }
          else
          {
            echo "<p style='color: #f00;'>Erro! Infelizmente você não conseguiu se cadastrar em nosso sistema! Verifique os campos e tente novamente.</p>";
          }
        }
      }
    ?>

    <form name="cad-usuario" method="POST" action="">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" value="<?php 
      if(isset($dados['nome']))
      {
        echo $dados['nome'];
      }
      ?>"><br><br>
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" value="<?php 
      if(isset($dados['email']))
      {
        echo $dados['email'];
      }
      ?>"><br><br>
      <input type="submit" name="btnCadastrar" value="Salvar">
    </form>
  </body>
</html>