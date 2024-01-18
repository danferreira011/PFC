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
      <p class="style1">Receber OS </p>
      <form id="form1" name="form1" method="post" action="">
	  
	  <!--CODIGO PHP-->
	     
        <div align="left">
        <table width="34%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td width="55%" height="99"><p>
              <label></label>
            </p>
              <p align="center">
                Codigo da OS
                <label>
                  <input name="tNumOS" type="text" id="tCodOS" size="5" maxlength="5" />
                  </label>
                </p>
              <p align="center"><!-- Início do codígo -->
<a href="#" onClick="window.open('http://localhost/PFC/Interfaces_PFC/consultar_os.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=500'); return false;">Consultar OS</a>
<!-- fim do codígo --></p>
              <label></label></td>
          </tr>
          <tr>
            <td height="84" colspan="2"><label></label>              <label></label>
            <div align="center">
              <label>
			   <?php
			   			//codigo principal
					  if($_POST["btnReceber"]=="Receber_OS")
					  {
							$tNumOS=$_POST["tNumOS"];
							if	($tNumOS==NULL) 
							{
								print "Por Favor Preencha o numero da OS<br><br>";
							}else
							{
								include_once "../classes/OS.class.php";				
								$os=new OS($tNumOS,'gen',0,$matricula,0,0);					
								$val=$os->ReceberOS();
								print "<h1>OS nº ".$tNumOS." Recebida</h1>";
							}							  
					  }
			  ?>   
              <input name="btnReceber" type="submit" id="btnReceber" value="Receber_OS" />
			 			 
			 <!--CODIGO PHP-->
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
