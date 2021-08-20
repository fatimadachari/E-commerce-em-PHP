<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Paint Me - Produtos</title>
<link rel="icon" type="imagem/png" href="imagens/favicon.png"/>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
        <div id="cabecalho">
			<?php
            	include "cabecalho.php"; 
             ?>
        </div>
        
        <div id="produtos">
        	<div class="fprodutos">
            	<h1>Nossas categorias</h1>
            	<table width="500" border="0">
                  <tr>
                    <td><img src="imagens/produtos/cavaletemedio.png" /><br /><p>Cavaletes e Chassis</p><br /><a href="produtoscc.php"><input type="button" class="comp" value="Comprar"></a></td>
                    <td><img src="imagens/produtos/painelredondo.png" /><br /><p>Telas e Painéis</p><br /><a href="produtostp.php"><input type="button" class="comp" value="Comprar"></a></td>
                    <td><img src="imagens/produtos/Estojo de tintas óleo Reeves 12 cores.png" /><br /><p>Tintas</p><br /><a href="produtostintas.php"><input type="button" class="comp" value="Comprar"></a></td>
                  </tr>
                </table>

            </div>
        </div>

        <div id="rodape">
			<?php
            	include "rodape.php"; 
            ?>
        </div>

</body>
</html>