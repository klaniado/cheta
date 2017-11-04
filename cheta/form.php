<?php
require_once ("functions.php");
$nombre="";
$email="";
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
    $email=$_POST["email"];
    $edad=$_POST["edad"];

    $errores=validarInfo($_POST);

    if (count($errores) == 0) {
      $errores = guardarImagen("imgPerfil",$errores);
      if (count($errores) == 0) {
        $usuarioArray = crearUsuario($_POST);
        guardarUsuario($usuarioArray);

      }
  }
}
?>

<?php include_once("head.php"); ?>
<?php include_once("header.php"); ?>
  <body>
    <form class="" action="form.php" method="post" enctype="multipart/form-data"><br><br>
    <label for="">nombre</label><br><br>
    <input type="text" name="nombre" value="<?= $nombre ?>"><br><br>
    <label for="">edad</label><br><br>
    <input type="number" name="edad" value="<?= $edad ?>"><br> <br>
    <label for="">email</label><br><br>
    <input type="text" name="email" value="<?= $email ?>"><br><br>
    <label for="">pais</label><br><br>
    <select name="pais">
      <option value="">elegir</option>
      <?php foreach ($paises as $codigo => $pais): ?>
        <?php if ($codigo == $codigoPais): ?>
          <option selected value="<?=$codigo  ?>"><?=$pais  ?></option>
        <?php else: ?>
          <option value="<?=$codigo  ?>"><?=$pais  ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select><br><br>
    <label for="">contraseña</label><br><br>
    <input type="password" name="pass" value=""><br><br>
    <label for="">repetir contraseña</label><br><br>
    <input type="password" name="rpass" value=""><br><br>
    <label for="">imagen de perfil</label><br><br>
    <input type="file" name="imgPerfil" value=""><br><br>
    <input type="submit" name="enviar" value="enviar">
    </form>
    <div style="background-color:red; text-align:center;">
      <ul><?php  if (!empty($errores)) { ?>
        <?php foreach ($errores as $key => $value): ?>
          <li>En la posicion <?=$key?>, se encuentra el error <?= $value?> </li>
        <?php endforeach; ?>
      <?php } ?>
      </ul>

    </div>
    <?php include_once("footer.php"); ?>
  </body>
</html>
