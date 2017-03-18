<?php
require_once('conecta.php');
require_once('banco-usuario.php');
require_once('seguranca.php');

$login = $_POST['login'];
$senha = $_POST['senha'];
$senhaMd5 = md5($senha);

$usuario = buscaUsuario($conexao, $login, $senhaMd5);

//if(!$usuario) // if(isset($usuario))
if($usuario == null) {
  header('location: index.php');
} else {
  logar($usuario);
  header('location: produto-lista.php');
}
?>
