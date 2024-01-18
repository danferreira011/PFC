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
      <p class="style1">Cadastrar Usuario - Funcion&aacute;rio </p>
      <form id="form1" name="form1" method="post" action="">
	  <?php
	  //valores
	  $tMatricula=$_POST["tMatricula"];	  
	  $tLogin=$_POST["tLogin"];
	  $tSenha=$_POST["tSenha"];
	  
	 
	  ?>
        <div align="left">
        <table width="80%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <div align="center">
                <p>Matricula: 
                  <input name="tMatricula" type="text" id="tMatricula" value="<?php print $tMatricula;?>" size="5" maxlength="5" />
                </p>
                <p>Login:
                  <input name="tLogin" type="text" id="tLogin" value="<?php print $login;?>" size="10" maxlength="10" />
                  <br />  
                    <br />
                  Senha: 
                  <input name="tSenha" type="password" id="tSenha" value="<?php print $senha;?>" size="8" maxlength="8" />
                </p>
                <p>
                  <label>
                  <input name="btnCad" type="submit" id="btnCad" value="Cadastrar" />
				  <input type="reset" name="Submit2" value="Limpar" />
				  <?php
				  if($_POST["btnCad"]=="Cadastrar")
				  {
				  		 if($tLogin==NULL || $tSenha==NULL ||$tMatricula==NULL)
						 {
						 	print "<br><br>Não deixe campos vazios";
						 }else
						 {
							 include_once "../classes/Usuario.class.php";
							 $usu=new Usuario($tLogin,$tSenha,$tMatricula);
							 $login=$usu->retornaLogin($tMatricula);
							 if(isset($login))
							 {
								print '<br><br>Usuário Já Cadastrado';
							 }else
							 {
							 $usu->IncluirUsuario();
							 print '<br><br>Incluido novo Usuário';
							 }
						}
				  }
				  ?>
                  </label>
                  <label>
                  
                  </label>
                </p>
              </div>
            </label></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
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
