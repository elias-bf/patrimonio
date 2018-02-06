<?php
    require_once 'cabecalho.php';
    require_once 'classes/BemPatrimonial.php';
    require_once 'classes/OrdemServico.php';
    require_once 'classes/Orcamento.php';

    $codigo = $_GET['cod'];
    $orc = new Orcamento($codigo);


    $codigo = $orc->cod_os;
    $os = new OrdemServico($codigo);

    $bem = new BemPatrimonial($os->numero_bem);


?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhes do orçamento</h2>
    </div>
</div>

<form action="os-concluir.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label>Número da ordem de serviço</label>
                <label class="form-control"> <?=$os->codigo?> </label>
                <input type="hidden" name="txtCodOS" value="<?=$os->codigo?>">
            </div>
            <div class="form-group">
                <label>Nome do bem Patrimonial</label>
                <label class="form-control"> <?=$bem->descricao?> </label>
                <input type="hidden" name="txtNumeroBem" value="<?=$os->numero_bem?>">
            </div>
            <div class="form-group">
                <label >Urgência: </label>
                <label class="form-control"> <?=OrdemServico::descUrgencia( $os->urgencia) ?> </label>
            </div>

            <div class="form-group">
                    <label>Orçado por</label>
                    <label class="form-control"><?php echo $orc->empresa ?></label>
                    <label>Prazo de conserto</label>
                    <label class="form-control"><?php echo $orc->prazo_dias . ' dias' ?></label>
                    <label>Valor</label>
                    <label class="form-control"><?php echo $orc->valor ?></label>
                    <label>Telefone para contato com a empresa</label>
                    <label class="form-control"><?php echo $orc->telefone ?></label>
                    <?php if ($orc->data_conclusao != null){ ?>
                    <label>Data de conclusão</label>
                    <label class="form-control"><?php echo $orc->data_conclusao ?></label>
                    <?php } ?>
            </div>

            <input type="button" class="btn btn-success btn-block" value="Voltar" onClick="javascript: window.history.go(-1);">

        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
