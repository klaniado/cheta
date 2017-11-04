<?php
require_once("db.php");

class db-mysql extends db{
private $conn;

  function __construct(){
    $dsn = "mysql:host=localhost;port=3306;dbname=reglog";
    $user = "root";
    $pass = "root";
    $this->conn = new PDO($dsn, $user, $pass);

  }

  public function traerMail($email) {
      $mysql = "Select * from usuarios where email = :email";

      $query = $this->conn->prepare($mysql);

      $query->bindValue(":email", $email);

      $query->execute();

      $array = $query->fetch(PDO::FETCH_ASSOC);

      if (!$array) {
        return NULL;
      }

      return new Usuario($array["nombre"], $array["email"], $array["password"], $array["edad"], $array["pais"], $array["id"]);
    }
    public function traerTodos() {
      $mysql = "Select * from usuarios";

      $query = $this->conn->prepare($mysql);

      $query->execute();

      $arrayDeArrays = $query->fetchAll(PDO::FETCH_ASSOC);

      $arrayDeObjetos = [];

      foreach ($arrayDeArrays as $array) {
        $arrayDeObjetos[] = new Usuario($array["nombre"], $array["email"], $array["password"], $array["edad"], $array["pais"], $array["id"]);
      }

      return $arrayDeObjetos;
    }
    public function guardarUsuario(Usuario $usuario) {
      $mysql = "Insert into usuarios values(default, :nombre, :email, :password, :edad, :pais)";

      $query = $this->conn->prepare($mysql);

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

      $mysql = "Select * from usuarios where nombre like :buscar OR email like :buscar";

      $query = $this->conn->prepare($mysql);

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
      $mysql = "UPDATE usuarios set nombre = :nombre, email = :email, password = :password, edad = :edad, pais = :pais WHERE id = :id";

      $query = $this->conn->prepare($mysql);

      $query->bindValue(":nombre",$usuario->getNombre());
      $query->bindValue(":email",$usuario->getEmail());
      $query->bindValue(":password",$usuario->getPassword());
      $query->bindValue(":edad",$usuario->getEdad());
      $query->bindValue(":pais",$usuario->getPais());
      $query->bindValue(":id",$usuario->getId());

      $query->execute();
    }

public function crearBase(){
  $mysql = "CREATE TABLE `cheta`.`usuarios` ( `id` INT NULL DEFAULT NULL AUTO_INCREMENT , `nombre` VARCHAR(30) NOT NULL , `apellido` VARCHAR(30) NOT NULL , `mail` VARCHAR(50) NOT NULL , `contraseña` VARCHAR(1000) NOT NULL , `edad` INT(100) NOT NULL , `pais` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`apellido`), UNIQUE (`mail`), UNIQUE (`contraseña`)) ENGINE = InnoDB;"
}



}

 ?>
