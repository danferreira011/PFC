<?php
	class Pedido
		{
			var	$num;
			var $item;
			var	$quant;
			var	$desc;
			var	$cliente;
				
				function __construct($num,$item,$quant,$desc,$cliente)
				{
					$this->num=$num;
					$this->item=$item;					
					$this->quant=$quant;
					$this->desc=$desc;
					$this->cliente=$cliente;
				}
				
				function retornaLinhas()
				{
					include_once 'controle.class.php';
					$controle=new controle();	
					$sql="SELECT pd_num FROM pedidos";
					$controle->setSQL($sql);
					$linhas=$controle->ExecutarSQL();		
					$num=$controle->numlinhas($linhas);
					return $num;
				}
							
				function GerarPedido()
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$data=date('Y-m-d H:i:s');//função que retorna data no formato YYYY-MM-DD hh:mm:ss	
					$sql="INSERT INTO pedidos VALUES ($this->num,'$data',$this->cliente)";					
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
				}
				
				function InserirItens()
				{
					include_once 'controle.class.php';
					$controle=new controle();
					$sql="INSERT INTO itens_pedido VALUES ($this->num,$this->item,$this->quant,'$this->desc')";
					$controle->setSQL($sql);
					$controle->ExecutarSQL();
				}
				
				function RelatorioPedido($op,$consulta)
				{
					include_once 'controle.class.php';
					$controle=new controle();
					if ($op==2)
					{
								
								//por numero de pedido
									$sql="SELECT * FROM RELATORIO_PEDIDO WHERE pd_num=$consulta";
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
											  </tr>';									 
									} 
										
					}else if ($op==3)
					{										
								//por numero de cliente
								$sql="SELECT * FROM RELATORIO_PEDIDO WHERE cl_cod = $consulta ";
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
										  </tr>';									 
								} 	
							}	
				}	
				function RelatorioData($dataini,$datafim)
				{
					include_once 'controle.class.php';
					$controle=new controle();					
					$sql="SELECT * FROM RELATORIO_PEDIDO WHERE pd_data BETWEEN '$dataini' AND '$datafim' ";
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
								  </tr>';									 
						} 		
				} 			
		}
?>