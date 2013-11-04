<?php
 include("../modelo/cnx.php");

class Competencia {
    
    function crearCompetencia($id_usuario,$nombre_olimpiada, $fecha_ini, $fecha_fin){
        include("../modelo/cnx.php");
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $insertar= "INSERT INTO competencia(
             id_usuario, nombre_competencia, fecha_inicio_competencia, fecha_fin_competencia)
    VALUES ('$id_usuario', '$nombre_olimpiada','$fecha_ini', '$fecha_fin');";
        $result = pg_query($cnx, $insertar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
    }


    function siguienteCompetencia(){
        include("../modelo/cnx.php");
        session_start();
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $seleccionar='SELECT id_competencia, id_usuario, nombre_competencia, fecha_inicio_competencia, 
                        fecha_fin_competencia
                        FROM competencia
                      where  fecha_inicio_competencia>current_date;';
        
        $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $columnas   = pg_numrows($result);
        
        $this->formu.='<table>';
        $this->formu.='<tr>';
        $this->formu.='<td>Identificador</td>';
        $this->formu.='<td>NOMBRE</td>';
        $this->formu.='<td>Fecha Inicio</td>';
        $this->formu.='<td>Fecha final</td>';
        $this->formu.='<td>Ver</td>';
        $this->formu.='</tr>';
        for($i=0;$i<=$columnas-1; $i++){
            $line = pg_fetch_array($result, null, PGSQL_ASSOC);
             $this->formu.='<tr>
                             <td>'.$line['id_competencia'].'</td> <td>'.$line['nombre_competencia'].'</td><td>'.$line['fecha_inicio_competencia'].'</td> <td>'.$line['fecha_fin_competencia'].'</td> <td><input type="submit" name="competencia"  value='.$line['id_competencia'].'></td>                                    
                            </tr>';                                                                                                                                                                    
        }  
        $this->formu.='</table>';
        return $this->formu;
        
    }     
    function eliminarCompetencia(){
        
    }
   
}

?>
