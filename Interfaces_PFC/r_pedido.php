<?php
include 'trava.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php

print '<center><h2>Relatório de Pedidos</h2><br></center>';

if($_POST["rdTipo"]==1)
{	
	
	print'<center>Por Data</center><br>';
	include_once "../classes/Pedido.class.php";
	$ped=new Pedido($tNumPed,0,0,'gen',$tNumCli);
	
	$dataini=''.$_POST["sAnoI"].'-'.$_POST["sMesI"].'-'.$_POST["sDiaI"].' 00-00-00';
	$diafim=$_POST["sDiaF"]+1;
	$datafim=''.$_POST["sAnoF"].'-'.$_POST["sMesF"].'-'.$diafim.' 00-00-00';
	print '<table width="80%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="row">Num.Pedido</th>
    <td>Cod.Cliente</td>
    <td>Cliente</td>
    <td>Item</td>
    <td>Descrição</td>
    <td>Quantidade</td>
    <td>Data</td>
  </tr>';
	$ped->RelatorioData($dataini,$datafim);
	print '</table>';
}else if($_POST["rdTipo"]==2)
{
	print'<center>Por Cliente</center><br>';
	include_once "../classes/Pedido.class.php";	
	$ped=new Pedido(0,0,0,'gen',$_POST["tNumCli"]);
	print '<table width="80%" border="1" cellspacing="0" cellpadding="0">
	  <tr>
		<th scope="row">Num.Pedido</th>
		<td>Cod.Cliente</td>
		<td>Cliente</td>
		<td>Item</td>
		<td>Descrição</td>
		<td>Quantidade</td>
		<td>Data</td>
	  </tr>';
	$ped->RelatorioPedido(2,$_POST["tNumCli"]);
	print '</table>';
	
}else if($_POST["rdTipo"]==3)
{
	print'<center>Por Pedido</center><br>';	
	include_once "../classes/Pedido.class.php";	
	$ped=new Pedido($_POST["tNumPed"],0,0,'gen',0);
	print '<table width="80%" border="1" cellspacing="0" cellpadding="0">
	  <tr>
		<th scope="row">Num.Pedido</th>
		<td>Cod.Cliente</td>
		<td>Cliente</td>
		<td>Item</td>
		<td>Descrição</td>
		<td>Quantidade</td>
		<td>Data</td>
	  </tr>';
	$ped->RelatorioPedido(3,$_POST["tNumPed"]);
	print '</table>';
}else
{
	print'Escolha Uma Opção';	
}






?>
</body>
</html>
