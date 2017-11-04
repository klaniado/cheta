<?php

class Usuario {
  private $id;
  private $nombre;
  private $email;
  private $password;
  private $edad;
  private $pais;

  public function __construct($nombre, $email, $password, $edad, $pais, $id = null) {
    if ($id == null) {
      $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
      $this->password = $password;
    }

    $this->nombre = $nombre;
    $this->email = $email;
    $this->pais = $pais;
    $this->edad = $edad;
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getPais() {
    return $this->pais;
  }

  public function setPais($pais) {
    $this->pais = $pais;
  }

  public function getEdad() {
    return $this->edad;
  }

  public function setEdad($edad) {
    $this->edad = $edad;
  }

  public function toArray() {
    return [
      "id" => $this->id,
      "email" => $this->email,
      "password" => $this->password,
      "nombre" => $this->nombre,
      "pais" => $this->pais,
      "edad" => $this->edad
    ];
  }

  public function setNewPassword($password) {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }
}

?>
