<?php
    require_once 'cabecalho.php';
    require_once 'classes/BemPatrimonial.php';
    require_once 'classes/OrdemServico.php';
    require_once 'classes/Orcamento.php';
    $codigo = $_GET['cod'];
    $os = new OrdemServico($codigo);

?>

<div class="row">
    <div class="col-md-12">
        <h2>Registrar novo orçamento</h2>
    </div>
</div>

<form action="orcamento-inserir-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label>Número da OS:</label>
                <label class="form-control"> <?=$os->codigo?> </label>
                <input type="hidden" name="txtCodOS" value="<?=$os->codigo?>">
                <label>Data de abertura da OS:</label>
                <label class="form-control"> <?=$os->data_solicitacao?> </label>
                <label>Descrição do defeito:</label>
                <label class="form-control"> <?=$os->descricao_defeito?> </label>


                <label>Bem Patrimonial: </label>
                <label class="form-control">
                        <?php
                            $bem = new BemPatrimonial($os->numero_bem);
                            echo $bem->numero . " - " . $bem->descricao;
                        ?>
                </label>

                <label for="txtData">Data: </label>
                <input name="txtData" type="date" class="form-control" placeholder="Data do orçamento">
                <label for="txtPrazo">Prazo (em dias): </label>
                <input name="txtPrazo" type="number" class="form-control" placeholder="Prazo para realizar o serviço orçado">
                <label for="txtValor">Valor cobrado: </label>
                <input name="txtValor" type="text" class="form-control" placeholder="Valor à pagar">
                <label for="txtEmpresa">Empresa: </label>
                <input name="txtEmpresa" type="text" class="form-control" placeholder="Nome da empresa responsável pelo orçamento">
                <label for="txtFone">Telefone: </label>
                <input name="txtFone" type="text" class="form-control" placeholder="Telefone para contato com a empresa">
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
