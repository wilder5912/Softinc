<?php

$accion=$_POST['accionAdministrador'];
if($accion=="ver"){
    include '../Modelo/Consulta.php';
    $p=new Consulta();
    $p->generarTablaUsuarios();
    include '../vista/VerUsuarios.php';
}
if($accion=="permisos"){
    include '../vista/Permisos.php';
}
if($accion=="configurar"){
    
}

?>
