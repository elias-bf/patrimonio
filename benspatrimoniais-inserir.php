<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Adicionar um Novo Bem Patrimonial</h2>
    </div>
</div>

<form action="benspatrimoniais-inserir-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="txtNum">Número: </label>
                <input name="txtNum" type="text" class="form-control" placeholder="Número do bem Patrimonial">
                <label for="txtDtAq">Data de aquisição: </label>
                <input name="txtDtAq" type="date" class="form-control" placeholder="Data de aquisição do bem Patrimonial">
                <label for="txtDesc">Descrição: </label>
                <textarea name="txtDesc" rows="4" cols="50" class="form-control" placeholder="Descrição do bem Patrimonial"></textarea>
                <label for="txtVlrCompra">Valor de compra: </label>
                <input name="txtVlrCompra" type="text" class="form-control" placeholder="Valor pago na compra do bem Patrimonial">
                <label for="txtDpto">Nome departamento: </label>
                <input name="txtDpto" type="text" class="form-control" placeholder="Nome do departamento onde o bem Patrimonial está alocado">
                <label for="txtSala">Número da sala: </label>
                <input name="txtSala" type="number" class="form-control" placeholder="Sala onde o bem Patrimonial está alocado">
            </div>
            <input type="submit" id="btnSalvar" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
