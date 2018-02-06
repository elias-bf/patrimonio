<?php
    require_once('classes/OrdemServico.php');
    require_once('classes/Erro.php');

    try{
        $os = new OrdemServico();
        $os->codigo = $_POST['txtCodOS'];
        $os->data_conclusao = $_POST['txtDataConclusao'];
        $os->finalizar();
    }catch (Exception $e){
        Erro::trataErro($e);
    }
    header('Location: os.php');

 ?>
