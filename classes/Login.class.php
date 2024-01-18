<?php
class Login
	{
		public	$login;
		public	$senha;		
		public	$mat;		
		
		function __construct($login,$senha,$mat)
		{
			$this->login=$login;
			$this->senha=$senha;			
			$this->matricula=$mat;			
		}
			
				function Logar()
				{					
					include_once 'controle.class.php';
					$controle=new controle();;
					$sql="SELECT * FROM usuario WHERE us_login='$this->login' AND us_senha='$this->senha' AND fc_cod=$this->matricula";
					$controle->setSQL($sql);											
					$linhas=$controle->ExecutarSQL();
					if($linhas==NULL)
					{													
						$num=0;
					}else
					{
						$num=$controle->numlinhas($linhas);
					}							
					
						if ($num==1)
						{
							$sql="SELECT cg_cod FROM funcionarios WHERE fc_cod=$this->matricula";
							$controle->setSQL($sql);					
							$controle->processaSelect();
							$cargo=$controle->MostraSelecao();	
							setcookie("cargo" , $cargo[0]);
							setcookie ("login", $this->login);
  							setcookie ("senha", $this->senha);
							setcookie ("funcionario", $this->matricula);
							
							return 'Logado';
						
						}else
						{							
							return 'Não Logado';
						}
					
				}				
				
				function Validar()
				{
					
						 //recuperando cookies
						$nome = $_COOKIE["login"];
						$senha = $_COOKIE["senha"];
						$func = $_COOKIE["funcionario"];
						/*//matando cookies
						setcookie("login");
						setcookie("senha");
						setcookie("funcionario");	*/					
									
					//print $nome.'-'.$senha.'-'.$func;
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT * FROM usuario WHERE us_login='$nome' AND us_senha='$senha' AND fc_cod=$func";	
						//matando as variáveis
						$nome = NULL;
						$senha = NULL;
						$func =  NULL;					
					$controle->setSQL($sql);					
					$linhas=$controle->ExecutarSQL();			
					$num=$controle->numlinhas($linhas);
											
						if ($num==1)
						{
							return 'ok';
						}else
						{
							return 'block';
						};
				}
				
				function Deslogar()
				{					
					setcookie("login","",time()-3600);
					setcookie("senha","",time()-3600); 
					setcookie("funcionarios","",time()-3600); 
					setcookie("cargo","",time()-3600); 
				}
				
				function LogarCLI()
				{					
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT * FROM usuario_cli WHERE login='$this->login' AND senha='$this->senha' AND cl_cod=$this->matricula";
					$controle->setSQL($sql);											
					$linhas=$controle->ExecutarSQL();															
					if($linhas==NULL)
					{													
						$num=0;
					}else
					{
						$num=$controle->numlinhas($linhas);
					}	
																				
					
						if ($num==1)
						{							
							setcookie("cargo" , 60);
							setcookie ("login", $this->login);
  							setcookie ("senha", $this->senha);
							setcookie ("cliente", $this->matricula);
							
							return 'Logado';
						
						}else
						{							
							return 'Não Logado';
						}
					
				}		
				
				function ValidarCLI()
				{
					
						 //recuperando cookies
						$nome = $_COOKIE["login"];
						$senha = $_COOKIE["senha"];
						$func = $_COOKIE["cliente"];
						/*//matando cookies
						setcookie("login");
						setcookie("senha");
						setcookie("funcionario");	*/					
									
					//print $nome.'-'.$senha.'-'.$func;
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT * FROM usuario_cli WHERE login='$nome' AND senha='$senha' AND cl_cod=$func";	
						//matando as variáveis
						$nome = NULL;
						$senha = NULL;
						$func =  NULL;					
					$controle->setSQL($sql);					
					$linhas=$controle->ExecutarSQL();			
					$num=$controle->numlinhas($linhas);
											
						if ($num==1)
						{
							return 'ok';
						}else
						{
							return 'block';
						};
				}
				
				function DeslogarCLI()
				{					
					setcookie("login","",time()-3600);
					setcookie("senha","",time()-3600); 
					setcookie("cliente","",time()-3600); 
					setcookie("cargo","",time()-3600); 
				}
	}
?>
