<?php
    require_once 'cabecalho.php';
    require_once 'classes/BemPatrimonial.php';
    require_once 'classes/OrdemServico.php';
    $codigo = $_GET['cod'];
    $os = new OrdemServico($codigo);

?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Ordem de Serviço (OS)</h2>
    </div>
</div>

<form action="os-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label>Número da ordem de serviço</label>
                <label class="form-control"> <?=$os->codigo?> </label>
                <input type="hidden" name="txtCodOS" value="<?=$os->codigo?>">
            </div>
            <div class="form-group">
                <label>Nome do Produto</label>
                <label class="form-control">
                        <?php
                            $bem = new BemPatrimonial($os->numero_bem);
                            echo $bem->descricao;
                        ?>
                </label>
                <input type="hidden" name="txtNumeroBem" value="<?=$os->numero_bem?>">
            </div>
            <div class="form-group">
                <label for="txtDataSolicitacao">Data de solicitação:</label>
                <input type="date"  name="txtDataSolicitacao" value="<?=$os->data_solicitacao?>" class="form-control" placeholder="Data de registro do defeito" required>
            </div>
            <div class="form-group">
                <label for="txtDesc">Descrição do defeito:</label>
                <textarea name="txtDesc" rows="4" cols="50" class="form-control" placeholder="Descrição do defeito"><?=$os->descricao_defeito?></textarea>
            </div>

            <div class="form-group">
                <label for="txtUrgencia">Urgência: </label>
                <select class="form-control" name="txtUrgencia">
                    <option value="1" <?=($os->urgencia == 1 ? "selected" : "")?> >Baixa</option>
                    <option value="2" <?=($os->urgencia == 2 ? "selected" : "")?> >Média</option>
                    <option value="3" <?=($os->urgencia == 3 ? "selected" : "")?> >Alta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lblSituacao">Situação: <?php echo OrdemServico::descSituacao($os->situacao) ?></label>
            </div>
            <?php if ($os->situacao == 'A') { ?>
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            <?php } ?>
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
