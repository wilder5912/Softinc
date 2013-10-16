
<!DOCTYPE html>
<html>
    <head>
   
    </head>
    <body>

        
        <form method="post" action="../controlador/ControlEliminar.php">
             <?php
             require  '../Modelo/Consulta.php';
                $p=new Consulta();
                echo $p->generarTablaEliminarProblema();
             ?>
        <input type="submit" value="eliminar" name="eliminar">
        </form>


    </body>

</html>
