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
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <p>Pesquisar Cliente</p>
    <p>Digite o Nome do Funcion&aacute;rio: <span class="style1">ex Jose</span>     <br />
      <label>
        <input name="tFunc" type="text" id="tFunc" size="30" maxlength="30" />
      </label>
        <label>
        <input name="btnPesq" type="submit" id="btnPesq" value="Pesquisar" />
        </label>
    </p>
  </div>
   <?php
		if ($_POST["btnPesq"]=="Pesquisar")
		{				
			$tFunc=$_POST["tFunc"];
			if ($_POST["tFunc"]=='')
			{
				print 'Digite o Nome do Funcionário';
			}else 
			{
				include_once '../classes/Operador.class.php';
				$func=new Operador($tMatricula,$tNome,$tCPF,$tRG,$tTel,$tCel,$tEmail,$cg,$tRua,$tNumero,$tBairro,$tCidade,$tEstado,$tCep,$tPais);
				print '<table width="100%" border="1" cellspacing="0" cellpadding="0">
					  <tr>
						<th scope="row">Código</th>
						<td>Nome</td>
					  </tr>
					  
					';				
				$func->SelecionarFUN($tFunc);	
				print '</table>';
			}
		}
	?>
</form>
</body>
</html>
