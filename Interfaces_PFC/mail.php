<?php
$destinatario= $_POST["hEmail"];
$assunto= "Abertura de OS nº.: ".$hNumOS;
$corpo=  '
<html>
<head>
<title>Abertura de OS</title>
</head>
<body>
<p align="center"><strong>Abertura de OS</strong></p>
<table width="38%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="25%" scope="row"><div align="right">N&uacute;mero de OS =</div></th>
    <td width="75%">'.$hNumOS.'</td>
  </tr>
  <tr>
    <th scope="row"><div align="right">Servi&ccedil;o =</div></th>
    <td>'.$sServico.'</td>
  </tr>
  <tr>
    <th scope="row"><div align="right">Data=</div></th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><div align="right">Descri&ccedil;&atilde;o=</div></th>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><div align="right">Tipo OS=</div></th>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;  </p>
</body>
</html>
';

 //enviando email
 $headers = "MIME-Version: 1.0";
 $headers .= "Content-type: text/html; charset=iso-8859-1";
 
 //endereço do remetente
$headers .= "From: DR.Will <nao-responda@drwill.com.br>";

mail($destinatario,$assunto,$corpo,$headers) 
?>