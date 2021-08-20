<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paint Me - Cadastro de Produtos</title>
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
    
       <div class="codastroprod">
    	<br /><br />
        <h1>Cadastro de produtos</h1>
            <form class="cadast" action="upload.php" enctype="multipart/form-data" method="POST">
    		<input type="file" class="cadrast" placeholder="Selecione o arquivo desejado" name="arquivo" size="20" accept="image/*"/>
            <input type="text" class="cadrast" placeholder="Nome do Produto" name="nome">
            <input type="text" class="cadrast" placeholder="Categoria" name="categoria">
            <input type="text" class="cadrast" placeholder="Valor" name="valor">
            <input type="text" class="cadrast" placeholder="Quantidade em estoque" name="quant">
            <input type="submit" class="cadastbt" value="Cadastrar">
        </form>
    </div>
    
    <div id="rodape">
    	<?php
			include "rodape.php"; 
        ?>
    </div>  
</body>
</html>