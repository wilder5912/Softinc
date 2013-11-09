<?php

require_once 'cabecera.php';


$tipoUsuario="olimpista";

if( strcmp($tipoUsuario,"olimpista")==0 )
{
    require_once 'olimpistaIndex.php';
}
else{
    if(strcmp($tipoUsuario,"comite")==0 )
    {
         require_once 'comiteIndex.php';
    }
    else{
        require_once 'administradorIndex.php';
    }
}

require_once 'pie.php';

?>