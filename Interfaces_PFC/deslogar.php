<?php
	include '../classes/Login.class.php';
	$user= new Login('0','0',0);
	$user->Deslogar();	
	print "<br><br><center><h1>Deslogado</h1></center>";
	
	print '<h2><center><a href="javascript:window.close()">Fechar</a></center></h2>';

?>
