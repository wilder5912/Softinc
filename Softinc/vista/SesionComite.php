<?php
session_start();
?>
<!DOCTYPE html>
<html>
    
    <head> <script src="1.js" language="JavaScript"></script>
        <link href="Principal.css" rel="stylesheet" type="text/css" media="screen" />  </head>
    <body>
        bienvenid@ a juez SOFT-INC: <?php echo $_SESSION["nombre_usuario"];  ?><br>
        <div id="menu">
            <ul>
                <li><a id="enlace1" href="../vista/CreacionProblema.php">Crear Problema</a></li>
                <li><a id="enlace2" href="../vista/AgregarArchivos.php">Subir Archivos</a></li>
                <li><a id="enlace3" href="#">Ranking</a></li>
            </ul>  
        </div>
        
        
        <div id="cabeza">
            <div id="logo">
                <h1> Juez Soft-inc </h1>
            </div>
        </div>
        <div id="pagina">
            <div id="barra">
                <ul>
                    <li>
                         <div id="buscador">
                         <form method="post" action="#">
                         <input type="text" name="texto">
                         <input type="submit" value="buscar" name="buscar">
                         </form>
                         </div>
                    </li>    
                    <li>
                    <h2>CATEGORIAS</h2>
                        <ul>
                            <li><a href="#">uno</a></li>
                            <li><a href="#">dos</a></li>
                        </ul>
                    </li>
                </ul>     
            </div>
       <div id="publicacion">
        <div id="cambio"> </div> 
       </div>
            <div style="clear: both;">&nbsp;</div>
        </div>
        <div id="pie">
             <p>todos los derechos reservados</p>
        </div>
    </body>
</html>






 
