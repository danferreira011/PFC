<?php
	class Servico
	{
		var	$cod;
		var	$desc;
		
		function __construct($cod,$desc)
		{
			$this->cod=$cod;
			$this->desc=$desc;					
		}		
		function retornaDescricao($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT sc_des FROM servico WHERE sc_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$descricao=$controle->retornaCampo();
			return $descricao[0];
		}	
		function retornaLinhas()
		{
			include_once 'controle.class.php';
			$controle=new controle();	
			$sql="SELECT * FROM servico";
			$controle->setSQL($sql);
			$linhas=$controle->ExecutarSQL();
			
			$num=$controle->numlinhas($linhas);
			return $num;
		}	
		
		function IncluirServico()
		{
			include_once 'controle.class.php';
			$controle=new controle();				
			$sql="INSERT INTO servico (sc_cod,sc_des) VALUES";
			$sql.="('$this->cod','$this->desc')";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
		}
				
		function ExcluirServico()
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="DELETE FROM servico WHERE sc_cod=";
			$sql.="$this->cod";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
		}
		
		function EditarServico()
		{			
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="UPDATE servico SET sc_des='";
			$sql.="$this->desc";
			$sql.="' WHERE sc_cod='";
			$sql.="$this->cod"."'";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
		}
		
		function SelecionarServico()
		{			
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT * FROM servico";			
			$controle->setSQL($sql);
			$linhas=$controle->ExecutarSQL();
			print "<hr>";
			while ($col=$controle->MostraSelecao($linhas))
			{
				print $col[0]."-".$col[1];
				print "<hr>";
			}		
		}
		
		function SelecionarSER()
		{
			include_once 'controle.class.php';
			$controle=new controle();	
			$sql="SELECT* FROM servico";
			$controle->setSQL($sql);
			$controle->processaSelect();
			while ($col=$controle->MostraSelecao())
			{
				
				 /* print' <tr>
					<th scope="row">'.$col[0].'</th>
					<td>'.$col[1].'</td>
				  </tr>'; */
				  print'<option value='.$col[0].'>'.$col[0].' - '.$col[1].'</option>';
                

			} 			
		}
	}
?>