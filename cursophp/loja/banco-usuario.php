<?php

function buscaUsuario($conexao, $login, $senha) {
  $login = mysqli_real_escape_string($conexao, $login);
  $query = "select * from usuarios
            where login ='{$login}'
            and senha='{$senha}'";

$resultado = mysqli_query($conexao, $query);

$usuario = mysqli_fetch_assoc($resultado);
return $usuario;
}
?>
