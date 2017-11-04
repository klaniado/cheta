<?php
  $title="Perfil de usuario";
  require_once("./head.php");

  if(!$auth->estaLogueado()) {
    header("location:index.php");exit;
  }
  $email = $_GET["email"];
	$usuario = $db->traerPorEmail($email);
  $file = glob('images/'. $usuario->getEmail() . '.*');

  $file = $file[0];

?>
  <body>

    <?php require_once("./header.php"); ?>

    <div class="container"><br><br><br><br>
      <h1>Bienvenido al perfil de <?=$usuario->getNombre()?></h1>
      <ul>
  			<li>Nombre: <?=$usuario->getNombre()?> </li>
  			<li>Email: <?=$usuario->getEmail()?> </li>
  			<li>Edad: <?=$usuario->getEdad()?> </li>
  			<li>Pais: <?=$usuario->getPais()?> </li>
  		</ul>

      <img width="100" src="<?=$file?>" alt="">

    <br><br>
    <h6 class="botones"><a href="index.php">Ir al inicio</a></h6>
    <h6 class="botones"><a href="deslogueo.php">Cerrar sesion</a></h6>

    </div>

    <?php require_once("./footer.php"); ?>

  </body>
</html>
