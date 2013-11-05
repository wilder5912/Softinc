<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action="../controlador/CrearCompetencia.php" method="post">
        <h1>Cree una nueva competencia</h1>
        Nombre de la competencia:<input type="text"             name="nombre_competencia"><br>
        Fecha de inicio:<input type="date" id='inputField'      name="fecha_inicio"><br>
        fecha de fin:<input type="date" id='inputField'         name="fecha_fin"><br>
        <input type="submit" value="Crear Competencia">
        </form>
    </body>
</html>