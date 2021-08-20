<?php session_start(); ?>
<div class="menu">
	<nav>
        <ul id="menu"> 
			<li><?php if(isset($_SESSION['nome']))
		  echo 'Bem Vindo(a) '.$_SESSION['nome'].'! Você está Logado(a)!';
		  else
		  echo 'Não Logado';
		  ?></li>
            <li><a href="home.php">Home</a></li> 
            <li><a href="quemsomos.php">Quem somos</a></li> 
            <li><a href="catprodutos.php">Produtos</a> 
                <ul> 
                    <li><a href="produtoscc.php">Cavaletes e Chassis</a></li> 
                    <li><a href="produtostp.php">Telas e Painéis</a></li> 
                    <li><a href="produtostintas.php">Tintas</a></li> 
                </ul> 
            </li>
            <li><a href="contato.php">Contato</a></li> 
            <li><a href="entrar.php">Entrar</a></li> 
			<li><a href="logout.php">Sair</a></li> 
        </ul>
    </nav>
</div>

<style>
.menu ul li ul{
    visibility: hidden;
    opacity: 0;
    position: absolute;
    transition: all 0.5s ease;
    left: -80px;
    display: none;
}

.menu ul li:hover > ul, ul li ul:hover{
    visibility: visible;
    opacity: 1;
    display: block;
	clear:both;
}

.menu ul li ul li{
    clear: both;
    width: 100%;
}
</style>
