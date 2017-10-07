<?php $title="Login"; ?>
<?php
  require_once("funciones.php");
  $errores = [];

  if ($_POST) {
    if(empty($errores)) {
      $usuario = buscarPorMail($_POST["mail"]);
      loguear($usuario);
      if (isset($_POST["recordame"])) {
        setcookie("idUser", $usuario["id"], time() + 60 * 60 * 24 * 30);
      }
      header("location:perfilDeUsuario.php?id=" . $usuario["id"]);exit;
    }
  }
?>

<?php require_once("./head.php") ?>

<body>
  <div class="container">
  <?php require_once("header.php") ?>
  <br><br><br><br><br>
    <h1>Login</h1>
    <?php if(count($errores) > 0) { ?>
      <ul>
          <?php foreach($errores as $error) { ?>
            <li>
              <?=$error?>
            </li>
          <?php } ?>
      </ul>
    <?php } ?>
    <div class="medio">
      <form action="login0.php" method="post">
        <div class="">
          <label for="">Mail</label><br>
          <input type="text" name="mail" value="">
        </div><br>
        <div class="">
          <label for="">Contraseña</label><br>
          <input type="password" name="password" value="">
        </div><br><br>
        <div class="">

          <input type="checkbox" class="" name="recordame" checked><label for="">Recordarme</label>
        </div>
        <div class="">
          <input type="submit" name=""class="enviar" value="Login">
        </div>
        <h6 class="botones"><a href="form.php">Registrate</a></h6>
        <h6 class="botones"><a href="olvide.php">Olvide mi contraseña</a></h6>
      </form>
    <br>
    No estas registrado?<a href="test.php"> Registrate ! </a>
    </div>

    <?php require_once("./footer.php") ?>
</div>
  </body>
</html>
