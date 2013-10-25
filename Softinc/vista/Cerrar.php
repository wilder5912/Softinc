<?php ?>
<html>
<head>
<script src="../js/jquery-1.10.2.min.js"></script>

</head>
<body>
<button id="btnMostrar">Ejecutar Funcion</button>
<script type="text/javascript">
  $(function() {
		$("#btnMostrar").click(function() {
			<?php 
                        include('../Modelo/File.php');
                        $P=new File();
                        echo $P->download_file("../archivo_comite/6.zip");;?>});
                                    
  });
</script>
</body>
</html>