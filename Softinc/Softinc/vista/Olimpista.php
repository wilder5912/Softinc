<?php
session_start();
//$_SESSION["ci_usuario"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        bienvenid@ a juez SOFT-INC: <?php echo $_SESSION["nombre_usuario"];  ?><br>
        <form method="post" action="../controlador/ControlUsuario.php">
            <b>Seccion Usuario Olimpista</b><br>
            <b>Que desea hacer</b><br>
                <select name = "accionUsuario">
                    
                    <option value = "subir">Subir Problema</option>
                    <option value = "descargar">Descargar Problema</option>
                    <option value = "ranking">Ver Ranking</option>
                    <option value = "Ver Perfil">Ver Perfil</option>
                    <option value = "datos">Modificar datos</option>
                </select>
            <input type="submit" value="realizar" name="Realizar">
        </form>
    </body>
        
</html>
