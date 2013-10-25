<?php


class File {
    

    function guardar($contenido,$archivo){
        $fp = fopen($archivo,"a");
        $array=$this->getContenido($contenido);
        for($i=0; $i<=count($array)-1 ;$i++ ){
        fwrite($fp, $array[$i]. PHP_EOL);
        
        }
        fclose($fp);
    }
    function getContenido($variable){
    $contenedor=array();
    $toque=strtok($variable, " ");
        while ($toque != false) {
            $contenedor[]=$toque;
            $toque = strtok(" ");
        }
    return $contenedor;
    }
    function getCadena($variable){ //utilizo para modificar el rol en controlROl
    $contenedor=array();
    $toque=strtok($variable, "_");
        while ($toque != false) {
            $contenedor[]=$toque;
            $toque = strtok("_");
        }
    return $contenedor;
    }
    
    
function existe($buscado){
    if(file_exists($buscado)){
        unlink($buscado);
    }
}
function comprimir($ruta, $zip_salida, $handle = false, $recursivo = false){

 /* Declara el handle del objeto */
 if(!$handle){
  $handle = new ZipArchive;
  $this->existe($zip_salida);
  if ($handle->open($zip_salida, ZipArchive::CREATE) === false){
   return false; /* Imposible crear el archivo ZIP */
  }
 }

 /* Procesa directorio */
 if(is_dir($ruta)){
  /* Aseguramos que sea un directorio sin carácteres corruptos */
  $ruta = dirname($ruta.'/arch.ext'); 
  $handle->addEmptyDir($ruta); /* Agrega el directorio comprimido */
  foreach(glob($ruta.'/*') as $url){ /* Procesa cada directorio o archivo dentro de el */
       $puntoArchivo   =end(explode('.',$url));
      if(is_file($url) and $puntoArchivo!="zip" ){
          
          $this->comprimir($url, $zip_salida, $handle, true); /* Comprime el subdirectorio o archivo */
  }
  }

 /* Procesa archivo */
 }else{
  $handle->addFile($ruta);
 }

 /* Finaliza el ZIP si no se está ejecutando una acción recursiva en progreso */
 if(!$recursivo){
  $handle->close();
 }

 return true; /* Retorno satisfactorio */
}
function download_file($archivo, $downloadfilename = null) {

    if (file_exists($archivo)) {
        $downloadfilename = $downloadfilename !== null ? $downloadfilename : basename($archivo);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $downloadfilename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($archivo));

        ob_clean();
        flush();
        readfile($archivo);
        exit;
    }
}
    function listarArchivos( $path, $tipo ){
    // Abrimos la carpeta que nos pasan como parámetro
    $dir = opendir($path);
    $archivo="";
    
    // Leo todos los ficheros de la carpeta
    while ($elemento = readdir($dir)){
        // Tratamos los elementos . y .. que tienen todas las carpetas
        if( $elemento != "." && $elemento != ".."){
                        
            $puntoArchivo   =end(explode('.',$elemento));
            // Si es una carpeta
            if( !is_dir($path.$elemento) && !strcmp($puntoArchivo, $tipo) ){
               $archivo=$elemento;
               $archivo=substr($elemento,0,strrpos($elemento, '.'));
            } 
        }
    }

    return $archivo;
}
// Llamamos a la función para que nos muestre el contenido de la carpeta gallery

}
//$f=new File();
<<<<<<< HEAD
//echo $f->listarArchivos("../archivo_comite/","zip");
=======
//echo $f->listarArchivos("../archivo/","zip");
>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
?>
