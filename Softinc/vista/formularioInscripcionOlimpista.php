<html>
<head>
<title>Documento sin titulo</title>
	<link rel="stylesheet" type="text/css" media="all" href="calendario/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="calendario/jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"calendario\img",
			weekStartDay:1*/
		});
	};
</script>


</head>
<body>

<?php
 include("../Modelo/cnx.php");
	
?>
<br><center>
<h1 align="center">Registras olimpista </h1>
<form action="../controlador/inscribirOlimpista.php" method="post">
 <?php
echo "<table>";

echo "<tr>";
	echo "<td>Nombre :</td><td><input type='text' name='NombreOlinpista' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Apellido paterno:</td><td><input type='text' name='ApellidoPaternoOlinpista' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Apellido materno:</td><td><input type='text' name='ApellidoMaternoOlinpista' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Ci: </td><td><input type ='text'  name='CiOlinpista' size='40' maxlength='40'/>";
	echo "</td>";
	
echo "</tr>";
echo "<tr>";
	echo "<td>Unidad educativa: </td><td><input type ='text'  name='unidadEducativaOlinpista' size='40' maxlength='40'/>";
	echo "</td>";
	
echo "</tr>";

echo "<tr>";
	echo "<td>fecha: </td><td><input type ='text'  name='fechaOlinpista' id='inputField' size='40' maxlength='40'/>";
	echo "</td>";
	
echo "</tr>";

echo "<tr>";
	echo "<td>Email: </td><td><input type ='text'  name='EmailOlinpista' id='inputField' size='40' maxlength='40'/>";
	echo "</td>";
	
echo "</tr>";
echo "<tr>";
	echo "<td>usuario:</td><td><input type='text' name='usuarioOlimpista' size='40' maxlength='40'/></td>";
echo "</tr>";

echo "<tr>";
	echo "<td>Password :</td><td><input type='password' name='passwordOlinpista' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Repetir password :</td><td><input type='password' name='repetirPasswordOlinpista' size='40' maxlength='40'/></td>";
echo "</tr>";

echo "</table>";
?>	
<input type='submit' name='enviar' value='Enviar mensage'/>
</form>
<div align="center"><br>
  <div align="center">
  
</div>
</body>
</html>