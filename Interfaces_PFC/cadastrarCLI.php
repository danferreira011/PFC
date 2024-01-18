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
      <p class="style1">Cadastrar Cliente </p>
      <form id="form1" name="form1" method="post" action="">
        <div align="left">
        <table width="80%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td width="21%">
              <label><br />
              <?php 
			   
			   	//PEGANDO VALORES DOS INPUTS
				$tCod=$_POST["tCod"];	
				 if($_POST["btnCadastrar"]=='Cadastrar')
				  {
					include '../classes/classes_cli.php';
					$tCod=$cli->retornaLinhas()+1;
				  }	  
				$tNome=$_POST["tNome"];
				$tSNome=$_POST["tSNome"];
				$tCP_CN=$_POST["tCP_CN"];
				$tRG_IE=$_POST["tRG_IE"];
				$rdTipo=$_POST["rdTipo"];				
				$rdStatus=$_POST["rdStatus"];
				$tTel=$_POST["tTel"];
				$tCel=$_POST["tCel"];
				$tEmail=$_POST["tEmail"];							
				$tRua=$_POST["tRua"];
				$tNumero=$_POST["tNumero"];	
				$tBairro=$_POST["tBairro"];	
				$tCidade=$_POST["tCidade"];	
				$tEstado=$_POST["tEstado"];
				$tCep=$_POST["tCep"];	
				$tPais=$_POST["tPais"];		
			   		   
			   //IMPLEMENTANDO O BOTÃO CARREGAR 			
				 if ($_POST["btnCarregar"]=='Carregar')
			 { 				
				include '../classes/classes_cli.php';
				$tipo=$cli->retornaTipo($tCod);				
				$nome=$cli->retornaNome($tCod);
				$sobrenome=$cli->retornaSobrenome($tCod);
				$cpf=$cli->retornaCPF($tCod);
				$rg=$cli->retornaRG($tCod);
				$tel=$cli->retornaTel($tCod);
				$cel=$cli->retornaCel($tCod);
				$email=$cli->retornaEmail($tCod);
				$status=$cli->retornaStatus($tCod);
				$rua=$cli->retornaRua($tCod);
				$numero=$cli->retornaNumero($tCod);
				$bairro=$cli->retornaBairro($tCod);
				$cidade=$cli->retornaCidade($tCod);
				$uf=$cli->retornaUF($tCod);
				$cep=$cli->retornaCep($tCod);
				$pais=$cli->retornaPais($tCod);		
				
										
			};		
	  ?>
			  
			  Codigo Cliente
              <br />
              <input name="tCod" type="text" id="tCod" value="<?php print $tCod;?>" size="2" maxlength="2"  />
              <br />
              <br />
              Tipo Cliente</label><br>
              <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <tr>
                  <th scope="row"><div align="left">
                    <?php
				  
				  //RADIO GROUP EM PHP
				  
			  	for($i=1;$i<3;$i++)
				{
					if ($tipo==$i)
					  {
					  	print '<input type="radio" name="rdTipo" value="'.$tipo.'"  checked="checked" />';
					  }else
					  {					
						print '<input type="radio" name="rdTipo" value="'.$i.'" />';
						}	
					
					if($i==1)
					  {
						print '1-Pessoa Física<br>';	
					  }else if ($i==2)
					  {
						print '2-Pessoa Jurídica<br>';
						
					  }
					  
				}				
			  ?>
                  </div></th>
                </tr>
              </table>
              <br>
              <p><br />
              </p>
              <label>Status<br />
              </label>
              <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <tr>
                  <th scope="row"> 
                    <div align="left">
                      <?php
			  for($i=1;$i<5;$i++)
				{
					if ($status==$i)
					  {
					  	print '<input type="radio" name="rdStatus" value="'.$status.'" checked="checked" />';
					  }else
					  {					
						print '<input type="radio" name="rdStatus" value="'.$i.'" />';
						}	
					
					if($i==1)
					  {
						print '1-Master<br>';	
					  }else if ($i==2)
					  {
						print '2-Premium<br>';						
					  }else if ($i==3)
					  {
					  	print '3-Básico<br>';
					  }else if ($i==4)
					  {
					  	print '4-Inativo<br>';
					  }					  
				}				
			  ?>
                  </div></th></tr>
              </table>
              <br>
              <label><br />
              </label></td>
            <td width="79%">Nome / Raz&atilde;o Social<br />
              <label>
              <input name="tNome" type="text" id="tNome" value="<?php print $nome;?>" size="50" maxlength="50"  />
              <br />
              Sobrenome / Nome Fantasia<br />
              <input name="tSNome" type="text" id="tSNome" value="<?php print $sobrenome;?>" size="50" maxlength="50"  />
              <br />
              CPF/CNPJ<br />
              <input name="tCP_CN" type="text" id="tCP_CN" value="<?php print $cpf;?>" size="15" maxlength="15"  />
              <br />
              RG/IE<br />
              <input name="tRG_IE" type="text" id="tRG_IE" value="<?php print $rg;?>" size="15" maxlength="15"  />
              <br />
              Rua<br />
              <input name="tRua" type="text" id="tRua" value="<?php print $rua;?>" size="50" maxlength="50"  /> 
              N&ordm;
              <input name="tNumero" type="text" id="tNumero" value="<?php print $numero;?>" size="5" maxlength="5"  /> 
              <br />
              Bairro<br />
              <input name="tBairro" type="text" id="tBairro" value="<?php print $bairro;?>" size="20" maxlength="20"  />
              <br />
              Cidade<br />
              <input name="tCidade" type="text" id="tCidade" value="<?php print $cidade;?>" size="30" maxlength="30"  />
			cep 
			<input name="tCep" type="text" id="tCep" value="<?php print $cep;?>" size="8" maxlength="8"  />              
			Estado 
               <input name="tEstado" type="text" id="tEstado" value="<?php print $uf;?>" size="2" maxlength="2"  />
               Pa&iacute;s 
               <input name="tPais" type="text" id="tPais" size="20"   
			  <?php
			  if($pais==NULL)
			  {
			  	print 'value="Brasil"';
			  }else
			  {
			  print 'value="'.$pais.'"';
			  };
			  ?>
			  />
              </label></td>
          </tr>
          <tr>
            <td><label></label></td>
            <td><label>Contatos:<br />
              <br />
            Telefone: 
              <input name="tTel" type="text" id="tTel" value="<?php print $tel;?>" size="10" maxlength="10"  /> 
              Celular: 
              <input name="tCel" type="text" id="tCel" value="<?php print $cel;?>" size="10" maxlength="10"  />
              <br />
              <br />
              
              email: 
              <input name="tEmail" type="text" id="tEmail" value="<?php print $email;?>" size="50" maxlength="50"  />
            </label></td>
          </tr>
          <tr>
            <td colspan="2"><label></label>              <label></label>
            <div align="center">
              <label>
              
			  <?php
			  if($_POST["btnCadastrar"]=='Cadastrar')
			  {
					if($tNome==NULL || $tSNome==NULL || $tCP_CN==NULL || $tRG_IE==NULL || $tRG_IE==NULL || $rdTipo==NULL || $rdStatus==NULL || $tTel==NULL || $tCel==NULL ||$tEmail==NULL || $tRua==NULL || $tNumero==NULL || $tBairro==NULL || $tCidade==NULL || $tEstado==NULL || $tCep==NULL || $tPais==NULL)
					{
						print "Verifique se existe campos vazios ou com erros!!!<br>";
					}else
					{							
						include '../classes/classes_cli.php';
						
						if ($rdTipo==1)
						{				
							$teste=$cli->IncluirPF();
						}else if($rdTipo==2)
						{
							$teste=$cli->IncluirPJ();
						}
						
						if($teste==$tCod)
						{
							print "<h2>Cliente ".$tCod." cadastrado com sucesso</h2><br>";
						}
					}
			  }			  
			  ?>
			  <input name="btnCarregar" type="submit" id="btnCarregar" value="Carregar" />			  
              <input name="btnCadastrar" type="submit" id="btnCadastrar" value="Cadastrar" />
              <input name="btnAlterar" type="submit" id="btnAlterar" value="Alterar" />
			  <?php 
			  
			  //METODO ALTERAR
			  
			  if($_POST["btnAlterar"]=='Alterar')
			  {				
				include '../classes/classes_cli.php';					
				if ($rdTipo==1)
				{				
					$cli->AlterarPF();
				}else
				{
					$cli->AlterarPJ();
				}				
			  };
			  ?>
              </label>
              <label><br>
              </label>
            </div></td>
            </tr>
        </table>
        <p>
          <label></label>
          <label></label><label></label><label></label></p>
        </form>
      
    </div></td>
  </tr>
</table>
</body>
</html>
