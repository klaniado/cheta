<?php
  $title="Recuperar Contraseña";
  require_once("head.php");
?>

  <body>
    <div class="container">

          <?php include("./header.php") ?>
        <div class="medio">

            <h2>Recuperar contraseña</h2>
            <form>
              <label for="email">Email: </label><br>
              <input type="email" name="email" id="email" value=""><br><br>
              <button class="enviar" type="submit" name="button">Enviar</button>
            </form>

          </div>

        <?php include("./footer.php") ?>
    </div>
  </body>
</html>
