<?php
 
session_start();

 include("cnx.php");
 $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
 
$user = $_POST['login'];
$pass = $_POST['password'];
 
//$pass=sha1(md5($pass));
 
    $seleccionar="SELECT id_usuario, id_rol, nombre_usuario, apellido_usuario, ci_usuario, 
                  user_usuario, pass_usuario, institucion_usuario
                  FROM usuario
                  where user_usuario='$user' and pass_usuario='$pass';";
   
    $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
    


    if(pg_numrows($result)){
        $datos = pg_fetch_array($result, null, PGSQL_ASSOC);
<<<<<<< HEAD
//       echo $_SESSION["id_usuario"]      = $datos["id_usuario"];
//       echo $_SESSION["id_rol"]          = $datos["id_rol"];
//       echo $_SESSION["nombre_usuario"]  = $datos["nombre_usuario"];
//       echo $_SESSION["apellido_usuario"]= $datos["apellido_usuario"];
//       echo $_SESSION["ci_usuario"]      = $datos["ci_usuario"];
//       echo $_SESSION["user_usuario"]    = $datos["user_usuario"];
//       echo $_SESSION["pass_usuario"]    = $datos["pass_usuario"];
       if(!strcmp($datos["id_rol"], "1")){
            //header("Location: ../vista/Comite.php");
           echo true;
       }
       else if(!strcmp($datos["id_rol"], "2")){
            //header("Location: ../vista/Administrador.php");
            echo true;
=======
       echo $_SESSION["id_usuario"]      = $datos["id_usuario"];
       echo $_SESSION["id_rol"]          = $datos["id_rol"];
       echo $_SESSION["nombre_usuario"]  = $datos["nombre_usuario"];
       echo $_SESSION["apellido_usuario"]= $datos["apellido_usuario"];
       echo $_SESSION["ci_usuario"]      = $datos["ci_usuario"];
       echo $_SESSION["user_usuario"]    = $datos["user_usuario"];
       echo $_SESSION["pass_usuario"]    = $datos["pass_usuario"];
       if(!strcmp($datos["id_rol"], "2")){
            header("Location: ../vista/Comite.php");
       }
       else if(!strcmp($datos["id_rol"], "1")){
            header("Location: ../vista/Administrador.php");
>>>>>>> ff6e55002ec01276b455337828a308c10219a811
       }
       else if(!strcmp($datos["id_rol"], "3")){
            header("Location: ../vista/Olimpista.php");
       }
} else {
 
echo "<h2>Login o Password Incorrectos</h2>";
 
}
 
?>l

