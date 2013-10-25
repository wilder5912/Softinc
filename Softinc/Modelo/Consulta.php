<?php

class Consulta {
    
    
    public $cuerpo;
    public $titulo;
    public $col;
    public $cierre;
    public $boton;
    public $formu;

        
    function __construct() {
        
        $this->cuerpo=array();
        $this->titulo="";
        $this->col="";
        $this->cierre="";
        $this->formu="";
        
       // $this->generarTabla();
    }
    function generarTablaUsuarios(){
        include("cnx.php");
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $this->titulo="Usuarios de JUEZ VIRTUAL";
        $seleccionar='SELECT usuario.id_usuario, rol.id_rol,nombre_usuario, apellido_usuario, ci_usuario, user_usuario, 
                      pass_usuario, institucion_usuario, fecha_nacimiento_usuario, email_usuario
                      FROM usuario, rol, usuario_tiene
                      where usuario.id_usuario=usuario_tiene.id_usuario and rol.id_rol=usuario_tiene.id_rol';
        
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
    function eliminar($id){
        include("../modelo/cnx.php");
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
	
            $eliminar="delete from roles where codigor='".$id."'";
            $result = pg_query($cnx, $eliminar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        }
    
    
function generarTablaEliminarProblema(){
        include("../modelo/cnx.php");
        session_start();
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $seleccionar=   'SELECT id_problema, nombre_problema
                        FROM problema, usuario
                        where  problema.id_usuario=usuario.id_usuario
                        and usuario.id_usuario='.$_SESSION["id_usuario"];
        
        $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $columnas   = pg_numrows($result);
        $this->formu.='<table>';
        for($i=0;$i<=$columnas-1; $i++){
            $line = pg_fetch_array($result, null, PGSQL_ASSOC);
             $this->formu.='<tr>
                             <td>'.$line['id_problema'].'</td> <td><input value='.$line['id_problema'].' name="Contenedor[]" type="checkbox" /></td>
                             <td>'.$line['nombre_problema'].'</td>
                             </tr>';    
        }  
        $this->formu.='</table>';
        return $this->formu;
        
    }     
    function generarPermisos(){
        include("../modelo/cnx.php");
        session_start();
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $seleccionar=   'SELECT usuario.id_usuario, rol.nombre_tipo, nombre_usuario, apellido_usuario, ci_usuario, user_usuario, 
       pass_usuario, institucion_usuario, fecha_nacimiento_usuario, 
       email_usuario
  FROM usuario, rol, usuario_tiene
 where usuario.id_usuario=usuario_tiene.id_usuario and rol.id_rol=usuario_tiene.id_rol
                               order by id_usuario;';
        
        $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $columnas   = pg_numrows($result);
        $this->formu.='<table>';
        for($i=0;$i<=$columnas-1; $i++){
            $line = pg_fetch_array($result, null, PGSQL_ASSOC);
  
               $this->formu.='<tr>             
               <td>'.$line['id_usuario'].'</td> 
               <td>'.$line['nombre_tipo'].'</td> 
               <td>'.$line['nombre_usuario'].'</td>
               <td>'.$line['apellido_usuario'].'</td> 
               <td>'.$line['ci_usuario'].'</td> 
               <td>'.$line['institucion_usuario'].'</td>
               <td><input type="CHECKBOX" name="rol[]" value='.$line['id_usuario']."_3_".'> olimpista
                   <input type="CHECKBOX" name="rol[]" value='.$line['id_usuario']."_2_".'>comite   
                   <input type="CHECKBOX" name="rol[]" value='.$line['id_usuario']."_1_".'>administrador</td>
               </tr>';
             
        }  
        $this->formu.='</table>';
        return $this->formu;
    }
    function generarArchivosSubidos(){
<<<<<<< HEAD
        
        include("../modelo/cnx.php");
        session_start();
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $seleccionar=   'SELECT id_problema, usuario.id_usuario, nombre_problema
                         FROM problema, usuario
                         where usuario.id_usuario=problema.id_usuario
                         and usuario.id_usuario='.$_SESSION["id_usuario"];
        
        $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $columnas   = pg_numrows($result);
        $this->formu.='<table>';
        for($i=0;$i<=$columnas-1; $i++){
            $line = pg_fetch_array($result, null, PGSQL_ASSOC);
            $nombre=$line['id_problema'];
               $this->formu.='<tr>             
               <td>'.$line['id_problema'].'</td> 
               <td>'.$line['nombre_problema'].'</td>
               <td><a href="../archivo/'.$nombre.'/'.$nombre.".IN".'">'.$line['id_problema'].'</a></td>
               </tr>';
             
        }  
        $this->formu.='</table>';
        return $this->formu;    
    }
    function generaListaArchivosPermitidosComite(){
                      
                  include("../modelo/cnx.php");
                  $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
                  session_start();
                  $seleccionar="SELECT id_problema, usuario.id_usuario, nombre_problema, descripcion_problema
                                FROM problema, usuario
                                where problema.id_usuario=usuario.id_usuario
                                and usuario.id_usuario=".$_SESSION["id_usuario"];
    
                $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
                $columnas   = pg_numrows($result);
                $this->formu.='<select name = "idArchivo">';
                for($i=0;$i<=$columnas-1; $i++){
                     $line = pg_fetch_array($result, null, PGSQL_ASSOC);
                                   $this->formu.='<option value ='.$line['id_problema'].'>'.$line['id_problema'].'</option>';
                }
                $this->formu.='</select>';
 

        
           return $this->formu;    
=======
        
        include("../modelo/cnx.php");
        session_start();
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $seleccionar=   'SELECT id_problema, usuario.id_usuario, nombre_problema
                         FROM problema, usuario
                         where usuario.id_usuario=problema.id_usuario
                         and usuario.id_usuario='.$_SESSION["id_usuario"];
        
        $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $columnas   = pg_numrows($result);
        $this->formu.='<table>';
        for($i=0;$i<=$columnas-1; $i++){
            $line = pg_fetch_array($result, null, PGSQL_ASSOC);
            $nombre=$line['id_problema'];
               $this->formu.='<tr>             
               <td>'.$line['id_problema'].'</td> 
               <td>'.$line['nombre_problema'].'</td>
               <td><a href="../archivo/'.$nombre.'/'.$nombre.".IN".'">'.$line['id_problema'].'</a></td>
               </tr>';
             
        }  
        $this->formu.='</table>';
        return $this->formu;    
>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
    }
    function generaListaArchivosPermitidosComite(){
                      
                  include("../modelo/cnx.php");
                  $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
                  session_start();
                  $seleccionar="SELECT id_problema, usuario.id_usuario, nombre_problema, descripcion_problema
                                FROM problema, usuario
                                where problema.id_usuario=usuario.id_usuario
                                and usuario.id_usuario=".$_SESSION["id_usuario"];
    
                $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
                $columnas   = pg_numrows($result);
                $this->formu.='<select name = "idArchivo">';
                for($i=0;$i<=$columnas-1; $i++){
                     $line = pg_fetch_array($result, null, PGSQL_ASSOC);
                                   $this->formu.='<option value ='.$line['id_problema'].'>'.$line['id_problema'].'</option>';
                }
                $this->formu.='</select>';
 

        
           return $this->formu;    
    }
    
    
    
    
}
// $c=new Consulta();
//echo $c->generarArchivosSubidos();

?>
