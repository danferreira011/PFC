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
print "<center><h2>Relat�rio Operacional</h2><br></center>";
	if($_POST["rdTipo"]==1)
	{
		print'<center>Por Data</center><br>';
		include_once "../classes/OS.class.php";
		$os=new OS($num,$desc,$cod_cli,$matricula,$tipo_os,$servico);
		
		$dataini=''.$_POST["sAnoI"].'-'.$_POST["sMesI"].'-'.$_POST["sDiaI"].' 00-00-00';
		$diafim=$_POST["sDiaF"]+1;
		$datafim=''.$_POST["sAnoF"].'-'.$_POST["sMesF"].'-'.$diafim.' 00-00-00';
		
		print '<table width="80%" border="1" cellspacing="0" cellpadding="0" >
				  <tr>
					<th scope="row" bgcolor="#CCCCCC">C�digo OS</th>
					<td bgcolor="#CCCCCC">Descri��o OS</td>
					<td bgcolor="#CCCCCC">Data de Abertura</td>
					<td bgcolor="#CCCCCC">Data de Fechamento</td>
					<td bgcolor="#CCCCCC">Status</td>
					<td bgcolor="#CCCCCC">C�digo do Cliente</td>
					<td bgcolor="#CCCCCC">Nome Cliente</td>
					<td bgcolor="#CCCCCC">Cod. Funcion�rio</td>
					<td bgcolor="#CCCCCC">Nome Funcion�rio</td>
				  </tr>';
	  $os->relatorioOSData($dataini,$datafim);  
		print '</table>';
		
	}else if($_POST["rdTipo"]==2)
	{
		print'<center>Por Cliente</center><br>';		
		include_once "../classes/OS.class.php";
		$os=new OS($num,$desc,$_POST["tNumCli"],$matricula,$tipo_os,$servico);
		
		
		print '<table width="80%" border="1" cellspacing="0" cellpadding="0" >
				  <tr>
					<th scope="row" bgcolor="#CCCCCC">C�digo OS</th>
					<td bgcolor="#CCCCCC">Descri��o OS</td>
					<td bgcolor="#CCCCCC">Data de Abertura</td>
					<td bgcolor="#CCCCCC">Data de Fechamento</td>
					<td bgcolor="#CCCCCC">Status</td>
					<td bgcolor="#CCCCCC">C�digo do Cliente</td>
					<td bgcolor="#CCCCCC">Nome Cliente</td>
					<td bgcolor="#CCCCCC">Cod. Funcion�rio</td>
					<td bgcolor="#CCCCCC">Nome Funcion�rio</td>
				  </tr>';
	  $os->relatorioOS(2,$_POST["tNumCli"]);  
		print '</table>';
	}else if($_POST["rdTipo"]==3)
	{
		print'<center>Por Numero de OS</center><br>';		
		include_once "../classes/OS.class.php";
		$os=new OS($_POST["tNumOs"],$desc,$cli,$matricula,$tipo_os,$servico);
		
		
		print '<table width="80%" border="1" cellspacing="0" cellpadding="0" >
				  <tr>
					<th scope="row" bgcolor="#CCCCCC">C�digo OS</th>
					<td bgcolor="#CCCCCC">Descri��o OS</td>
					<td bgcolor="#CCCCCC">Data de Abertura</td>
					<td bgcolor="#CCCCCC">Data de Fechamento</td>
					<td bgcolor="#CCCCCC">Status</td>
					<td bgcolor="#CCCCCC">C�digo do Cliente</td>
					<td bgcolor="#CCCCCC">Nome Cliente</td>
					<td bgcolor="#CCCCCC">Cod. Funcion�rio</td>
					<td bgcolor="#CCCCCC">Nome Funcion�rio</td>
				  </tr>';
	  $os->relatorioOS(3,$_POST["tNumOs"]);  
		print '</table>';
	}	else 
	{
		print "Escolha uma Op��o";
	}	
	
?>

</body>
</html>