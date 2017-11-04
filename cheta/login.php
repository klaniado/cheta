<?php $title="Login"; ?>
<?php require_once("./head.php"); ?>
<?php require_once("./header.php"); ?>
<?php

// if (estaLogueado()) {
//   header("location:index.php");exit;
// }

$errores= [];

if ($_POST) {
  $errores = validarLogin($_POST);
}
if(empty($errores)) {
  $usuario = buscarPorMail($_POST["mail"]);
  loguear($usuario);

  if (isset($_POST["recordame"])) {
    setcookie("idUser", $usuario["id"], time() + 60 * 60 * 24 * 30);
  }

  header("location:perfilDeUsuario.php?id=" .usuarioLogueado());exit;

}


?>
  <body>
    <div class="medio">

      <form class="" action="login.php" method="post">

        <h1>Login</h1>
        <br><br>        <br>
        <label for="">Email</label><br>
        <input type="text" name="email" value=""><br>

        <label for="">Contraseña</label><br>
        <input type="password" name="pass" value=""><br><br>

        <input type="checkbox" name="recordame" value="">recordame <br>
        <br>
        <a href="#">olvide mi contraseña</a>

        <br><br><br>

        <input type="submit" name="enviar" value="enviar">
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
