<?php
  $file = "people.json";
  $db = file_get_contents($file);
  $data = json_decode($db,true);
  $id = count($data);
  $id++;

  $people = [
    "id" => $id,
    "nombre" => $_POST["nombre"],
    "apellido" => $_POST["apellido"],
    "mail" => $_POST["mail"],
    "password" => $_POST["password"],
    "sexo" => $_POST["sexo"],
    "nacio" => $_POST["nacio"],
    "telefono" => $_POST["telefono"],
    "country" => $_POST["country"],
    "mensaje" => $_POST["mensaje"]
  ];

  array_push($data, $people);
  $data = json_encode($data);

  var_dump($data);

  file_put_contents($file, $data);


  header("Location:exito.php");




?>
