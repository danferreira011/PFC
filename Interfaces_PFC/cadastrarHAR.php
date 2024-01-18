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
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">
      <p class="style1">Cadastrar Hardware </p>
      <form id="form1" name="form1" method="post" action="">
	  
	  <?php
	  //pegando valores
	  $tCodHard=$_POST["tCodHard"];
	  if($_POST["btnConfirmar"]=='Confirmar')
	  {			
			include_once "../classes/Hardware.class.php";
			$hard=new Hardware($tCodHard,$tNome,$tMarca,$tModelo,$tNS,$tDesc,$tValor,$tCodCli);				
			$tCodHard=$hard->retornaLinhas()+1;
	  }	
	  
		$tCodCli=$_POST["tCodCli"];
	  $tNome=$_POST["tNome"];
	  $tMarca=$_POST["tMarca"];
	  $tModelo=$_POST["tModelo"];
	  $tNS=$_POST["tNS"];
	  $tDesc=$_POST["tDesc"];
	  $tValor=$_POST["tValor"];	 
	  
	   if ($_POST["btnCarregar"]=="Carregar")
	   {
	   		//retornos
			include_once "../classes/Hardware.class.php";
			$hard=new Hardware($tCodHard,$tNome,$tMarca,$tModelo,$tNS,$tDesc,$tValor,$tCodCli);	
			$codcli=$hard->retornaCodCli($tCodHard);
			$nome=$hard->retornaNome($tCodHard);
			$marca=$hard->retornaMarca($tCodHard);
			$modelo=$hard->retornaModelo($tCodHard);
			$ns=$hard->retornaNS($tCodHard);
			$descricao=$hard->retornaDesc($tCodHard);
			$valor=$hard->retornaValor($tCodHard);
						
	   }
	  ?>
	  
        <div align="left">
        <table width="80%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td>
              <label><br />
              Codigo Hardware <br />
              <input name="tCodHard" type="text" id="tCodHard" value="<?php print $tCodHard;?>" size="5" maxlength="5" />
              <br />
              Cod_Cliente:
              <br />
              <input name="tCodCli" type="text" id="tCodCli" value="<?php print $codcli;?>" size="5" maxlength="5" />
              <br />
              <br />
              <!-- Início do codígo -->
<a href="#" onClick="window.open('http://localhost/PFC/Interfaces_PFC/consulta_cli.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=300,height=500'); return false;">consultar cliente</a>
				<!-- fim do codígo --><br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
              <br />
<br />
              </label></td>
            <td>Nome<br />
              <label>
              <input name="tNome" type="text" id="tNome" value="<?php print $nome;?>" size="100" maxlength="100" />
              <br />
              Marca
              <br />
              <input name="tMarca" type="text" id="tMarca" value="<?php print $marca;?>" size="30" maxlength="30" />
              Modelo
              <input name="tModelo" type="text" id="tModelo" value="<?php print $modelo;?>" size="30" maxlength="30" />
              <br />
              <br />
              Num_Serie:
              <input name="tNS" type="text" id="tNS" value="<?php print $ns;?>" size="30" maxlength="30" />
              <br />
              <br />
              Descri&ccedil;&atilde;o:<br />
              <textarea name="tDesc" cols="50" rows="5" id="tDesc"><?php print $descricao;?></textarea>
              <br />
              Valor<br />
              <input name="tValor" type="text" id="tValor" value="<?php print $valor;?>" size="8" maxlength="8" />
              </label></td>
          </tr>
          <tr>
            <td colspan="2"><label></label>              <label></label>
            <div align="center">
              <label>
              <input name="btnCarregar" type="submit" id="btnCarregar" value="Carregar" />
              <input name="btnConfirmar" type="submit" id="btnConfirmar" value="Confirmar" />
			  <?php
			  if($_POST["btnConfirmar"]=="Confirmar")
			  {
			  	include_once "../classes/Hardware.class.php";
				$hard=new Hardware($tCodHard,$tNome,$tMarca,$tModelo,$tNS,$tDesc,$tValor,$tCodCli);	
				$hard->IncluirHardware();	
			  }
			  ?>
              <input name="btnAlterar" type="submit" id="btnAlterar" value="Alterar" />
			  <?php
			  if($_POST["btnAlterar"]=="Alterar")
			  {
			  	include_once "../classes/Hardware.class.php";
				$hard=new Hardware($tCodHard,$tNome,$tMarca,$tModelo,$tNS,$tDesc,$tValor,$tCodCli);	
				$hard->EditarHardware();
			  }
			  ?>
              <input name="btnExcluir" type="submit" id="btnExcluir" value="Excluir" />
			  <?php
			  if($_POST["btnExcluir"]=="Excluir")
			  {
			  	include_once "../classes/Hardware.class.php";
				$hard=new Hardware($tCodHard,$tNome,$tMarca,$tModelo,$tNS,$tDesc,$tValor,$tCodCli);	
				$hard->ExcluirHardware();
			  }
			  ?>
              </label>
              <label></label>
            </div></td>
            </tr>
        </table>
        <p>
          <label></label>
          <label></label><label></label><label></label></p>
        </form>
      <p>&nbsp;</p>
    </div></td>
  </tr>
</table>
</body>
</html>
