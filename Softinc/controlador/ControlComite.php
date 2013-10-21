<?php

$accion=$_POST['accionComite'];
if($accion=="crear"){
    echo "<h2>Usted selecciono crear nuevo problema</h2>";
    include('../vista/CrearProblema.html');
}
if($accion=="editar"){
    
}
if($accion=="eliminar"){

    
         
    require('../vista/EliminarProblema.php');
}



?>
