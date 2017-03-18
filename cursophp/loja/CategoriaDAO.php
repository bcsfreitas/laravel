<?php

class CategoriaDAO {

private $conexao;

function __construct($conexao) {
  $this->conexao = $conexao;
}

function listaCategorias()
{

    $query = "select * from categorias";
    $resultado = mysqli_query($this->conexao, $query);
    $categorias = array();

    while($categoria = mysqli_fetch_assoc($resultado)){
        array_push($categorias,$categoria);
    }

    return $categorias;

}

function insereCategoria($nome)
{

    $query = "insert into categorias (nome) values ('{$nome}')";
    $resultado = mysqli_query($this->conexao, $query);

    return $resultado;

}

function removeCategoria($id)
{
    $query = "delete from categorias where id={$id}";
    $resultado = mysqli_query($this->conexao, $query);

    return $resultado;

}

}
