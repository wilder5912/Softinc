<?php
include("cnx.php");

$nombreComite=$_POST['NombreComite'];
$apellidoPaternoComite=$_POST['ApellidoPaternoComite'];
$apellidoMaternoComite=$_POST['ApellidoMaternoComite'];
$ciComite=$_POST['CiComite'];
$fechaComite=$_POST['fechaComite'];
$emailComite=$_POST['EmailComite'];
$usuarioComite=$_POST['usuariComite'];
$passwordComite=$_POST['passwordComite'];
$repetirPasswordComite=$_POST['repetirPasswordComite'];
$apellidos=$apellidoPaternoComite+" "+$apellidoMaternoComite ;

if($nombreComite=="" || $apellidoMaternoComite=="" || $apellidoMaternoComite=="" || $ciComite=="" ||
         $fechaComite=="" || $emailComite=="" || $usuarioComite=="" || $passwordComite=="" ||
         $repetirPasswordComite="")
	{	
	        
	 //include("../vista/formularioInscripcionOlimpista.php");
	echo "Inserte correctamente los datos  ";
	}else{    
	$guardar = "insert into usuario(nombre_usuario,id_rol,apellido_usuario, ci_usuario, user_usuario,pass_usuario,institucion_usuario,fecha_nacimiento_usuario,email_usuario)values('$nombreComite','2','$apellidos',$ciComite,'$usuarioComite','$passwordComite','ninguno','$fechaComite','$emailComite');";
	         //('sadsa',            'pas',       1515,       'ppppp',            'rewrw',                'palmas',         '01-01-2021',    'will@');
        $sqlq=pg_query($entrada,$guardar);
	//include("mostrar_datos_animal.php");
	//exit;	
	}
?>
