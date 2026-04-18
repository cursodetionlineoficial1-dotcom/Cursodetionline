<?php

session_start();
ob_start();

include_once "./conexao.php";

$id = filter_input(INPUT_GET, "id_usuario", FILTER_SANITIZE_NUMBER_INT);
var_dump($id);

//Verificar: caso seja vazio a variavel id del usuario, significa que não esta sendo enviado o id e ele cai neste if
if(empty($id)){
  $_SESSION['msg'] = "<p style='color: #f00;'>Erro:Usuário não encontrado!</p>";
  header("Location: Listar.php");
}

//Verificar se existe este usuário no BD
$query_usuario = "SELECT codigo_id FROM dados_usuarios WHERE codigo_id = $id LIMIT 1";
$result_usuario = $conexao->prepare($query_usuario);
$result_usuario->execute();

//Verificar se encontrou algum usuário no BD. Caso seja diferente de 0, quer dizer que encontrou algum registro. Caso não tenha encontrado, acessa o else e será exibida a mensagem de erro.
if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
 $query_del_usuario = "DELETE FROM dados_usuarios WHERE codigo_id = $id";
 $apagar_usuario = $conexao->prepare($query_del_usuario);

 //Verificar: caso tenha executado a query com sucesso, acessa este if. Senão acessa o else e exibo a mensagem de erro.
 if($apagar_usuario->execute()){
  $_SESSION['msg'] = "<p style='color: #00ff40;'>Parabéns! Este usuário foi apagado com sucesso.</p>";
  header("Location: Listar.php");
 }

}else{
  $_SESSION['msg'] = "<p style='color: #f00;'>Erro:Usuário não encontrado!</p>";
  header("Location: Listar.php");
}



