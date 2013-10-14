 <?php 
 echo "<h1 align='center'>Lista de problemas de la olimpiada </h1>";
include '../Modelo/cnx.php';
$qry = "SELECT archivo.id_archivo, archivo.problema_archivo FROM public.archivo;";
$res = pg_query($entrada,$qry);

echo "<table border =1 align='center' >";
echo "<tr><td>Nombre de los archivos </td> <td> Seleccione archivo a descargar </td></tr>";
while($fila = pg_fetch_array($res))
{
echo "<tr>";
    echo " <td>".$fila['problema_archivo']."</td>";
echo "<td>  <a href= '../Modelo/descargarArchivo.php? id=$fila[id_archivo]' >  Descargar</a> </td>" ; 
echo "</tr>";
}
echo "</table>";
?> 