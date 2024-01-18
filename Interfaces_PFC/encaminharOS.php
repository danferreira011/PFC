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
      <p class="style1">Encaminhar OS</p>
      <form id="form1" name="form1" method="post" action="">
	  <?php
	  $tNumOS=$_POST["tNumOS"];
	  $tFunc=$_POST["tFunc"];	  
	   ?>
        <div align="left">
        <table width="34%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td width="43%" height="99"><p>
              <label></label>
              Codigo da OS
                <label>
                <input name="tNumOS" type="text" id="tCodOS" size="5" maxlength="5" />
                </label>
            </p>
              <p>
			  <!-- Início do codígo -->
<a href="#" onClick="window.open('http://localhost/PFC/Interfaces_PFC/consultar_os.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=500'); return false;">Consultar OS</a>
<!-- fim do codígo -->
			  </p>
              <label></label></td>
            <td width="57%"><label>Enaminhar para:<br />
            <input name="tFunc" type="text" id="tFunc" size="5" maxlength="5" />
            <br />
            <br />
            
			
			 <!-- Início do codígo -->
<a href="#" onClick="window.open('http://localhost/PFC/Interfaces_PFC/consultar_tecnico.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=300,height=500'); return false;">Consultar T&eacute;cnico</a>
<!-- fim do codígo -->
			
</label></td>
          </tr>
          <tr>
            <td height="84" colspan="2"><label></label>              <label></label>
            <div align="center">
              <label>
			  <?php
			  if($_POST["btnEncaminhar"]=="Encaminhar_OS")
			  {
			  		if($tNumOS==NULL)
					{
						print "Não deixe campos em branco<br><br>";
					}else
					{
					include_once "../classes/OS.class.php";
					$os=new OS($tNumOS,'gen',0,$matricula,0,0);					
					$val=$os->EncaminharOS($tFunc);	
					print "<h1>OS nº ".$tNumOS." Encaminhada para: ".$tFunc."</h1>";
					}							
			  }
			  ?>
              <input name="btnEncaminhar" type="submit" id="btnEncaminhar" value="Encaminhar_OS"/>
              </label>
              <label>
              <input name="btnLimpar" type="submit" id="btnLimpar" value="Limpar" />
              
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
