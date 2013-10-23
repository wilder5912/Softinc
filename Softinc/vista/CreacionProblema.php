<html>
    <head>
        <title></title>
    </head>
    <body>
       
        <form method="post" action="../controlador/CrearP.php" enctype="multipart/form-data">
            Nombre del problema:
            <input type="text"    name="nombre">     <br>          
            <label>Seleccione los archivos</label><br>
            inserte el enunciado:                                   <input type="file" name="enunciado"><br>

            <input type="submit" value="Crear Problema" name="crear">
            

            
        </form>
        

    </body>
</html>