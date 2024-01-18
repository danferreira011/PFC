<?php
	class controle
	{
		var	$sql;		
					
			//metodo construtor
			function controle()	
			{}
			
			//metodo que processa a query
			function setSQL($sql)
			{
				$this->sql=$sql;			 	
			}			
			
			//funчуo que executa o banco para as aчoes INSERT,DELETE,UPDATE
			function ExecutarSQL()
			{				
				include 'conexaobd.inc';
				$sql=$this->sql;
				$resultado=mysql_query($sql,$con);
				return $resultado;
				mysql_close($con);
				
			}
			function processaSelect()
			{
				include 'conexaobd.inc';
				$sql=$this->sql;
				$this->resultado=mysql_query($sql,$con);
				return $this->resultado;				
			}	
			
				function MostraSelecao()
				{								
					while($row = mysql_fetch_array($this->resultado,MYSQL_NUM))
					{
						return $row;
					}
				}					
				
			function retornaCampo()
			{
				include 'conexaobd.inc';
				$sql=$this->sql;;
				$resultado=mysql_query($sql,$con);
				if($resultado==NULL)
				{
					return NULL;
				}else
				{			
				$coluna = mysql_fetch_array($resultado,MYSQL_NUM);				
				return $coluna;
				}
				mysql_close($con);
			}	
			function numlinhas($result)
			{					
				$num=mysql_num_rows($result);				
				return $num;						
			}	
	}		
?>