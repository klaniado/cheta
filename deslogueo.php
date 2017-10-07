<?php
// creo session por si no existia
session_start();
// destruyo la variable session para eliminar al usuario guardado
session_destroy();
// redirecciono a pagina de registro.
header("location:index.php");exit;


?>
