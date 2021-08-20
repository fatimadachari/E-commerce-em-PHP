<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Paint Me - Cadastrar-se</title>
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
        <form class="form" action="#" method="post" name="cadastro"
            <h1>Cadastro</h1>
             <input type="text" name="nome" placeholder="Nome do usuário" required="required">
             <input type="email" name="email" placeholder="E-mail" required="required">
             <input type="password" name="senha" placeholder="Senha" required="required">
             <input type="tel" name="telefone" placeholder="Telefone" required="required">
             <P>Você já tem conta? Entre <a href="entrar.php"> aqui </a></P>
             <input type="submit" name="cadastro" value="Cadastrar-se">
        </form>
    </div>
	<?php
include_once("conexao_fatima.php");
if(isset($_POST['cadastro']))
{
if(isset($_POST['nome']))
$nome =  $_POST['nome'];
else
$nome ='';

if(isset($_POST['email']))
$email =  $_POST['email'];
else
$email ='';
	  
if(isset($_POST['senha']))
$senha =  $_POST['senha'];
else
$senha ='';

if(isset($_POST['telefone']))
$telefone =  $_POST['telefone'];
else
$telefone ='';		
		
$sql = "insert into usuario(nome, senha, email, telefone) values ('$nome', '$senha', '$email', '$telefone');";
	
if ($mysqli->query($sql) === TRUE) {
//REDIRECIONA PARA A PAGINA REQUERIDA
// header("location: index.php");
echo '<div class="alert alert-success">
<strong>Successo!</strong> Registro Salvo com Sucesso.
</div>';
			 
} else {
					
echo '<div class="alert alert-danger">
<strong>Erro!</strong> Erro ao Salvar o Registro.<p>'.
$mysqli->error.'<p>'.$sql.'
</div>';
					
}
				
$mysqli->close();
		
		  
}
else
echo '<div class="alert alert-danger">Não Executado</div>';
	 
	?>

    <div id="rodape">
    	<?php
			include "rodape.php"; 
        ?>
    </div>  
</body>
</html>