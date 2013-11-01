<?php

 session_start();
  unset($_SESSION["nombre_usuario"]); 
  session_destroy();
  header("Location: principal.html");
  exit;
?>
