<?php
    require_once('classes/Orcamento.php');
    require_once('classes/Erro.php');

    try{
        $os = new Orcamento();
        $os->data = $_POST['txtData'];
        $os->prazo_dias = $_POST['txtPrazo'];
        $os->valor = $_POST['txtValor'];
        $os->empresa= $_POST['txtEmpresa'];
        $os->telefone= $_POST['txtFone'];
        $os->cod_os= $_POST['txtCodOS'];
        $os->inserir();
    }catch (Exception $e){
        Erro::trataError($e);
    }
    header('Location: os-detalhe.php?cod='.$_POST['txtCodOS']);

 ?>
