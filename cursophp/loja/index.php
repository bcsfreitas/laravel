<?php require_once('cabecalho.php') ?>

<h1>Login</h1>


  <form class="" action="logica-login.php" method="post">
    <div class="form-group">
      <label for="login">
        <input class="form-control" placeholder="Login" type="text" name="login" id="login" value="">
      </label>
    </div>
    <div class="form-group">
      <label for="senha">
        <input class="form-control" placeholder="Senha" type="password" id="senha" name="senha" value="">
      </label>
    </div>
    <input class="btn btn-primary" type="submit" name="logar" value="LOGAR">
  </form>


<?php require_once('rodape.php') ?>
