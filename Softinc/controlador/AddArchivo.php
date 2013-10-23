<?php

if(isset($_POST['agregar'])){
     require '../modelo/File.php';
     
    $datos=$_POST['datos'];
    $nomProblema=$_POST['idArchivo'];
    $archivo=new File();
    
    
    
    if(isset($_POST['tipoArchivo'])){
        if(!strcmp($_POST['tipoArchivo'], "entrada")){
          $numero=$archivo->listarArchivos("../archivo/$nomProblema", "in");  
          $numero++;
          $archivo->guardar($datos,"$numero.in");
          rename("$numero.in" ,"../archivo/$nomProblema/$numero.in");   
          $mensaje="archivos insertados exitosamente";
        }
        elseif (!strcmp($_POST['tipoArchivo'], "salida")) {
          $numero=$archivo->listarArchivos("../archivo/$nomProblema", "out");  
          $numero++;
          $archivo->guardar($datos,"$numero.out");
          rename( "$numero.out" ,"../archivo/$nomProblema/$numero.out" );   
          $mensaje="archivos insertados exitosamente";
        }
    }
               
               
                
               // require '../vista/SesionComite.php';
               // header("Location: ../vista/SesionComite.php");
                
              //  require '../Modelo/Contenido.php';
              //  $c =new Contenido("../vista/AgregarArchivos.php");
              //  $c->ponerTemplates("Ingrese","bienvenido al juez");
               // echo $c->mostrar();
              //  header("Location: ../vista/AgregarArchivos.php");

  $ruta = "../archivo/$nomProblema";
$archivo->comprimir($ruta, "../archivo/$nomProblema/$nomProblema.zip.");

//$archivo->download_file("../archivo/test.zip");
    
}
?>
