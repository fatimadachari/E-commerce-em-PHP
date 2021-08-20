<?php
  date_default_timezone_set('America/Sao_Paulo'); 
  session_start();
  if(!isset($_SESSION['carrinho'])){ 
    $_SESSION['carrinho'] = array(); 
  } 
  
  if(isset($_GET['acao'])){ 
  
    //ADICIONAR CARRINHO 
    if($_GET['acao'] == 'add'){ 
      $id = $_GET['id']; 
      if(!isset($_SESSION['carrinho'][$id])){ 
        $_SESSION['carrinho'][$id] = 1; 
      } else { 
        $_SESSION['carrinho'][$id] += 1; 
      } 
    } 
	
	//REMOVER CARRINHO 
    if($_GET['acao'] == 'del'){ 
      $id = $_GET['id']; 
      if(isset($_SESSION['carrinho'][$id])){ 
        unset($_SESSION['carrinho'][$id]); 
      } 
    } 
	
	//ALTERAR QUANTIDADE 
    if($_GET['acao'] == 'up'){ 
      if(is_array($_POST['prod'])){ 
        foreach($_POST['prod'] as $id => $qtd){
            //$id  = $id;
            //$qtd = $qtd;
            if(!empty($qtd) || $qtd <> 0){
              $_SESSION['carrinho'][$id] = $qtd;
            }else{
              unset($_SESSION['carrinho'][$id]);
            }
        }
      }
    }
          
   }
           
    ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Paint Me - Carrinho </title>
        <link rel="icon" type="imagem/png" href="imagens/favicon.png"/>
        <link href="css/css.css" rel="stylesheet" type="text/css" />
    </head>
<body>
	<div id="cabecalho">
    	<?php
			include "cabecalho.php"; 
        ?>
    </div>
	
	<div id="compracc">
	<br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
	<table width="950" border="0" align="center">
	<h1>Carrinho de Compras</h1>
        <thead>
	    <tr>
          <th>Imagem</th>
		  <th>Produto</th>
          <th>Quantidade</th>
          <th>Valor</th>
		  <th>SubTotal</th>
          <th>Remover</th>
        </tr>
		</thead>
     <form action="?acao=up" method="post">
    <tfoot>   
      <tr>
        <td colspan="6"><input type="submit" class="comp" value="Atualizar Carrinho" />  <a href="catprodutos.php"><input type="button" class="comp" value="Continuar Compra"></a></td>
       </tr>       
    </tfoot>
    <tbody>
     
      <?php
        if(count($_SESSION['carrinho']) == 0){
          echo '
        <tr>
          <td colspan="5">Não há produto no carrinho</td>
        </tr>';
          } else {
                require("conexao_fatima.php");
                $total = 0;
                foreach($_SESSION['carrinho'] as $id => $qtd){
                        $sql   = "SELECT *  FROM produtos WHERE id_prod= '$id'";
                        $qr    = $mysqli-> query($sql);
                        $ln = $qr->fetch_assoc();
                        $nome  = $ln['nome'];
                        $preco = number_format($ln['valor'], 2, ',', '.');
                        $sub   = number_format($ln['valor'] * $qtd, 2, ',', '.');
                        $total += $ln['valor'] * $qtd;
                         echo '<tr>';  
		
				   echo '<td><img src="imagens/produtos/'.$ln['arquivo'].'" width="150" height="150"></td>';    
              echo'  <td>'.$nome.'</td>
                <td><input type="number" min="1" name="prod['.$id.']" value="'.$qtd.'" /></td>
                <td>R$ '.$preco.'</td>
                <td>R$ '.$sub.'</td>
                <td><a href="?acao=del&id='.$id.'">Remove</a></td>
                 </tr>';
                }
                $total = number_format($total, 2, ',', '.');
                echo '<tr>                         
              <td colspan="5"><b>Total</b></td>
              <td><b>R$ '.$total.'</b></td>
                    </tr>';
          }
                   ?>
       
				   
	</tbody>
    </form>  
 </table>
 
 <table align="center">   
     <tr>
        <th > Finalizar Compra</th>
        <th ><form action="finalizar.php" method="post" name="pgto">
        <select name="FORMA">
  <option value="BOLETO">BOLETO</option>
  <option value="CARTÃO">CARTÃO</option>
  <option value="DEPOSITO">DEPOSITO</option>
      </select>
</th>
        <th ></th>
        <th ></th>
        <th ></th>      
      </tr>
        <tr>    
        <th ><input type="submit" class="comp" value="FINALIZAR VENDA"></th>
            <th ></th>
        <th ></th>
        <th ></th>
        <th ></th>
      
      </tr>       
   </table>
   </form>
	</div>
    <div id="rodape">
    	<?php
			include "rodape.php"; 
        ?>
    </div> 
</body>
</html>