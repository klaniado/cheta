<?php

require_once("db.php");

class dbMySQL extends db {
  private $conn;

  public function __construct() {
    $dsn = "mysql:host=localhost;port=3306;dbname=reglog";
    $user = "root";
    $pass = "123456";

    $this->conn = new PDO($dsn, $user, $pass);
  }

  public function traerPorEmail($email) {
    $sql = "Select * from usuarios where email = :email";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":email", $email);

    $query->execute();

    $array = $query->fetch(PDO::FETCH_ASSOC);

    if (!$array) {
      return NULL;
    }

    return new Usuario($array["nombre"], $array["email"], $array["password"], $array["edad"], $array["pais"], $array["id"]);
  }
  public function traerTodosLosUsuarios() {
    $sql = "Select * from usuarios";

    $query = $this->conn->prepare($sql);

    $query->execute();

    $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);

    $arrayDeObjetos = [];

    foreach ($arrayDeArrays as $array) {
      $arrayDeObjetos[] = new Usuario($array["nombre"], $array["email"], $array["password"], $array["edad"], $array["pais"], $array["id"]);
    }

    return $arrayDeObjetos;
  }
  public function guardarUsuario(Usuario $usuario) {
    $sql = "Insert into usuarios values(default, :nombre, :email, :password, :edad, :pais)";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":nombre",$usuario->getNombre());
    $query->bindValue(":email",$usuario->getEmail());
    $query->bindValue(":password",$usuario->getPassword());
    $query->bindValue(":edad",$usuario->getEdad());
    $query->bindValue(":pais",$usuario->getPais());

    $query->execute();

    $usuario->setId($this->conn->lastInsertId());

    return $usuario;
  }

  public function buscarUsuarios($buscar) {

    $sql = "Select * from usuarios where nombre like :buscar OR email like :buscar";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":buscar", "%$buscar%");

    $query->execute();

    $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);

    $arrayDeObjetos = [];

    foreach ($arrayDeArrays as $array) {
      $arrayDeObjetos[] = new Usuario($array["nombre"], $array["email"], $array["password"], $array["edad"], $array["pais"], $array["id"]);
    }

    return $arrayDeObjetos;
  }

  public function editarUsuario(Usuario $usuario) {
    $sql = "UPDATE usuarios set nombre = :nombre, email = :email, password = :password, edad = :edad, pais = :pais WHERE id = :id";

    $query = $this->conn->prepare($sql);

    $query->bindValue(":nombre",$usuario->getNombre());
    $query->bindValue(":email",$usuario->getEmail());
    $query->bindValue(":password",$usuario->getPassword());
    $query->bindValue(":edad",$usuario->getEdad());
    $query->bindValue(":pais",$usuario->getPais());
    $query->bindValue(":id",$usuario->getId());

    $query->execute();
  }
}

?>
