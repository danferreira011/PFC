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
      <p class="style1">Finalisar OS </p>
      <form id="form1" name="form1" method="post" action="">
	
	  <?php
	  $tNumOS=$_POST["tNumOS"];
	  $tProcedimento=$_POST["tProcedimento"];
	  $tMat=$_POST["tMat"];
	 
			  if($_POST["btnLimpar"]=="Limpar")
			  {			  	
				$tNumOS='';
	  			$tProcedimento=NULL;
	  			$tMat=NULL;
			  }
			 
	   ?>
        <div align="left">
        <table width="64%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td width="20%"><p>
              <label></label>
              Codigo da OS <br />
                <label>
                <input name="tNumOS" type="text" id="tCodOS" value="<?php print $tNumOS;?>" size="5" maxlength="5" />
                </label>
                </p>
              <p><!-- Início do codígo -->
<a href="#" onClick="window.open('http://localhost/PFC/Interfaces_PFC/consultar_os.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=500'); return false;">Consultar OS</a>
<!-- fim do codígo --></p>
              <p><br />
                <br />
                </p>
              <label></label></td>
            <td width="80%">Procedimentos:<br />
              <label>
              <textarea name="tProcedimento" cols="50" rows="5" id="tProcediemento"><?php print $tProcedimento;?></textarea>
              <br />
              Funcionario Que Atuou:<br />
              <input name="tMat" type="text" id="tMat" value="<?php print $tMat;?>" size="5" maxlength="5" />
              <br />
</label></td>
          </tr>
          <tr>
            <td height="84" colspan="2"><label></label>              <label></label>
            <div align="center">
              <label>
			   <?php
			  if($_POST["btnFechar"]=="Fechar_OS")
			  {
			  		if($tNumOS==NULL)
					{
						print "Não deixe campos em Branco<br><br>";
					}else
					{
					include_once "../classes/OS.class.php";
					$os=new OS($tNumOS,'gen',0,$tMat,0,0);					
					$val=$os->FecharOS($tProcedimento,$matricula);
					print "<h1>OS nº ".$tNumOS." Fechada</h1>";
					}	
					
			  }
			  ?>
			  <input name="btnFechar" type="submit" id="btnFechar" value="Fechar_OS" />
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
