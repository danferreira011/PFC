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
				<p align="center"><strong>Lista de T&eacute;cnicos </strong></p>
				<p>
				  <?php
				include_once '../classes/Tecnico.class.php';
				$func=new Tecnico($tMatricula,$tNome,$tCPF,$tRG,$tTel,$tCel,$tEmail,$cg,$tRua,$tNumero,$tBairro,$tCidade,$tEstado,$tCep,$tPais);
				print '<table width="100%" border="1" cellspacing="0" cellpadding="0">
					  <tr>
						<th scope="row">Matr�cula</th>
						<td><b>Nome</b></td>
					  </tr>';				
				$func->SelecionarTEC();
				print '</table>';
				?>
                </p>
				<p>&nbsp;                                </p>
</body>
</html>
