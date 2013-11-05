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
     <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

 <script type="text/javascript" src="js/jquery-1.9.0.js"></script>
 <script type="text/javascript" src="js/jquery.validate.min.js"></script>
 <script type="text/javascript" src="js/funcion.js"></script>
 <link rel="stylesheet" href="css/base.css">
 <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/layout.css">
</head>
<body>

<br><center>
<h1 align="center">Registrar usuario </h1>

<div id="formulario"> 
<form  action="../Modelo/inscribirUsuario.php"  method="post" enctype="multipart/form-data" onSubmit="return validarUsuario()" >
<table>

<tr>
	  <td> Nombre :</td><td><input type='text' id ='NombreUsuario' name='NombreUsuario'  size='40' maxlength='40' placeholder="Nombre completo " required  pattern="([A-Z,a-z]{5,20})">  </td>
</tr>
<tr>
	<td>Apellido paterno:</td><td><input type='text' name='ApellidoPaternoUsuario' size='40' maxlength='40' placeholder="Apellido paterno " required pattern="([A-Z,a-z]{5,20})"/></td>
</tr>
<tr>
	<td>Apellido materno:</td><td><input type='text' name='ApellidoMaternoUsuario' size='40' maxlength='40'  placeholder="Apellido materno " required pattern="([A-Z,a-z]{5,20})"/></td> 
</tr>
<tr>
	<td>Ci: </td><td><input type ='text'  name='CiUsuario' size='40' min="1" max="10" maxlength='7' placeholder="CI: 2415125"  pattern="([0-9]{7})" required />
	</td>
</tr>
<tr>
        <td>Unidad educativa: </td><td><input type ='text'  name='unidadEducativaUsuario' size='40'  maxlength='40' placeholder="Nombre institucion" required   />
	</td>
</tr>

<tr>
    <td>fecha de nacimiento: </td><td><input type ='text'  name='fechaUsuario' id='inputField' size='40' maxlength='40' placeholder="Nombre institucion" required pattern="\d{4}-\d{1,2}-\d{1,2}" />
	</td>
</tr>

<tr>
    <td>Email: </td><td><input type ='email'  name='EmailUsuario' id='EmailUsuario' size='40' maxlength='40' placeholder="name@example.com" required /></td>
</tr>
<tr>
    <td>usuario:</td><td><input type='text' name='usuarioUsuario' id="usuarioUsuario"  size='40' maxlength='40' value="" placeholder="Usuarsio"  required /> <div id="resultado"></div></td> 
</tr>

<tr>
	<td>Password :</td><td><input type='password' id="passwordUsuario" name='passwordUsuario' size='40' maxlength='40' required /></td>
</tr>
<tr>
	<td>Repetir password :</td><td><input type='password' id="repetirPasswordUsuario" name='repetirPasswordUsuario' size='40' maxlength='40' required/></td>
</tr>
<tr> <td colspan="2">
  <div align="left">
    <button type="submit">    </button>
  </div>
</tr>
</table>

 
</form>
    
<div align="center"><br>  
</div>
  <div align="center">
  <body> <a href="../vista/principal.html">Volver a pagina principal </a> </body></div>
</body>
</html>
<script type="text/javascript">

$(document).ready(function(){
    
    var consulta;
           
    //hacemos focus
    $("#usuarioUsuario").focus();
                                             
    //comprobamos si se pulsa una tecla
    $("#usuarioUsuario").keyup(function(e){
           //obtenemos el texto introducido en el campo
           consulta = $("#usuarioUsuario").val();
                                    
           //hace la búsqueda
           $("#resultado").delay(1000).queue(function(n) {      
                                         
               
             $("#resultado").html('<img src="ajax-loader.gif" />');         
                      $.ajax({
                            type: "POST",
                            url: "js/comprobar.php",
                            data: "usuarioUsuario="+consulta,
                            dataType: "html",
                            error: function(){
                                  alert("error petición ajax");
                            },
                            success: function(data){                                                      
                                  $("#resultado").html(data);
                                  n();
                            }
                });
                                         
           });
                              
    });
                        
});



</script>
          

</div>