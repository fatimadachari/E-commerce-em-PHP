<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Paint Me - Telas e Pain&eacute;is</title>
<link rel="icon" type="imagem/png" href="imagens/favicon.png"/>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="cabecalho">
    	<?php
			include "cabecalho.php"; 
        ?>
    </div>
    
    <div id="tp">
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <h1>Telas e Painéis</h1>
            <?php
          include_once("conexao_fatima.php");       
		     
          $sql = "SELECT * FROM produtos where categoria='Telas' or categoria='Painéis' order by rand()";
		  
          $result = $mysqli -> query($sql); 
		              
		  echo  '<center><table width="550" cellspacing=20px border="0">
		         <tbody>';		
		  $linha = 1;
		  echo'<tr>';
          while($row = $result->fetch_assoc())
		  {		
		  echo '<td>';          
             echo '<img src="imagens/produtos/'.$row['arquivo'].'" width="250" height="250" /> ';
			 echo '<h4><center>'.$row['nome'].'</center></h4>'; 
  			echo '<center>Preço: R$ '.number_format($row['valor'], 2, ',', '.');
			echo '<br></br>';
             echo '<a href="carrinho.php?acao=add&id='.$row['id_prod'].'">
			<input type="button" class="comp" value=" + Carrinho"></a>';
			 echo '</td>';
			if ($linha==3)
			{
				$linha = 0;
				echo '</tr><tr>';
			}
			$linha++;			
		  }		
		  echo '</tbody>
		          </table></center>';
     $mysqli ->close();
	?>
    </div>
    
    <div id="rodape">
    	<?php
			include "rodape.php"; 
        ?>
    </div> 
</body>
</html>