<?php
include 'trava.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-style: italic;
}
-->
</style>
</head>

<body>
<p align="center">&nbsp;</p>
<form id="form1" name="form1" method="post" action="">

  <p align="center">Pesquisar Cliente </p>
  <p align="center">Digite o Nome do cliente: <span class="style1">ex. Jose<br />
  </span>
    <label>
    <input name="tCli" type="text" id="tCli" size="30" maxlength="30" />
    </label> 
    <label>
    <input name="btnPesq" type="submit" id="btnPesq" value="Pesquisar" />
    </label>
  </p>
  <p>
    <?php
		if ($_POST["btnPesq"]=="Pesquisar")
		{			
			$tCli=$_POST["tCli"];
			if ($_POST["tCli"]=='')
			{
				print 'Digite o Nome do Cliente';
			}else 
			{
				include_once '../classes/PessoaFisica.class.php';
				$cli=new PessoaFisica($tCod,$rdStatus,$tRua,$tNumero,$tBairro,$tCidade,$tEstado,$tCep,$tPais,$tTel,$tCel,$tEmail,$rdTipo,$tNome,$tSNome,$tCP_CN,$tRG_IE);							
				print '<table width="80%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="row">Código</th>
    <td>Nome</td>
  </tr>  
';
				$cli->SelecionarCLI($tCli);	
			}
			print '</table>';
		}
?>
  </p>
  
</form>
<p align="center">&nbsp;</p>
</body>
</html>
