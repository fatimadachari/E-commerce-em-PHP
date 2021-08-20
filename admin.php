<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Paint Me - Entrar</title>
<link rel="icon" type="imagem/png" href="imagens/favicon.png"/>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/entrar.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="cabecalho">
    	<?php
			include "cabecalho.php"; 
        ?>
    </div>
    
    <div id="longin"> 
        <form class="form" action="#" method="post" name="logar">
            <h1>Cadastro de produtos</h1>
             <input type="text" placeholder="Usuário" required="required" name="nome">
             <input type="password" placeholder="Senha" required="required" name="senha">
             <input type="submit" name="logar" value="Entrar">
        
        <?php
		 if(isset($_POST['logar']))
 			{if(isset($_POST['nome']))
 				$nome = $_POST['nome'];
 			else
 				$nome ='';
 
			if(isset($_POST['senha']))
			 	$senha = $_POST['senha'];
 			 else
			 	$senha ='';
		
				if ($nome=="admin" and $nome=="admin"){
					header('location: cadastroadmin.php');}
				else{
					echo 'Usuario e/ou Senha Inválido';
				}}
		?></form>
		</div>
    
    
    <div id="rodape">
    	<?php
			include "rodape.php"; 
        ?>
    </div>  
</body>
</html>