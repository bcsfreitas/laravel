<?php require_once('seguranca.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
</head>

<body>
  <?php
  if(usuarioEstaLogado()) { ?>
    <div class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header"> <a href="index.php" class="navbar-brand">Minha Loja</a> </div>
            <div>
                <ul class="nav navbar-nav">
                    <li> <a href="produto-formulario.php">Adiciona Produto</a> </li>
                    <li> <a href="produto-lista.php">Lista Produtos</a> </li>
                    <li> <a href="logout.php">logout</a> </li>
                    <li> <a class="text-danger" href="http://www.thememo.com/wp-content/uploads/2016/02/happy-birthday-rick-astley.jpg">NAO CLIQUE AQUI </a> </li>
                </ul>
            </div>
        </div>
    </div>
  <?php }?>
    <main class="container">
        <article>
          <?php
            if(usuarioEstaLogado()) { ?>
              <p>Bem vindo, <?= devolveUsuario() ?></p>
            <?php }?>
