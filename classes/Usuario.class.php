<?php
	class Usuario
	{
		public	$login;
		public	$senha;		
		public	$matricula;		
		
		function __construct($login,$senha,$mat)
		{
			$this->login=$login;
			$this->senha=$senha;			
			$this->matricula=$mat;			
		}
				
		function retornaLogin($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT us_login FROM usuario WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$login=$controle->retornaCampo();
			return $login[0];
		}
		function retornaSenha($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT us_senha FROM usuario WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$senha=$controle->retornaCampo();
			return $senha[0];
		}
		
		function retornaMatricula()
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_cod FROM usuario WHERE us_login='$this->login' AND us_senha='$this->senha'";			
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$mat=$controle->retornaCampo();
			return $mat[0];
		}
						
		function IncluirUsuario()
		{			
			include_once 'controle.class.php';
			$controle=new controle();				
			$sql="INSERT INTO usuario (us_login,us_senha,fc_cod) VALUES ('$this->login','$this->senha',$this->matricula)";			
			$controle->setSQL($sql);
			$controle->ExecutarSQL();		
					
		}
		function ExcluirUsuario()
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="DELETE FROM usuario WHERE fc_cod=";
			$sql.="$this->matricula";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();		
		}
		
		function EditarUsuario()
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="UPDATE usuario SET 
			us_login='$this->login',
			us_senha='$this->senha'
			WHERE 
			fc_cod='$this->matricula'";			
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
		}			
	}
?>