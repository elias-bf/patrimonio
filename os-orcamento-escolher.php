<?php
    require_once('classes/OrdemServico.php');
    require_once('classes/Erro.php');

    try{
        $os = new OrdemServico();
        $os->codigo = $_GET['codOS'];
        $os->cod_orcamento_escolhido = $_GET['codOrcamento'];
        if ($os->situacao == 'F'){
            throw new Exception("Ordem de serviço já está fechada, não é possível modificar o orçamento!");
        }

        $orcamentos = $os->listarOrcamentosDaOS();

        if (count($orcamentos)<3){
            throw new Exception("É necessário realizar o mínimo de três orçamentos, então, um deles poderá ser escolhido");
        }
        $os->escolherOrcamento();
    }catch (Exception $e){
        Erro::trataErro($e);
    }
    header('Location: os.php');

 ?>
