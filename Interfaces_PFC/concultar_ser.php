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
	include_once "../classes/Servico.class.php";
	$serv=new Servico($tCodServ,$tDesc);
	print '<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="row">C�digo</th>
    <td>Servi�o</td>
  </tr>';
	$serv->SelecionarSER();	
	print '</table>';		  
?>
</body>
</html>
