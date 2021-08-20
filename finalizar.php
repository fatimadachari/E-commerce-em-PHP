 <?php 
 date_default_timezone_set('America/Sao_Paulo');
  session_start(); 
  if(!isset($_SESSION['carrinho'])){ 
    $_SESSION['carrinho'] = array(); 
  } 
         
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Paint Me - Compra </title>
        <link rel="icon" type="imagem/png" href="imagens/favicon.png"/>
        <link href="css/css.css" rel="stylesheet" type="text/css" />
    </head>
<body>
	<div id="cabecalho">
    	<?php
			include "cabecalho.php"; 
        ?>
    </div>
	
	<div id="finalizar">
    <div id="cont">
     <?php
        if(count($_SESSION['carrinho']) == 0){
          echo ' <h1><center>Não há produto no carrinho. </center></h1>     ';
          } else {
                require("conexao_fatima.php");
                 $total = 0;				
				 $data = date("Y-m-d");
                 $hora = date("H:i:s");
				 $chave = rand(0,1000000);
				 
				  if (!empty($_POST["FORMA"])) 
				     $forma_pgto = $_POST["FORMA"];				   
				   else
				     $forma_pgto = '';
                   $id_cliente =  $_SESSION['id_usuario']; //aqui é apenas um exemplo... aqui tem que ser passaso o id_cliente do login do cliente				            
                   $sql_vendas = "insert into vendas(data_emissao, hora, forma_pgto,chave,id_usuario) values ('$data','$hora', '$forma_pgto','$chave', $id_cliente);";		
				   $result     = $mysqli->query($sql_vendas);				 		 
				   $sql_vendas = "select id_venda from vendas where data_emissao='$data' and hora='$hora' and chave='$chave' and id_usuario = $id_cliente";
				   
				   $result     = $mysqli->query($sql_vendas);				 
				   $dados      = $result-> fetch_assoc();
				   $idvenda    = $dados['id_venda'];
				   
                 // INSERINDO OS ITENS DA VENDA 
				 $total_qtd = 0;
                foreach($_SESSION['carrinho'] as $id => $qtd){
					
                        $sql   = "SELECT *  FROM produtos WHERE id_prod= $id";
						
                        $qr    = $mysqli->query($sql);
                        $ln    = $qr ->fetch_assoc();
                        $id_produto  = $ln['id_prod'];  
						$preco_unitario = $ln['valor'];                      
                        $total_item   = $preco_unitario * $qtd;// TOTAL DO ITEM
						$total_qtd   += $qtd;
						//$total_qtd   = $total_qtd + $qtd;
                        $total       +=  $total_item;
						//inserção
						
						$sql = "insert into vendas_item (id_prod, quantidade,preco_unitario, id_venda, total_item) values (
			$id_produto, $qtd, $preco_unitario, $idvenda, $total_item)";
					
						$qr    = $mysqli ->query($sql);
						        
                }
				
					$sql = "update vendas set total_nota = $total, numero_itens = $total_qtd where id_venda = $idvenda";
				
					$qr    = $mysqli ->query($sql);
					unset($_SESSION['carrinho']);
			
						
				echo "<h1><center> COMPRA REALIZADA COM SUCESSO!<br>COMPRA NÚMERO: $idvenda</center></h1><br>";
				echo '<h1><center>Total da Compra: R$ '.number_format($total, 2, ',', '.').'</center></h1><br>';
				echo "<center><a href=pedidos.php?idcliente=".$id_cliente."><input type='button' class='comp' value='Meus pedidos'></a></center>";
               
              
          }
                   ?>
                   </div>
     </div>
	    <div id="rodape">
    	<?php
			include "rodape.php"; 
        ?>
    </div> 
</body>
</html>
