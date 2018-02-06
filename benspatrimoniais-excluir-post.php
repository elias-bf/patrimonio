<?php
    require_once('classes/BemPatrimonial.php');
    require_once('classes/Erro.php');

    try{
        $bem = new BemPatrimonial();
        $bem->numero = $_GET['num'];
        $bem->excluir();
    }catch (Exception $e){
        Erro::trataErro($e);
    }
    header('Location: benspatrimoniais.php');

?>
