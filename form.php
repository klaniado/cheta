<?php
$title = "Registro";
	require_once("head.php");
	require_once("soporte.php");

	if ($auth->estaLogueado()) {
		header("Location:index.php");exit;
	}
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://restcountries.eu/rest/v2/all");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  curl_close($ch);

	$paises = json_decode($output,true);

	$nombreDefault = $_POST ? $_POST["nombre"] : "";
	$emailDefault = $_POST ? $_POST["email"] : "";
	$edadDefault = $_POST ? $_POST["edad"] : "";


	if ($_POST) {
		$arrayDeErrores = $validator->validarInformacion($db);

		if (count($arrayDeErrores) == 0) {
			$usuario = new Usuario($_POST["nombre"], $_POST["email"], $_POST["password"], $_POST["edad"], $_POST["pais"]);
			$usuario = $db->guardarUsuario($usuario);
			$nombreArchivo = $_FILES["avatar"]["name"];
			$extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
			$nombre =  "images/" . $_POST["email"] . ".$extension";
			$archivo = $_FILES["avatar"]["tmp_name"];
			move_uploaded_file($archivo, $nombre);
			header("Location:login.php");exit;
		}
		}
?>

<?php include("header.php"); ?>
<div class="medio">


  <h1>Registro</h1>
		<?php if(isset($arrayDeErrores)) : ?>
			<ul class="errores">
				<?php foreach($arrayDeErrores as $error) : ?>
					<li>
						<?=$error?>
					</li>
				<?php endforeach;?>
			</ul>
		<?php endif; ?>
		<form method="POST" action="form.php" enctype="multipart/form-data">
				<label>Nombre:</label><br>
				<input  type="text" name="nombre" value="<?=$nombreDefault?>"><br>
				<label>Email:</label><br>
				<input  type="text" name="email" value="<?=$emailDefault?>"><br>
				<label>Edad:</label><br>
				<input  type="text" name="edad" value="<?=$edadDefault?>"><br>
				<label>Password:</label><br>
				<input  type="password" name="password"><br>
			<?php if(isset($_GET["versionCorta"]) == false) : ?>
						<label>Confirmar Contraseña:</label><br>
					<input  type="password" name="cpassword"><br>
				<?php endif; ?>
			<?php if (count($paises) > 0) : ?>
						<label>Pais:</label><br>
					<select name="pais">
						<?php foreach ($paises as $pais) : ?>
							<?php if ($pais["alpha2Code"] == $_POST["pais"]) : ?>
								<option value="<?=$pais["alpha2Code"]?>" selected>
									<?=$pais["name"]?>
								</option>
							<?php else: ?>
								<option value="<?=$pais["alpha2Code"]?>"><br>
									<?=$pais["name"]?>
								</option>
							<?php endif; ?>

						<?php endforeach; ?>

					</select><br>
				<?php endif; ?>
				<label>Avatar:</label><br><input type="file" name="avatar"><br>
			  <input class="enviar" type="submit" name="enviar" value="enviar">
		</form>
	</div>
<?php include("footer.php"); ?>
