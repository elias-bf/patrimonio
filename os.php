<?php
    require_once 'classes/OrdemServico.php';
    require_once 'classes/BemPatrimonial.php';

    $os = new OrdemServico();
    $lista = $os->listar();
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Ordem de Serviço</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="os-inserir.php" class="btn btn-info btn-block">Adicionar uma Nova Ordem de Serviço</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>Código</th>
                <th>Solicitado dia</th>
                <th>Bem patrimonial</th>
                <th>Descrição do defeito</th>
                <th>Urgência</th>
                <th>Empresa prestadora do serviço</th>
                <th>Situação</th>
                <th class="acao">Editar</th>
                <th class="acao">Excluir</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                <tr>
                    <td><a href="os-detalhe.php?cod=<?php echo $linha['codigo'] ?>" class="btn btn-link"> <?php echo $linha['codigo'] ?></a></td>
                    <td><?php echo $linha['data_solicitacao'] ?></td>
                    <?php
                        $bem = new BemPatrimonial($linha['numero_bem']);
                        $descBem = $bem->descricao;
                    ?>
                    <td><?php echo $descBem ?></td>
                    <td><?php echo $linha['descricao_defeito'] ?></td>
                    <td><?php echo OrdemServico::descUrgencia($linha['urgencia']) ?></td>
                    <td>
                        <?php
                            $ordem = new OrdemServico($linha['codigo']);
                            $orcamentoEscolhido = $ordem->buscarOrcamentoEscolhido();
                            if (count($orcamentoEscolhido) >= 1)
                                echo $orcamentoEscolhido['empresa'];
                        ?>
                    </td>
                    <td><?php echo OrdemServico::descSituacao($linha['situacao']) ?></td>
                    <td><a href="os-editar.php?cod=<?php echo $linha['codigo'] ?>" class="btn btn-info">Editar</a></td>
                    <td><a href="os-excluir-post.php?cod=<?php echo $linha['codigo'] ?>" class="btn btn-danger">Excluir</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
