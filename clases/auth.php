<?php

class Auth {

  function __construct()
  {
    # code...
  }
  public function loguear($usuario) {
    $_SESSION["idUser"] = $usuario["id"];
  }
  public function estaLogueado() {
    return isset($_SESSION["idUser"]);
  }
  public function usuarioLogueado() {
    return buscarPorId($_SESSION["idUser"]);
  }
}
public function loguear($email) {
  $_SESSION["usuarioLogueado"] = $email;
}
}


 ?>
