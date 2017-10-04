<?php
$title="Contacto";
require_once("./head.php");
?>
  <body>
    <div class="container">
          <?php include("./header.php") ?>
      <div class="medio">
        <h1>Contactanos</h1><br><br>
        <form  action="index.html" method="post">
          <label for="">Nombre</label><br>
          <input class="contacto" type="text" name="user" value=""placeholder=" Nombre"><br><br>
          <label for="">Email</label><br>
          <input class="contacto" type="email" name="" value=""placeholder=" E-mail"><br><br>
          <label for="">Mensaje</label><br>
          <textarea class="mensaje"name="mensaje" placeholder=" Escriba aqui su mensaje y lo contactaremos a la brevedad."></textarea><br><br><br><br>
          <button type="submit"class="enviar" name="button">Enviar</button>
        </form>
        <br><br>
      </div>

        <?php include("./footer.php") ?>

    </div>
  </body>
</html>
