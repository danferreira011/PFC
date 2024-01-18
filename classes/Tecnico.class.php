<?php
	include_once 'Funcionario.class.php';
	class Tecnico extends Funcionario
	{
		function __construct($matricula,$nome,$cpf,$rg,$telefone,$celular,$email,$cod_cargo,$rua,$numero,$bairro,$cidade,$estado,$cep,$pais)
		{
			parent::__construct($matricula,$nome,$cpf,$rg,$telefone,$celular,$email,$cod_cargo,$rua,$numero,$bairro,$cidade,$estado,$cep,$pais);
		}
				function SelecionarTEC()
				{
					include_once 'controle.class.php';
					$controle=new controle();	
					$sql="SELECT fc_cod,fc_nome FROM funcionarios WHERE cg_cod=2";
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