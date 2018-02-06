<?php require_once 'classes/BemPatrimonial.php'; ?>
<?php
    $bem = new BemPatrimonial();
    $lista = $bem->listar();
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Bens Patrimoniais</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="benspatrimoniais-inserir.php" class="btn btn-info btn-block">Adicionar um Novo Bem Patrimonial</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Data de Aquisição</th>
                    <th>Descrição</th>
                    <th>valor</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                    <tr>
                        <td><a href="benspatrimoniais-detalhe.php?num=<?=$linha['numero']?>" class="btn btn-link"><?php echo $linha['numero'] ?></a></td>
                        <td><a href="benspatrimoniais-detalhe.php?num=<?=$linha['numero']?>" class="btn btn-link"><?php echo $linha['data_aquisicao'] ?></a></td>
                        <td><a href="benspatrimoniais-detalhe.php?num=<?=$linha['numero']?>" class="btn btn-link"><?php echo $linha['descricao'] ?></a></td>
                        <td><?php echo $linha['valor_compra'] ?></td>
                        <td><a href="benspatrimoniais-editar.php?num=<?php echo $linha['numero'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="benspatrimoniais-excluir-post.php?num=<?php echo $linha['numero'] ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
