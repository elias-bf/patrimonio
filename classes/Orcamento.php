<?php
require_once('Conexao.php');

class Orcamento{
	public $codigo;
    public $data;
    public $prazo_dias;
    public $valor;
    public $empresa;
    public $telefone;
    public $cod_os;


	public function __construct($cod = false){
		if ($cod){
			$this->codigo = $cod;
			$this->pesquisar();
		}
	}

	public function listar(){
		$sql = "SELECT * FROM orcamento";
		$con = Conexao::obterConexao();
		$resultado = $con->query($sql);
		$lista = $resultado->fetchAll();
		return $lista;
	}

	public function inserir(){
		$sql = "INSERT INTO orcamento(data, prazo_dias, valor, empresa, telefone, cod_os)
								VALUES (:dt, :prazo, :valor, :empresa, :fone, :codos)";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':dt', $this->data);
		$instrucao->bindValue(':prazo', $this->prazo_dias);
		$instrucao->bindValue(':valor', $this->valor);
		$instrucao->bindValue(':empresa', $this->empresa);
		$instrucao->bindValue(':fone', $this->telefone);
		$instrucao->bindValue(':codos', $this->cod_os);
		$instrucao->execute();
	}

	public function pesquisar(){
		$sql = "SELECT * FROM orcamento WHERE codigo = :codigo";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue('codigo',  $this->codigo);
		$instrucao->execute();
		$linha = $instrucao->fetch();

		$this->codigo = $linha['codigo'];
		$this->data = $linha['data'];
		$this->prazo_dias = $linha['prazo_dias'];
		$this->valor = $linha['valor'];
		$this->empresa = $linha['empresa'];
		$this->telefone = $linha['telefone'];
		$this->cod_os = $linha['cod_os'];
	}

	public function alterar(){
		$sql = "UPDATE orcamento SET 	data = :dt,
										prazo_dias = :prazo,
										valor = :valor,
										empresa = :empresa,
										telefone = :fone
								WHERE codigo = :codigo";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':dt', $this->data);
		$instrucao->bindValue(':prazo', $this->prazo_dias);
		$instrucao->bindValue(':valor', $this->valor);
		$instrucao->bindValue(':empresa', $this->empresa);
		$instrucao->bindValue(':fone', $this->telefone);
		$instrucao->bindValue(':codigo', $this->codigo);

		$instrucao->execute();
	}

	public function excluir(){
		$sql = "DELETE FROM orcamento WHERE codigo = :codigo";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':codigo', $this->codigo);
		$instrucao->execute();
	}


}

 ?>
