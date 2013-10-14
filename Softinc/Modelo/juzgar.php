<?php

class Juzgar {
    
               private $nombreArchivo;
               private $numerador;
               private $mensaje;
               
    function __construct() {
        $this->nombreArchivo="";
        $this->numerador=0;
        $this->mensaje="";
    }
    
    function compilarPrograma($lenguaje, $CodigoFuente, $titulo){
        include 'cnx.php';
        include 'cronometro.php' ;
 
         $casio = new cronometro();
        
       $compilar="falla";
      
       //$tiempoInicio = microtimefloat();
       
               if(!strcmp($lenguaje, "java")){ // solo para lenguaje java
         
            $nombreSinExtencion=explode(".",$CodigoFuente);
            if(file_exists("$nombreSinExtencion[0].class") == 1)
            {
            unlink("$nombreSinExtencion[0].class");
            }
            exec("powershell.exe javac $CodigoFuente");
           //echo file_exists("$nombreSinExtencion[0].class");
            if(file_exists("$nombreSinExtencion[0].class") == 1)  
            { 
                $compilar="bueno";
                $this->nombreArchivo = substr($CodigoFuente,0,strrpos($CodigoFuente, '.'));   
              
               //echo ".........................".$nombreSinExtencion[0]."....................";  
               exec("java $nombreSinExtencion[0] <../archivo/entradas/$titulo.in> ../archivo/salida/$titulo.out");      
       
               //para eliminar una fila  
               $numlinea = 0; 
                $lineas = file("../archivo/salida/$titulo.out") ;
               
                foreach ($lineas as $nLinea => $dato)
                {
                    if ($nLinea != $numlinea )
                    $info[] = $dato ;
                }
                $documento = implode("",$info);
                
                file_put_contents("../archivo/salida/$titulo.out", $documento);  
 
                exec("powershell.exe diff (Get-Content ../archivo/salida/$titulo.out) (Get-Content ../archivo/solucion/$titulo.sol) > ../archivo/comparar/comparar.txt" );
                 
               //$tiempoFinal = microtimefloat();
              //  echo "según mi reloj, este script se demoró " . $casio->stop(true, 2) . " segundos en su ejecucion";
               if(($casio->stop(true, 2)) <30  )  
               {
                   $compilar="bueno";
               if($this->leerPorLineas("../archivo/comparar/comparar.txt") == "")
                   {
                   $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,100,'yes');";
                   $categoria=pg_query($entrada,$respuesta);
                   echo "yes";
                     
                 }else{
                     if(leerOutputFormatError("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol")!=="formato")
                     {
                     if(leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol") >0)
                     {
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                    $cantidadAsierto=leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol");                   
                    $cantidaLineas=contarlineas("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol");
                     $porsentage=(100*$cantidadAsierto)/$cantidaLineas;  

                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,$porsentage,'RUNTIME ERROR');";
                   $categoria=pg_query($entrada,$respuesta);
                  
                         echo "RUNTIME ERROR";
                     }
                     
                     if(leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol")==0)
                     {
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'WRONG ANSWER');";
                   $categoria=pg_query($entrada,$respuesta);
                        
                            echo "WRONG ANSWER";
                     } 
                     }else{
                              $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'OUTPUT FORMAT ERROR');";
                   $categoria=pg_query($entrada,$respuesta);
                  
                   
                         echo "OUTPUT FORMAT ERROR";
                     }
                     
                 }
               }else{
                        $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'exsepcion time');";
                   $categoria=pg_query($entrada,$respuesta);
                  
                   echo "exsepcion time";
               }
            }
        }
        if(!strcmp($lenguaje, "c")){ // solo para lenguaje c
           
            $this->nombreArchivo=substr($CodigoFuente,0,strrpos($CodigoFuente, '.'));  
            $nombreSinExtencion=explode(".",$CodigoFuente); 
            if(file_exists("$nombreSinExtencion[0].exe") == 1)
            {
                unlink("$nombreSinExtencion[0].exe");   
            }
            
            exec( "powershell.exe gcc -o $this->nombreArchivo $CodigoFuente");
                   
               if(file_exists("$nombreSinExtencion[0].exe") == 1)  
            { $compilar="bueno";
                   echo  exec( "($nombreSinExtencion[0].exe < ../archivo/entradas/$titulo.in ) > ../archivo/salida/$titulo.out " );     
                exec("powershell.exe diff (Get-Content ../archivo/salida/$titulo.out) (Get-Content ../archivo/solucion/$titulo.sol) > ../archivo/comparar/comparar.txt" );
                      if(($casio->stop(true, 2)) < 5  )  
               {             
                if($this->leerPorLineas("../archivo/comparar/comparar.txt") == "")
                   {
                    $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,100,'yes');";
                   $categoria=pg_query($entrada,$respuesta);
                     echo "yes";
                     
                 }else{
                     if(leerOutputFormatError("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol")!=="formato")
                     {
                     if(leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol") >0)
                     {
                             $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                    $cantidadAsierto=leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol");                   
                    $cantidaLineas=contarlineas("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol");
                     $porsentage=(100*$cantidadAsierto)/$cantidaLineas;  

                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,$porsentage,'RUNTIME ERROR');";
                   $categoria=pg_query($entrada,$respuesta);
                  
                         
                        echo "RUNTIME ERROR";
                     }
                     
                     if(leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol")==0)
                     {
                         
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'WRONG ANSWER');";
                   $categoria=pg_query($entrada,$respuesta);
                        
                            echo "WRONG ANSWER";
                     } 
                     }else{
                          $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'OUTPUT FORMAT ERROR');";
                   $categoria=pg_query($entrada,$respuesta);
                  
                   
                         echo "OUTPUT FORMAT ERROR";
                     }
                     
                 }
               }else{
                     $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'exsepcion time');";
                   $categoria=pg_query($entrada,$respuesta);
                   echo "time exsepcion";
                   
               }
            }
            }
        
                if(!strcmp($lenguaje, "cpp")){ // solo para lenguaje c
            $compilar="bueno";
                    $this->nombreArchivo=substr($CodigoFuente,0,strrpos($CodigoFuente, '.'));
                      $nombreSinExtencion=explode(".",$CodigoFuente);
            if(file_exists("$nombreSinExtencion[0].exe") == 1)
            {
                unlink("$nombreSinExtencion[0].exe");   
            }
            
                    exec( "powershell.exe g++ -o $this->nombreArchivo $CodigoFuente");
                   $nombreSinExtencion=explode(".",$CodigoFuente);
                if(file_exists("$nombreSinExtencion[0].exe") == 1)  
            { $compilar="bueno";
                   echo  exec( "($nombreSinExtencion[0].exe < ../archivo/entradas/$titulo.in ) > ../archivo/salida/$titulo.out " );     
                exec("powershell.exe diff (Get-Content ../archivo/salida/$titulo.out) (Get-Content ../archivo/solucion/$titulo.sol) > ../archivo/comparar/comparar.txt" );
                       if(($casio->stop(true, 2)) < 5  )  
               {            
                if($this->leerPorLineas("../archivo/comparar/comparar.txt") == "")
                   {
                     $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,100,'yes');";
                   $categoria=pg_query($entrada,$respuesta);
                     echo "yes";
                     
                 }else{
                     if(leerOutputFormatError("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol")!=="formato")
                     {
                     if(leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol") >0)
                     {
                               $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                    $cantidadAsierto=leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol");                   
                    $cantidaLineas=contarlineas("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol");
                     $porsentage=(100*$cantidadAsierto)/$cantidaLineas;  

                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,$porsentage,'RUNTIME ERROR');";
                   $categoria=pg_query($entrada,$respuesta);
                        echo "RUNTIME ERROR";
                     }
                     
                     if(leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol")==0)
                     {
                         
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'WRONG ANSWER');";
                   $categoria=pg_query($entrada,$respuesta);
                         
                            echo "WRONG ANSWER";
                     } 
                     }else{
                          $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'OUTPUT FORMAT ERROR');";
                   $categoria=pg_query($entrada,$respuesta);
                  
                         echo "OUTPUT FORMAT ERROR";
                     }
                     
                 }
                
                 } else{
                      $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'exsepcion time');";
                   $categoria=pg_query($entrada,$respuesta);
                     echo "exsepcion time";
                 }
            }
            }
        if($compilar=="falla")
        {
          $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema_usuario,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($entrada,$usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($entrada,$ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'error compilar');";
                   $categoria=pg_query($entrada,$respuesta);   
                    echo ".....error compilar";   
        }
        //include 'subirElArchivo.php';
       // return $this->mensaje;
    }
function leer_Archivo($nombre_fichero){
        
   $fichero_texto = fopen ($nombre_fichero, "r");

   $contenido_fichero = fread($fichero_texto, filesize($nombre_fichero));
   return $contenido_fichero;
}

function leerPorLineas($archivo){
$file = fopen($archivo, "r");
$lineas="";
while(!feof($file))
{
//echo fgets($file). "<br />";
   $lineas=$lineas.  fgets($file);
}
echo $lineas;
fclose($file);
return $lineas;
}

}
function leerRunTimeError($archivo1, $archivo2)
{
    $file1 = fopen($archivo1, "rb");
    $file2 = fopen($archivo2, "rb");
    $res="yes";
    //$nombre_fichero = ‘fichero.txt’;
    //$fichero = fopen($nombre_fichero,'rb'');
    while ( ($linea1 = fgets($file1)) !== false && ($linea2 = fgets($file2)) !== false && $res == "yes" ) {
    
        if($linea1==$linea2)
        {
            $res="yes";
        }else{
            
            $res="no";
            
        }
    }
    fclose($file1);
    fclose($file2);
    return  $res;
    
}


function leerWronGanswer($archivo1, $archivo2)
{
    $file1 = fopen($archivo1, "rb");
    $file2 = fopen($archivo2, "rb");
    $res="yes";
    $contar=0;
    //$nombre_fichero = ‘fichero.txt’;
    //$fichero = fopen($nombre_fichero,'rb'');
    while ( ($linea1 = fgets($file1)) !== false && ($linea2 = fgets($file2)) !== false  ) {
    
        if($linea1==$linea2)
        {
           $contar++;
        }else{
            
          // echo "   ".$contar;
            
        }
        
    }
    fclose($file1);
    fclose($file2);
    return  $contar;
    
}


    function leerOutputFormatError($archivo1,$archivo2)
    {
    $file1 = fopen($archivo1, "rb");
    $file2 = fopen($archivo2, "rb");
    $res="yes";
    $contar=0;
    $contar1=0;

    while ( ($linea1 = fgets($file1)) !== false && ($linea2 = fgets($file2)) !== false  ) {
    $contar1++;
        if($linea1!==$linea2)
        {
            if(trim($linea1,' ')==trim($linea2, ' ')){
                
                $contar++;
            }
        }
    }
    fclose($file1);
    fclose($file2);
    
    if($contar==$contar1)
    {
        $res="formato";
        
    }
    echo "$contar";
    return  $res;
    
    }
function contarlineas($archivo1, $archivo2)
{
    $file1 = fopen($archivo1, "rb");
    $file2 = fopen($archivo2, "rb");
    $res="yes";
    $contar=0;
    //$nombre_fichero = ‘fichero.txt’;
    //$fichero = fopen($nombre_fichero,'rb'');
    while ( ($linea1 = fgets($file1)) !== false && ($linea2 = fgets($file2)) !== false  ) {
    
           $contar++;
        
    }
    fclose($file1);
    fclose($file2);
    return  $contar;
    
}
    
?>
