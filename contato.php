<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Paint Me - Contato</title>
<link rel="icon" type="imagem/png" href="imagens/favicon.png"/>
<link href="css/css.css" rel="stylesheet" type="text/css" /></head>
<body>
	<div id="cabecalho">
    	<?php
			include "cabecalho.php"; 
        ?>
    </div>
    
    <div class="contato">
    	<br /><br />
        <h1>Fale com nós!</h1>
            <form class="contform">
            <input type="text" class="ctext" placeholder="Usuário">
            <input type="email" class="ctext" placeholder="E-mail">
            <input type="tel" class="ctext" placeholder="Telefone">
            <textarea class="ctext" placeholder="Sua mensagem"></textarea>
            <input type="submit" class="cbt" value="Enviar">
        </form>
    </div>


    <div id="rodape">
    	<?php
			include "rodape.php"; 
        ?>
    </div>  
</body>
</html>