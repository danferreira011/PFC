<?php
	class Hardware
	{
		public	$cod;
		public	$nome;
		public	$marca;
		public	$modelo;
		public	$num_serie;
		public	$descricao;
		public	$valor;
		public	$cliente;		
		
		function __construct($cod,$nome,$marca,$modelo,$num_serie,$descricao,$valor,$cliente)
		{
			$this->cod=$cod;
			$this->nome=$nome;
			$this->marca=$marca;
			$this->modelo=$modelo;
			$this->num_serie=$num_serie;
			$this->descricao=$descricao;
			$this->valor=$valor;
			$this->cliente=$cliente;			
		}
		function retornaCodCli($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT cl_cod FROM hardware WHERE hw_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$codcli=$controle->retornaCampo();
			return $codcli[0];	
		}		
		function retornaNome($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT hw_nome FROM hardware WHERE hw_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$nome=$controle->retornaCampo();
			return $nome[0];	
		}
		function retornaMarca($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT hw_marca FROM hardware WHERE hw_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$marca=$controle->retornaCampo();
			return $marca[0];	
		}
		function retornaModelo($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT hw_modelo FROM hardware WHERE hw_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$modelo=$controle->retornaCampo();
			return $modelo[0];	
		}
		function retornaNS($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT hw_num_serie FROM hardware WHERE hw_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$ns=$controle->retornaCampo();
			return $ns[0];	
		}
		function retornaDesc($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT hw_des FROM hardware WHERE hw_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$desc=$controle->retornaCampo();
			return $desc[0];	
		}
		function retornaValor($id)
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT hw_valor FROM hardware WHERE hw_cod=";
			$sql.= "$id";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
			$valor=$controle->retornaCampo();
			return $valor[0];	
		}
		function retornaLinhas()
		{
			include_once 'controle.class.php';
			$controle=new controle();	
			$sql="SELECT * FROM hardware";
			$controle->setSQL($sql);
			$linhas=$controle->ExecutarSQL();
			
			$num=$controle->numlinhas($linhas);
			return $num;
		}	
		
		function IncluirHardware()
		{
			
			include_once 'controle.class.php';
			$controle=new controle();				
			$sql="INSERT INTO hardware(hw_cod,hw_nome,hw_marca,hw_modelo,hw_num_serie,hw_des,cl_cod,hw_valor) VALUES";
			$sql.="($this->cod,'$this->nome','$this->marca','$this->modelo','$this->num_serie','$this->descricao',$this->cliente,$this->valor)";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
		}
		
		function ExcluirHardware()
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="DELETE FROM hardware WHERE hw_cod=";
			$sql.="($this->cod)";
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
		}
		
		function EditarHardware()
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="UPDATE hardware SET			
			hw_nome='$this->nome',
			hw_marca='$this->marca',
			hw_modelo='$this->modelo',
			hw_num_serie='$this->num_serie',
			hw_des='$this->descricao',
			hw_valor='$this->valor',
			cl_cod='$this->cliente'
			WHERE
			hw_cod='$this->cod'";
			
			$controle->setSQL($sql);
			$controle->ExecutarSQL();
		}
		
		function MostrarHardware()
		{
			include_once 'controle.class.php';
			$controle=new controle();
			$sql="SELECT * FROM hardware";			
			$controle->setSQL($sql);
			$controle->MostraSelecao();
		}
	}
?>