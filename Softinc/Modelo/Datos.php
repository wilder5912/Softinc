
<?php
function existe($buscado){
    if(file_exists($buscado)){
        unlink($buscado);
    }
}
function comprimir($ruta, $zip_salida, $handle = false, $recursivo = false){

 /* Declara el handle del objeto */
 if(!$handle){
  $handle = new ZipArchive;
  existe($zip_salida);
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
          
   comprimir($url, $zip_salida, $handle, true); /* Comprime el subdirectorio o archivo */
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
<<<<<<< HEAD
/*
=======
>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
$ruta = '../archivo';
if(comprimir($ruta, '../archivo/test.zip'))
 echo 'Ok';
else
 echo 'Error';
<<<<<<< HEAD

////////
download_file("../archivo/test.zip");
*/
 ?>
 

=======

////////
download_file("../archivo/test.zip");
?>

>>>>>>> 7af28e3066fd6347b07319c2430951ea6150d287
