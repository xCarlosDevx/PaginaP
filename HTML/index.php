<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../CSS/Cajas1.css">
    <link rel="stylesheet" href="../CSS/EstilosBase.css">
    <link rel="stylesheet" href="../package/css/swiper.min.css">

    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
    
    <title>Cooking Shop</title>
</head>

<header class="header">
    <div class="container logo-nav-container">
        <a href="https://cookingshop.herokuapp.com/" class="logo">Cooking Shop</a>
        <span class="menu-icon">Ver menú</span>
    
        <nav class="navigation">
            <ul class="show">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="Categorias.html">Categorias</a></li>
                <li><a href="Nosotros.html">Nosotros</a></li>
                <li><a href="Contáctanos.html">Contáctanos</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>

    <style>
        .swiper-container {
          width: 100%;
          padding-top: 50px;
          padding-bottom: 50px;
        }
        .swiper-slide {
          background-position: center;
          background-size: cover;
          width: 300px;
          height: 300px;
        }
      </style>

    <main class="main">
        <div class="container">

            <h1>¡Bienvenido a Cooking Shop!</h1>

            <div class="swiper-container">
                <div class="swiper-wrapper">
                  <div class="swiper-slide" style="background-image:url(../HTML/images/1.png)"></div>
                  <div class="swiper-slide" style="background-image:url(../HTML/images/2.png)"></div>
                  <div class="swiper-slide" style="background-image:url(../HTML/images/3.png)"></div>
                  <div class="swiper-slide" style="background-image:url(../HTML/images/4.png)"></div>
                </div>
                
            <!-- Collage -->
            <div class="swiper-pagination"></div>
            </div>

            <!-- Swiper JS -->
            <script src="../package/js/swiper.min.js"></script>

            <script>
            var swiper = new Swiper('.swiper-container', {
                effect: 'coverflow',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 'auto',
                coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows : true,
                },
                pagination: {
                el: '.swiper-pagination',
                },
            });
            </script> <br><br><br>
    </main>
    <center>
	<menu class="Imagenes">	
		<table cellpadding="7" cellspacing="7" >

        <h2>Nuestros mejores platos</h2>
            <tr>    
                <th><img src="../Imagenes/Comidas/Almuerzos/Pastelon/Pastelón de carne.jpg"></a></th>
                <th><img src="../Imagenes/Comidas/Comida rápida/Hamburguesas/De pollo.jpg"></a></th>
                <th><img src="../Imagenes/Comidas/Ensaladas/Rusa/Ensalada Rusa Venezolana.jpg"></a></th>
            </tr>
            <tr>
                <td>Pastelon de carne</td>
                <td>Hamburguesa de pollo</td>
                <td>Ensalada rusa venezolana</td>
            </tr>
            <tr>
                <th><img src="../Imagenes/Comidas/Postres/Pastel/Tiramisu.jpg"/></a></th>
                <th><img src="../Imagenes/Comidas/Mariscos/Pescado/A la plancha.jpg"></a></th>
                <th><img src="../Imagenes/Comidas/Comida rápida/Pollo/Pollo a la parrilla.jpg"></a></th>
            </tr>
            <tr>
                <td>Pastel de Tiramisu</td>
                <td>Pescado a la plancha</td>
                <td>Pollo a la parrilla</td>
            </tr>
        </table>
    </div>
    </menu> <br><br><br>

    <img src="../Imagenes/index.png">

    </center> <br><br><br>

    <footer class="footer">
        <div class="contanier">
            <p>© Cooking Shop. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>


<!-- <script src="js/jquery-3.5.0.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../JS/javaS1.js"></script>

</html>
