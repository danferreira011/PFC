<?php

include 'trava.php';

if($_COOKIE["cargo"]==1)
{
	$cargo=1;
	$cg="Gerente<br>";	

}else if($_COOKIE["cargo"]==2)
{
	$cargo=2;
	$cg="Técnico<br>";
}else if($_COOKIE["cargo"]==3)
{
	$cargo=3;
	$cg="Operador<br>";
}else if($_COOKIE["cargo"]==60)//cargo 60 CLIENTE.
{
	//cliente
	$cargo=60;
	$cg="Cliente<br>";
}

//print "Cargo.: ".$cargo;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<style type="text/css">
<!--
.style1 {
	color: #0033FF;
	font-weight: bold;
	font-style: italic;
}
body {
	background-color: #CCCCCC;
}
.style2 {color: #999999}
-->
</style>
</head>
<body>


<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#0099FF" >
  <tr>
    <th scope="row">MENU</th>
  </tr>
</table>
<p class="style1"><?php print $cg; ?></p>
<a href="http://localhost/PFC/Interfaces_PFC/deslogar.php" target="_top">Deslogar</a></p>
<p class="style1">Servi&ccedil;os</p>
<p>

<?php
 //opções de ações no menu
 $abriros='<a href="http://localhost/PFC/Interfaces_PFC/abrirOS.php" target="mainFrame">Abrir OS</a><br />';   
   $receberos='<a href="http://localhost/PFC/Interfaces_PFC/receberOS.php" target="mainFrame">Receber OS</a><br />';
  $encaminharos='<a href="http://localhost/PFC/Interfaces_PFC/encaminharOS.php" target="mainFrame">Encaminhar OS</a><br />';
  $fecharos='<a href="http://localhost/PFC/Interfaces_PFC/fecharOS.php" target="mainFrame">Fechar OS</a></p>';
  
 if($cargo==2)
 {
 	print '<span class="style2">Abrir OS</span><br>';
	print $receberos.$encaminharos.$fecharos;
 }else if($cargo==60)
 {
 	print $abriros;
	print '<span class="style2">Receber OS</span><br>';
	print '<span class="style2">Encaminhar OS</span><br>';
	print '<span class="style2">Fechar OS</span><br>';
 } else
 {
  	print $abriros.$receberos.$encaminharos.$fecharos;
 }
 ?> 
<p class="style1">Cadastros </p>
<p>

<?php
	//OPÇÕES DE CADASTROS NO MENU
	$cadcli='<a href="http://localhost/PFC/Interfaces_PFC/cadastrarCLI.php" target="mainFrame">Cadastro de Cliente</a><br />';
  $cadfun='<a href="http://localhost/PFC/Interfaces_PFC/cadastrarFUN.php" target="mainFrame">Cadastro de Funcion&aacute;rio</a><br />';
  $cadser='<a href="http://localhost/PFC/Interfaces_PFC/cadastrarSER.php" target="mainFrame">Cadastro de Servi&ccedil;o</a><br />';
  $cadhar='<a href="http://localhost/PFC/Interfaces_PFC/cadastrarHAR.php" target="mainFrame">Cadastro de Hardware</a><br />';
  $cadusu='<a href="http://localhost/PFC/Interfaces_PFC/cadastrarUSU.php" target="mainFrame">Cadastro de Usu&aacute;rio - Funcion&aacute;rio</a><br />';
  $cadusucli='<a href="http://localhost/PFC/Interfaces_PFC/cadastrarCLIUSU.php" target="mainFrame">Cadastro de Usu&aacute;rio-Cliente</a>';
  
  if($cargo==2)
  {
  	print '<span class="style2">Cadastro de Cliente</span><br>
			<span class="style2">Cadastro de Funcion&aacute;rio</span><br>
			<span class="style2">Cadastro de Servi&ccedil;o</span><br>
			'.$cadhar.'
			<span class="style2">Cadastro de Usu&aacute;rio - Funcion&aacute;rio</span><br>
			<span class="style2">Cadastro de Usu&aacute;rio-Cliente</span><br> ';
  }else if($cargo==3)
  {
  	print $cadcli.$cadfun.$cadser.'<span class="style2">Cadastro de Hardware<br>'.$cadusu.$cadusucli;
  }else if($cargo==60)
  {
  		print '<span class="style2">Cadastro de Cliente</span><br>';
		print '<span class="style2">Cadastro de Funcion&aacute;rio</span><br>';
		print '<span class="style2">Cadastro de Servi&ccedil;o</span><br>';
		print '<span class="style2">Cadastro de Hardware</span><br>';
		print '<span class="style2">Cadastro de Usu&aacute;rio - Funcion&aacute;rio</span><br>';
		print '<span class="style2">Cadastro de Usu&aacute;rio-Cliente</span><br>';
		
  }else
  {
  	print $cadcli.$cadfun.$cadser.$cadhar.$cadusu.$cadusucli;
  }
 ?>
</p>


<p class="style1">Pedidos</p>


<?php 
$pedido='<a href="http://localhost/PFC/Interfaces_PFC/pedidos.php" target="mainFrame">Fazer Pedido</a>';
if ($cargo==1)
{
	print $pedido;
}else
{
	print '<span class="style2">Fazer Pedido</span><br>';
}
?>


<p class="style1">Relat&oacute;rios</p>
<p>
<?php
	$relped='<a href="http://localhost/PFC/Interfaces_PFC/relatorio_pedido.php" target="mainFrame">Pedidos</a><br />';
	  $relos='<a href="http://localhost/PFC/Interfaces_PFC/relatorio_os.php" target="mainFrame">Operacional</a>';
	  
	  if ($cargo==1)
{
	print $relped.$relos;
}else
{
	print '<span class="style2">Pedidos<br>Operacional</span><br>';
}	  
?>	  
	
</p>
</body>
</html>
