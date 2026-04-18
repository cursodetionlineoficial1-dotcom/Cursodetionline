<?php
  session_start();
  ob_start(); // Limpar buffer de saída
  include_once "./conexao.php";

  //Método GET recebe o valor pelo url. Metodo POST recebe valor pelo formulário
  $cod_id = filter_input(INPUT_GET, "id_usuario",FILTER_SANITIZE_NUMBER_INT);
  
  // Verificar se irei receber o valor pela url. Se a variavel cod_id estiver vazia, então não recebeu o valor pela url
  if(empty($cod_id))
  {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro:Usuário não encontrado!</p>";
    header("Location: Listar.php");
    exit();
  }

  $query_usuario = " SELECT codigo_id, nome, email FROM dados_usuarios WHERE codigo_id = $cod_id LIMIT 1 ";
  $resulte_usuario = $conexao->prepare($query_usuario);
  $resulte_usuario->execute();

  // Verificar: Caso esta variável seja verdadeiro, então executou a query. E caso seja diferente de 0, encontrou o usuário no BD
  if(($resulte_usuario) AND ($resulte_usuario->rowCount() != 0))
  {
    $row_usuario = $resulte_usuario->fetch(PDO::FETCH_ASSOC); // FETCH ASSOC podemos imprimir o resultado através da coluna
  }
  else
  {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro:Usuário não encontrado!</p>";
    header("Location: Listar.php");
  }
?>

<!DOCTYPE html>

<html lang="pt-br">
  <head>
    <title>Editar Usuários</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <a href="./Listar.php">Lista de Usuários</a>
    <a href="./Cadastrar.php">Cadastrar</a>
    <h1>Editar</h1>

    <?php

      //Receber os dados do formulário
      $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      //var_dump($dados);

      //Verificar se usuario clicou no botão
      if(!empty($dados['EditUsuario'])){
        $empty_input = false; //Por padrão começa em falso. Quando ocorrer um erro, se torna true.

        //Função para retirar espaços em branco. Estou utilizando array_map pq estou recebendo os dados como um array
        $dados = array_map('trim', $dados); //O trim retira os espaços no começo e no fim dos dados.

        //Verificar se há algum campo em branco. Se houver, então é pq o usuario não preencheu. Caso aja algum campo vazio
        if(in_array("", $dados)){
          $empty_input = true;
          echo "<p style='color: #f00;'>Erro! Necessário preencher todos os campos.</p>";
        }
        //Verificar se o e-mailque o usuario digitou te estrutura de e-mail. Se for diferente da estrutura de e-mail, a variavel empty_input se torna true e imprime uma mensagem para o usuario
        elseif(!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)){
          echo "<p style='color: #f00;'>Erro! Necessário preencher com um e-mail válido.</p>";
        }
        //Verificar: Caso não tenha nenhum erro e a variavel empty_input false for diferente de true, continue false, imprimo a mensagem Editar
        if(!$empty_input){
         $query_up_usuario = "UPDATE dados_usuarios SET nome=:nome, email=:email WHERE codigo_id=:codigo_id";
          $edit_usuario = $conexao->prepare($query_up_usuario);
          $edit_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
          $edit_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
          $edit_usuario->bindParam(':codigo_id', $dados['codigo_id'], PDO::PARAM_INT);
          //Verificar se consigo executar a query com sucesso. Caso tenha executado com sucesso, acessa este if, senão acessa o else e imprimo uma mensagem de erro.
          if($edit_usuario->execute()){
            $_SESSION['msg'] = "<p style='color: #00ff40;'>Parabéns! A edição do usuário foi realizada com sucesso.</p>";
            header("Location: Listar.php");
          }else{
            echo "<p style='color: #f00;'>Erro! Não foi possível realizar a edição do usuário.</p>";
          }
        }
      }
    ?>

    
    <form id="editusuario" method="POST" action="">
      <label>Nome Completo:</label>
      <input type="text" name="nome" id="nome" value="<?php
       if(isset($dados['nome'])){
         echo $dados['nome'];
       }elseif(isset($row_usuario['nome'])){
          echo $row_usuario['nome'];
       }?>"><br><br>

      <label for="email">E-mail: </label>
      <input type="email" name="email" id="email" value="<?php
      if(isset($dados['email'])){
        echo $dados['email'];
      }elseif(isset($row_usuario['email'])){
        echo $row_usuario['email'];
      }
      ?>"><br><br>

      <input type="submit" value="Salvar Edição" name="EditUsuario">
    </form>
  </body>
</html>