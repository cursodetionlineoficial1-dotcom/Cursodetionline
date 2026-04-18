<?php
  session_start();
  include_once "./conexao.php";

?>

<!DOCTYPE html>

<html lang="pt-br">
  <head>
    <title>Lista de Usuários</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <a href='Cadastrar.php'>Cadastrar</a><br>
    <h1>Lista de Usuários</h1>

    <?php

        if(isset($_SESSION['msg']))
        {
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }

        // Receber o nº da página
        $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT );
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
        //var_dump($pagina_atual);

        // Setar a quantidade de registros por página
        $limite_resultado = 40; // número de dados por página (2 registros por página)

        // Cálculo da quantidade de registros por página
        $inicio = ($limite_resultado * $pagina) - $limite_resultado;
        // 2 * 3 = 6 - Número de registros * a quantidade de páginas = total de 6 registros - 2 = 4
        //Página 1 - 1,2 registros / Página 2 - 3,4 registros / Página 3 - 5,6 registros


        // Função para selecionar e chamar os dados dos usuários que estão cadastrados no banco de dados
        $query_usuarios = "SELECT codigo_id, nome, email FROM dados_usuarios ORDER BY codigo_id DESC LIMIT $inicio, $limite_resultado";// 1º chamando a função select e atribuir à uma váriavel( no caso aqui o nome será query_usuários)

        $resulte = $conexao->prepare($query_usuarios);// 2º A query_usuarios será preparada. Usa-se uma variável de atribuição chamada result_usuários que recebe a variável de conexão com o banco de dados e a função prepare e inserindo dentro da função a query_usuarios.

        $resulte->execute(); // 3º Por fim, é executado a query por meio da função execute()

        if(($resulte) AND ($resulte->rowCount() != 0)) // != - Significa diferente
        {
          while($row_usuario = $resulte->fetch(PDO::FETCH_ASSOC))
          {
            //var_dump($row_usuario);
            extract($row_usuario);
            echo "CODIGO_ID: $codigo_id <br><br>";
            echo "NOME: $nome <br><br>";
            echo "E-MAIL: $email <br><br>";
            echo "<a href='Editar.php?id_usuario=$codigo_id'>Editar</a><br>";
            echo "<a href='Vizualizar.php?id_usuario=$codigo_id'>Visualizar</a><br>";
            echo "<a href='Apagar.php?id_usuario=$codigo_id'>Apagar</a><br>";
            echo "<hr>";
          }

          // Contar a quantidade de registros que existe no BD
          $query_qnt_registros = "SELECT COUNT(codigo_id) AS num_result FROM dados_usuarios";
          $result_qnt_registros = $conexao->prepare($query_qnt_registros);
          $result_qnt_registros->execute();
          $row_qnt_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);

          // Quantidade de páginas
          $qnt_pagina = ceil($row_qnt_registros['num_result'] / $limite_resultado); // A função Ceil serve para arredondar um valor para cima, tornando o valor inteiro. 

          $maximo_link = 2;

          echo "<a href='Listar.php?page=1'>Primeira</a>";
          // for (inicio; condição; incremento)
          for($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++)
          {

            if($pagina_anterior >= 1)
            {
              // "<a href=''></a>"
              echo " <a href='Listar.php?page=$pagina_anterior'>$pagina_anterior</a> ";
            }
          }

          echo " $pagina ";

          for($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++)
          {
            if($proxima_pagina <= $qnt_pagina)
            {
              echo " <a href='Listar.php?page=$proxima_pagina'>$proxima_pagina</a> ";
            }
          }

          echo " <a href='Listar.php?page=$qnt_pagina'>Última</a> ";
        }
        else
        {
          echo "<p style='color: #f00;'>Erro! Usuário não encontrado.</p>";
        }
    ?>
    

    
  </body>
</html>