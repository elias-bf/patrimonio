<?php
	class Erro
	{
	    public static function trataErro(Exception $e)
	    {
	        if (DEBUG) {
	            echo '<pre>';
	            print_r($e);
	            echo '</pre>';
	        } else {
				echo  "<div style='color:red;margin:30px; padding: 15px; border: 2px solid red;'>";
				echo $e->getMessage();
				echo  "<p><a href='#' onclick='javascript: window.history.go(-1);'> Voltar </a></p>";
				echo  "</div>";

	        }
	        exit;
	    }
	}

 ?>
