<?php
  session_start();
  ob_start(); // Limpar buffer de saída
  include_once "./conexao.php";

  $cod_id = filter_input(INPUT_GET, "id_usuario",FILTER_SANITIZE_NUMBER_INT);
  
  // Verificar se irei receber o valor pela url. Se a variavel cod_id estiver vazia, então não recebeu o valor pela url
  if(empty($cod_id))
  {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro:Usuário não encontrado!</p>";
    header("Location: Listar.php");
    exit();
  }
?>

<!DOCTYPE html>

<html lang="pt-br">
  <head>
    <title>Visualizar Usuários</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <a href="./Listar.php">Lista de Usuários</a>
    <h1>Visualizar</h1>

    <?php
      
      $query_usuario = " SELECT codigo_id, nome, email FROM dados_usuarios WHERE codigo_id = $cod_id LIMIT 1 ";
      $resulte_usuario = $conexao->prepare($query_usuario);
      $resulte_usuario->execute();

      // Verificar se é veradeiro a conexão para encontrar o usuario no bd. Para verificar a variavel resulte_usuario deve ser verdadeiro. E a variavel resulte_usuario receberá a função rowCount para realizar a contagem de linhas e seja diferente (!=) de 0, encontrou um registro no BD. Ao encontrar o registro no BD, irá ser lido o resultado que esta dentro da variavel resulte_usuario
      if(($resulte_usuario) AND ($resulte_usuario->rowCount() != 0))
      {
        $row_usuario = $resulte_usuario->fetch(PDO::FETCH_ASSOC); // Utiliza-se o fetch_assoc para ler o resultado da variavel na coluna É atribuido esta variavel resulte_usuario a variavel row_usuario, pq será lido um registro por vez e por ser um array.
        //var_dump($row_usuario);
        extract($row_usuario);
        echo "CODIGO_ID: $codigo_id<br><br>";
        echo "NOME: $nome<br><br>";
        echo "E-MAIL: $email<br><br>";
      }
      else
      {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro:Usuário não encontrado!</p>";
        header("Location: Listar.php");
      }
    ?>
  </body>
</html>