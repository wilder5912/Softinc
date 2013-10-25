
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
    
    function compilarPrograma($lenguaje, $CodigoFuente, $titulo)
                
    {
        include 'cnx.php';
        $cnx = pg_connect($entrada) or die ("Error de conexion. ". pg_last_error());
        include 'cronometro.php' ;
         $casio = new cronometro();
         $compilar="falla";
      
       
           if(!strcmp($lenguaje, "java"))
        { 
            $texto = file_get_contents("$CodigoFuente");
            //$texto = nl2br($texto);
            $nombreSinExtencion=explode(".",$CodigoFuente);
           
            if(file_exists("$nombreSinExtencion[0].class") == 1)
            {
                 //echo "$nombreSinExtencion[0].class";
                 
                 unlink("$nombreSinExtencion[0].class");
               
            }
           // echo "&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&"; 
            
            exec("powershell.exe javac $CodigoFuente");
           // exec("java principal < ../archivo/problema/1/1.in  >../archivo/olimpista/1/1.out");
           //echo file_exists("$nombreSinExtencion[0].class");
            if(file_exists("$nombreSinExtencion[0].class") == 1)  
            { 
                $compilar="bueno";
                $this->nombreArchivo = substr($CodigoFuente,0,strrpos($CodigoFuente, '.'));   
              
               //echo ".........................".$nombreSinExtencion[0]."....................";  
                $tipo1 = array ("in");
                $tipo2 = array ("sol");
               $entrada=listar_ficheros($tipo1,"../archivo/problema/1/");
               $solucion=listar_ficheros($tipo2,"../archivo/olimpista/1/");
             for($i=0;$i< sizeof($solucion);$i++)
               {
                
                   $j=$i+1;
                exec( "java $nombreSinExtencion[0] < ../archivo/problema/$titulo/$entrada[$i]  >../archivo/olimpista/$titulo/$solucion[$i]");
            
               eliminafila("../archivo/olimpista/$titulo/$solucion[$i]");
               }
              
               if(($casio->stop(true, 2)) <30  )  
               {
                   $compilar="bueno";
                   //echo "holas1";
               if( CantidadDirencia("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/",$titulo) == 0)
                   {
                  // echo "holas2";
                   $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,100,'yes');";
                   $categoria=pg_query($respuesta);
                   echo "yes";
                     
                 }else{
                     if(leerOutputFormatError("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/",$titulo)=="yes")
                     {
                       //  echo "entro--------------------------------------------------------------------";
                     if(leerWronGanswer("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/") >0)
                     {
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                    $porsentage=calificarPregunta("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/",$titulo);                   
                   
                   
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,$porsentage,'RUNTIME ERROR');";
                   $categoria=pg_query($respuesta);
                  
                         echo "RUNTIME ERROR";
                     }
                     
                     if(leerWronGanswer("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/")==0)
                     {
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'WRONG ANSWER');";
                   $categoria=pg_query($respuesta);
                        
                            echo "WRONG ANSWER";
                     } 
                     }else{
                              $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'OUTPUT FORMAT ERROR');";
                   $categoria=pg_query($respuesta);
                  
                   
                         echo "OUTPUT FORMAT ERROR";
                     }
                     
                 }
               }else{
                        $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'exsepcion time');";
                   $categoria=pg_query($respuesta);
                  
                   echo "exsepcion time";
               }
            }
        }
        if(!strcmp($lenguaje, "c"))
        
        { // solo para lenguaje c
           
            $this->nombreArchivo=substr($CodigoFuente,0,strrpos($CodigoFuente, '.'));  
            $nombreSinExtencion=explode(".",$CodigoFuente); 
            if(file_exists("$nombreSinExtencion[0].exe") == 1)
            {
                unlink("$nombreSinExtencion[0].exe");   
            }
            
            exec( "powershell.exe gcc -o $this->nombreArchivo $CodigoFuente");
                   
               if(file_exists("$nombreSinExtencion[0].class") == 1)
            {
                 //echo "$nombreSinExtencion[0].class";
                 
                 unlink("$nombreSinExtencion[0].class");
               
            }
           // echo "&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&"; 
            
            exec("powershell.exe javac $CodigoFuente");
           // exec("java principal < ../archivo/problema/1/1.in  >../archivo/olimpista/1/1.out");
           //echo file_exists("$nombreSinExtencion[0].class");
            if(file_exists("$nombreSinExtencion[0].class") == 1)  
            { 
                $compilar="bueno";
                $this->nombreArchivo = substr($CodigoFuente,0,strrpos($CodigoFuente, '.'));   
              
               //echo ".........................".$nombreSinExtencion[0]."....................";  
                $tipo1 = array ("in");
                $tipo2 = array ("sol");
               $entrada=listar_ficheros($tipo1,"../archivo/problema/1/");
               $solucion=listar_ficheros($tipo2,"../archivo/olimpista/1/");
             for($i=0;$i< sizeof($solucion);$i++)
               {
                
                   $j=$i+1;
            exec( "java $nombreSinExtencion[0] < ../archivo/problema/$titulo/$entrada[$i]  >../archivo/olimpista/$titulo/$solucion[$i]");
            
               eliminafila("../archivo/olimpista/$titulo/$solucion[$i]");
               }
              
               if(($casio->stop(true, 2)) <30  )  
               {
                   $compilar="bueno";
                   //echo "holas1";
               if( CantidadDirencia("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/",$titulo) == 0)
                   {
                  // echo "holas2";
                   $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,100,'yes');";
                   $categoria=pg_query($respuesta);
                   echo "yes";
                     
                 }else{
                     if(leerOutputFormatError("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/",$titulo)=="yes")
                     {
                       //  echo "entro--------------------------------------------------------------------";
                     if(leerWronGanswer("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/") >0)
                     {
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                    $porsentage=calificarPregunta("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/",$titulo);                   
                   
                   
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,$porsentage,'RUNTIME ERROR');";
                   $categoria=pg_query($respuesta);
                  
                         echo "RUNTIME ERROR";
                     }
                     
                     if(leerWronGanswer("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/")==0)
                     {
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'WRONG ANSWER');";
                   $categoria=pg_query($respuesta);
                        
                            echo "WRONG ANSWER";
                     } 
                     }else{
                              $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'OUTPUT FORMAT ERROR');";
                   $categoria=pg_query($respuesta);
                  
                   
                         echo "OUTPUT FORMAT ERROR";
                     }
                     
                 }
               }else{
                        $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'exsepcion time');";
                   $categoria=pg_query($respuesta);
                  
                   echo "exsepcion time";
               }
            }
        }
        if(!strcmp($lenguaje, "c"))
        
        { // solo para lenguaje c
           
            $this->nombreArchivo=substr($CodigoFuente,0,strrpos($CodigoFuente, '.'));  
            $nombreSinExtencion=explode(".",$CodigoFuente); 
            if(file_exists("$nombreSinExtencion[0].exe") == 1)
            {
                unlink("$nombreSinExtencion[0].exe");   
            }
            
            exec( "powershell.exe gcc -o $this->nombreArchivo $CodigoFuente");
                   
              if(file_exists("$nombreSinExtencion[0].class") == 1)
            {
                 //echo "$nombreSinExtencion[0].class";
                 
                 unlink("$nombreSinExtencion[0].class");
               
            }
           // echo "&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&"; 
            
            exec("powershell.exe javac $CodigoFuente");
           // exec("java principal < ../archivo/problema/1/1.in  >../archivo/olimpista/1/1.out");
           //echo file_exists("$nombreSinExtencion[0].class");
            if(file_exists("$nombreSinExtencion[0].class") == 1)  
            { 
                $compilar="bueno";
                $this->nombreArchivo = substr($CodigoFuente,0,strrpos($CodigoFuente, '.'));   
              
               //echo ".........................".$nombreSinExtencion[0]."....................";  
                $tipo1 = array ("in");
                $tipo2 = array ("sol");
               $entrada=listar_ficheros($tipo1,"../archivo/problema/1/");
               $solucion=listar_ficheros($tipo2,"../archivo/olimpista/1/");
             for($i=0;$i< sizeof($solucion);$i++)
               {
                
                   $j=$i+1;
            exec( "java $nombreSinExtencion[0] < ../archivo/problema/$titulo/$entrada[$i]  >../archivo/olimpista/$titulo/$solucion[$i]");
            
               eliminafila("../archivo/olimpista/$titulo/$solucion[$i]");
               }
              
               if(($casio->stop(true, 2)) <30  )  
               {
                   $compilar="bueno";
                   //echo "holas1";
               if( CantidadDirencia("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/",$titulo) == 0)
                   {
                  // echo "holas2";
                   $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'$texto',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,100,'yes');";
                   $categoria=pg_query($respuesta);
                   echo "yes";
                     
                 }else{
                     if(leerOutputFormatError("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/",$titulo)!=="formato")
                     {
                       //  echo "entro--------------------------------------------------------------------";
                     if(leerWronGanswer("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/") >0)
                     {
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                    $porsentage=calificarPregunta("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/",$titulo);                   
                   
                   
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,$porsentage,'RUNTIME ERROR');";
                   $categoria=pg_query($respuesta);
                  
                         echo "RUNTIME ERROR";
                     }
                     
                     if(leerWronGanswer("../archivo/olimpista/$titulo/", "../archivo/problema/$titulo/")==0)
                     {
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'WRONG ANSWER');";
                   $categoria=pg_query($respuesta);
                        
                            echo "WRONG ANSWER";
                     } 
                     }else{
                              $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'OUTPUT FORMAT ERROR');";
                   $categoria=pg_query($respuesta);
                  
                   
                         echo "OUTPUT FORMAT ERROR";
                     }
                     
                 }
               }else{
                        $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'exsepcion time');";
                   $categoria=pg_query($respuesta);
                  
                   echo "exsepcion time";
               }
            }
        }
        if(!strcmp($lenguaje, "c"))
        
        { // solo para lenguaje c
           
            $this->nombreArchivo=substr($CodigoFuente,0,strrpos($CodigoFuente, '.'));  
            $nombreSinExtencion=explode(".",$CodigoFuente); 
            if(file_exists("$nombreSinExtencion[0].exe") == 1)
            {
                unlink("$nombreSinExtencion[0].exe");   
            }
            
            exec( "powershell.exe gcc -o $this->nombreArchivo $CodigoFuente");
                   
                if(file_exists("$nombreSinExtencion[0].exe") == 1)  
              {  
                   $compilar="bueno";
                   echo  exec( "($nombreSinExtencion[0].exe < ../archivo/entradas/$titulo.in ) > ../archivo/salida/$titulo.out " );   
              }
                if(file_exists("$nombreSinExtencion[0].exe") == 1)  
            { 
                $compilar="bueno";
                $this->nombreArchivo = substr($CodigoFuente,0,strrpos($CodigoFuente, '.'));   
              
               //echo ".........................".$nombreSinExtencion[0]."....................";  
               exec("$nombreSinExtencion[0].exe <../archivo/entradas/$titulo.in > ../archivo/salida/$titulo.out");      
       
               //para eliminar una fila  
               $numlinea = 0; 
                $lineas = file("../archivo/salida/$titulo.out") ;
               
                foreach ($lineas as $nLinea => $dato)
                {
                    if ($nLinea != $numlinea )
                    $info[] =$dato ;
                }
                
                $documento = implode($info,"");
                
                file_put_contents("../archivo/salida/$titulo.out", $documento);  
 
                exec("powershell.exe diff (Get-Content ../archivo/salida/.out) (Get-Content ../archivo/solucion/2.sol) > ../archivo/comparar/comparar.txt" );
                 
               //$tiempoFinal = microtimefloat();
              //  echo "según mi reloj, este script se demoró " . $casio->stop(true, 2) . " segundos en su ejecucion";
               if(($casio->stop(true, 2)) <30  )  
               {
                   $compilar="bueno";
                   //echo "holas1";
               if( CantidadDirencia("../archivo/salida/$titulo.out", "../archivo/solucion/$titulo.sol") == 0)
                   {
                  // echo "holas2";
                   $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,100,'yes');";
                   $categoria=pg_query($respuesta);
                   echo "yes";
                     
                 }else{
                     if(leerOutputFormatError("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol")!=="formato")
                     {
                     if(leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol") >0)
                     {
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                    $cantidadAsierto=leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol");                   
                    $cantidaLineas=contarlineas("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol");
                     $porsentage=(100*$cantidadAsierto)/$cantidaLineas;  

                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,$porsentage,'RUNTIME ERROR');";
                   $categoria=pg_query($respuesta);
                  
                         echo "RUNTIME ERROR";
                     }
                     
                     if(leerWronGanswer("../archivo/salida/$titulo.out","../archivo/solucion/$titulo.sol")==0)
                     {
                         $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'WRONG ANSWER');";
                   $categoria=pg_query($respuesta);
                        
                            echo "WRONG ANSWER";
                     } 
                     }else{
                              $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'OUTPUT FORMAT ERROR');";
                   $categoria=pg_query($respuesta);
                  
                   
                         echo "OUTPUT FORMAT ERROR";
                     }
                     
                 }
               }else{
                        $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'exsepcion time');";
                   $categoria=pg_query($respuesta);
                  
                   echo "exsepcion time";
               }
            }
        }
        
        if($compilar=="falla")
        {
          $usuariosube="insert into solucion_olimpista(id_lenguaje,id_problema,texto_solucion_olimpista,codigo_solucion_olimpista) values (1,1,'bueno',$titulo);";
                    pg_query($usuariosube);
                   $ultimo="SELECT solucion_olimpista.id_solucion_olimpista FROM public.solucion_olimpista;";
                   $ultimodato=pg_query($ultimo);
                   while($arreglo = pg_fetch_array($ultimodato))
                    {
                        $num = $arreglo['id_solucion_olimpista'];
                    }
                   $respuesta="insert into calificacion(id_solucion_olimpista,nota_calificacion ,mensaje_calificacion) values ($num,0,'error compilar');";
                   $categoria=pg_query($respuesta);   
                    echo ".....error compilar";   
        }
      include '../vista/suvirProblemaJuez.php';
      exit();
       // return $this->mensaje;
    }
        
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
//echo $lineas;
fclose($file);
return $lineas;
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
    $res="yes";
    $contar=0;
   // echo "contado".$contar;
    $tipo1 = array ("sol");
     $tipo2 = array ("out");
     //echo "$archivo2 problema-----------??????????----------------------------";
    $solucion=listar_ficheros ($tipo1, $archivo1);//olimpista
    $salida=listar_ficheros ($tipo2, $archivo2);//problema
    
    for($j=0; $j< sizeof($salida); $j++ )
    {
        //echo "$archivo1.$solucion[$j] dajflsdhfklsdjhflkasjhl";
        $file1 = fopen($archivo1.$solucion[$j], "rb");
        $file2 = fopen($archivo2.$salida[$j], "rb");
    //$nombre_fichero = ‘fichero.txt’;
    //$fichero = fopen($nombre_fichero,'rb'');
      //  echo "casi entrar";
           if(contarArchivo($archivo1.$solucion[$j])== contarArchivo($archivo2.$salida[$j]-1))
    {
               $suma=contarArchivo($archivo2.$salida[$j]);
    while ( ($linea1 = fgets($file1)) !== false && ($linea2 = fgets($file2)) !== false && $suma == 0) {
     // echo "$linea1 && $linea2";
        $suma--;
        if($linea1==$linea2)
        {
          
           $contar++;
        }
        
    }
    }else{
        $contar=0;
        $j=sizeof($salida)+1;
    }
    fclose($file1);
    fclose($file2);
    }
    return  $contar;
    
}

function calificarPregunta($archivo1, $archivo2,$titu)
{
   
    $contar=0;
    $nota=0;
    $linea=0;
    $tipo1 = array ("sol");
       $tipo2 = array ("out");
     $solucion=listar_ficheros ($tipo1, $archivo1);//olimpista
    $salida=listar_ficheros ($tipo2, $archivo2);//problema
    $porsentage=0;
    for($j=0; $j< sizeof($solucion); $j++ )
    {
        $file1 = fopen($archivo1.$solucion[$j], "rb");
        $file2 = fopen($archivo2.$salida[$j], "rb");
    //$nombre_fichero = ‘fichero.txt’;
    //$fichero = fopen($nombre_fichero,'rb'');
   
    while ( ($linea1 = fgets($file1)) !== false && ($linea2 = fgets($file2)) !== false  ) {
    
        if($linea1==$linea2)
        {
           $contar++;
        }else{
            
          // echo "   ".$contar;
            
        }
        $linea++;
        
    }
    }
    fclose($file1);
    fclose($file2);
    
    $porsenta=($contar*100)/$linea;
    $nota=$nota+$porsenta;
    
    
    $porsentage=($nota/sizeof($solucion));
    
    return $porsentage;
    
}

    function leerOutputFormatError($archivo1,$archivo2,$num)
    {
    $res="yes";
    $contar=0;
    $contar1=0;
    $tipo1 = array ("sol");
       $tipo2 = array ("out");
    $solucion=listar_ficheros ($tipo1, $archivo1);//olimpista
    $salida=listar_ficheros ($tipo2, $archivo2);//problema
    //echo "$archivo2@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@$salida[0]";
    for($j=0; $j< sizeof($solucion); $j++ )
    {
        //echo $archivo1.$solucion[$j]."@@@@@@@@@@@@@@@1";
      //  echo $archivo2.$salida[$j]."@@@@@@@@@@@@@@@2";
       $file1 = fopen($archivo1.$solucion[$j], "rb");
       $file2 = fopen($archivo2.$salida[$j], "rb");
        if(contarArchivo($archivo1.$solucion[$j])== contarArchivo($archivo2.$salida[$j]))
    {
    while ( ($linea1 = fgets($file1)) !== false && ($linea2 = fgets($file2)) !== false  ) {
    $contar1++;
    
        if($linea1!==$linea2)
        {
           
            if(limpia_espacios($linea1) == $linea2)
                {     echo "me despido";    
                  $contar++;
                }
        }
    }
    
    }else{
        $contar=-1;
        $i=sizeof($solucion)+1;
    }
    fclose($file1);
    fclose($file2);
    
    
    }
   // echo $contar."contado";
    if($contar==$contar1)
    {
        $res="formato";
        
    }
   // echo "$contar";
    echo $res."-------------";
    return  $res;
    
    }
   function limpia_espacios($cadena){
    $cadena = str_replace(' ', '', $cadena);
    return $cadena;
}
function contarlineas($archivo1, $archivo2)
{
    $file1 = fopen($archivo1, "rb");
    $file2 = fopen($archivo2, "rb");
    $res="yes";
    $contar=0;
    //$nombre_fichero = ‘fichero.txt’;
    //$fichero = fopen($nombre_fichero,'rb'');
    while ( ($linea1 = fgets($file1)) !== false || ($linea2 = fgets($file2)) !== false  ) {
    
           $contar++;
        
    }
    fclose($file1);
    fclose($file2);
    return  $contar;
    
}



    function CantidadDirencia($archivo1, $archivo2,$num)
{
       $tipo1 = array ("sol");//olimpista
       $tipo2 = array ("out");//problema
   $solucion=listar_ficheros ($tipo1, $archivo1);//carpeta olimpista
   $salida=listar_ficheros ($tipo2, $archivo2);//carpeta problema
   $contar=0;
   $res="yes";
   
   for($j=0; $j< sizeof($solucion); $j++ )
   {
        $file1 = fopen($archivo1.$solucion[$j],"rb");//olimpista
        
        $file2 = fopen($archivo2.$salida[$j], "rb");//problema
        
  //  echo contarArchivo($archivo1.$solucion[$j])."holaaaaa1".$archivo1.$solucion[$j]."olimpista";
   // echo contarArchivo($archivo2.$salida[$j])."holaaaaaa2".$archivo2.$salida[$j]."";
    
    if(contarArchivo($archivo1.$solucion[$j])== contarArchivo($archivo2.$salida[$j]))
    {
    while( ($linea1 = fgets($file1)) !== false  && ($linea2 = fgets($file2)) !== false  ) 
        {
       
         if($linea1!==$linea2)
        {
            // echo $contar."";
           $contar++;
           
        }
    }
     fclose($file1);
     fclose($file2);
    }else{
        
        $contar=-1;
        $j=sizeof($solucion)+1;
    }
   
}
return $contar;
}

function contarArchivo($archivo1)
{
    
    $file1 = fopen($archivo1, "rb");
    
    $contar=0;
    while ( ($linea1 = fgets($file1)) !== false   ) {
    
       
           $contar++;

        }
    fclose($file1);
    
    return $contar;
}

function listar_ficheros ($tipos, $carpeta){
    //Comprobamos que la carpeta existe
    $lista="";
    if (is_dir ($carpeta)){
        //Escaneamos la carpeta usando scandir
        $scanarray = scandir ($carpeta);
        $c=0;
        for ($i = 0; $i < count ($scanarray); $i++){
            //Eliminamos  "." and ".." del listado de ficheros
            if ($scanarray[$i] != "." && $scanarray[$i] != ".."){
		//No mostramos los subdirectorios
		if (is_file ($carpeta . "/" . $scanarray[$i])){
                        //Verificamos que la extension se encuentre en $tipos
			$thepath = pathinfo ($carpeta . "/" . $scanarray[$i]);
			if (in_array ($thepath['extension'], $tipos)){
				//echo $scanarray[$i] . "-----------";
                                
                                $lista[$c]=$scanarray[$i];
			
                                $c++;
                        }
                }
            }
        }
    } else {
        echo "La carpeta no existe";
    }
   return $lista;
 
}
function eliminafila($archivo)
{
            // echo $archivo."este es nuevo";
                $numlinea = 0; 
                $contar=0;
                $contar1=0;
                $lineas = file("$archivo") ;
              $textolinea = file_get_contents("$archivo");
              if($textolinea!=="")
              {
                foreach ($lineas as $nLinea => $dato)
                {
                    $contar1++;
                    if ($nLinea != $numlinea && $nLinea !== $contar1)
                    $info[] =$dato ;
                    
                }
                
                $documento = implode($info,"");
                echo $documento."-"; 
                echo "$contar1";
                file_put_contents("$archivo", $documento);
                //fclose($documento);
                
               
                    //$documento="";
                
                   //echo "o".($info[])."o";
                
              }
    return null;
}
?>
