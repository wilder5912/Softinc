<!DOCTYPE html>
<html>
    <head>
                <script type="text/javascript" src="../vista/js/1.js"></script>
                <link rel="StyleSheet" href="../vista/css/1.css" type="text/css">
    </head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="menu">
            <ul id="menu1">
                <ul>
                    <li><a onclick="javascript:verUsuarios();"><input type="button" value="ver usuarios"></a></li><br>
                    <li><a onclick="javascript:permisos();"> <input type="button" value="permisos"> </a></li><br>
                    <li><a onclick="javascript:Configuracion();"><input type="button" value="configuracion"> </a></li><br>
                </ul>
            </ul>
            <a href="Salir.php"><input type="button" value="Salir"></a><br>
        </div>
        <div id="cambio">
            <iframe   width="1000" height="600" scrolling="no" id="iMarco" >
        </div>
        <script type="text/javascript">
<!--
iniciaMenu('menu1');
//-->
</script>
        
        
        
        
    </body>
</html>
