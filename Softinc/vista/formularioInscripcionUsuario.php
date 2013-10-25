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

<br><center>
<h1 align="center">Registrar usuario </h1>
<<<<<<< HEAD
<form  action="../Modelo/inscribirOlimpista.php"  method="post" >
=======
<form  action="../Modelo/inscribirUsuario.php"  method="post" >
>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
 
<table>

<tr>
<<<<<<< HEAD
	  <td> Nombre :</td><td><input type='text' id ='NombreOlinpistas' name='NombreOlinpista'  size='40' maxlength='40' title="Escribe un nombre de usuario �nico" >  </td>
</tr>
<tr>
	<td>Apellido paterno:</td><td><input type='text' name='ApellidoPaternoOlinpista' size='40' maxlength='40'/></td>
</tr>
<tr>
	<td>Apellido materno:</td><td><input type='text' name='ApellidoMaternoOlinpista' size='40' maxlength='40'/></td>
</tr>
<tr>
	<td>Ci: </td><td><input type ='text'  name='CiOlinpista' size='40' maxlength='40'/>
=======
	  <td> Nombre :</td><td><input type='text' id ='NombreUsuario' name='NombreUsuario'  size='40' maxlength='40' title="Escribe un nombre de usuario �nico" >  </td>
</tr>
<tr>
	<td>Apellido paterno:</td><td><input type='text' name='ApellidoPaternoUsuario' size='40' maxlength='40'/></td>
</tr>
<tr>
	<td>Apellido materno:</td><td><input type='text' name='ApellidoMaternoUsuario' size='40' maxlength='40'/></td>
</tr>
<tr>
	<td>Ci: </td><td><input type ='text'  name='CiUsuario' size='40' maxlength='40'/>
>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
	</td>
	
</tr>
<tr>
<<<<<<< HEAD
        <td>Unidad educativa: </td><td><input type ='text'  name='unidadEducativaOlinpista' size='40' maxlength='40'/>
=======
        <td>Unidad educativa: </td><td><input type ='text'  name='unidadEducativaUsuario' size='40' maxlength='40'/>
>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
	</td>
	
</tr>

<tr>
<<<<<<< HEAD
	<td>fecha: </td><td><input type ='text'  name='fechaOlinpista' id='inputField' size='40' maxlength='40'/>
=======
	<td>fecha: </td><td><input type ='text'  name='fechaUsuario' id='inputField' size='40' maxlength='40'/>
>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
	</td>
	
</tr>

<tr>
<<<<<<< HEAD
	<td>Email: </td><td><input type ='text'  name='EmailOlinpista' id='inputField' size='40' maxlength='40'/>
=======
	<td>Email: </td><td><input type ='text'  name='EmailUsuario' id='inputField' size='40' maxlength='40'/>
>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
	</td>
	
</tr>
<tr>
<<<<<<< HEAD
	<td>usuario:</td><td><input type='text' name='usuarioOlimpista' size='40' maxlength='40'/></td>
</tr>

<tr>
	<td>Password :</td><td><input type='password' name='passwordOlinpista' size='40' maxlength='40'/></td>
</tr>
<tr>
	<td>Repetir password :</td><td><input type='password' name='repetirPasswordOlinpista' size='40' maxlength='40'/></td>
=======
	<td>usuario:</td><td><input type='text' name='usuarioUsuario' size='40' maxlength='40'/></td>
</tr>

<tr>
	<td>Password :</td><td><input type='password' name='passwordUsuario' size='40' maxlength='40'/></td>
</tr>
<tr>
	<td>Repetir password :</td><td><input type='password' name='repetirPasswordUsuario' size='40' maxlength='40'/></td>
>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
</tr>

</table>

<input type='submit' id='submit' name='enviar' value='Enviar mensage' style="width: 80px; margin-top: 15px" />
</form>
<div align="center"><br>
  <div align="center">
  
</div>
</body>
</html>