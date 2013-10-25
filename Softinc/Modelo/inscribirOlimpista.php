<body>
<?php
include("cnx.php");
pg_connect("$entrada")or die ("Error de conexion. ". pg_last_error());
$nombreOlimpista=$_POST['NombreOlinpista'];
$apellidoPaternoOlimpista=$_POST['ApellidoPaternoOlinpista'];
$apellidoMaternoOlimpista=$_POST['ApellidoMaternoOlinpista'];
$ciOlipista=$_POST['CiOlinpista'];
$unidadEducativa=$_POST['unidadEducativaOlinpista'];
$fechaOlimpiada=$_POST['fechaOlinpista'];
$emailOlinpista=$_POST['EmailOlinpista'];
$usuarioOlimpista=$_POST['usuarioOlimpista'];
$passwordOlinpista=$_POST['passwordOlinpista'];
$repetirPasswordOlinpista=$_POST['repetirPasswordOlinpista'];
$apellidos=$apellidoPaternoOlimpista+" "+$apellidoMaternoOlimpista ;
	if($nombreOlimpista=="" || $apellidoMaternoOlimpista=="" || $apellidoMaternoOlimpista=="" || $ciOlipista=="" ||
         $unidadEducativa=="" || $fechaOlimpiada=="" || $emailOlinpista=="" || $usuarioOlimpista=="" || $passwordOlinpista=="" ||
         $repetirPasswordOlinpista="")
	{	
	        
	 //include("../vista/formularioInscripcionOlimpista.php");
	echo "Inserte correctamente los datos  ";
	}else{    
	$guardar = "insert into usuario(nombre_usuario,id_rol,apellido_usuario, ci_usuario, user_usuario,pass_usuario,institucion_usuario,fecha_nacimiento_usuario,email_usuario)values('$nombreOlimpista','4','$apellidos',$ciOlipista,'$usuarioOlimpista','$passwordOlinpista','$unidadEducativa','$fechaOlimpiada','$emailOlinpista');";
	         //('sadsa',            'pas',       1515,       'ppppp',            'rewrw',                'palmas',         '01-01-2021',    'will@');
        $sqlq=pg_query($entrada,$guardar);
	include("../Vista/formularioInscripcionOlimpista.php");
	echo "Ya esta registrado";
        exit;	
	}
?>

</body>