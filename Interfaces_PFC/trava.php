<?php
include '../classes/Login.class.php';
$user= new Login('1','1',1);
$id=$user->Validar();
if($id=='block')
{	 
	print '<meta http-equiv="refresh" content="0;URL=http://localhost/PFC/Interfaces_PFC/trava_login.htm" />';
}

$matricula = $_COOKIE["funcionario"];

?>

