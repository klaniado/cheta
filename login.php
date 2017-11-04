<?php $title="Login"; ?>
<?php require_once("./head.php"); ?>
<?php require_once("./header.php"); ?>
<?php require_once("./functions.php"); ?>
<?php

$errores= [];

if ($_POST) {
  $errores = loguear($_POST);

  if(empty($errores)) {
    $usuario = buscarPorMail($_POST["mail"]);
    loguear($usuario);

    $id = $usuario["id"];

    if (isset($_POST["recordame"])) {
      setcookie("idUser", $usuario["id"], time() + 60 * 60 * 24 * 30);
    }

      header("location:perfilDeUsuario.php?id=" . $id);exit;

  }
}
$logueado=estaLogueado();
if ($logueado) {
    header("location:perfilDeUsuario.php?id=" . $_SESSION["idUser"]);exit;
}




?>
  <body>
    <div class="medio">

      <form class="" action="login.php" method="post">

        <h1>Login</h1>
        <br><br>        <br>
        <label for="">Email</label><br>
        <input type="text" name="mail" value=""><br><br>

        <label for="">Contraseña</label><br>
        <input type="password" name="pass" value=""><br><br>

        <input class="recordarme" type="checkbox" name="" value="">Recordarme <br>
        <br>
        <a class="olvide" href="olvide.php">Olvide mi contraseña</a>

        <br><br><br>

        <input class="enviar" type="submit" name="enviar" value="enviar">
      </form>
      <ul><?php  if (!empty($errores)) { ?>
        <?php foreach ($errores as $key => $value): ?>
          <li>En la posicion <?=$key?>, se encuentra el error <?= $value?> </li>
        <?php endforeach; ?>
      <?php } ?>
      </ul>
    </div>

<?php require_once("./footer.php"); ?>
</body>
</html>
