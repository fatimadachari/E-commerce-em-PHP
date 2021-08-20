 <?php 
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
		  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="cabecalho">
    	<?php
			include "cabecalho.php"; 
        ?>
    </div>
    <div class="container center-block"> 
     

      <div class="content center-block">

     <?php
	     include_once("conexao_fatima.php");
		 if ($_GET)
		 {
			$id_cliente = $_GET['idcliente']; 
		 }
		 else
		  header("location: index.php");
	     $sql1 = "select * from vendas where id_usuario = ".$id_cliente;
		 $resultado = $mysqli ->query($sql1);	 
	 
        if( mysqli_num_rows($resultado) == 0){
          echo 'Não há vendas ';
          } else {
               
                $total = 0;
				echo '<div class="panel-group" id="accordion"> ';
				$i=0;
                 while($ln =  $resultado -> fetch_assoc()){
		 
	echo'<div class="panel panel-primary class">';

	
	
	
    echo '<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$ln['id_venda'].'">Venda: '.$ln['id_venda'].'  Data: '.date('d/m/Y',strtotime($ln['data_emissao'])).'
		  
		  
		  Valor: 	R$ '.number_format($ln['total_nota'], 2, ',', '.').'
		  </a>
        </h4>
      </div>
      <div id="collapse'.$ln['id_venda'].'" class="panel-collapse collapse">
        <div class="panel-body">';
		
		echo '<table class="table">
    <caption><h3>Compras Efetuadas</h3></caption>
    <thead>
      <tr>
        <th >Imagem</th>
        <th >Produto</th>
        <th >Quantidade</th>
        <th >Preço</th>
        <th >SubTotal</th>
      </tr>
    </thead>';
	echo ' <tfoot>
   
     <tr>
        <th >Total</th>
        <th ></th>
        <th ></th>
        <th ></th>
        <th >'.number_format($ln['total_nota'], 2, ',', '.').'</th>
      </tr>
  
      
    </tfoot>';
		
		 $sqlpro = "SELECT * FROM vendas_item v, produtos p where v.id_prod = p.id_prod and id_venda=".$ln['id_venda'];
	
		 $resultadoprod = $mysqli -> query($sqlpro);
		 
		  while($lnp =  $resultadoprod -> fetch_assoc()){
		 echo '<tr>';
		 echo '<td><img src="imagens/produtos/'.$lnp['arquivo'].'"  class="img-responsive  center-block img-thumbnail" width="100" height="100" ></td>';    
		 echo '<td>'.$lnp['nome'].'</td>';
		 echo '<td>'.$lnp['quantidade'].'</td>';
		 echo '<td>'.number_format($lnp['preco_unitario'], 2, ',', '.').'</td>';
		 echo '<td>'.number_format($lnp['total_item'], 2, ',', '.').'</td>';
		 echo '</tr>';
		 
		  }
		 
		 echo '</table>';		
		
	echo '	</div>
      </div>
    </div>
    
 ';
					 
				 }
            echo ' </div>';         
          }
		  	echo "<center><a href=catprodutos.php><input type='submit' class='cbt' value='Voltar para as Compras'></a></center>";?>

 </div>
 </div>
 </div>
</div>
<br />
<div id="rodape">
    	<?php
			include "rodape.php"; 
        ?>
    </div> 
</body>
</html>
