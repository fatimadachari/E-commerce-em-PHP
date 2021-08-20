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
        <form class="form" method="post" name="logar">
            <h1>Entrar</h1>
             <input type="text" placeholder="Usuário" required="required" name="nome">
             <input type="password" placeholder="Senha" required="required" name="senha">
             <p>Você não tem conta? Cadastre-se <a href="cadastro.php"> aqui </a></p>
             <input type="submit" name="logar" value="Entrar">
        </form>
    </div>
<?php
 if(isset($_POST['logar']))
 {
 include_once("conexao_fatima.php");
 
 if(isset($_POST['nome']))
 	$nome = $_POST['nome'];
 else
 	$nome ='';
 
 if(isset($_POST['senha']))
 	$senha = $_POST['senha'];
 else
 	$senha ='';
	
	
 $sql = "select * from usuario where nome='$nome' and senha='$senha'";

 $result = $mysqli->query($sql);
 
 $row = $result->fetch_assoc();
 
 if ($result->num_rows >0)
 {
	$_SESSION['nome']=$row['nome'];  
	$_SESSION['id_usuario']=$row['id_usuario']; 
	header('location: index.php');  
 }
 else
 echo 'Usuario e/ou Senha Inválido';
 }
 ?>
    
    <div id="rodape">
    	<?php
			include "rodape.php"; 
        ?>
    </div>  
</body>
</html>