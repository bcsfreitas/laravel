<?php
    require_once('cabecalho.php');
    require_once('conecta.php');
    require_once('banco-produto.php');

    $produtos = listaProdutos($conexao);

    verificaLogin();
?>
    <h1>Lista de produtos </h1>
    <?php
        if(isset($_GET['removido'])){
    ?>
        <div class="alert-success">
            <p>Produto excluído com sucesso!</p>
        </div>
        <?php
    }
    ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preco</th>
                        <th>Imposto</th>
                        <th>Descricão</th>
                        <th>Usado?</th>
                        <th>ISBN</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            foreach($produtos as $prod){
            ?>
                        <tr>
                            <td>
                              <?= htmlspecialchars($prod) ?>
                            </td>
                            <td>
                              <?= $prod->getPreco(); ?>
                            </td>
                            <td>
                              <?= $prod -> valorImposto(); ?>
                            </td>
                            <td>
                              <?= substr($prod -> getDescricao(), 0, 75) ?>
                            </td>
                            <td>
                              <?= $prod -> getUsado() ? 'Sim' : 'Não' ?>
                            </td>
                            <td>
                              <?php
                                if($prod instanceof Livro) {
                                  $isbn = $prod->getIsbn();
                                } else {
                                  $isbn = "";
                                }
                                echo $isbn;
                              ?>
                            </td>
                            <td>
                              <a class="btn btn-warning" href="produto-formulario.php?id=<?= $prod -> getId()?>">Alterar</a>
                              <form style="display: inline-block;" action="remove-produto.php" method="post">
                                <input type="hidden" name="id" value="<?= $prod -> getId()?>">
                                <input type="submit" class="btn btn-danger btn-remover" value="Remover">
                              </form>
                            </td>
                        </tr>
                        <?php
            }
            ?>
                </tbody>
            </table>
            <script>
                var botaoRemover = $(".btn-remover");
                botaoRemover.on("click", function (evt) {
                    if (!confirm("confirma a exclusao?")) {
                        evt.preventDefault();
                    }
                });
            </script>
            <?php
require_once('rodape.php');
?>
