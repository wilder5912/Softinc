
<html>
<head>
<title></title>
</head>

<body>
	<h1 align="center">Seleccione datos a eliminar  </h1>
	<form action="eliminar_datos_animal.php" method="post"> 
	    <div align="center">
	      <?php 
	echo "<table  border='1'>";
		echo"
		<tr class='texto_tablap'>
			<td><strong>Nombre</strong></td>
			<td><strong>Descripcion del animal</strong></td>
			<td><strong>Apellido</strong></td>
			<td><strong>Administrador</strong></td>
                        <td><strong>Comite</strong></td>
                        <td><strong>Olimpista</strong></td>
		</tr>";
		
	  include('cnx.php');

	$usuarios=pg_query($enlace,"SELECT  usuario.id_usuario, usuario.nombre_usuario, usuario.apellido_usuario, usuario.id_rol FROM public.usuario;");
	
	while($dato=pg_fetch_array($usuarios))
	{

           echo "<tr class='texto'>
		 <td>". $dato['nombre_usuario']." </td>
		 <td>". $dato['apellido_usuario']." </td>"; 
           	// echo "<td> <input type = 'radio' name =  $dato['id_animal'] id = $dato['id_animal'] size='40'  maxlength='40' value='administrador'  /></td>
            </tr>";
                //size='40' maxlength='40' value='java' checked
	 } 
	?>
	      
          </div>
	   
    </table>
	 
      <div align="center">
        <p>
          <input name="enviar" type="submit" value="Borrar"/>
        </p>
      </div>
	</form> 
	<div align="center">
	<div align="center"><a href="inicio.php">Volver</a>
    </div>
</body>
</html>
