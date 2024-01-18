<?php
	include_once 'Cliente.class.php';
	class PessoaJuridica extends Cliente
	{
		var		$razaosocial;
		var		$nomefantasia;
		var		$cnpj;
		var		$ie;
			function __construct($cod_cli,$status,$rua,$numero,$bairro,$cidade,$estado,$cep,$pais,$tel,$cel,$email,$tipocliente,$razaosocial,$nomefantasia,$cnpj,$ie)
			{
				parent::__construct($cod_cli,$status,$rua,$numero,$bairro,$cidade,$estado,$cep,$pais,$tel,$cel,$email,$tipocliente);
				$this->razaosocial=$razaosocial;
				$this->nomefantasia=$nomefantasia;
				$this->cnpj=$cnpj;
				$this->ie=$ie;
			}
			
			function IncluirPJ()
			{
				//faz conexão com o controle
				include_once 'controle.class.php';
				$controle=new controle();				
				$sql="INSERT INTO endereco (cl_cod,ec_rua,ec_num,ec_bairro,ec_cidade,ec_estado,ec_cep,ec_pais) VALUES";
				$sql.="('$this->cod_cli','$this->rua','$this->numero','$this->bairro','$this->cidade','$this->estado','$this->cep','$this->pais')";
				$controle->setSQL($sql);
				$controle->ExecutarSQL();	
				
				$sql="INSERT INTO clientes (cl_cod,tpc_cod,cl_nm_rs,cl_sn_nf,cl_cp_cn,cl_rg_ie,cl_tel,cl_cel,cl_email,st_cod) VALUES";
				$sql.="('$this->cod_cli','$this->tipocliente','$this->razaosocial','$this->nomefantasia','$this->cnpj','$this->ie','$this->tel','$this->cel','$this->email','$this->status')";				
				$controle->setSQL($sql);
				$controle->ExecutarSQL();
				
				$sql="SELECT cl_cod FROM clientes WHERE cl_cod=$this->cod_cli";
				$controle->setSQL($sql);
				$controle->processaSelect();	
				$col=$controle->MostraSelecao();			
				return $col[0];		
			}
			function AlterarPJ()
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="UPDATE clientes SET 
					tpc_cod='$this->tipocliente',
					cl_nm_rs='$this->razaosocial',
					cl_sn_nf='$this->nomefantasia',
					cl_cp_cn='$this->cnpj',
					cl_rg_ie='$this->ie',
					cl_tel='$this->tel',
					cl_cel='$this->cel',
					cl_email='$this->email',
					st_cod='$this->status'
					WHERE
					cl_cod=$this->cod_cli";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					
					
					$sql="UPDATE endereco SET ec_rua='$this->rua',ec_num='$this->numero',ec_bairro='$this->bairro',ec_cidade='$this->cidade',ec_estado='$this->estado',ec_cep='$this->cep',ec_pais='$this->pais' WHERE cl_cod=$this->cod_cli";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
				}
		
				function ExcluirPJ()
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="DELETE FROM clientes WHERE cl_cod=";
					$sql.="($this->cod_cli)";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					
					
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="DELETE FROM endereco WHERE cl_cod=";
					$sql.="($this->cod_cli)";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
					
					
				}
				
				function SelecionarPJ()
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="SELECT cl.cl_cod AS 'Código',
							cl.tpc_cod AS 'Código do Tipo do Cliente',
							tpc.tpc_desc AS 'Descrição do Tipo do Cliente',
							cl_nm_rs AS 'Razão Social',
							cl_sn_nf AS 'Nome Fantasia',
							cl_cp_cn AS 'CNPJ/CPF',
							cl_rg_ie AS 'RG/Inscrição Estadual',
							cl.st_cod AS 'Código do Status',
							st.st_desc AS 'Descrição do Status',
							ec.ec_rua AS 'Rua',
							ec.ec_num AS 'Nº',
							ec.ec_bairro AS 'Bairro',
							ec.ec_cidade AS 'Cidade',
							ec.ec_estado AS 'Estado',
							ec.ec_cep AS 'CEP',
							ec.ec_pais AS 'País',
							cl.cl_tel AS 'Telefone',
							cl.cl_cel AS 'Celular',
							cl.cl_email AS 'E-mail'
							
							FROM clientes cl
							JOIN endereco ec
							ON cl.cl_cod = ec.cl_cod
							
							JOIN tipo_cliente tpc
							ON cl.tpc_cod = tpc.tpc_cod
							
							JOIN STATUS st
							ON cl.st_cod = st.st_cod";
					$controle->setSQL($sql);
					$linhas=$controle->ExecutarSQL();
				
									while ($col=$controle->MostraSelecao($linhas))
									 //Metodo de impressão mais simples
									{
										print 
										$col[0].
										"-".
										$col[1].
										"-".
										$col[2].
										"-".
										$col[3].
										"-".
										$col[4].
										"-".
										$col[5].
										"-".
										$col[6].
										"-".
										$col[7].
										"-".
										$col[8].
										"-".
										$col[9].
										"-".
										$col[10].
										"-".
										$col[11].
										"-".
										$col[12].
										"-".
										$col[13].
										"-".
										$col[14].
										"-".
										$col[15].
										"-".
										$col[16].
										"-".
										$col[17].
										"-".
										$col[18].
										"<br>";						
									}						
							
						}
	}
?>