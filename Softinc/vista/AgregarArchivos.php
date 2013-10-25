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
          

<<<<<<< HEAD
            <br>Inserte su archivo de Entrada: &nbsp; &nbsp;    <br><textarea cols="50" rows="10" name="datosEntrada" > </textarea><br>
            <br>Inserte su archivo de Salida : &nbsp; &nbsp;    <br><textarea cols="50" rows="10" name="datosSalida" > </textarea><br>
            Inserte el puntaje del archivo de salida :  <br>
            <input type="text" name="puntajeSalida">
            <br>Agregar Archivos:
=======
            <br>Inserte sus archivo: &nbsp; &nbsp;    <br><textarea cols="50" rows="10" name="datos" > </textarea><br>
                 <select name = "tipoArchivo">
                    
                    <option value = "entrada">Archivo Entrada</option>
                    <option value = "salida">Archivo Salida</option>
                </select>
>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
            <input type="submit" value="agregar" name="agregar">
            
            
        </form>


    </body>
</html>