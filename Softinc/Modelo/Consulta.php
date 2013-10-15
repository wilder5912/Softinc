<?php

class Consulta {
    
    
    public $cuerpo;
    public $titulo;
    public $col;
    public $cierre;
    public $boton;

        
    function __construct() {
        
        $this->cuerpo=array();
        $this->titulo="";
        $this->col="";
        $this->cierre="";
        
       // $this->generarTabla();
    }
    function generarTablaUsuarios(){
        include("cnx.php");
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $this->titulo="Usuarios de JUEZ VIRTUAL";
        $seleccionar='SELECT id_usuario, id_rol, nombre_usuario, apellido_usuario, ci_usuario, 
                        user_usuario, pass_usuario, institucion_usuario
                        FROM usuario;';
        $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $columnas   = pg_numrows($result);
        $this->col='<tr>
                            <td>ID USUARIO</td>
                            <td>ID ROL</td>
                            <td>NOMBRE </td>
                            <td>APELLIDO</td>
                            <td>CI</td>
                            <td>USER</td>
                            <td>PASSWORD</td>
                            <td>INSTITUCION</td>
                       </tr>';
        for($i=0;$i<=$columnas; $i++){
            $line = pg_fetch_array($result, null, PGSQL_ASSOC);
            $this->cuerpo[]='<tr>
                                <td>'.$line['id_usuario'].'</td>
                                <td>'.$line['id_rol'].'</td>
                                <td>'.$line['nombre_usuario'].'</td>
                                <td>'.$line['apellido_usuario'].'</td>
                                <td>'.$line['ci_usuario'].'</td>
                                <td>'.$line['user_usuario'].'</td>
                                <td>'.$line['pass_usuario'].'</td>
                                <td>'.$line['institucion_usuario'].'</td>
                             </tr>';
        }   
        
    }   
function generarTablaEliminarProblema(){
        include("../modelo/cnx.php");
        $this->titulo="ELIMINAR PROBLEMA";
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $seleccionar='SELECT id_problema, nombre_problema  FROM problema;';
        $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $columnas   = pg_numrows($result);
        $this->col='<tr>
                            <td>ID</td>
                            <td>NOMBRE</td>
                       </tr>';
        $this->formu.='<table>';
        $this->formu.= '<form method="post" action="../Modelo/EliminarProblemaComite.php">';


        for($i=0;$i<=$columnas-1; $i++){
            $line = pg_fetch_array($result, null, PGSQL_ASSOC);
            $this->formu.='<tr>
                             <td>'.$line['id_problema'].'</td> <td><input value='.$line['id_problema'].' name="Contenedor[]" type="checkbox" /></td>
                             <td>'.$line['nombre_problema'].'</td>
                             </tr>';    
        }  
        $this->formu.='</table>';
        $this->formu.='<input type="submit" value="eliminar">';
        $this->formu.='</form>';
        
    }  
}
?>
