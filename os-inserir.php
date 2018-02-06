<?php
    require_once 'cabecalho.php';
    require_once 'classes/OrdemServico.php';
    require_once 'classes/BemPatrimonial.php';

    $bens = BemPatrimonial::listar("departamento, descricao");


?>
<div class="row">
    <div class="col-md-12">
        <h2>Adicionar Nova Ordem de Serviço (OS)</h2>
    </div>
</div>
<form action="os-inserir-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="txtNumeroBem">Bem patrimonial:</label>
                <select class="form-control" name="txtNumeroBem" required>

                    <?php
                        $novoDpto = "";
                        foreach ($bens as $bem):
                            if ($novoDpto != $bem['departamento']){
                                if ($novoDpto != "")
                                    echo "</optgroup>";
                                echo "<optgroup label='".$bem['departamento']."' >";
                                $novoDpto = $bem['departamento'];
                            }
                            ?>
                        <option value="<?=$bem['numero']?>"><?=$bem['descricao']?></value>
                    <?php endforeach;
                          echo "</optgroup>";?>
                </select>
            </div>
            <div class="form-group">
                <label for="txtDataSolicitacao">Data de solicitação:</label>
                <input type="date"  name="txtDataSolicitacao" class="form-control" placeholder="Data de registro do defeito" required>
            </div>
            <div class="form-group">
                <label for="txtDesc">Descrição do defeito:</label>
                <textarea name="txtDesc" rows="4" cols="50" class="form-control" placeholder="Descrição do defeito"></textarea>
            </div>

            <div class="form-group">
                <label for="txtUrgencia">Urgência: </label>
                <select class="form-control" name="txtUrgencia">
                    <option value="1">Baixa</option>
                    <option value="2">Média</option>
                    <option value="3">Alta</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
