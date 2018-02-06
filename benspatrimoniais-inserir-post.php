<?php
    require_once('classes/BemPatrimonial.php');
    require_once('classes/Erro.php');

    try{
        $bem = new BemPatrimonial();
        $bem->numero = $_POST['txtNum'];
        $res = $bem->pesquisar();
        if (count($res) >= 1){
            throw new Exception("Bem já foi cadastrado, favor informar outro código!!!");
        }

        $bem->data_aquisicao = $_POST['txtDtAq'];
        $bem->descricao = $_POST['txtDesc'];
        $bem->valor_compra = $_POST['txtVlrCompra'];
        $bem->departamento = $_POST['txtDpto'];
        $bem->sala = $_POST['txtSala'];
        $bem->inserir();
    }catch (Exception $e){
        Erro::trataErro($e);
    }
    header('Location: benspatrimoniais.php');

 ?>
