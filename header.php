<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Header</title>
  </head>
  <body>
    <header>
      <div class="header">
        <a id="logo" href="index.php"><img id="logoimg" src="images/logo.jpg" alt=""></a>
        <input id="buscador" type="search" name="search" placeholder="¿Qué estas buscando?" value="">
        <button id="send" type="submit" name="send"><i id="lupa" class="fa fa-search" aria-hidden="true"></i></button>
      </div>
      <div class="menu">
      <label for="menu"><i id="lmen" class="fa fa-list" aria-hidden="true"> Menú</i></label>
      <input id="menu" type="checkbox" name="" value="">
      <nav class="menu-nav">
          <li class="menu-li">
            <a class="menu-a" href="index.php">
              <i class="fa fa-home"></i>
              Home
            </a>
          </li>
          <li class="menu-li">
            <a class="menu-a" href="categorias.php">
              <i class="fa fa-bars" aria-hidden="true"></i>
              Categorías
            </a>
          </li>
          <li class="menu-li">
            <a class="menu-a" href="productos.php">
              <i class="fa fa-mobile" aria-hidden="true"></i>
             Productos
            </a>
          </li>
          <li class="menu-li">
            <a class="menu-a" href="login.php">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
              Cuenta
            </a>
          </li>
          <li class="menu-li">
            <a class="menu-a" href="contacto.php">
              <i class="fa fa-phone" aria-hidden="true"></i>
              Contacto
            </a>
          </li>
          <li class="menu-li">
            <a class="menu-a" href="#pregfrec">
              <i class="fa fa-question-circle" aria-hidden="true"></i>
              Preguntas Frecuentes
            </a>
          </li>
      </nav>
    </div>
    </header>
  </body>
</html>
