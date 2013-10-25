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
          

            <br>Inserte su archivo de Entrada: &nbsp; &nbsp;    <br><textarea cols="50" rows="10" name="datosEntrada" > </textarea><br>
            <br>Inserte su archivo de Salida : &nbsp; &nbsp;    <br><textarea cols="50" rows="10" name="datosSalida" > </textarea><br>
            Inserte el puntaje del archivo de salida :  <br>
            <input type="text" name="puntajeSalida">
            <br>Agregar Archivos:
            <input type="submit" value="agregar" name="agregar">
            
            
        </form>


    </body>
</html>