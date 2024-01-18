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
      <p class="style1">Cadastrar Servi&ccedil;o </p>
      <form id="form1" name="form1" method="post" action="">
	   <?php 
			   
			   	//PEGANDO VALORES DOS INPUTS			
				 $tCodServ=$_POST["tCodServ"];
				 if($_POST["btnConfirmar"]=='Confirmar')
				  {
					include_once "../classes/Servico.class.php";
					$serv=new Servico($tCodServ,$tDesc);
					$tCodServ=$serv->retornaLinhas()+1;
				  }	
				  $tDesc=$_POST["tDesc"];	
				    		
			   		   
			   //IMPLEMENTANDO O BOTÃO CARREGAR 			
				 if ($_POST["btnCarregar"]=='Carregar')
			 { 				
				include_once "../classes/Servico.class.php";
				$serv=new Servico($tCodServ,$tDesc);								
				$descricao=$serv->retornaDescricao($tCodServ);									
			}		
	  ?>
        <div align="left">
        <table width="80%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td>
              <label>              
              <div align="center"><br />
                Codigo do Servi&ccedil;o <br />
                <input name="tCodServ" type="text" id="tCodServ"  value="<?php print $tCodServ;?>" size="3" maxlength="3" />
                <br />
                  <br />
              </div>
              </label></td>
            <td><label>
              <div align="center">Descri&ccedil;&atilde;o do Servi&ccedil;o<br />
                <input name="tDesc" type="text" id="tDesc"  value="<?php print $descricao?>" size="50" maxlength="50" />
                <br />
              </div>
            </label></td>
          </tr>
          <tr>
            <td colspan="2"><label></label>              <label></label>
            <div align="center">
              <label>
              
			  <?php
			  
			  if($_POST["btnConfirmar"]=="Confirmar")
			  {
			  	if ($_POST["tDesc"]==NULL)
				{
						print "<h1>Não deixe campos em branco</h1><br>";
				}else
				{
						include_once "../classes/Servico.class.php";				
						$serv=new Servico($tCodServ,$tDesc);
						$serv->IncluirServico();
						print "<h1>Serviço '".$tCodServ." - ".$tDesc."' Incluido com Sucesso </h1><br>";
				}
			  }
			  ?>
			  <input name="btnCarregar" type="submit" id="btnCarregar" value="Carregar" />
              <input name="btnConfirmar" type="submit" id="btnConfirmar" value="Confirmar" />
              <input name="btnAlterar" type="submit" id="btnAlterar" value="Alterar" />
			  <?php
			  if($_POST["btnAlterar"]=="Alterar")
			  {
			  		include_once "../classes/Servico.class.php";
					$serv=new Servico($tCodServ,$tDesc);
					$serv->EditarServico();
			  }
			  ?>
              <input name="btnExcluir" type="submit" id="btnExcluir" value="Excluir" />
			  <?php
			  if($_POST["btnExcluir"]=="Excluir")
			  {
			  		include_once "../classes/Servico.class.php";
					$serv=new Servico($tCodServ,$tDesc);
					$serv->ExcluirServico();
			  }
			  ?>
              </label>
              <label>
              <input name="btnLimpar" type="reset" id="btnLimpar" value="Limpar" />
              </label>
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
