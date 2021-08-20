<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<div class="menu">
	<nav>
        <ul id="menu"> 
			<li><?php if(isset($_SESSION['nome']))
		  echo 'Bem Vindo(a) '.$_SESSION['nome'].'!';
		  else
		  echo 'Não Logado';
		  ?></li>
            <li><a href="index.php">Home</a></li> 
            <li><a href="quemsomos.php">Quem somos</a></li> 
            <li><a href="catprodutos.php">Produtos</a></li>
            <li><a href="contato.php">Contato</a></li> 
            <li><a href="entrar.php">Entrar</a></li> 
			<li><a href="logout.php">Sair</a></li> 
			<li><a href="carrinho.php"><img src="imagens/carrinho2.png" height="21" width="21"/></a></li> 
        </ul>
    </nav>
</div>
