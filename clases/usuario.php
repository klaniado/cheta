<?php

<<<<<<< HEAD
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
=======
class Usuario  {

  protected $id;
  protected $nombre;
  protected $apellido;
  protected $password;
  protected $mail;
  protected $edad;
  protected $pais;

  function __constructor($nombre,$apellido,$mail,$edad,$pais,$id = null){
    if ($id == null) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }    else {
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
>>>>>>> 44d72af7c87d5defce45f9f3ddf08191ba082c13
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

<<<<<<< HEAD
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
=======
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
    public function traerTodos() {
        $archivo = file_get_contents("usuario.json");
        $usuariosJSON = explode(PHP_EOL, $archivo);
        array_pop($usuariosJSON);
        $usuariosFinal = [];
      foreach($usuariosJSON as $json) {
          $usuariosFinal[] = json_decode($json, true);
        }
        return $usuariosFinal;
      }
    public function nuevosId() {
      if ($this->id == 'null'){
        $usuarios= $this->traerTodos();
      if (count($usuarios) == 0) {
          return 1;
        }else{
        $elUltimo = array_pop($usuarios);
        $id = $elUltimo["id"];
        return $id + 1;
      }
      } 
      $this->setId($id);
    }
    public function setNewPassword($password) {
      $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
  }
 ?>
>>>>>>> 44d72af7c87d5defce45f9f3ddf08191ba082c13
