<?php
    require_once('classes/OrdemServico.php');
    require_once('classes/Orcamento.php');
    require_once('classes/Erro.php');

    try{
        $os = new OrdemServico();
        $os->codigo = $_GET['cod'];
        $orcamentos = $os->listarOrcamentosDaOS();
        if ( count($orcamentos) > 0){
            throw new Exception("Existem orçamentos para esta ordem de serviço, exclusão não é permitida!");
        }

        $os->excluir();
    }catch (Exception $e){
        Erro::trataErro($e);
    }
    header('Location: os.php');

?>
