<html>
<head>
	<script src="/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
		$("#btnMostrar").click(function(){
			$.get("Perfil.php",function(data){ alert("Respuesta:" + data); });
		});
	</script>
</head>
<body>
	<input type="button" value="Ejecutar Funcion" id="btnMostrar" />
</body>
</html>
