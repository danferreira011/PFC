<?php

						if($cargo==1)
						{
							// construct($matricula,$nome,$cpf,$rg,$telefone,$celular,$email,$cod_cargo,$rua,$numero,$bairro,$cidade,$estado,$cep,$pais)
							
							include_once '../classes/Gerente.class.php';							
							$func=new Gerente($tMatricula,$tNome,$tCPF,$tRG,$tTel,$tCel,$tEmail,$cg,$tRua,$tNumero,$tBairro,$tCidade,$tEstado,$tCep,$tPais);							
						}else if ($cargo==2)
						{
							include_once '../classes/Tecnico.class.php';
							$func=new Tecnico($tMatricula,$tNome,$tCPF,$tRG,$tTel,$tCel,$tEmail,$cg,$tRua,$tNumero,$tBairro,$tCidade,$tEstado,$tCep,$tPais);						
						}else
						{
							include_once '../classes/Operador.class.php';
							$func=new Operador($tMatricula,$tNome,$tCPF,$tRG,$tTel,$tCel,$tEmail,$cg,$tRua,$tNumero,$tBairro,$tCidade,$tEstado,$tCep,$tPais);						
						}									
?>