<?php
 include("../modelo/cnx.php");

class Competencia {
    
    function crearCompetencia($nombre_olimpiada, $fecha_ini, $fecha_fin){
        include("../modelo/cnx.php");
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $insertar= "INSERT INTO competencia(nombre_olimpiada, fecha_inicio_olimpiada, fecha_fin_olimpiada)
                                    VALUES ('$nombre_olimpiada', '$fecha_ini', '$fecha_fin');";
        $result = pg_query($cnx, $insertar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
    }


    function siguienteCompetencia(){
        include("../modelo/cnx.php");
        session_start();
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $seleccionar='SELECT id_olimpiada, nombre_olimpiada, fecha_inicio_olimpiada, fecha_fin_olimpiada
                      FROM competencia
                      where  fecha_inicio_olimpiada>current_date;';
        
        $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $columnas   = pg_numrows($result);
        
        $this->formu.='<table>';
        $this->formu.='<tr>';
        $this->formu.='<td>Identificador</td>';
        $this->formu.='<td>NOMBRE</td>';
        $this->formu.='<td>Fecha Inicio</td>';
        $this->formu.='<td>Fecha final</td>';
        $this->formu.='</tr>';
        for($i=0;$i<=$columnas-1; $i++){
            $line = pg_fetch_array($result, null, PGSQL_ASSOC);
             $this->formu.='<tr>
                             <td>'.$line['id_olimpiada'].'</td> <td>'.$line['nombre_olimpiada'].'</td><td>'.$line['fecha_inicio_olimpiada'].'</td> <td>'.$line['fecha_fin_olimpiada'].'</td>
                            </tr>';    
        }  
        $this->formu.='</table>';
        return $this->formu;
        
    }     
    function eliminarCompetencia(){
        
    }
   
}

?>
