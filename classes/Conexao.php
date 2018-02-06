<?php 
require_once('Config.inc.php');
class Conexao{


	public static function obterConexao(){
		$con = new PDO(DB_DRIVER . ":host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $con;

	}

}


 ?>