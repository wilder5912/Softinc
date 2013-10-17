<?php
session_start();
//$_SESSION["ci_usuario"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="1.js" language="JavaScript"></script>
        <link rel="StyleSheet" href="1.css" type="text/css">
    </head>
    <body>
        bienvenid@ a juez SOFT-INC: <?php echo $_SESSION["nombre_usuario"];  ?><br>
        <form method="post" action="../controlador/ControlADM.php">
            <b>Seccion Administrador</b><br>
            <b>Que desea hacer</b><br>
                <select name = "accionAdministrador">
                    
                    <option value = "ver">Ver todos los usuarios</option>
                    <option value = "permisos">Modificar permisos</option>
                    <option value = "configurar">Configurar Evaluacion</option>
                </select>
            <input type="submit" value="realizar" name="Realizar">
        </form>
    </body>
        
</html>