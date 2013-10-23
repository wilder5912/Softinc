<html>
    <head>
        <title></title>
    </head>
    <body>
       
        <form method="post" action="../controlador/AddArchivo.php" enctype="multipart/form-data">
             Codigo del problema: 
             <?php
                    include '../Modelo/Consulta.php';
                    $con=new Consulta();
                    echo $con->generaListaArchivosPermitidosComite();
            ?>
          

            <br>Inserte sus archivo: &nbsp; &nbsp;    <br><textarea cols="50" rows="10" name="datos" > </textarea><br>
                 <select name = "tipoArchivo">
                    
                    <option value = "entrada">Archivo Entrada</option>
                    <option value = "salida">Archivo Salida</option>
                </select>
            <input type="submit" value="agregar" name="agregar">
            
            
        </form>


    </body>
</html>