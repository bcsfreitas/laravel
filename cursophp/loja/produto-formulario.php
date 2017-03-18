<?php
    require_once('cabecalho.php');
    require_once('conecta.php');
    require_once('CategoriaDAO.php');
    require_once('banco-produto.php');
    require_once('autoload.php');

    verificaLogin();

    $id = $_GET['id'];
    if($id) {
      $produto = buscaProdutoPorId($conexao, $id);
    } else {
      $produto = new Produto();
      $categoria = new Categoria();
      $produto -> setCategoria($categoria);
    }
?>
    <h1>Formulário de cadastro</h1>
    <form action="adiciona-produto.php" method="post">
      <input type="hidden" name="id" value="<?= $produto -> getId() ?>">
      <input type="hidden" name="" value="">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $produto -> getNome() ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="preco">Preco:</label>
            <input type="number" id="preco" name="preco" value="<?= $produto -> getPreco() ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <div class="radio">
              <select class="form-control" name="categoria" id="categoria">
                <?php
                $dao = new CategoriaDAO($conexao);
                $categorias = $dao -> listaCategorias();
                foreach($categorias as $c){
                  $igual = $c['id'] == $produto -> getCategoria() -> getId();
                  $selected = $igual ? 'selected="selected"' : '';
                ?>
                <option <?= $igual ? 'selected' : '' ?> value="<?= $c['id']?>">
                  <?= $c['nome'] ?>
                </option>
                <?php
                }
                ?>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <?php
            if($produto instanceof Livro){
              $isbn = $produto->getIsbn();
            } else {
              $isbn = "";
            }
              ?>
            <input type="text" id="isbn" name="isbn" value="<?= $Isbn ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="descricao">Descricão:</label>
            <textarea class="form-control" name="descricao" id="descricao" cols="100"><?= $produto -> getDescricao() ?></textarea>
        </div>
        <div class="form-group">
            <label for="usado">Usado?:
            <input type="checkbox" name="usado" <?= $produto -> getUsado() ? 'checked' : '' ?> value="true" ></label>
        </div>
        <?php
        $cadastrar = $igual ? 'Cadastrar' : 'Editar';
        ?>
        <input type="submit" value="<?= $cadastrar ?>" class="btn btn-primary"> </form>
<?php
  require_once('rodape.php');
?>
