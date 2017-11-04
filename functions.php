<?php

  function guardarImagen($unaImagen, $errores) {
		if ($_FILES[$unaImagen]["error"] == UPLOAD_ERR_OK)
		{
			$nombre=$_FILES[$unaImagen]["name"];
			$archivo=$_FILES[$unaImagen]["tmp_name"];
			$ext = pathinfo($nombre, PATHINFO_EXTENSION);
      if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
  			$miArchivo = dirname(__FILE__);
  			$miArchivo = $miArchivo . "/images/";
  			$miArchivo = $miArchivo . $_POST["nombre"] .$_POST["apellido"]. "." . $ext;
  			move_uploaded_file($archivo, $miArchivo);
      }
      else {
        $errores["imgPerfil"] = "Ey, subi una foto. No cualquier cosa";
      }
		} else {
      $errores["imgPerfil"] = "No se pudo subir la foto :(";
    }
    return $errores;
	}

  function guardarUsuario($usuario){
    $usuarioJSON =json_encode($usuario).PHP_EOL;
    file_put_contents('usuario.json',$usuarioJSON, FILE_APPEND );
    header('location:exito.php');exit;
  }
function buscarPorMail($mail){
  $todosLosUsuarios = traerTodos();
  foreach ($todosLosUsuarios as $usuario) {
    if ($usuario["mail"] == $mail) {
      return $usuario;
      }
    }
    return false;
  }
function buscarPorId($id){
  $todosLosUsuarios = traerTodos();
  foreach ($todosLosUsuarios as $usuario) {
    if ($usuario["id"] == $id) {
      return $usuario;
      }
    }
    return false;
  }

?>
