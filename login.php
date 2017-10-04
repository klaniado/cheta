<?php
$title="Login";
require_once("./head.php");
?>
  <body>
    <div class="container">

          <?php include("./header.php") ?>

      <div class="medio">
        <h1>Ingresar</h1><br><br>
        <form  action="validacion.php" method="post">
          <label for="">E-mail</label><br>
          <input type="email" name="user" value=""placeholder="  E-mail"><br><br>
          <label for="">Contraseña</label><br>
          <input type="password" name="contraseña" value=""placeholder="  Contraseña" formenctype="multipart/form-data"><br>
          <h6 class="botones"><a href="form.php">Registrate</a></h6>

          <h6 class="botones"><a href="olvide.php">Olvide mi contraseña</a></h6>
          <br>  <button type="submit" name="button" class="enviar">Enviar</button><br><br>
        </form>

      </div>

        <?php include("./footer.php") ?>

    </div>
  </body>
</html>
