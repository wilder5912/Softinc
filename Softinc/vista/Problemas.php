<?php

class Problemas {
    
    public $titulo;
    public $cuerpo;

    function __construct() {
        $this->titulo=array();
        $this->cuerpo=array();
        $this->contador=0;
        $this->generarTabla();
    }
    function generarTabla(){
<<<<<<< HEAD
        include("../modelo/cnx.php");
=======
        include("../Modelo/cnx.php");
        
>>>>>>> 9bd3d969aa3cc2b920a82c21ef25b943d75451a9
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        $seleccionar='SELECT id_problema  FROM problema;';
        $result     = pg_query($seleccionar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $columnas   = pg_numrows($result);


        for($i=0;$i<=$columnas; $i++){
            $line = pg_fetch_array($result, null, PGSQL_ASSOC);

            $this->titulo[]='<thead>
                    <tr>
                        <td>id</td>
                        <td>problema</td>
                    </tr>
                </thead>';
            $this->cuerpo[]='<tbody>
                    <tr>
                        <td>'.'<a href='."../documento/".$line['id_problema'].'/entrada.in'.'>'.$line['id_problema'].'</a></td>

                    </tr>
                </tbody>';
        }   
    }   
}
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title> Problemas </title>
         
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <h1>BANCO DE PREGUNTAS</h1>
        <table>
      <?php
      $p=new Problemas();
      $i=count($p->cuerpo)-1;
      while($i>=0){
          
      echo $p->cuerpo[$i];
     // echo $p->titulo[$i];
      $i--;
      }
      ?>
        </table>
    </body>

</html>
