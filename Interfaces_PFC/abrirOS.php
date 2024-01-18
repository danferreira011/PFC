<?php
//validação de login
include 'trava.php';
?>

<!DOCTYPE html private "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
      <p class="style1">Abrir OS </p>
      <form id="form1" name="form1" method="post" action="">
	  <?php
	  // pegando o valor do hide e atribuindo na variavel  $hNumOS
	  $hNumOS=$_POST["hNumOS"];	
		 //implementando o botão Abrir OS para ter o retorno do numero da proxima OS
		 if($_POST["btnConfirmar"]=='Abrir_OS')
		  {
			include_once "../classes/OS.class.php";
			$os=new OS($hNumOS,$tDesc,$tCodCli,$tMatricula,$rdTipoOS,$sServico);
			$hNumOS=$os->retornaLinhas()+1;			
			include '../classes/classes_cli.php';
			$hEmail=$cli->retornaEmail($tCodCli);			
			
		  }	  
	  //atribuindo os valores dos inputs em variaveis	  
	  $rdTipoOS=$_POST["rdTipoOS"];
	  $tDesc=$_POST["tDesc"];
	  $tCodCli=$_POST["tCodCli"];	  
	  $sServico=$_POST["sServico"];
	  	 	    
	  ?>
        <div align="left">
        <table width="80%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td><p>
              <input name="hNumOS" type="hidden" id="hNumOS" />
              <input name="hEmail" type="hidden" id="hEmail" value=<?php $hEmail?> />
            </p>
              <label>Tipo OS <br />
              </label>
              <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <tr>
                  <th scope="row"><div align="left">
                    <?php
				  
				  //RADIO GROUP EM PHP
				  
			  	for($i=1;$i<3;$i++)
				{
					if ($rdTipoOS==$i)
					  {
					  	print '<input type="radio" name="rdTipoOS" value="'.$rdTipoOS.'"  checked="checked" />';
					  }else
					  {					
						print '<input type="radio" name="rdTipoOS" value="'.$i.'" />';
						}	
					
					if($i==1)
					  {
						print '1-Corretiva<br>';	
					  }else if ($i==2)
					  {
						print '2-Preventiva<br>';
						
					  }
					  
				}				
			  ?>
                  </div></th>
                </tr>
              </table>
              <label>              <br />
              <br />
              </label></td>
            <td>Descri&ccedil;&atilde;o da Falha<br />
              <textarea name="tDesc" cols="50" rows="5" id="tDesc"><?php print $tDesc;?></textarea></td>
          </tr>
          <tr>
            <td height="41"><label>              Codigo Cliente<br />
              <input name="tCodCli" type="text" id="tCodCli" value="<?php print $tCodCli;?>" size="5" maxlength="5" />
              <br />
             			  
			  <!-- Início do codígo -->
<a href="#" onClick="window.open('http://localhost/PFC/Interfaces_PFC/consulta_cli.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=300,height=500'); return false;">consultar cliente</a>
				<!-- fim do codígo -->
		  
              </label></td>
            <td><label><br />
            Servi&ccedil;o:
              
              <?php
			  //atribuindo lista de serviço no select
				include_once "../classes/Servico.class.php";
				$serv=new Servico($tCodServ,$tDesc);			
				print'<select name="sServico">';
				print'<option><Selecione o Servi&ccedil;o</option>';
				$serv->SelecionarSER();
				print'</select>';	
		  
			?>
            </label></td>
			
			
			
          </tr>
          <tr>
            <td colspan="2"><label></label>              <label></label>
            <div align="center">
              <label>              
			  <?php
			 //implementando a função abrir os.
			  if($_POST["btnConfirmar"]=="Abrir_OS")
			  {							
					if($tDesc==NULL || $tCodCli==NULL || $rdTipoOS==NULL || $sServico==NULL)
					{
						print "<h1>Não deixe campos em branco</h1><br>";
					}else
					{
						include_once "../classes/OS.class.php";
						$os=new OS($hNumOS,$tDesc,$tCodCli,$matricula,$rdTipoOS,$sServico);
						$val=$os->AbrirOS();
						print "<h1>OS nº ".$hNumOS." Aberta</h1>";
						//include "mail.php";					
					}										
			  }
			  
			  ?>
			  <input name="btnConfirmar" type="submit" id="btnConfirmar" value="Abrir_OS" />
              </label>
              <label>
              
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
