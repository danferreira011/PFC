<?php
include 'trava.php';
?>
<?php		
			if($_POST["btnPedido"]=="Gera_Pedido")
			{
				include "../classes/Pedido.class.php";
				$ped=new Pedido($numped,$tItem,$tQuant,$tDesc,$tCli);
				$numped= $ped->retornaLinhas();
				setcookie("numped", $numped+1);
				$numped= $_COOKIE["numped"];				
			}	
			
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th scope="row"><p class="style1">Fazer Pedido
        <?php	
	  $numped= $_COOKIE["numped"];	
		$tItem=$_POST["tItem"];
		$tQuant=$_POST["tQuant"];
		$tDesc=$_POST["tDesc"];
		$tCli=$_POST["tCli"];		
		
		
		//implementação do botão gerar_pedido
		if($_POST["btnPedido"]=="Gera_Pedido")
		{
			
			$ped=new Pedido($numped,$tItem,$tQuant,$tDesc,$tCli);
			$numped= $ped->retornaLinhas()+1;				
			$ped=new Pedido($numped,$tItem,$tQuant,$tDesc,$tCli);
			$ped->GerarPedido();			
		}	
		
		//implementação do botão inserir
		if($_POST["btnIns"]=="Inserir")
		{			
			include "../classes/Pedido.class.php";
			$numped= $_COOKIE["numped"];				
			$ped=new Pedido($numped,$tItem,$tQuant,$tDesc,$tCli);
			$ped->InserirItens();
		}
		
		//Implementatndo botão Limpar
		if($_POST["btnLimpar"]=="Limpar")
		{
			
		}
		?>
    </p>
      <div align="center">
        <table width="50%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th scope="row"><label><br />
              </label>
              <form id="form1" name="form1" method="post" action="">
                N&uacute;mero do Cliente:
                <input name="tCli" type="text" id="tCli" value="<?php print $tCli; ?>" size="3" maxlength="3" />
                <br />
                <a href="#" onclick="window.open('http://localhost/PFC/Interfaces_PFC/consulta_cli.php','Janela','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=300,height=500'); return false;">consultar cliente</a><br />
                <br />
                <input name="btnPedido" type="submit" id="btnPedido" value="Gera_Pedido" />
                <br />
                <br />
N&uacute;mero do Pedido:
<?php				  		   
			  	print $numped;
			?>
              </form>
              <label><br />
              </label></th>
            <td><form id="form2" name="form2" method="post" action="">
              Item:
              <label>
              <input name="tItem" type="text" id="tItem" value="<?php print $tItem+1; ?>" size="3" maxlength="3" />
              <br />
              <br />
Quantidade:
<input name="tQuant" type="text" id="tQuant" size="3" maxlength="3" />
<br />
<br />
Descri&ccedil;&atilde;o:
<input name="tDesc" type="text" id="tDesc" size="30" maxlength="30" />
<br />
<br />
<input name="btnIns" type="submit" id="btnIns" value="Inserir" />
<input name="btnLimpar" type="submit" id="btnLimpar" value="Limpar" />
<input name="btnFecha" type="submit" id="btnFecha" value="Fechar_Pedido" onClick="action='fecha_ped.php'"/>
              </label>
            </form>
            <label></label></td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <p class="style1">&nbsp; </p></th>
  </tr>
</table>
</body>
</html>
