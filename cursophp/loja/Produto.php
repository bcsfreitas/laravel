<?php

class Produto {
      private $id;
      private $nome;
      protected $preco;
      private $descricao;
      private $categoria;
      private $usado;

public function getId(){
  return $this->id;
}

public function setId($id){
  $this->id = $id;
}

public function getNome(){
  return $this->nome;
}

public function setNome($nome){
  $this->nome = $nome;
}

public function getPreco(){
  return $this->preco;
}

public function setPreco($preco){
  $this->preco = $preco;
}

public function getDescricao(){
  return $this->descricao;
}

public function setDescricao($descricao){
  $this->descricao = $descricao;
}

public function getCategoria(){
  return $this->categoria;
}

public function setCategoria($categoria){
  $this->categoria = $categoria;
}

public function getUsado(){
  return $this->usado;
}

public function setUsado($usado){
  $this->usado = $usado;
}

function valorImposto(){
  if($this -> preco < 1000) {
    return 10;
  } else {
    return $this -> preco * 0.4;
  }
}

function __toString() {
  return "um produto com nome: $this->nome";
}

}
