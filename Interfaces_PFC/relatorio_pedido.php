<?php
include 'trava.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div align="center">
  <p><span class="style1"><strong>Relat&oacute;rio de Pedidos</strong></span></p>
</div>


<form id="form1" name="form1" method="post" action="r_pedido.php"> 
  <div align="center">
    <table width="30%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <th scope="row"><div align="left">
          <div align="center">
            <div align="left">
            <div align="left">
            <input name="rdTipo" type="radio" value="1" />
          Por Data
          <label>
          </div>
            </div>
            </div>
            <div align="left">
    <label> Data Inicial: <br />
    <br />
      Dia
  <select name="sDiaI" id="sDiaI">
    <option>dia</option>
    <?php
			  	for($i=01;$i<=31;$i++)
				print '<option value="'.$i.'">'.$i.'</option>';
			  ?>
  </select>
    </label>
    M&ecirc;s
  <label>
  <select name="sMesI" id="sMesI">
    <option>mes</option>
    <?php
			  	for($i=01;$i<=12;$i++)
				print '<option value="'.$i.'">'.$i.'</option>';
			  ?>
  </select>
  </label>
    Ano
  <label>
  <select name="sAnoI" id="sAnoI">
    <option>ano</option>
    <?php
			  	$data=date('Y');
				for($i=2008;$i<=$data;$i++)
				print '<option value="'.$i.'">'.$i.'</option>';
			  ?>
  </select>
  <br />
  <br />
    DataFinal: </label>
  <br />
  <br />
  </div>
  <div align="left">
    <label>Dia
      <select name="sDiaF" id="sDiaF">
      <option>dia</option>
      <?php
			  	for($i=1;$i<=31;$i++)
				print '<option value="'.$i.'">'.$i.'</option>';
			  ?>
    </select>
    </label>
    M&ecirc;s
  <label>
  <select name="sMesF" id="select2">
    <option>mes</option>
    <?php
			  	for($i=1;$i<=12;$i++)
				print '<option value="'.$i.'">'.$i.'</option>';
			  ?>
  </select>
  </label>
    Ano
  <label>
  <select name="sAnoF">
    <option>ano</option>
    <?php
			  	$data=date('Y');
				for($i=2008;$i<=$data;$i++)
				print '<option value="'.$i.'">'.$i.'</option>';
			  ?>
  </select>
  </label>
  </div></th>
      </tr>
      <tr>
        <th scope="row"><label>
          <div align="left">
            <input name="rdTipo" type="radio" value="2" />
            Por Pedido<br />
            N&uacute;mero:
  <input name="tNumCli" type="text" id="tNumCli" size="3" maxlength="3" />
          </div></th>
      </tr>
      <tr>
        <th scope="row"><label>
          <div align="left">
            <input name="rdTipo" type="radio" value="3" />
            Por Cliente<br />
            Numero:
  <input name="tNumPed" type="text" id="tNumPed" size="3" maxlength="3" />
          </div></th>
      </tr>
    </table>
    <p>
      <label>
      <input name="btnConfirmar" type="submit" id="btnConfirmar" value="Confirmar" />
      </label>
      <label>
      <input name="Reset" type="reset" id="Reset" value="Limpar" />
      </label>
    </p>
    
  </div>
  <label></label>
</form>
<p>&nbsp;</p>
</body>

</html>
