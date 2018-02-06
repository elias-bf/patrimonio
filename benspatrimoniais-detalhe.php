<?php
    $bem = "";
    try{
        require_once 'cabecalho.php';
        require_once 'classes/BemPatrimonial.php';
        require_once 'classes/OrdemServico.php';

        $bem = new BemPatrimonial($_GET['num']);
    }catch (Exception $e){
        Erro::trataError($e);
    }
?>

<div class="row">
    <div class="col-md-12">
        <h2>Detalhe do bem patrimonial</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?php echo $bem->numero;?></dd>
    <dt>Nome</dt>
    <dd><?php echo $bem->descricao;?></dd>
    <dt>Ordens de Serviço</dt>
    <dd>
        <ul>
            <?php
                $bem_oss = $bem->listarOS();
                foreach ($bem_oss as $os){
            ?>
                <li><a href="os-detalhe.php?cod=<?php echo $os['codigo'];?>">
                        <?  echo $os['codigo']. " - " . $os['descricao_defeito'];
                            echo " (". OrdemServico::descSituacao( $os['situacao'] ) .")";
                        ?>
                    </a></li>
            <?php } ?>
        </ul>
    </dd>
</dl>
<?php require_once 'rodape.php' ?>
