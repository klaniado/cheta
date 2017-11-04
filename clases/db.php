<?php
require_once 'usuario.php';
abstract class db {

abstract public function guardarUsuario($usuario);

abstract public function traerTodos();

abstract public function traerMail($email);

}







 ?>
