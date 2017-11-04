<?php
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

    </div>
    <?php include_once("footer.php"); ?>
  </body>
</html>
