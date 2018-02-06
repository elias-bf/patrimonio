<?php 
	require_once 'classes/BemPatrimonial.php';

	$bem = new BemPatrimonial();
	$lista = $bem->listar();

	echo "<pre>";
	foreach ($lista as $linha) {
		print_r($linha);
	}

 ?>