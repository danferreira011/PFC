<?php


	include_once 'Funcionario.class.php';
	class Gerente extends Funcionario
	{
		function __construct($matricula,$nome,$cpf,$rg,$telefone,$celular,$email,$cod_cargo,$rua,$numero,$bairro,$cidade,$estado,$cep,$pais)
		{
			parent::__construct($matricula,$nome,$cpf,$rg,$telefone,$celular,$email,$cod_cargo,$rua,$numero,$bairro,$cidade,$estado,$cep,$pais);
		}            
		
	}
?>