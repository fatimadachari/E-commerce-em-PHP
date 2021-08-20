<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Protegido</title>
</head>
<body>
<?php

if (isset($_SESSION['nome']))
echo 'Bem Vindo(a) '.$_SESSION['nome']. ' Você esta logado(a)';
else
header("location: login.php");

?>
</body>
</html>
