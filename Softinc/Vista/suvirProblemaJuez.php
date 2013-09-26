<html>
<body>

<br><center>
<h1 align="center">Tareas </h1>
<form action="compilar.php" method="post">
 <?php
echo "<table>";
echo "<tr>";
	echo "<td>Titulo :</td><td><input type='text' name='titulo' size='40' maxlength='40'/></td>";
echo "</tr>";

echo "<td>codigo fuente :</td>";
echo "<tr>";
	echo "<td colspan='3'> <textarea rows='5' name='descripcion' cols='40'></textarea>";
echo "</tr>";

echo "<td colspan='3'> <input name='archivo' type='file' size='35' />";
echo "</table>";
?>	
<input type='submit' name='enviar' value='jusgar Codigo'/>
</form>
<div align="center"><br>
  <div align="center">
  <a href="inicio.php">Volver</a>
</div>
</body>
</html>





