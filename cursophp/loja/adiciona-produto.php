<?php
    require_once('cabecalho.php');
    require_once('conecta.php');
    require_once('banco-produto.php');
    require_once('Produto.php');
    require_once('Categoria.php');
    require_once('Livro.php');


if($_POST['isbn']){
    $produto = new Livro();
    $produto->setIsbn($_POST['isbn']);
  } else {
    $produto = new Produto();
  }
    if(isset($_POST['id'])) {
      $produto -> setId($_POST['id']);
    }

    $produto -> setNome($_POST['nome']);
    $produto -> setpreco($_POST['preco']);
    $produto -> setdescricao($_POST['descricao']);

    $categoria = new Categoria();
    $categoria -> setid($_POST['categoria']);

    $produto -> setcategoria($categoria);

    if(isset($_POST['usado'])) {
      $produto -> setUsado("true");
    } else {
      $produto -> setUsado("false");
    }
if(isset($_POST['id']) && $_POST['id'] != null) {
  $resultado = alteraProduto($conexao, $produto);
} else {
  $resultado = insereProduto($conexao, $produto);
}
if($resultado) {
 ?>
    <p class="alert-sucess"> Produto
        <?= $produto -> getNome() ?>, R$
            <?= $produto -> getPreco() ?> adicionado com sucesso! :)</p>
    <?php
} else {
?>
        <p class="alert-danger"> O produto
            <?= $produto -> getNome(  ) ?> não foi adicionado</p>
        <?php
}
    require_once('rodape.php');
?>
