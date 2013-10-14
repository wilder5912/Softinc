<html>
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

<body>

<?php
 include("../Modelo/cnx.php");
	
?>
<br><center>
<h1 align="center">Registro comite </h1>
<form action="../Modelo/inscribirComite.php" method="post">
 <?php
echo "<table>";

echo "<tr>";
	echo "<td>Nombre:</td><td><input type='text' name='NombreComite' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Apellido paterno:</td><td><input type='text' name='ApellidoPaternoComite' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Apellido materno:</td><td><input type='text' name='ApellidoMaternoComite' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Ci: </td><td><input type ='text'  name='CiComite' size='40' maxlength='40'/>";
	echo "</td>";
	
echo "</tr>";

echo "<tr>";
	echo "<td>fecha: </td><td><input type ='text'  name='fechaComite' id='inputField' size='40' maxlength='40'/>";
	echo "</td>";
	
echo "</tr>";

echo "<tr>";
	echo "<td>Email: </td><td><input type ='text'  name='EmailComite' id='inputField' size='40' maxlength='40'/>";
	echo "</td>";
	
echo "</tr>";
echo "<tr>";
	echo "<td>usuario:</td><td><input type='text' name='usuariComite' size='40' maxlength='40'/></td>";
echo "</tr>";

echo "<tr>";
	echo "<td>Password :</td><td><input type='text' name='passwordComite' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Repetir password :</td><td><input type='text' name='repetirPasswordComite' size='40' maxlength='40'/></td>";
echo "</tr>";

echo "</table>";
?>	
<input type='submit' name='enviar' value='Enviar mensage'/>
</form>
<div align="center"><br>
  <div align="center">
  <a href="inicio.php">Volver</a>
</div>
</body>
</html>