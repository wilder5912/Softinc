<?php
include '../modelo/Competencia.php';
$nombre_competencia =$_POST['nombre_competencia'];
$fecha_inicio       =$_POST['fecha_inicio'];
$fecha_fin          =$_POST['fecha_fin'];
$competencia=new Competencia();
$competencia->crearCompetencia($nombre_competencia, $fecha_inicio, $fecha_fin);
header("Location: ../vista/CrearCompetencia.php");

?>
