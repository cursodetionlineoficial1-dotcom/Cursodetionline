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
    <div class="row">
      <div class="col">
        <h1>Cadastro</h1>
        <form class="row g-3" action="" method="">
          <div class="col-md-4">
            <label for="validationServer01" class="form-label">Nome Completo:</label>
            <input type="text" class="form-control is-valid" id="validationServer01" placeholder="Digite seu Nome Completo" required>
            <div class="valid-feedback">
              Primeira etapa ok!
            </div>
          </div>
          
          <div class="col-md-4">
            <label for="validationServerUsername" class="form-label">Username</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend3"><i class="bi bi-person"></span>
              <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
              <div id="validationServerUsernameFeedback" class="invalid-feedback">
                Por favor, Insira seu nome de Usuário.
              </div>
            </div>
          </div>
          
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
              <label class="form-check-label" for="invalidCheck3">
                Ao clicar nesta caixa, você esta aceitando nossos <a href="">Termos de Uso</a>e <a href="">Termos de Privacidade</a>do sistema de cadastro do Curso de TI Online. Isto esta de acordo com as Leis 12.965/2014 e 13.709/2018, que regulam o uso da Internet e o tratamento de dados pessoais no Brasil.
              </label>
              <div id="invalidCheck3Feedback" class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>