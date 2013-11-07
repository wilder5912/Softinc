<?php

require_once 'cabecera.php';
?>


<div>
   <table class="tabla-principal">
       <tr>
           <td class="contenedor-barra-izquierda">
                <ul class="sidebar">
                    <li><a href="../descargar_archivo.php" target="frame-principal"> Problemas</a></li>
                    <li><a href="../presentarSolucion.php" target="frame-principal">Presentar Soluci&oacute;n</a></li>
                    <li><a href="#">Ranking</a></li>
                    <li><a href="#">Historial de Soluciones</a></li>
                    
                </ul>
           </td>
           <td><iframe name="frame-principal" src="https://www.google.com.bo" width="100%" height="100%"></iframe></td>
       </tr>
   </table>
</div>

<?php
require_once 'pie.php';

?>