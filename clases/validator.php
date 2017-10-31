<?php
/**
 *
 */
class Validator {


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
}

 ?>
