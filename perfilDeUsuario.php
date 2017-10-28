<?php $title="Perfil de usuario"; ?>

<?php
  require_once("./functions.php");
  // if(!estaLogueado()) {
  //   header("location:login.php");exit;
  // }
  $id = $_GET["id"];
  $usuario = buscarPorId($id);
  $file = glob('images/'.$usuario["nombre"]. $usuario["apellido"]. '.*');

  $file = $file[0];


?>
<?php require_once("./head.php"); ?>
  <body>

    <?php require_once("./header.php"); ?>

    <div class="container"><br><br><br><br>
      <h1>Bienvenido al perfil de <?=$usuario["nombre"]?></h1>
      <ul><pre>
        <?php foreach($usuario as $propiedad => $valor) { ?>
          <?php if ($propiedad != "id" && $propiedad != "pass") { ?>
            <li>
              <?=$propiedad?>: <?=$valor?>
            </li>
          <?php } ?>
        <?php } ?>
      </ul></pre>
      <img width="50" src="<?=$file?>" alt="">

    <br><br>
    <h6 class="botones"><a href="index.php">Ir al inicio</a></h6>
    <h6 class="botones"><a href="deslogueo.php">Cerrar sesion</a></h6>

    </div>

    <?php require_once("./footer.php"); ?>

  </body>
</html>
