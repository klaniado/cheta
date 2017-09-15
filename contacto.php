<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/contacto.css">
    <title>Inicio</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
          <?php include("./header.php") ?><br><br>
      </div><br><br><br>
      <div class="medio">
        <h1 class="title">Contactanos</h1><br><br>
        <form class="" action="index.html" method="post">
          <input class="contacto" type="text" name="user" value=""placeholder="Nombre"><br><br>
          <input class="contacto" type="email" name="" value=""placeholder="Mail"><br><br>
          <textarea class="mensaje"name="mensaje" placeholder="Escriba aqui su mensaje y lo contactaremos a la brevedad."></textarea><br><br><br><br>
          <button type="submit"class="enviar" name="button">Enviar</button>
        </form>
        <br><br>

        <?php include("./pregfrec.php") ?>
      </div>
      <div class="footer">
        <?php include("./footer.php") ?>
      </div>
    </div>
  </body>
</html>
