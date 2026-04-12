<?php

  include_once "conexao.php";

?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row g-3 align-items-center justify-content-center mt-3">
      <div class="col">
        <h1 style="margin-bottom: 20px; margin-top: 20px;">Cadastro</h1>
        <form class="row g-2" action="cadastro_script.php" method="POST">
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="floatingInput">
            <label for="floatingInput">Digite seu Nome Completo</label>
          </div>

          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="floatingInput">
            <label for="floatingInput">Digite seu Endereço:</label>
          </div>

          <div class="form-floating mb-3">
            <label for="floatingInput">Digite seu Telefone:</label>
            <input type="text" class="form-control" id="floatingInput">
          </div>
          
          <div class="form-floating mb-2">
            <input type="email" class="form-control" id="floatingEmail">
            <label for="floatingEmail">Digite seu E-mail:</label>
          </div>

          <div class="form-floating mb-2">
            <input type="date" class="form-control" id="floatingDate">
            <label for="floatingDate">Digite sua Data de Nascimento:</label>
          </div>

          <div class="col-12 mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
              <label class="form-check-label" for="invalidCheck2">
                Ao clicar nesta caixa, você estará aceitando nossos <a href="">Termos de Uso</a> e os <a href="">Termos de Privacidade</a> do sistema de cadastro do Curso de TI Online. Isto esta de acordo com as Leis 12.965/2014 e 13.709/2018, que regulam o uso da Internet e o tratamento de dados pessoais no Brasil.
              </label>
            </div>
          </div>
          <div class="col-12 mb-3">
          <button type="button" class="btn btn-outline-success">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>