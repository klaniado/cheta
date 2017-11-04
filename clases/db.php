<?php

require_once("usuario.php");

abstract class db {
  public abstract function traerPorEmail($email);
  public abstract function traerTodosLosUsuarios();
  public abstract function guardarUsuario(Usuario $usuario);
}

?>
