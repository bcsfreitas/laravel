<?php
require_once('autoload.php');


function insereProduto($conexao, $produto)
{
    if($produto instanceof Livro) {
      $isbn = $produto->getIsbn();
    } else {
      $isbn = "";
    }
    $query = "insert into produtos (nome, preco, isbn, descricao, categoria_id, usado) values ('{$produto -> getNome()}', {$produto -> getPreco()}, '{$isbn}', '{$produto -> getDescricao()}', {$produto -> getCategoria() -> getId()}, {$produto -> getUsado()})";
    $resultado = mysqli_query($conexao,$query);

    return $resultado;

}

function alteraProduto($conexao, $produto)
{

    $query = "update produtos
    set nome = '{$produto -> getNome()}',
        preco = {$produto -> getPreco()},
        descricao = '{$produto -> getDescricao()}',
        categoria_id = {$produto -> getCategoria() -> getId()},
        usado = {$produto -> getUsado()}

    where id = {$produto -> getId()}";
    $resultado = mysqli_query($conexao,$query);

    return $resultado;

}

function listaProdutos($conexao)
{

    $query = "select * from produtos";
    $resultado = mysqli_query($conexao,$query);
    $produtos = array();

    while($array = mysqli_fetch_assoc($resultado)){
        if($array['isbn'] != null) {
          $produto = new Livro();
          $produto -> setIsbn($array['isbn']);  
        } else {
          $produto = new Produto;
        }

        $produto -> setId($array['id']);
        $produto -> setNome($array['nome']);
        $produto -> setPreco($array['preco']);
        $produto -> setDescricao($array['descricao']);

        $categoria = new Categoria();
        $categoria -> setId($array['categoria_id']);

        $produto -> setCategoria($categoria);
        $produto -> setUsado($array['usado']);


        array_push($produtos, $produto);

    }

    return $produtos;

}

function removeProduto($conexao,$id)
{
    $query = "delete from produtos where id={$id}";
    $resultado = mysqli_query($conexao,$query);

    return $resultado;

}

function buscaProdutoPorId($conexao, $id)
{

    $query = "select * from produtos where id={$id}";
    $resultado = mysqli_query($conexao,$query);


    $array = mysqli_fetch_assoc($resultado);
        $produto = new Produto();
        $produto -> setId($array['id']);
        $produto -> setNome($array['nome']);
        $produto -> setPreco($array['preco']);
        $produto -> setDescricao($array['descricao']);

        $categoria = new Categoria();
        $categoria -> setId($array['categoria_id']);

        $produto -> setCategoria($categoria);
        $produto -> setUsado($array['usado']);

    return $produto;

}
