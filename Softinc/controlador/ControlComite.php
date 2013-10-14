<?php

$accion=$_POST['accionComite'];
if($accion=="crear"){
    echo "<h2>Usted selecciono crear nuevo problema</h2>";
    include('../vista/CrearProblema.html');
}
if($accion=="editar"){
    
}
if($accion=="eliminar"){

     include '../Modelo/Consulta.php';
        $p=new Consulta();
        $p->generarTablaEliminarProblema();
     include('../vista/EliminarProblema.php');
}

?>
