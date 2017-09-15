<?php
  if($_SERVER["REQUEST_METHOD"] != 'POST'){
    header("Location:index.php");
    exit();
  }

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

<table style="width:100%">
  <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>E-mail</th>
    <th>Sexo</th>
    <th>Fecha de nacimiento</th>
    <th>Telefono</th>
    <th>Pais de procedencia</th>
  </tr>
  <tr>
    <td><?php echo $_POST['nombre']; ?></td>
    <td><?php echo $_POST['apellido'];?></td>
    <td><?php echo $_POST['mail']; ?></td>
    <td><?php echo $_POST['sexo']; ?></td>
    <td><?php echo $_POST['nacio']; ?></td>
    <td><?php echo $_POST['telefono']; ?></td>
    <td><?php echo $_POST['country']; ?></td>
  </tr>
</table>

<form action="save.php" method="post">

  <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
  <input type="hidden" name="apellido" value="<?php echo $_POST['apellido']; ?>">
  <input type="hidden" name="mail" value="<?php echo $_POST['mail']; ?>">
  <input type="hidden" name="password" value="<?php echo $_POST['password']; ?>">
  <input type="hidden" name="sexo" value="<?php echo $_POST['sexo']; ?>">
  <input type="hidden" name="nacio" value="<?php echo $_POST['fnac']; ?>">
  <input type="hidden" name="telefono" value="<?php echo $_POST['telefono']; ?>">
  <input type="hidden" name="mensaje" value="<?php echo $_POST['mensaje']; ?>">


  <button type="submit">Enviar</button>

</form>

</body>
</html>
