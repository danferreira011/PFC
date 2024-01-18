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
      <p class="style1">Cadastrar Funcionario </p>
      <form id="form1" name="form1" method="post" action="">
        <div align="left">
        <table width="80%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td width="20%">
              <label><br />
			   <?php 
			   
			   	//PEGANDO VALORES DOS INPUTS
				$tMatricula=$_POST["tMatricula"];
				 
				  if($_POST["btnCadastrar"]=='Cadastrar')
				  {
					include '../classes/classes_func.php';
					$tMatricula=$func->retornaLinhas()+1;
				  }
			  
				$tNome=$_POST["tNome"];
				$tCPF=$_POST["tCPF"];
				$tRG=$_POST["tRg"];
				$tTel=$_POST["tTel"];
				$tCel=$_POST["tCel"];
				$tEmail=$_POST["tEmail"];
				$cg=$_POST["cg"];			
				$tRua=$_POST["tRua"];
				$tNumero=$_POST["tNumero"];	
				$tBairro=$_POST["tBairro"];	
				$tCidade=$_POST["tCidade"];	
				$tEstado=$_POST["tUF"];
				$tCep=$_POST["tCep"];				
				$tPais=$_POST["tPais"];		
			  
			   //IMPLEMENTANDO O BOTÃO CARREGAR 		
			 
			 if ($_POST["btnCarregar"]=='Carregar')
			 { 				
				include '../classes/classes_func.php';
				$nome=$func->retornaNome($tMatricula);
				$cpf=$func->retornaCPF($tMatricula);
				$rg=$func->retornaRG($tMatricula);
				$tel=$func->retornaTel($tMatricula);
				$cel=$func->retornaCel($tMatricula);
				$email=$func->retornaEmail($tMatricula);
				$cargo=$func->retornaCodCargo($tMatricula);
				$rua=$func->retornaRua($tMatricula);
				$numero=$func->retornaNumero($tMatricula);
				$bairro=$func->retornaBairro($tMatricula);
				$cidade=$func->retornaCidade($tMatricula);
				$uf=$func->retornaUF($tMatricula);
				$cep=$func->retornaCep($tMatricula);
				$pais=$func->retornaPais($tMatricula);
				
			};
						  
			if($tMatricula==NULL)
			{
				$tMatricula='Matricula';
			}		
	  ?>
              Matricula
              <br />
             
			  
			  <input name="tMatricula" type="text" id="tMatricula"  value="<?php print $tMatricula;?>" size="5" maxlength="5" />
			  <br />
              <br />
              Codigo Cargo</label>
              <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <tr>
                  <th sccge="row"> <div align="left">
				  <?php
				  
				  //RADIO GROUP EM PHP
				  
			  	for($i=1;$i<4;$i++)
				{
					if ($cargo==$i)
					  {
					  	print '<input name="cg" type="radio" value="'.$cargo.'" checked="checked"/>';
					  }else
					  {					
						print '<input name="cg" type="radio" value="'.$i.'" />';
						}	
					
					if($i==1)
					  {
						print '1-Gerente<br>';	
					  }else if ($i==2)
					  {
						print '2-Técnico<br>';
						
					  }else if ($i==3)
					  {
						print '3-Operador<br>';
					  };
					  
				};				
			  ?>
                  </div>
                    
</th>
                </tr>
              </table>
              <label><br />
			  
              <br />
              <br />
              <br />
              </label></td>
            <td width="80%">Nome<br />
              <label>
             
			  <input name="tNome" type="text" id="tNome" size="50"  value="<?php print $nome;?>" />
              <br />
              <br />
              CPF 
              <input name="tCPF" type="text" id="tCPF"  value="<?php print $cpf;?>" size="11" maxlength="11" />
              <br />
              <br />
              RG 
              <input name="tRg" type="text" id="tRg"  value="<?php print $rg; ?>" size="10" maxlength="10" />
              <br />
              <br />
              
              Rua 
              <input name="tRua" type="text" id="tRua" size="50"  value="<?php print $rua; ?>" />
              N&ordm;
              <input name="tNumero" type="text" id="tNumero"  size="5" maxlength="5" value="<?php print $numero;?>"/>
              <br />
              <br />
              Bairro<br />
              <input name="tBairro" type="text" id="tBairro" size="30"  value="<?php print $bairro;?>" />
              <br />
              <br />
              Cidade<br />
              <input name="tCidade" type="text" id="tCidade"  value="<?php print $cidade;?>" size="30" />
              Estado
              <input name="tUF" type="text" id="tUF"  value="<?php print $uf;?>" size="2" maxlength="2" />
              <br />
              <br />
              CEP<br />
              <input name="tCep" type="text" id="tCep"  value="<?php print $cep;?>" size="16" maxlength="8" />
              Pais
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
            <td><label><br />
                <br />
              </label></td>
            <td><label>Contatos:<br />
              <br />
            Telefone: 
              <input name="tTel" type="text" id="tTel"  value="<?php print $tel;?>" size="10" maxlength="10" />
              Celular:
              <input name="tCel" type="text" id="tCel"  value="<?php print $cel;?>" size="20" maxlength="10" />
              <br />
              <br />
              email:<br /> 
              <input name="tEmail" type="text" size="50"  value="<?php print $email;?>" />
            </label></td>
          </tr>
          <tr>
            <td colspan="2"><label></label>              <label></label>
            <div align="center">
              <label>
			  
			   <?php
			  if($_POST["btnCadastrar"]=='Cadastrar')
			  {
			  	//IMPLEMENTANDO O METODO INCLUIR			
				
				if($tNome==NULL || $tCPF==NULL || $tRG==NULL || $tTel==NULL || $tCel==NULL || $tEmail==NULL || $cg==NULL || $tRua==NULL || $tNumero==NULL || $tBairro==NULL ||	$tCidade==NULL || $tEstado==NULL || $tCep==NULL || $tPais==NULL)
				{
					print "Verifique se existe campos vazios ou com erros!!!<br>";
				}	else
				{					
					include '../classes/classes_func.php';								
					$teste=$func->Incluir();
						if($teste==$tMatricula)
						{
							print "<h1>Funcionário ".$tMatricula." Incluido<br></h1>";
						}
				}	
			  }
			  ?>
			  
              <input name="btnCarregar" type="submit" value="Carregar" />
			  
              <input name="btnCadastrar" type="submit" value="Cadastrar" />			 
			  </label>
              </label>
              
              <input name="btnAlterar" type="submit" value="Alterar" />
			  <?php 
			  
			  //METODO ALTERAR
			  
			  if($_POST["btnAlterar"]=='Alterar')
			  {				
				include '../classes/classes_func.php';
				$func->Alterar();					
			  };
			  ?>
              <input name="btnDeletar" type="submit" value="Deletar" />
			  <?php
			
			//METODO EXCLUIR
			
			  		if($_POST["btnDeletar"]=='Deletar')
					{
						
						include '../classes/classes_func.php';
						$func->Excluir();			
					}
			  ?>
            </div></td>
            </tr>
        </table>        
        </form>      
    </div></td>
  </tr>
</table>

</body>
</html>
