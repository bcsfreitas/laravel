<?php

  class Livro extends Produto {
    private $isbn;

    function valorImposto() {
      return $this->preco * 0.01;
    }

    public function getIsbn(){
  		return $this->isbn;
  	}

  	public function setIsbn($isbn){
  		$this->isbn = $isbn;
  	}

  }

?>
