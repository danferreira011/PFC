<?php
	//nome da classe
	 class Cliente
		{
		//protected variaveis
			protected		$cod_cli;		
			protected		$status;			
			protected		$rua;
			protected		$numero;
			protected       $bairro;
			protected       $cidade;
			protected       $estado;
			protected       $cep;
			protected       $pais;
			protected		$tel;
			protected		$cel;
			protected		$email;
			protected		$tipocliente;
				//metodo construtor
				
				function __construct($cod_cli,$status,$rua,$numero,$bairro,$cidade,$estado,$cep,$pais,$tel,$cel,$email,$tipocliente)
				{
					$this->cod_cli=$cod_cli;					
					$this->status=$status;					
					$this->rua=$rua;
					$this->numero=$numero;
					$this->bairro=$bairro;
					$this->cidade=$cidade;
					$this->estado=$estado;
					$this->cep=$cep;
					$this->pais=$pais;
					$this->tel=$tel;
					$this->cel=$cel;
					$this->email=$email;
					$this->tipocliente=$tipocliente;
				}
				
				function retornaTipo($id)
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT tpc_cod FROM clientes WHERE cl_cod=";
					$sql.= "$id";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					$tipo=$controle->retornaCampo();
					return $tipo[0];			
				}	
				function retornaNome($id)
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT cl_nm_rs FROM clientes WHERE cl_cod=";
					$sql.= "$id";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					$nome=$controle->retornaCampo();
					return $nome[0];			
				}	
				function retornaSobrenome($id)
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT cl_sn_nf FROM clientes WHERE cl_cod=";
					$sql.= "$id";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					$sobrenome=$controle->retornaCampo();
					return $sobrenome[0];			
				}	
				function retornaCPF($id)
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT cl_cp_cn FROM clientes WHERE cl_cod=";
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
					$sql="SELECT cl_rg_ie FROM clientes WHERE cl_cod=";
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
					$sql="SELECT cl_tel FROM clientes WHERE cl_cod=";
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
					$sql="SELECT cl_cel FROM clientes WHERE cl_cod=";
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
					$sql="SELECT cl_email FROM clientes WHERE cl_cod=";
					$sql.= "$id";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					$email=$controle->retornaCampo();
					return $email[0];			
				}	
				function retornaStatus($id)
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT st_cod FROM clientes WHERE cl_cod=";
					$sql.= "$id";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					$status=$controle->retornaCampo();
					return $status[0];			
				}
				function retornaRua($id)
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT ec_rua FROM endereco WHERE cl_cod=";
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
					$sql="SELECT ec_num FROM endereco WHERE cl_cod=";
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
					$sql="SELECT ec_bairro FROM endereco WHERE cl_cod=";
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
					$sql="SELECT ec_cidade FROM endereco WHERE cl_cod=";
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
					$sql="SELECT ec_estado FROM endereco WHERE cl_cod=";
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
					$sql="SELECT ec_cep FROM endereco WHERE cl_cod=";
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
					$sql="SELECT ec_pais FROM endereco WHERE cl_cod=";
					$sql.= "$id";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					$pais=$controle->retornaCampo();
					return $pais[0];			
				}
				function retornaNumLinhas($linhas)
				{
					include_once 'controle.class.php';
					$controle=new controle();	
					$num=$controle->numlinhas($linhas);
					return $num;
				}
				
				function retornaLinhas()
				{
					include_once 'controle.class.php';
					$controle=new controle();	
					$sql="SELECT * FROM clientes";
					$controle->setSQL($sql);
					$linhas=$controle->ExecutarSQL();		
					$num=$controle->numlinhas($linhas);
					return $num;
				}
				function SelecionarCLI($nome)
				{
					include_once 'controle.class.php';
					$controle=new controle();	
					$sql="SELECT cl_cod,cl_nm_rs,cl_sn_nf FROM clientes WHERE cl_nm_rs LIKE '%$nome%' OR cl_sn_nf LIKE '%$nome%'";
					$controle->setSQL($sql);
					$controle->processaSelect();					
					while ($col=$controle->MostraSelecao())
					{						
						print'<tr>
						<th scope="row">'.$col[0].'</th>
						<td>'.$col[1].' - '.$col[2].'</td>
					  </tr>';
					
					} 
				}
				
				function retornaCod($login,$senha)
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT cl_cod FROM usuario_cli WHERE login='$login' AND senha='$senha'";			
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					$cod=$controle->retornaCampo();
					return $cod[0];
				}
				
				function retornaLoginCLI($id)
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT login FROM usuario_cli WHERE fc_cod=";
					$sql.= "$id";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					$login=$controle->retornaCampo();
					return $login[0];
				}
				
				function IncluirUsCli($login,$senha,$cod)
				{			
					include_once 'controle.class.php';
					$controle=new controle();				
					$sql="INSERT INTO usuario_cli (login,senha,cl_cod) VALUES ('$login','$senha',$cod)";			
					$controle->setSQL($sql);
					$controle->ExecutarSQL();		
							
				}
		}
?>