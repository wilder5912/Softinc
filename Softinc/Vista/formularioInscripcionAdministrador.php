<html>
<head>
</head>

<body>

<?php
 include("../controlador/cnx.php");
	
?>
<br><center>
<h1 align="center">Crear Administrador </h1>
<form action="inscricionAdministrador.php" method="post">
 <?php
echo "<table>";

echo "<tr>";
	echo "<td>Nombre:</td><td><input type='text' name='NombreAdministrador' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Apellido paterno:</td><td><input type='text' name='ApellidoPaternoAdministrador' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Apellido materno:</td><td><input type='text' name='ApellidoMaternoAdministrador' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Ci: </td><td><input type ='text'  name='CiAdministrador' size='40' maxlength='40'/>";
	echo "</td>";
	
echo "</tr>";

echo "<tr>";
	echo "<td>fecha: </td><td><input type ='text'  name='fechaAdministrador' id='inputField' size='40' maxlength='40'/>";
	echo "</td>";
	
echo "</tr>";

echo "<tr>";
	echo "<td>Email: </td><td><input type ='text'  name='EmailAdministrador' id='inputField' size='40' maxlength='40'/>";
	echo "</td>";
	
echo "</tr>";
echo "<tr>";
	echo "<td>usuario:</td><td><input type='text' name='usuarioAdministrador' size='40' maxlength='40'/></td>";
echo "</tr>";

echo "<tr>";
	echo "<td>Password :</td><td><input type='text' name='passwordAdministrador' size='40' maxlength='40'/></td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Repetir password :</td><td><input type='text' name='repetirPasswordAdministrador' size='40' maxlength='40'/></td>";
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