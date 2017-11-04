<?php
<<<<<<< HEAD
$title = "Registro";
	require_once("head.php");
	require_once("soporte.php");
=======
spl_autoload_register(function ($nombreClase){
  require_once ( "$nombreClase.php");
});

$nombre="";
$apellido="";
$mail="";
$edad="";
$paises =[
    'ab' => 'Abkhaz',
    'ae' => 'Avestan',
    'af' => 'Afrikaans',
    'ak' => 'Akan',
    'am' => 'Amharic',
    'an' => 'Aragonese',
    'ar' => 'Arabic',
    'as' => 'Assamese',
    'av' => 'Avaric',
    'ay' => 'Aymara'
    ];
if ($_POST) {
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $mail=$_POST["mail"];
    $edad=$_POST["edad"];
>>>>>>> 44d72af7c87d5defce45f9f3ddf08191ba082c13

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

<<<<<<< HEAD
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
=======
<?php include_once("head.php"); ?>
<?php include_once("header.php"); ?>
  <body>
    <h1>Registro</h1>
    <form class="" action="form.php" method="post" enctype="multipart/form-data"><br><br>
    <label for="">Nombre</label><br><br>
    <input type="text" name="nombre" value="<?= $nombre ?>"><br><br>
    <label for="">Apellido</label><br><br>
    <input type="text" name="apellido" value="<?= $apellido ?>"><br><br>
    <label for="">Edad</label><br><br>
    <input type="number" name="edad" value="<?= $edad ?>"><br> <br>
    <label for="">Mail</label><br><br>
    <input type="text" name="mail" value="<?= $mail ?>"><br><br>
    <label for="">Pais</label><br><br>
    <select name="pais">
      <option value="">Elegir</option>
      <?php foreach ($paises as $codigo => $pais): ?>
        <?php if ($codigo == $codigoPais): ?>
          <option selected value="<?=$codigo  ?>"><?=$pais  ?></option>
        <?php else: ?>
          <option value="<?=$codigo  ?>"><?=$pais  ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select><br><br>
    <label for="">Contraseña</label><br><br>
    <input type="password" name="pass" value=""><br><br>
    <label for="">Repetir Contraseña</label><br><br>
    <input type="password" name="rpass" value=""><br><br>
    <label for="">Imagen de Perfil</label><br><br>
    <input type="file" name="imgPerfil" value=""><br><br>
    <input class="enviar" type="submit" name="enviar" value="enviar">
    </form>
    <div style="background-color:red; text-align:center;">
      <ul><?php  if (!empty($errores)) { ?>
        <?php foreach ($errores as $key => $value): ?>
          <li>En la posicion <?=$key?>, se encuentra el error <?= $value?> </li>
        <?php endforeach; ?>
      <?php } ?>
      </ul>
>>>>>>> 44d72af7c87d5defce45f9f3ddf08191ba082c13

					</select><br>
				<?php endif; ?>
				<label>Avatar:</label><br><input type="file" name="avatar"><br>
			  <input class="enviar" type="submit" name="enviar" value="enviar">
		</form>
	</div>
<?php include("footer.php"); ?>
