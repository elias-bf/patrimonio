<?php
require_once('Conexao.php');

class OrdemServico{
	public $codigo;
	public $data_solicitacao;
	public $descricao_defeito;
	public $data_conclusao;
	public $urgencia;
	public $numero_bem;
	public $cod_orcamento_escolhido;
	public $situacao;


	public static function descUrgencia($urg){
			if ($urg == 1)
				return "Baixa";
			elseif ($urg == 2) {
				return "Média";
			}else{
				return "Alta";
			}
	}

	public static function descSituacao($sit){
			if ($sit == 'A'){
				return "Aberta";
			}else {
				return "Fechada";
			}
	}



	public function __construct($cod = false){
		if ($cod){
			$this->codigo = $cod;
			$this->pesquisar();
		}
	}

	public static function listar(){
		$sql = "SELECT * FROM ordemservico";
		$con = Conexao::obterConexao();
		$resultado = $con->query($sql);
		$lista = $resultado->fetchAll();
		return $lista;
	}

	public function listarOrcamentosDaOS(){
		$sql = "SELECT * FROM orcamento WHERE cod_os = :codigo";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':codigo', $this->codigo);
		$instrucao->execute();
		return $instrucao->fetchAll();
	}

	public function buscarOrcamentoEscolhido(){
		$sql = "SELECT * FROM orcamento WHERE codigo = :codigoEscolhido";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':codigoEscolhido', $this->cod_orcamento_escolhido);
		$instrucao->execute();
		return $instrucao->fetch();
	}

	public function inserir(){
		$sql = "INSERT INTO ordemservico(data_solicitacao, descricao_defeito, urgencia, numero_bem, situacao)
								VALUES (:dtSolicit, :descr, :urgencia, :numBem, :situacao)";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':dtSolicit', $this->data_solicitacao);
		$instrucao->bindValue(':descr', $this->descricao_defeito);
		$instrucao->bindValue(':urgencia', $this->urgencia);
		$instrucao->bindValue(':numBem', $this->numero_bem);
		$instrucao->bindValue(':situacao', 'A');
		$instrucao->execute();
	}

	public function pesquisar(){
		$sql = "SELECT * FROM ordemservico WHERE codigo = :codigo";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue('codigo',  $this->codigo);
		$instrucao->execute();
		$linha = $instrucao->fetch();

		$this->codigo = $linha['codigo'];
		$this->data_solicitacao = $linha['data_solicitacao'];
		$this->descricao_defeito = $linha['descricao_defeito'];
		$this->data_conclusao = $linha['data_conclusao'];
		$this->urgencia = $linha['urgencia'];
		$this->numero_bem = $linha['numero_bem'];
		$this->cod_orcamento_escolhido = $linha['cod_orcamento_escolhido'];
		$this->situacao = $linha['situacao'];

	}

	public function alterar(){
		$sql = "UPDATE ordemservico SET 	data_solicitacao = :dtSol,
											descricao_defeito = :descricao,
											urgencia = :urgencia
								WHERE codigo = :codigo";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':dtSol', $this->data_solicitacao);
		$instrucao->bindValue(':descricao', $this->descricao_defeito);
		$instrucao->bindValue(':urgencia', $this->urgencia);
		$instrucao->bindValue(':codigo', $this->codigo);
		$instrucao->execute();
	}

	public function escolherOrcamento(){
		$sql = "UPDATE ordemservico SET 	cod_orcamento_escolhido = :orcamento
									WHERE codigo = :codigo";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':orcamento', $this->cod_orcamento_escolhido);
		$instrucao->bindValue(':codigo', $this->codigo);
		$instrucao->execute();
	}

	public function finalizar(){
		$sql = "UPDATE ordemservico SET 	data_conclusao = :dtConclusao,
											situacao = :situacao
									WHERE codigo = :codigo";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':dtConclusao', $this->data_conclusao);
		$instrucao->bindValue(':situacao', 'F');
		$instrucao->bindValue(':codigo', $this->codigo);
		$instrucao->execute();
	}


	public function excluir(){
		$sql = "DELETE FROM ordemservico WHERE codigo = :codigo";
		$con = Conexao::obterConexao();
		$instrucao = $con->prepare($sql);
		$instrucao->bindValue(':codigo', $this->codigo);
		$instrucao->execute();
	}


}

 ?>
