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
.style1 {	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div align="center">
  <p><strong class="style1">Relat&oacute;rio de Ordem de Servi&ccedil;os</strong></p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th scope="row"><form id="form1" name="form1" method="post" action="relatorio_os2.php">
        <label></label>
        <p>
        <label></label>
        </p>
      <p>
        <label></label>
      </p>
      <div align="center">
        <table width="30%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <th scope="row"><label>
              <div align="left">
                <input name="rdTipo" type="radio" value="1" />
                Por Data<br />
                </div>
              </label>
              <div align="left">
                <label>Data Inicial: <br />
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
                </div>            <label></label></th>
            </tr>
          <tr>
            <th scope="row"><label>
              <div align="left">
                <input name="rdTipo" type="radio" value="2" />
                Por Cliente</div>
              </label>
              <div align="left">Numero:
                <input name="tNumCli" type="text" id="tNumCli" size="3" maxlength="3" />
                </div>            <label>
              <div align="left"></div>
                </label></th>
            </tr>
          <tr>
            <th scope="row"><label>
              <div align="left">
                <input name="rdTipo" type="radio" value="3" />
                Por Numero de OS</div>
              </label>
              <div align="left">Numero:
                <input name="tNumOs" type="text" id="tNumOs" size="3" maxlength="3" />
                </div>            <label>
              <div align="left"></div>
                </label></th>
            </tr>
        </table>
      </div>
      <p>
        <label>
        <input name="btnConfirmar" type="submit" id="btnConfirmar" value="Confirmar" /> 
        </label>
        <label>
        <input name="btnLimpar" type="reset" id="btnLimpar" value="Limpar" />
        </label>
      </p>
      </form>
      </th>
    </tr>
  </table>
</div>
</body>
</html>
