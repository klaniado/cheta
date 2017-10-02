<?php
  $title="Inicio";
  require_once("head.php");
?>

  <body>
    <div class="container">

          <?php include("./header.php") ?>
          <br>
  <section class="box-slider">
    <div class="slider">
              <ul>
                  <li><img src="images/responsive-banner.jpg" class="banner" alt="banner"></li>
                  <li><img src="images/BANNER.png" alt=""></li>
                  <li><img src="images/apple-banner.png" alt=""></li>
              </ul>
    </div>
    </section>
<section>
  <article class="hindex">
  <br><br>
      <strong><h1>Lo Más Nuevo</h1></strong>
  </article>
  <article>
    <a href="mac.php"><img class="img-mac"src="images/productos/MacBookPro.png" alt="i1"><h2>Macs</h2></a>
    </article>
    <article>
    <a href="ipad.php"><img class="img-ipad"src="images/productos/IpadPro.png" alt="i2"><h2>Ipads</h2></a>
  </article>
    <article>
    <a href="iphone.php"><img class="img-iphone"src="images/productos/Iphone7+.png" alt="i3"><h2>Iphones</h2></a>
  </article>
</section>
<br><br><br>
<div class="medio">
      <!-- <?php include("./pregfrec.php") ?> -->
    </div>

      <?php include("./footer.php") ?>
    </div>
  </body>
</html>
