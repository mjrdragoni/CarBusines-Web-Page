<?php

// vamos declarar os dados do nosso banco de dados
	// os dados são: host, username, pass, dbname

	$db_host = "";
	$db_user = "";
	$db_pass = "";
	$db_name = "";

	$conexao = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	if (mysqli_connect_errno ($conexao)) {		
		echo  "A conexão com o banco de dados falhou, erro reportado: ".mysqli_connect_error();
	}
?>		
