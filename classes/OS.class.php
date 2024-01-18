<?php
	//criando uma classe / modelo OS
	class OS
	{
		// definindo atributos da classe
		
		var	$num; //numero da os
		var	$desc; // descrição OS
		var	$cod_cli;//codigo do cliente
		var	$matricula;// matricula do funcionario
		var $tipo_os;//tipo de OS (Preventiva / Corretiva)
		var	$servico;	// serviço a ser realizado
				
		//criando o metodo construtor e atribuindo os valores
		
		function __construct($num,$desc,$cod_cli,$matricula,$tipo_os,$servico)
		{
			$this->num=$num;
			$this->desc=$desc;
			$this->cod_cli=$cod_cli;
			$this->matricula=$matricula;
			$this->tipo_os=$tipo_os;
			$this->servico=$servico;							
		}
		
		//criação dos metodos 
		function retornaTipo($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT tos_cod FROM os WHERE os_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$tipo=$controle->retornaCampo();
			return $tipo[0];
		}
		
		function retornaCodCliente($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT cl_cod FROM os WHERE os_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$oscod=$controle->retornaCampo();
			return $oscod[0];
		}	
		function retornaDescricao($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT os_desc FROM os WHERE os_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$desc=$controle->retornaCampo();
			return $desc[0];
		}
		function retornaServico($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT sc_cod FROM os WHERE os_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$serv=$controle->retornaCampo();
			return $serv[0];
		}
		function retornaMatricula($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_cod FROM os WHERE os_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$mat=$controle->retornaCampo();
			return $mat[0];
		}
		function retornaDataAbert($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT os_data_abert FROM os WHERE os_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$dabert=$controle->retornaCampo();
			return $dabert[0];
		}
		function retornaDataFech($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT os_data_fech FROM os WHERE os_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$dfech=$controle->retornaCampo();
			return $dfech[0];
		}
		function retornaMatRecebedor($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_cod_receb FROM os WHERE os_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$freceb=$controle->retornaCampo();
			return $freceb[0];
		}
		function retornaMatEncaminhamento($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_cod_enc FROM os WHERE os_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$fenc=$controle->retornaCampo();
			return $fenc[0];
		}
		function retornaMatFechamento($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT fc_cod_fech FROM os WHERE os_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$ffech=$controle->retornaCampo();
			return $ffech[0];
		}
		function retornaLinhas()
		{
			include_once 'controle.class.php';
			$controle=new controle();	
			$sql="SELECT * FROM os";
			$controle->setSQL($sql);
			$linhas=$controle->ExecutarSQL();
			
			$num=$controle->numlinhas($linhas);
			return $num;
		}	
		
		
		function AbrirOS()
		{				
			include_once 'controle.class.php';//chamando a classe controle
			$controle=new controle();//instanciando um objeto
			//colocando o valor da função date na variavel data
			//$data=date('Y-m-d H:i:s');//função que retorna data no formato YYYY-MM-DD hh:mm:ss
			
			$sql="SELECT NOW()";
			$controle->setSQL($sql);
			$controle->processaSelect();
			while ($col=$controle->MostraSelecao())
			{					
				$data=$col[0];
			} 		
			//abrindo uma OS no controle
			$sql="INSERT INTO os (os_cod, os_desc, cl_cod, fc_cod, tos_cod, sc_cod,st_os) VALUES 
			($this->num,'$this->desc',$this->cod_cli,$this->matricula,$this->tipo_os,$this->servico,1)";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
							
			//inserirndo evento da OS aberta
			$sql="INSERT INTO eventos_os (ev_cod,os_cod,ev_desc,ev_data,st_cod,fc_cod) VALUES
			(1,$this->num,'$this->desc','$data',1,$this->matricula)";			
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			
			// retorno da classe
			$sql="SELECT OS_COD FROM OS WHERE OS_COD = $this->num";
			$controle->setSQL($sql);
 			$controle->processaSelect();	
			$col=$controle->MostraSelecao();			
			return $col[0];
			
		}
		function ReceberOS()
		{
			include_once 'controle.class.php';
			$controle=new controle();
			//$data=date('Y-m-d H:i:s');//função que retorna data no formato YYYY-MM-DD hh:mm:ss
			$sql="SELECT NOW()";
			$controle->setSQL($sql);
			$controle->processaSelect();
			while ($col=$controle->MostraSelecao())
			{					
				$data=$col[0];
			} 	
				
			$sql="SELECT ev_cod FROM eventos_os WHERE os_cod=$this->num";
			$controle->setSQL($sql);
			$linhas=$controle->ExecutarSQL();			
			$num=$controle->numlinhas($linhas)+1;	
						
			$sql="INSERT INTO eventos_os (ev_cod,os_cod,ev_desc,ev_data,st_cod,fc_cod) VALUES
			($num,$this->num,'Recebido por: mat_$this->matricula','$data',4,$this->matricula)";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			
			$sql="UPDATE os SET st_os=4 WHERE os_cod=$this->num";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			
			$sql="SELECT os_cod FROM eventos_os WHERE st_cod=4 AND os_cod=$this->num AND ev_data='$data'";
			$controle->setSQL($sql);
 			$controle->processaSelect();	
			$col=$controle->MostraSelecao();			
			return $col[0];
			
		}	
		function EncaminharOS($func)
		{			
			include_once 'controle.class.php';
			$controle=new controle();
			//$data=date('Y-m-d H:i:s');//função que retorna data no formato YYYY-MM-DD hh:mm:ss
			$sql="SELECT NOW()";
			$controle->setSQL($sql);
			$controle->processaSelect();
			while ($col=$controle->MostraSelecao())
			{					
				$data=$col[0];
			} 	
				
			$sql="SELECT ev_cod FROM eventos_os WHERE os_cod=$this->num";
			$controle->setSQL($sql);
			$linhas=$controle->ExecutarSQL();			
			$num=$controle->numlinhas($linhas)+1;
			
			$sql="INSERT INTO eventos_os (ev_cod,os_cod,ev_desc,ev_data,st_cod,fc_cod) VALUES
			($num,$this->num,'Encaminhado para: $func','$data',3,$this->matricula)";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			
			$sql="UPDATE os SET st_os=3 WHERE os_cod=$this->num";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();	
			
			$sql="SELECT os_cod FROM eventos_os WHERE st_cod=3 AND os_cod=$this->num AND ev_data='$data'";
			$controle->setSQL($sql);
 			$controle->processaSelect();	
			$col=$controle->MostraSelecao();			
			return $col[0];
		}	
		function FecharOS($procedimento,$funcionario)
		{				
			include_once 'controle.class.php';
			$controle=new controle();
			//$data=date('Y-m-d H:i:s');//função que retorna data no formato YYYY-MM-DD hh:mm:ss	
			$sql="SELECT NOW()";
			$controle->setSQL($sql);
			$controle->processaSelect();
			while ($col=$controle->MostraSelecao())
			{					
				$data=$col[0];
			} 	
			$sql="SELECT ev_cod FROM eventos_os WHERE os_cod=$this->num";
			$controle->setSQL($sql);
			$linhas=$controle->ExecutarSQL();			
			$num=$controle->numlinhas($linhas)+1;
						
			$sql="INSERT INTO eventos_os (ev_cod,os_cod,ev_desc,ev_data,st_cod,fc_cod) VALUES
			($num,$this->num,'$procedimento  Fechado por: mat_$funcionario','$data',2,$this->matricula)";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			
			$sql="UPDATE os SET st_os=2 WHERE os_cod=$this->num";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();	
			
			$sql="SELECT os_cod FROM eventos_os WHERE st_cod=2 AND os_cod=$this->num AND ev_data='$data'";
			$controle->setSQL($sql);
 			$controle->processaSelect();	
			$col=$controle->MostraSelecao();			
			return $col[0];
				
		}
		function SelecionarOS()
		{
			include_once 'controle.class.php';
			$controle=new controle();	
			$sql="SELECT os.os_cod,os.os_desc,cli.cl_cod, cli.cl_nm_rs FROM os os
					JOIN clientes cli					
					ON os.cl_cod = cli.cl_cod
					WHERE os.st_os<>2";
			$controle->setSQL($sql);
			$controle->processaSelect(); 
			while ($col=$controle->MostraSelecao())
			{				
				print'<tr>
						<th scope="row">'.$col[0].'</th>
						<td>'.$col[1].'</td>
						<td>'.$col[2].'</td>
						<td>'.$col[3].'</td>
					  </tr>';
			} 				
						
		}
		
		function relatorioOS($op,$consulta)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			if($op==2){
			//RELATORIO POR CLIENTE
			$sql="SELECT * FROM RELATORIO_OS WHERE cl_cod=$consulta";
				    }else if ($op==3)
					{
					//RELATORIO POR NUMERO DE OS
			$sql="SELECT * FROM RELATORIO_OS WHERE os_cod=$consulta";
					}			
			$controle->setSQL($sql);
			$controle->processaSelect(); 
			while ($col=$controle->MostraSelecao())
			{					
				print'<tr>
					<th scope="row">'.$col[0].'</th>
					<td>'.$col[1].'</td>
					<td>'.$col[2].'</td>
					<td>'.$col[3].'</td>
					<td>'.$col[4].'</td>
					<td>'.$col[5].'</td>
					<td>'.$col[6].'</td>
					<td>'.$col[7].'</td>
					<td>'.$col[8].'</td>
				  </tr>';
			} 				
						
		}
		function relatorioOSData($dataini, $datafim)
		{
			include_once 'controle.class.php';
			$controle=new controle();	
			$sql="SELECT * FROM RELATORIO_OS WHERE dabert  BETWEEN '$dataini' AND '$datafim'";
			$controle->setSQL($sql);
			$controle->processaSelect(); 
			while ($col=$controle->MostraSelecao())
			{					
				print'<tr>
					<th scope="row">'.$col[0].'</th>
					<td>'.$col[1].'</td>
					<td>'.$col[2].'</td>
					<td>'.$col[3].'</td>
					<td>'.$col[4].'</td>
					<td>'.$col[5].'</td>
					<td>'.$col[6].'</td>
					<td>'.$col[7].'</td>
					<td>'.$col[8].'</td>
				  </tr>';
			} 				
						
		}
						
	}
?>