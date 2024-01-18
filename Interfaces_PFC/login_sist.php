<?php
$tUsu=$_POST["tUsu"];
$tSenha=$_POST["tSenha"];
$Pini= '<p><a href="http://localhost/PFC/Interfaces_PFC/index_sist.htm">Ir para a p&aacute;gina inicial</a><br />
          </p>';

	if($_POST["rdLog"]==1)
	{
			if($_POST["btnConfirmar"]=='Confirmar')
			{		  		
				$tUsu=$_POST["tUsu"];
				$tSenha=$_POST["tSenha"];
				if ($tUsu==NULL || $tSenha==NULL )
				{
					$id='Não deixe campos em branco';
				}else
				{
				include '../classes/Usuario.class.php';	
				$usu=new Usuario($tUsu,$tSenha,0);
				$mat=$usu->retornaMatricula();			
				include '../classes/Login.class.php';				
				$user= new Login($tUsu,$tSenha,$mat);
				$id=$user->Logar();				
				}				
			}
	}else if ($_POST["rdLog"]==2)
	{
			if($_POST["btnConfirmar"]=='Confirmar')
			{		  		
				$tUsu=$_POST["tUsu"];
				$tSenha=$_POST["tSenha"];
				if ($tUsu==NULL || $tSenha==NULL )
				{
					$id='Não deixe campos em branco';
				}else
				{
				include '../classes/Cliente.class.php';
				$usu=new Cliente($cod_cli,$status,$rua,$numero,$bairro,$cidade,$estado,$cep,$pais,$tel,$cel,$email,$tipocliente);
				$mat=$usu->retornaCod($tUsu,$tSenha);
					if ($mat<>NULL)
					{
						include '../classes/Login.class.php';
						$user= new Login($tUsu,$tSenha,$mat);
						$id=$user->LogarCLI();
					}
				
				}
			}
			
	}
			if ($id=='Logado')
			{
				print '<meta http-equiv="refresh" content="3;URL=http://localhost/PFC/Interfaces_PFC/index_sist.htm" />
';		
			}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DR.Will - Solutions</title>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">  
  <tr>
    <th scope="row"><h1>LOGIN</h1>
      <h1><img src="../login.gif" alt="Login" width="250" height="248" /></h1>
      <form id="form1" name="form1" method="post" action="">
        <div align="center">
          <table width="30%" border="1" cellpadding="0" cellspacing="0" bgcolor="#999999">
            <tr>
              <th width="50%" scope="row"><div align="left"><input name="rdLog" type="radio" value="1" checked="checked" />
                Funcion&aacute;rio</div>
                </label></th>
              <td width="50%"><label>
                <div align="left">
                  <input name="rdLog" type="radio" value="2" />
                Cliente
                </label>
              </div></td>
            </tr>
            <tr>
              <th colspan="2" scope="row"><br />
                Usu&aacute;rio.: 
                <label>
                <input name="tUsu" type="text" id="tUsu" size="10" maxlength="10" />
                <br />
              </label></th>
            </tr>
            <tr>
              <th colspan="2" scope="row"><br />
                Senha.:    
                <label>
                <input name="tSenha" type="password" id="tSenha" size="8" maxlength="8" />
                <br />
              </label></th>
            </tr>
            <tr>
              <th colspan="2" scope="row"><label>
                <br />
                <input name="btnConfirmar" type="submit" id="btnConfirmar" value="Confirmar" />
                <input type="reset" name="Submit2" value="Limpar" />
                <br />
              </label></th>
            </tr>
          </table>
          <p><?php
			print '<center>'.$id.'</center><br><br>';	
			if ($id=='Logado')
			{
				print '<center>'.$Pini.'</center>';		
			}	
			?>	</p>
          
        </div>
      </form>
    </th>
  </tr>
</table>
</body>
</html>
