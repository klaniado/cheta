<?php
session_start();

if (isset($_COOKIE["idUser"])) {
    $_SESSION["idUser"] = $_COOKIE["idUser"];
}
function validarInfo($algo){
  $nombre = trim($algo['nombre']);
  $apellido = trim($algo['apellido']);
  $mail = trim($algo['mail']);
  $pass = trim($algo['pass']);
  $rpass = trim($algo['rpass']);
  $errores = [];
  if ($_POST) {
    if ($_POST["nombre"]=="") {
      $errores["nombre"] = "el nombre no puede estar vacio";
    }
    if ($_POST["apellido"]=="") {
      $errores["apellido"] = "el apellido no puede estar vacio";
    }
    if ($_POST["mail"]=="") {
      $errores["mail"] = "el mail no puede estar vacio";
    }
    if ($pass == '') {
      $errores['pass'] = "tu contraseña no puede estar vacia";
    }
    if ($rpass == '') {
      $errores['rpass'] = "repeti la contraseña";
    }elseif ($pass != $rpass) {
      $errores['pass'] = "tus contraseñas no coinciden";
    }
}
    return $errores;
}

function traerTodos() {
  $archivo = file_get_contents("usuario.json");
  $usuariosJSON = explode(PHP_EOL, $archivo);
  array_pop($usuariosJSON);
  $usuariosFinal = [];
foreach($usuariosJSON as $json) {
    $usuariosFinal[] = json_decode($json, true);
  }
  return $usuariosFinal;
}
function nuevoId(){
  $usuarios=traerTodos();
if (count($usuarios) == 0) {
    return 1;
  }
  $elUltimo = array_pop($usuarios);
  $id = $elUltimo["id"];
  return $id + 1;
}
function crearUsuario($algo){
  $usuario=[

    "nombre" =>$algo["nombre"],
    "apellido" =>$algo["apellido"],
    "edad" =>$algo["edad"],
    "pass" =>password_hash($algo["pass"],PASSWORD_DEFAULT),
    "mail" =>$algo["mail"],
    "pais"=>$algo["pais"]
  ];
  $usuario["id"]=nuevoId();
  return $usuario;
}

  function guardarImagen($unaImagen, $errores) {
	  // si el error da 0, es porque esta ok y entro al if
		if ($_FILES[$unaImagen]["error"] == UPLOAD_ERR_OK)
		{
			// me guardo el nombre del archivo para luego obtener la extencion
			$nombre=$_FILES[$unaImagen]["name"];
			// me guardo el archivo "fisico"
			$archivo=$_FILES[$unaImagen]["tmp_name"];
			// me guardo la extencion usando la variable donde me guarde el nombre
			$ext = pathinfo($nombre, PATHINFO_EXTENSION);
			// si la extencion es correcta entro a este if
      if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
		  // me traigo la ruta donde esta ÉSTE ARCHIVO guardado
  			$miArchivo = dirname(__FILE__);
		// a esa ruta le agrego /IMG/ para entrar a la carpeta donde guardaré la imagen
  			$miArchivo = $miArchivo . "/images/";
	// le asigno al final de la ruta el nombre del usuario y la extencion es decir  blablabla/img/NombreDeUsuario . jpg , jpeg ó png
  			$miArchivo = $miArchivo . $_POST["nombre"] .$_POST["apellido"]. "." . $ext;
	// guardo el archivo, almacenado en la variable $archivo, con la extencion y nombre que almacenamos en $miArchivo
  			move_uploaded_file($archivo, $miArchivo);
      }
      else {
		 // en caso de que de que la extencion esté mal devuelvo éste error
        $errores["imgPerfil"] = "Ey, subi una foto. No cualquier cosa";
      }
		} else {
      // en caso de que el error NO de 0, tiro el error siguiente.
      $errores["imgPerfil"] = "No se pudo subir la foto :(";
    }
	// devuelvo array con errores de foto.
    return $errores;
	}

  function guardarUsuario($usuario){
    $usuarioJSON =json_encode($usuario).PHP_EOL;
    file_put_contents('usuario.json',$usuarioJSON, FILE_APPEND );
    header('location:exito.php');exit;
  }
  function validarlogin($algo){
    $errores = [];
    $mail = trim($algo ["mail"]);

    if (strlen($mail) == 0) {
      $errores["mail"] = "introduci tu mail";
    }elseif (!filter_var($mail,FILTER_VALIDATE_EMAIL)) {
      $errores["mail"] = "introduci un mail valido";
    }elseif (buscarPorMail($mail) == false) {
  $errores["mail"] = "usuario inexistente";
}else {
  $usuario = buscarPorMail($mail);
  if (password_verify($algo["pass"], $usuario["pass"]) == false) {
    $errores["mail"] = "usuario o contraseña incorrecta";
  }
}
  return $errores;
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
  function loguear($usuario) {
    $_SESSION["idUser"] = $usuario["id"];
  }
  function estaLogueado() {
    return isset($_SESSION["idUser"]);
  }
  function usuarioLogueado() {
    return buscarPorId($_SESSION["idUser"]);
  }
?>
