<html>
<body>

<br><center>
<h1 align="center">Tareas </h1>
<form name="UserInformationForm" action="../Modelo/subirElArchivo.php" method="post" enctype="multipart/form-data" >
 <?php
echo "<table>";
echo "<tr>";
	echo "<td>Seleccione tipo codigo :</td>";
echo "</tr>";

echo "<tr>"; 
	echo "<td><input type='radio' name='tipoCodigo' size='40' maxlength='40' value='java' checked /> java</td>";
echo "</tr>";
echo "<tr>";
	echo "<td><input type='radio' name='tipoCodigo' size='40' maxlength='40' value='c' /> c</td>";
echo "</tr>";
echo "<tr>";
	echo "<td><input type='radio' name='tipoCodigo' size='40' maxlength='40' value='cpp'/> c++</td>";
echo "</tr>";

echo "<tr>";
	echo "<td>Titulo :</td><td><input type='text' name='titulo' size='40' maxlength='40'/></td>";
echo "</tr>";

echo "<td>codigo fuente :</td>";
echo "<tr>";
	echo "<td colspan='3' > <textarea id = 'tex' rows='5' name='codigoFuente' cols='40'></textarea>";
echo "</tr>";

echo "<td colspan='3'> <input name='programa' type='file' size='35' />";
echo "</table>";
?>	
<input type='submit' name='enviar' value='juzgar Codigo'/>
</form>
<div align="center"><br>
  <div align="center">
  <a href="inicio.php">Volver</a>
</div>
</body>
</html>





