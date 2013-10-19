<?php

	/* Conectarse a base de datos y comprobar un usuario */
        include '../Modelo/cnx.php';
        
		
	if(!empty($_POST['usuario']))
	{

		$username = $_POST['usuario'];
	

		/* Configur�is la conexi�n a mysql */
	
		$link = pg_connect($enlace);
		
		pg_select_db("framework", $link); 
		

		/* Adapt�is la query a vuestra tabla de usuarios */
		
		$result = pg_query("select id_usuario from usuario where user_usuario= '$username' ");
		
		
			if(pg_num_rows($result) == 0) 
			{
			
				// Mostramos NO si no existe
				
				echo "NO";  
				
			} 
			
			
			else 
			{
				
				// Mostramos YES si ya existe
				
				echo "YES";  
			
			}
	
	}

?>