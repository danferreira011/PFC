<?php
	abstract class Funcionario
	{
		protected		$matricula;
		protected		$nome;
		protected		$cpf;
		protected		$rg;
		protected		$telefone;
		protected 		$celular;
		protected		$email;
		protected		$cod_cargo;		
        protected		$rua;
		protected		$numero;
		protected       $bairro;
		protected       $cidade;
		protected       $estado;
		protected       $cep;
		protected       $pais;
	
				function __construct($matricula,$nome,$cpf,$rg,$telefone,$celular,$email,$cod_cargo,$rua,$numero,$bairro,$cidade,$estado,$cep,$pais)
				{
					$this->matricula=$matricula;
					$this->nome=$nome;
					$this->cpf=$cpf;
					$this->rg=$rg;
					$this->telefone=$telefone;
					$this->celular=$celular;
					$this->email=$email;
					$this->cod_cargo=$cod_cargo;					
					$this->rua=$rua;
					$this->numero=$numero;
					$this->bairro=$bairro;
					$this->cidade=$cidade;
					$this->estado=$estado;
					$this->cep=$cep;
					$this->pais=$pais;
				}								
				
		
		function retornaNome($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_nome FROM funcionarios WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$nome=$controle->retornaCampo();
			return $nome[0];			
		}	
		function retornaCPF($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_cpf FROM FUNCIONARIOS WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$cpf=$controle->retornaCampo();
			return $cpf[0];			
		}
		function retornaRG($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_rg FROM FUNCIONARIOS WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$rg=$controle->retornaCampo();
			return $rg[0];			
		}	
		function retornaTel($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_tel FROM FUNCIONARIOS WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$tel=$controle->retornaCampo();
			return $tel[0];			
		}
		function retornaCel($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_cel FROM FUNCIONARIOS WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$cel=$controle->retornaCampo();
			return $cel[0];			
		}
		function retornaEmail($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_email FROM FUNCIONARIOS WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$email=$controle->retornaCampo();
			return $email[0];			
		}	
		function retornaCodCargo($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT cg_cod FROM FUNCIONARIOS WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$cargo=$controle->retornaCampo();
			return $cargo[0];			
		}
		function retornaRua($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT ec_rua FROM endereco_func WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$rua=$controle->retornaCampo();
			return $rua[0];			
		}
		function retornaNumero($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT ec_num FROM endereco_func WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$numero=$controle->retornaCampo();
			return $numero[0];			
		}
		function retornaBairro($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT ec_bairro FROM endereco_func WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$bairro=$controle->retornaCampo();
			return $bairro[0];			
		}
		function retornaCidade($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT ec_cidade FROM endereco_func WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$cidade=$controle->retornaCampo();
			return $cidade[0];			
		}	
		function retornaUF($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT ec_estado FROM endereco_func WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$uf=$controle->retornaCampo();
			return $uf[0];			
		}	
		function retornaCep($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT ec_cep FROM endereco_func WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$cep=$controle->retornaCampo();
			return $cep[0];			
		}
		function retornaPais($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT ec_pais FROM endereco_func WHERE fc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$pais=$controle->retornaCampo();
			return $pais[0];			
		}		
		function retornaLinhas()
		{
			include_once 'controle.class.php';
			$controle=new controle();	
			$sql="SELECT * FROM funcionarios";
			$controle->setSQL($sql);
			$linhas=$controle->ExecutarSQL();
			
			$num=$controle->numlinhas($linhas);
			return $num;
		}
		
				
		function Incluir()
		{
			//faz conexão com o controle
			include_once 'controle.class.php';
			$controle=new controle();	
			$sql="INSERT INTO endereco_func (fc_cod,ec_rua,ec_num,ec_bairro,ec_cidade,ec_estado,ec_cep,ec_pais) VALUES";
			$sql.="($this->matricula,'$this->rua','$this->numero','$this->bairro','$this->cidade','$this->estado','$this->cep','$this->pais')";			
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			
			$sql="INSERT INTO funcionarios (fc_cod,fc_nome,fc_cpf,fc_rg,fc_tel,fc_cel,fc_email,cg_cod) VALUES";
			$sql.="($this->matricula,'$this->nome','$this->cpf','$this->rg','$this->telefone','$this->celular','$this->email','$this->cod_cargo')";		
			$controle->setSQL($sql);
			$controle->ExecutarSQL();			
			
			$sql="SELECT fc_cod FROM funcionarios WHERE fc_cod=$this->matricula";
			$controle->setSQL($sql);
 			$controle->processaSelect();	
			$col=$controle->MostraSelecao();			
			return $col[0];			
		}
		
		function Alterar()
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="UPDATE funcionarios SET fc_nome='$this->nome', fc_cpf='$this->cpf', fc_rg='$this->rg', fc_tel='$this->telefone',fc_cel='$this->celular', cg_cod='$this->cod_cargo' WHERE fc_cod='$this->matricula'";					
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					
					
					$sql="UPDATE endereco_func SET ec_rua='$this->rua',ec_num='$this->numero',ec_bairro='$this->bairro',ec_cidade='$this->cidade',ec_estado='$this->estado',ec_cep='$this->cep', ec_pais='$this->pais' WHERE fc_cod='$this->matricula'";					
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					
										
				}
		
				function Excluir()
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="DELETE FROM funcionarios WHERE fc_cod=";
					$sql.="($this->matricula)";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					
					$sql="DELETE FROM endereco_func WHERE fc_cod=";
					$sql.="($this->matricula)";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					
				}
				function SelecionarFUN($nome)
				{
					include_once 'controle.class.php';
					$controle=new controle();	
					$sql="SELECT fc_cod,fc_nome FROM funcionarios WHERE fc_nome LIKE '$nome%'";
					$controle->setSQL($sql);
					$controle->processaSelect();
					
					while ($col=$controle->MostraSelecao())
					{
						print '<tr>
						<th scope="row">'.$col[0].'</th>
						<td>'.$col[1].'</td>
					  </tr>';
					} 
				}	
				
	}
?>