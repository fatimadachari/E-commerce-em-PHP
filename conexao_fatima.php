<?php
	$servidor = '25dejulho.online';
	$usuario = 'dejulhoo_fatima';
	$senha = 'aula2021*';
	$banco = 'dejulhoo_fatima';
	$mysqli = new mysqli($servidor,$usuario,$senha,$banco);
	
	if ($mysqli -> connect_errno){
		echo "<center>Failed to connect to MySQL: " . $mysqli -> connect_error;
		exit();
	}
	//else
		//echo "Conexão efetuada com sucesso!<br>";
		
		mysqli_query($mysqli,"SET NAMES 'utf8'");
        mysqli_query($mysqli,'SET character_set_connection=utf8');
        mysqli_query($mysqli,'SET character_set_client=utf8');
        mysqli_query($mysqli,'SET character_set_results=utf8');
?>
