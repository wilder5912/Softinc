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
        <form method="post" action="../controlador/ControlComite.php">
            <b>Seccion comite academico</b><br>
            <b>Que desea hacer</b><br>
                <select name = "accionComite">
                    
                    <option value = "crear">Crear nuevo Problema</option>
                    <option value = "editar">Editar problema</option>
                    <option value = "eliminar">Eliminar problema</option>
                    <option value = "ver">Ver Perfil</option>
                    <option value = "ranking">Ver Ranking</option>
                    <option value = "Descargar">Descargar Solucion</option>
                </select>
            <input type="submit" value="realizar" name="Realizar">
        </form>
    </body>   
</html>
