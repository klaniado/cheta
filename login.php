<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/login.css">
    <title>Inicio</title>
  </head>
  <body>
    <div class="container">
      <div class="header">
          <?php include("./header.php") ?><br><br><br>
      </div>
      <div class="medio">
        <h1 class="title">Ingresar</h1><br><br>
        <form class="login" action="validacion.php" method="post">
          <input type="email" name="user" value=""placeholder="E-mail"><br><br>
          <input type="password" name="contraseña" value=""placeholder="Contraseña" formenctype="multipart/form-data"><br><br>
          <h6 class="botones"><a href="form.php">Registrate</a></h6>
          <br>
          <h6 class="botones"><a href="olvide.php">Olvide mi contraseña</a></h6>
          <br>
          <br><br><br><br>  <button type="submit" name="button" class="enviar">Enviar</button><br><br>
        </form>
      <div class="pregfrec2">

        <?php include("./pregfrec.php") ?>
        </div>
      </div>
      <div class="footer">
        <?php include("./footer.php") ?>
      </div>
    </div>
  </body>
</html>
