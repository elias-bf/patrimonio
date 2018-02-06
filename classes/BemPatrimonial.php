<?php

require_once('Conexao.php');

class BemPatrimonial{

	public $numero;
	public $data_aquisicao;
	public $descricao;
	public $valor_compra;
	public $departamento;
	public $sala;

	public function __construct($num = false){
		if ($num){
			$this->numero = $num;
			$this->pesquisar();
		}
	}

	/**
	*	$ordem: nome do campo, ou sequencia de campos, para ordenação
	*/
	public function listar($ordem=""){

		if ($ordem != ""){
			$ordem = " ORDER BY " . $ordem;
		}
		$sql = "SELECT * FROM bempatrimonial " . $ordem;
		$con = Conexao::obterConexao();
		$resultado = $con->query($sql);
		$lista = $resultado->fetchAll();
		return $lista;
	}


	public function inserir(){
		$sql = "INSERT INTO bempatrimonial(numero, data_aquisicao, descricao, valor_compra, departamento, sala)
								VALUES (:numero, :dt_aq, :descricao, :valor_compra, :dpto, :sala)";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':numero', $this->numero);
		$instrucao->bindValue(':dt_aq', $this->data_aquisicao);
		$instrucao->bindValue(':descricao', $this->descricao);
		$instrucao->bindValue(':valor_compra', $this->valor_compra);
		$instrucao->bindValue(':dpto', $this->departamento);
		$instrucao->bindValue(':sala', $this->sala);
		$instrucao->execute();
	}

	public function pesquisar(){
		$sql = "SELECT * FROM bempatrimonial WHERE numero = :numero";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue('numero',  $this->numero);
		$instrucao->execute();
		$linha = $instrucao->fetch();

		$this->data_aquisicao = $linha['data_aquisicao'];
		$this->descricao = $linha['descricao'];
		$this->valor_compra = $linha['valor_compra'];
		$this->departamento = $linha['departamento'];
		$this->sala = $linha['sala'];
	}


	public function alterar(){
		$sql = "UPDATE bempatrimonial SET 	data_aquisicao = :dt_aq,
											descricao = :descricao,
											valor_compra = :valor_compra,
											departamento = :dpto,
											sala  = :sala
								WHERE numero = :numero";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':dt_aq', $this->data_aquisicao);
		$instrucao->bindValue(':descricao', $this->descricao);
		$instrucao->bindValue(':valor_compra', $this->valor_compra);
		$instrucao->bindValue(':dpto', $this->departamento);
		$instrucao->bindValue(':sala', $this->sala);
		$instrucao->bindValue(':numero', $this->numero);
		$instrucao->execute();
	}


	public function excluir(){
		$sql = "DELETE FROM bempatrimonial WHERE numero = :numero";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':numero', $this->numero);
		$instrucao->execute();
	}

	public function listarOS(){
		$sql = "SELECT * FROM ordemservico WHERE numero_bem = :numero";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':numero', $this->numero);
		$instrucao->execute();
		return $instrucao->fetchAll();
	}

}
?>
