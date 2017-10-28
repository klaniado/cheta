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
