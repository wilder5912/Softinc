<?php
include("cnx.php");

$nombreAdministrador=$_POST['NombreAdministrador'];
$apellidoPaternoAdministrador=$_POST['ApellidoPaternoAdministrador'];
$apellidoMaternoAdministrador=$_POST['ApellidoMaternoAdministrador'];
$ciAdministrador=$_POST['CiAdministrador'];
$fechaAdministrador=$_POST['fechaAdministrador'];
$emailAdministrador=$_POST['EmailAdministrador'];
$usuarioAdministrador=$_POST['usuarioAdministrador'];
$passwordAdministrador=$_POST['passwordAdministrador'];
$repetirPasswordAdministrador=$_POST['repetirPasswordAdministrador'];
$apellidos=$apellidoPaternoAdministrador+" "+$apellidoMaternoAdministrador ;

if($nombreAdministrador=="" || $apellidoMaternoAdministrador=="" || $apellidoMaternoAdministrador=="" || $ciAdministrador=="" ||
         $fechaAdministrador=="" || $emailAdministrador=="" || $usuarioAdministrador=="" || $passwordAdministrador=="" ||
         $repetirPasswordAdministrador="")
	{	
	        
	 //include("../vista/formularioInscripcionOlimpista.php");
	echo "Inserte correctamente los datos  ";
	}else{    
	$guardar = "insert into usuario(nombre_usuario,id_rol,apellido_usuario, ci_usuario, user_usuario,pass_usuario,institucion_usuario,fecha_nacimiento_usuario,email_usuario)values('$nombreAdministrador','1','$apellidos',$ciAdministrador,'$usuarioAdministrador','$passwordAdministrador','ninguno','$fechaAdministrador','$emailAdministrador');";
	         //('sadsa',            'pas',       1515,       'ppppp',            'rewrw',                'palmas',         '01-01-2021',    'will@');
        $sqlq=pg_query($entrada,$guardar);
	//include("mostrar_datos_animal.php");
	//exit;	
	}
?>
