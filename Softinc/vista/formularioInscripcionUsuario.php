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
<form  action="../Modelo/inscribirOlimpista.php"  method="post" >
 
<table>

<tr>
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
	</td>
	
</tr>
<tr>
        <td>Unidad educativa: </td><td><input type ='text'  name='unidadEducativaOlinpista' size='40' maxlength='40'/>
	</td>
	
</tr>

<tr>
	<td>fecha: </td><td><input type ='text'  name='fechaOlinpista' id='inputField' size='40' maxlength='40'/>
	</td>
	
</tr>

<tr>
	<td>Email: </td><td><input type ='text'  name='EmailOlinpista' id='inputField' size='40' maxlength='40'/>
	</td>
	
</tr>
<tr>
	<td>usuario:</td><td><input type='text' name='usuarioOlimpista' size='40' maxlength='40'/></td>
</tr>

<tr>
	<td>Password :</td><td><input type='password' name='passwordOlinpista' size='40' maxlength='40'/></td>
</tr>
<tr>
	<td>Repetir password :</td><td><input type='password' name='repetirPasswordOlinpista' size='40' maxlength='40'/></td>
</tr>

</table>

<input type='submit' id='submit' name='enviar' value='Enviar mensage' style="width: 80px; margin-top: 15px" />
</form>
<div align="center"><br>
  <div align="center">
  
</div>
</body>
</html>