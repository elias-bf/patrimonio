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
        <h2><?php
            if ($os->situacao == 'A' && empty($os->cod_orcamento_escolhido) )
                echo "Escolher orçamento para ordem de serviço " . $os->codigo ;
            elseif ($os->situacao == 'A')
                echo "Fechar a Ordem de Serviço " . $codigo . " com o orçamento ". $os->cod_orcamento_escolhido;
            else
                echo "Informações da Ordem de Serviço ".$os->codigo." e Orçamento Escolhido";
            ?>
        </h2>
    </div>
</div>

<form action="os-concluir.php" method="post">
    <input type="hidden" name="txtCodOS" value="<?=$os->codigo?>">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label>Nome do bem Patrimonial</label>
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
                <label class="form-control"> <?=$os->data_solicitacao?> </label>
            </div>
            <div class="form-group">
                <label >Descrição do defeito:</label>
                <label class="form-control"> <?=$os->descricao_defeito?> </label>
            </div>

            <div class="form-group">
                <label >Urgência: </label>
                <label class="form-control"> <?=OrdemServico::descUrgencia( $os->urgencia) ?> </label>
            </div>

            <?php
            if (empty($os->cod_orcamento_escolhido) ){
                $lista = $os->listarOrcamentosDaOS();
            ?>
                <div class="row">
                    <div class="col-md-6">
                        <a href="orcamento-inserir.php?cod=<?=$os->codigo?>" class="btn btn-info btn-block">Adicionar um Novo Orçamento</a>
                    </div>
                </div>


                <?php if (count($lista) == 0){ ?>
                    <div class="form-group">
                        <label > Não há orçamentos para esta ordem de serviço! </label>
                    </div>
                <?php } else { ?>


                <div class="form-group">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Data</th>
                            <th>Prazo de conserto</th>
                            <th>Valor</th>
                            <th class="acao">Detalhes</th>
                            <th class="acao">Escolher</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $linha): ?>
                            <tr>
                                <td><?php echo $linha['data'] ?></td>
                                <td><?php echo $linha['prazo_dias'] . ' dias' ?></td>
                                <td><?php echo $linha['valor'] ?></td>
                                <td><a href="orcamento-detalhe.php?cod=<?php echo $linha['codigo'] ?>" class="btn btn-link">Detalhes</a></td>
                                <td><a href="os-orcamento-escolher.php?codOrcamento=<?php echo $linha['codigo'] ?>&codOS=<?=$codigo?>" class="btn btn-success">Escolher orçamento</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
        <?php
                }
            } else { ?>
            <div class="form-group">
                <label>Orçamento escolhido: </label>
                <label class="form-control">
                    <a href="orcamento-detalhe.php?cod=<?php echo $os->cod_orcamento_escolhido ?>" class="btn btn-link">
                    <?
                        echo $os->cod_orcamento_escolhido;
                        $orc = new Orcamento($os->cod_orcamento_escolhido);
                        echo " - $ " . $orc->valor . " - " . $orc->empresa . " - " . $orc->telefone;
                    ?>
                    </a>
                </label>
            </div>
            <div class="form-group">
                <label for="txtDataConclusao">Data de conclusão:</label>
                <?php if ($os->situacao == 'A') { ?>
                <input type="date"  name="txtDataConclusao" value="" class="form-control" placeholder="Data de conclusão/entrega do serviço" required>
                <?php }else{ ?>
                <label class="form-control" ><?=$os->data_conclusao?></label>
                <?php } ?>
            </div>
            <?php if ($os->situacao == 'A') { ?>
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            <?php } ?>
        <?php } ?>

        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
