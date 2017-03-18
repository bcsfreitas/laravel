<?php
require_once("conecta.php");
require_once("banco-produto.php");

$id = $_POST['id'];
removeProduto($conexao,$id);
header("location:produto-lista.php?removido=true");