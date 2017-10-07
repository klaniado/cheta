<?php
// inicio la variable session
  session_start();
// si el usuario habia checkeado el "recordarme", y guardamos al mismo en sus cookies, preguntamos si existe y lo guardamos en nuestra session, para que quede logueado.
  if (isset($_COOKIE["idUser"])) {
      $_SESSION["idUser"] = $_COOKIE["idUser"];
  }
//creo la funcion para validar el registro, la cual recibiria $_POST por parametro.
// al ser una funcion debemos declararle un parametro a recibir.
  function validarInformacion($informacion) {
	  // creo array vacio para guardarme los errores
    $errores = [];
	   // valido formulario de registro eliminando los espacios y preguntando si el largo del string es igual a cero.
    $nombre = trim($informacion["nombre"]);

    if (strlen($nombre) == 0) {
      $errores["nombre"] = "Che, no pusiste el nombre :(";
    }

    $usuario = trim($informacion["usuario"]);

    if (strlen($usuario) < 7) {
      $errores["usuario"] = "El usuario debe tener más de 7 caracteres";
    }

    $mail = trim($informacion["mail"]);

    if (strlen($mail) == 0) {
      $errores["mail"] = "Che, no pusiste el mail :(";
    } else if (! filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errores["mail"] = "El mail debe ser un mail";
    } else if (buscarPorMail($mail) != false) {
      $errores["mail"] = "El mail ya existe";
    }

    $edad = trim($informacion["edad"]);
    if (!is_numeric($edad)) {
      $errores["edad"] = "Tu edad debe ser un número";
    }

    if ($informacion["password"] == "") {
      $errores["password"] = "Llena la contraseña";
    }
    if ($informacion["cpassword"] == "") {
      $errores["cpassword"] = "Confirmá tu contraseña";
    }
    if ($informacion["password"] != "" && $informacion["cpassword"] != "" && $informacion["password"] != $informacion["cpassword"]) {
      $errores["password"] = "Las dos contraseñas deben ser iguales";
    }
    // devuelvo el array con los errores guardados
    return $errores;
  }

  // function guardarImagen($unaImagen, $errores) {
	//   // si el error da 0, es porque esta ok y entro al if
	// 	if ($_FILES[$unaImagen]["error"] == UPLOAD_ERR_OK)
	// 	{
	// 		// me guardo el nombre del archivo para luego obtener la extencion
	// 		$nombre=$_FILES[$unaImagen]["name"];
	// 		// me guardo el archivo "fisico"
	// 		$archivo=$_FILES[$unaImagen]["tmp_name"];
	// 		// me guardo la extencion usando la variable donde me guarde el nombre
	// 		$ext = pathinfo($nombre, PATHINFO_EXTENSION);
	// 		// si la extencion es correcta entro a este if
  //     if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
	// 	  // me traigo la ruta donde esta ÉSTE ARCHIVO guardado
  // 			$miArchivo = dirname(__FILE__);
	// 	// a esa ruta le agrego /IMG/ para entrar a la carpeta donde guardaré la imagen
  // 			$miArchivo = $miArchivo . "images/";
  //        // le asigno al final de la ruta el nombre del usuario y la extencion es decir  blablabla/img/NombreDeUsuario . jpg , jpeg ó png
  // 			$miArchivo = $miArchivo . $_POST["usuario"] . "." . $ext;
	//        // guardo el archivo, almacenado en la variable $archivo, con la extencion y nombre que almacenamos en $miArchivo
  // 			move_uploaded_file($archivo, $miArchivo);
  //     }
  //     else {
	//       // en caso de que de que la extencion esté mal devuelvo éste error
  //       $errores["imgPerfil"] = "Ey, subi una foto. No cualquier cosa";
  //     }
	// 	} else {
  //     // en caso de que el error NO de 0, tiro el error siguiente.
  //     $errores["imgPerfil"] = "No se pudo subir la foto :(";
  //   }
	//    // devuelvo array con errores de foto.
  //   return $errores;
	// }


	// funcion crearusuario recibira los datos por $_POST y lo convierte en un array
	  function crearUsuario($datos) {
	     $usuario = [
	      "nombre" => $datos["nombre"],
	      "usuario" => $datos["usuario"],
	      "mail" => $datos["mail"],
	      "edad" => $datos["edad"],
	      "pais" => $datos["pais"],
	      "password" => password_hash($datos["password"], PASSWORD_DEFAULT)
	    ];
	// luego de convertirlo en array, guardo en la posicion ID la ID correspondiente a éste usuario
	    $usuario["id"] = traerNuevoId();
	// devuelvo el array con los datos para guardar en json
	    return $usuario;
	  }

// creo guncion para guardar usuario en json que recibe un array con los datos del usuario
  function guardarUsuario($usuario) {
  // "transformo" el array con datos de usuario a formato Json
    $json = json_encode($usuario);
// le agrego un salto de linea (un enter), al final de la linea
    $json = $json . PHP_EOL;
// guardo el usuario en "usuarios.json" desde la ultima linea, en caso de que no exista el archivo .json, le sentencia "FILE_APPEND" crea el archivo.
    file_put_contents("usuarios.json", $json, FILE_APPEND);
  }

// creo la funcion traerTodos para traerme TODOS los usuarios que tenga en mi json
  function traerTodos() {
    //me traigo todo el json, en formato json
    $archivo = file_get_contents("usuarios.json");

    // esto me arma un array, en cada clave, un usuario entero
    $usuariosJSON = explode(PHP_EOL, $archivo);
// como guardamos los usuarios con un enter al final, borramos ese ultimo enter vacio.
    array_pop($usuariosJSON);
// creo un array vacio para guardarme proximamente el array de usuarios en formato php
    $usuariosFinal = [];

//"foricheo" los usuarios en formato json y me guardo cada usuario ya convertido en formato array de php
    foreach($usuariosJSON as $json) {
      $usuariosFinal[] = json_decode($json, true);
    }
// devuelvo el array con usuario en formato php
    return $usuariosFinal;
  }

// creo funcion para traer ultimo id
  function traerNuevoId() {
	// me traigo todos los usuarios
    $usuarios = traerTodos();
// su el count de usuarios me da cero, es decir el array esta vacio
// devuelvo un 1, ya que seria el primer ID
    if (count($usuarios) == 0) {
      return 1;
    }
// en caso de que haya usuarios agarro el ultimo usuario
    $elUltimo = array_pop($usuarios);
// pregunto por le id de ese ultimo usuario
    $id = $elUltimo["id"];
// a ese ID le sumo 1, para asignarle el nuevo ID al usuario  que se esta registrando
    return $id + 1;
  }

// funcion para buscar usuarios por email, que recibe un email por parametro
  function buscarPorMail($mail) {
// me traigo todos los usuarios
    $todos = traerTodos();
// los "foricheo"  preguntando por cada
    foreach ($todos as $usuario) {
// si el mail por el que pregunto, existe, revuelvo el usuario dueño del mismo
      if ($usuario["mail"] == $mail) {
        return $usuario;
      }
    }
// si el mail no existe, devuelvo false.
    return false;
  }

// funcion para buscar por ID, recibe un ID por parametro
  function buscarPorId($id) {
	 // me traigo todos los usuarios
    $todos = traerTodos();
// los "foricheo" y si existe el id por el cual pregunto, devuelvo al usuario dueño del mismo
    foreach ($todos as $usuario) {
      if ($usuario["id"] == $id) {
        return $usuario;
      }
    }
// si mi json no tiene ese ID devuelvo false
    return false;
  }

// funcion de validacion para el form del logueo
  function validarLogin($datos) {
// creo array vacio en el cual devolver los errores
    $errores = [];
// limpio los espacios del input mail
    $mail = trim($datos["mail"]);
// hago la validacion correspondiente al mail
    if (strlen($mail) == 0) {
      $errores["mail"] = "Che, no pusiste el mail :(";
    } else if (! filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errores["mail"] = "El mail debe ser un mail";
  }// si no existe el mail que se esta queriendo loguear, aviso que ese usuario no existe
	else if (buscarPorMail($mail) == false) {
      $errores["mail"] = "No existe el usuario";
    } else {
      // si el mail existe, me guardo al usuario dueño del mismo
      $usuario = buscarPorMail($mail);
// pregunto si coindice el passworn del logeo con el del usuario traido del json
      if (password_verify($datos["password"], $usuario["password"]) == false) {
        $errores["mail"] = "Error de login";
      }
    }

// devuelvo array de errores con errores de logeo en caso de que existan
    return $errores;
  }

// me guardo el id del usuario en session para mantenerlo logueado
  function loguear($usuario) {
    $_SESSION["idUser"] = $usuario["id"];
  }
// la funcion esta logueado pregunta si hay algun id guardado en session
  function estaLogueado() {
    return isset($_SESSION["idUser"]);
  }
// esta funcion me trae el id del usuario logueado
  function usuarioLogueado() {
    return buscarPorId($_SESSION["idUser"]);
  }

?>
