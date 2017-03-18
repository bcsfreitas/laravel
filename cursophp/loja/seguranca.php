<?php
  session_start();

  function logar($usuario) {
    $_SESSION['usuario'] = $usuario['login'];
  }


  function devolveUsuario() {
    return $_SESSION['usuario'];
  }

  function verificaLogin() {
    if(!devolveUsuario()) {
      header('location: index.php');
    }
  }

  function usuarioEstaLogado() {
    return devolveUsuario() != null;
  }

  function logout() {
    session_destroy();
  }
 ?>
