<?php 

	require_once 'classes/Config.inc.php';

	spl_autoload_register('carregarClasse');

	function carregarClasse($nomeClasse){
		//Aproveitar que a classe tem o mesmo nome do arquivo
		if (file_exists("classes/".$nomeClasse . ".php")){
			require_once "classes/".$nomeClasse . ".php";
		}
	}


 ?>