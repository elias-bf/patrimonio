<?php
    $bem = "";
    try{
        require_once 'cabecalho.php';
        require_once 'classes/BemPatrimonial.php';

        $bem = new BemPatrimonial($_GET['num']);
    }catch (Exception $e){
        Erro::trataError($e);
    }
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Bem Patrimonial</h2>
    </div>
</div>
<form action="benspatrimoniais-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="txtNum">Número: </label>
                <label  class="form-control"><?php echo $bem->numero?></label>
                <input name="txtNum" type="hidden" value="<?php echo $bem->numero?>">
                <label for="txtDtAq">Data de aquisição: </label>
                <input name="txtDtAq" type="date" value="<?=$bem->data_aquisicao?>" class="form-control" placeholder="Data de aquisição do bem Patrimonial">
                <label for="txtDesc">Descrição: </label>
                <textarea name="txtDesc" rows="4" cols="50" class="form-control" placeholder="Descrição do bem Patrimonial"><?=$bem->descricao?> </textarea>
                <label for="txtVlrCompra">Valor de compra: </label>
                <input name="txtVlrCompra" type="text" value="<?=$bem->valor_compra?>" class="form-control" placeholder="Valor pago na compra do bem Patrimonial">
                <label for="txtDpto">Nome departamento: </label>
                <input name="txtDpto" type="text" value="<?=$bem->departamento?>" class="form-control" placeholder="Nome do departamento onde o bem Patrimonial está alocado">
                <label for="txtSala">Número da sala: </label>
                <input name="txtSala" type="number" value="<?=$bem->sala?>" class="form-control" placeholder="Sala onde o bem Patrimonial está alocado">
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>
