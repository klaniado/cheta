<<<<<<< HEAD
=======
<?php $title="Login"; ?>
<?php require_once("./head.php"); ?>
<?php require_once("./header.php"); ?>
<?php require_once("./functions.php"); ?>
>>>>>>> 44d72af7c87d5defce45f9f3ddf08191ba082c13
<?php
	$title="Login";
	require_once("head.php");
	require_once("soporte.php");

	if ($auth->estaLogueado()) {
		header("Location:Location:perfilDeUsuario.php?email=" .$_cookie["email"]);exit;
	}

<<<<<<< HEAD
	if ($_POST) {
		$arrayDeErrores = $validator->validarLogin($db);
=======
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
>>>>>>> 44d72af7c87d5defce45f9f3ddf08191ba082c13

		if (count($arrayDeErrores) == 0) {
			$auth->loguear($_POST["email"]);

			if (isset($_POST["recordame"])) {
				setcookie("usuarioLogueado", $_POST["email"], time()+60*60*24*30);
			}

			header("Location:perfilDeUsuario.php?email=" . $_POST["email"]);
		}
	}

?>
<<<<<<< HEAD
=======
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
>>>>>>> 44d72af7c87d5defce45f9f3ddf08191ba082c13

<?php include("header.php"); ?>
		<div class="medio">
			<h1>Login</h1>
		<?php if(isset($arrayDeErrores)) : ?>
			<ul class="errores">
				<?php foreach($arrayDeErrores as $error) : ?>
					<li>
						<?=$error?>
					</li>
				<?php endforeach;?>
			</ul>
		<?php endif; ?>
		<form action="login.php" method="POST">
				<label>Email:</label><br>
				<input class="form-control" type="text" name="email"><br>

				<label>Password:</label><br>
				<input class="form-control" type="password" name="password"><br>

				 <input type="checkbox" name="recordame">Recordame<br>

				<input class="enviar" type="submit" name="enviar" value="enviar">

		</form>
	</div>
<?php include("footer.php"); ?>
