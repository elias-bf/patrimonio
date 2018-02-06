<?php
    require_once('classes/OrdemServico.php');
    require_once('classes/Erro.php');

    try{
        $os = new OrdemServico();
        $os->codigo = $_POST['txtCodOS'];
        $os->data_solicitacao = $_POST['txtDataSolicitacao'];
        $os->descricao_defeito = $_POST['txtDesc'];
        $os->urgencia = $_POST['txtUrgencia'];
        $os->numero_bem= $_POST['txtNumeroBem'];
        $os->alterar();
    }catch (Exception $e){
        Erro::trataErro($e);
    }
    header('Location: os.php');

 ?>
