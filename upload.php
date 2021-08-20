<html>
<body>
<?php
     include_once('conexao_fatima.php');
  
     $uploaddir = 'imagens/produtos/';
	 $nome = $_POST['nome'];
	 $categoria = $_POST['categoria'];
	 $valor = $_POST['valor'];
	 $quant = $_POST['quant'];
  
     $uploadfile = $uploaddir . $_FILES['arquivo']['name'];
	 $image = $_FILES['arquivo']['name'];
  
     if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile))
	 {	 
		 $sql = "insert into produtos(nome, categoria, valor, quant, arquivo) values ('$nome', '$categoria', '$valor', '$quant', '$image')";
		 
		 if (mysqli_query($mysqli,$sql))		
     			echo "Arquivo Enviado".'<br>'.$_FILES['arquivo']['name'];		 
	 }
  
     else 	
			 	echo "Houve um problema no upload do arquivo.<br>".mysqli_error($mysqli); 
?>

</body>
</html>