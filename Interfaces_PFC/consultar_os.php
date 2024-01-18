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
	include_once "../classes/OS.class.php";
	$os=new OS($tNumOS,$tDesc,$tCodCli,$tMatricula,$rdTipoOS,$tServico);
	
	print "Lista de OS Aberta<br><br>";
			print '<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="row">Código</th>
    <td>Descrição</td>
    <td>Código do Cliente</td>
    <td>Cliente</td>
  </tr>'; 
  $col=$os->SelecionarOS();
  
			print '</table>';			
?>

</body>
</html>
