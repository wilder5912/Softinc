<?php

$accion=$_POST['accionComite'];
if($accion=="crear"){
    echo "<h2>Usted selecciono crear nuevo problema</h2>";
    include('../vista/CreacionProblema.php');
}
if($accion=="subir"){
    include('../vista/AgregarArchivos.php');
}
if($accion=="eliminar"){
    require('../vista/EliminarProblema.php');
}



?>
