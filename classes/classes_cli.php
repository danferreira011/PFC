<?php
						if ($rdTipo==2)
						{
							include_once '../classes/PessoaJuridica.class.php';
							$cli=new PessoaJuridica($tCod,$rdStatus,$tRua,$tNumero,$tBairro,$tCidade,$tEstado,$tCep,$tPais,$tTel,$tCel,$tEmail,$rdTipo,$tNome,$tSNome,$tCP_CN,$tRG_IE);						
					
						}	else
						{
							include_once '../classes/PessoaFisica.class.php';							
							$cli=new PessoaFisica($tCod,$rdStatus,$tRua,$tNumero,$tBairro,$tCidade,$tEstado,$tCep,$tPais,$tTel,$tCel,$tEmail,$rdTipo,$tNome,$tSNome,$tCP_CN,$tRG_IE);			
						}							
?>