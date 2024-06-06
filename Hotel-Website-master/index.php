<?php
    session_start();
    include("config.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Hotel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</head>
<body>
  <script>
    var isLoggedIn = <?php echo isset($_SESSION['valid']) ? 'true' : 'false'; ?>;
  </script>
  <header class="header" id="navigation-menu">
    <div class="containerh">
      <nav>
        <a href="#" class="logo"> <img src="image/logo.png" alt=""> </a>
        <ul class="nav-menu">
          <li> <a href="#home" class="nav-link">Inicio</a> </li>
          <li> <a href="#Reservar" class="nav-link">Reservar</a> </li>
          <li> <a href="#about" class="nav-link">Acerca de</a> </li>
          <li> <a href="#restaurant" class="nav-link">Restaurante</a> </li>
          <li> <a href="#gallery" class="nav-link">Galeria</a> </li>
          <li> <a href="#contact" class="nav-link">Contacto</a> </li>
          <?php if (isset($_SESSION['valid'])): ?>
          <li><a href="#" id="logout-link">Cerrar Sesión</a></li>
          <?php else: ?>
            <li><a href="login.php">Iniciar Sesión</a></li>
          <?php endif; ?>
        </ul>
        <div class="hambuger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </nav>
    </div>
  </header>
  <script>
    const hambuger = document.querySelector('.hambuger');
    const navMenu = document.querySelector('.nav-menu');
    hambuger.addEventListener("click", mobileMenu);
    function mobileMenu() {
      hambuger.classList.toggle("active");
      navMenu.classList.toggle("active");
    }
    const navLink = document.querySelectorAll('.nav-link');
    navLink.forEach((n) => n.addEventListener("click", closeMenu));
    function closeMenu() {
      hambuger.classList.remove("active");
      navMenu.classList.remove("active");
    }
    document.getElementById('logout-link').addEventListener('click', function(event) {
      event.preventDefault();
      if (confirm("¿Estás seguro de que quieres cerrar sesión?")) {
        window.location.href = 'logout.php';
      }
    });
  </script>
  <section class="home" id="home">
    <div class="head_container">
      <div class="box">
        <div class="text">
          <h1>NEW DAY NEW STAY</h1>
        </div>
        <div class="image">
          <img src="image/home1.jpg" class="slide">
        </div>
        <div class="image_item">
          <img src="image/home1.jpg" alt="" class="slide active" onclick="img('image/home1.jpg')">
          <img src="image/home2.jpg" alt="" class="slide" onclick="img('image/home2.jpg')">
          <img src="image/home3.jpg" alt="" class="slide" onclick="img('image/home3.jpg')">
          <img src="image/home4.jpg" alt="" class="slide" onclick="img('image/home4.jpg')">
        </div>
      </div>
    </div>
  </section>
  <script>
    function img(anything) {
      document.querySelector('.slide').src = anything;
    }
    function change(change) {
      const line = document.querySelector('.image');
      line.style.background = change;
    }
  </script>

  <br><br><br><br><br><br><br><br>
  <section class="Reservar" id="Reservar">
    <div class="containerf">
      <div class="text">
        <h1> <span> Reserva </span>  Tus Habitaciones </h1>
      </div>
      <div>
        <form class="grid" id="reservation-form" action="reservas.php" method="post">
          <div class="campo">
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="Nombres" required>
          </div>
          <div class="campo">
            <label>Apellidos</label>
            <input type="text" name="apellido" placeholder="Apellidos" required>
          </div>
          <div class="campo">
            <label>Correo Electrónico</label>
            <input type="email" name="email" placeholder="Correo Electrónico" required>
          </div>
          <div class="campo">
            <label>Fecha de Llegada</label>
            <input type="date" name="arrival_fecha" placeholder="Fecha de Llegada" required>
          </div>
          <div class="campo">
            <label>Fecha de Salida</label>
            <input type="date" name="departure_fecha" placeholder="Fecha de Salida" required>
          </div>
          <div class="campo">
            <label>No. de Huéspedes</label>
            <input type="number" name="huespedes" placeholder="No. Personas" required>
          </div>
          <div class="campo">
            <label>Tipos de Habitaciones</label>
          </div>
          <div class="camposelect">
            <select style="height: 40px;" name="tipo_cuarto" required>
              <option value="Cuarto Superior">Cuarto Superior Serendipity</option>
              <option value="Cuarto Inferior">Cuarto Inferior Serendipity</option>
              <option value="Cuarto Máximo">Cuarto Máximo Serendipity</option>
            </select>
          </div>
          <div class="campo">   
            <input type="submit" class="button" name="enviar" value="Revisa Disponibilidad" onclick="checkLogin(event)">
          </div>
          <div class="campo">   
            <button type="button" class="button" id="payment-details-button" onclick="redirectToOtherPage()" disabled>Pago</button>
          </div>
        </form>
        <script>
          function checkLogin(event) {
            if (!isLoggedIn) {
              event.preventDefault();
              alert("No puedes reservar hasta que inicies sesión");
            }
          }
          function redirectToOtherPage() {
            window.location.href = 'pago.php';
          }
        </script>
      </div>
    </div>
  </section>
  <div id="popup" class="popup">
    <div class="popup-content">
      <span class="close">&times;</span>
      <p id="popup-message"></p>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#reservation-form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
          url: 'reservas.php',
          type: 'POST',
          data: formData,
          success: function(response) {
            // Mostrar mensaje de éxito
            $('#popup-message').text(response);
            $('#popup').show();
            // Habilitar botón de detalles de pago
            $('#payment-details-button').prop('disabled', false);
          },
          error: function(xhr, status, error) {
            // Mostrar mensaje de error
            $('#popup-message').text("Ocurrió un error al procesar tu reserva. Intenta nuevamente.");
            $('#popup').show();
          }
        });
      });
      $('.close').on('click', function() {
        $('#popup').hide();
      });
    });
  </script>
</body>
</html>

  
  <section class="about top" id="about">
    <div class="container flex">
      <div class="left">

        <div class="img">
          <img src="image/a1.jpg" alt="" class="image1">
          <img src="image/a2.jpg" alt="" class="image2">
        </div>

      </div>

      <div class="right">
        <div class="heading">
          <h5>Comodidad al más grande nivel</h5>
          <h2>Bienvenido al Hotel Serendipity</h2>
          <p>Le espera una aventura sin igual. En nuestro hotel, usted será capaz de experimentar los mas grandes lujos vacacionales y de negocios que no se puede imaginar. Lo esperamos con mucho gusto. Para reservar, arriba. </p>
        </div>

      </div>
    </div>
  </section>

  <section class="wrapper top">
    <div class="container">

      <div class="text">
        <h2>Comodidades</h2>
        <p>Nuestro Hotel incluye una serie de utilidades y comodidades que serán para que usted disfrute de la experiencia aqui, con nuestras habitaciones y paquetes todo incluido usted podrá disfrutar de: </p>

        <div class="content">
          <div class="box flex">
            <i class="fas fa-swimming-pool"></i>
            <span>Picina</span>
          </div>

          <div class="box flex">
            <i class="fas fa-dumbbell"></i>
            <span>Gym & yoga</span>
          </div>

          <div class="box flex">
            <i class="fas fa-spa"></i>
            <span>Spa & masaje</span>
          </div>

          <div class="box flex">
            <i class="fas fa-ship"></i>
            <span>Tour de bote</span>
          </div>
         
          <div class="box flex">
            <i class="fas fa-microphone"></i>
            <span>Cuarto de conferencia</span>
          </div>
          
          <div class="box flex">
            <i class="fas fa-umbrella-beach"></i>
            <span>Playas Privadas</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="room top" id="room">
    <div class="container">

      <div class="heading_top flex1">
        <div class="heading">
          <h5>Comodidad al más grande nivel</h5>
          <h2>Cuartos Y Precios</h2>
        </div>
      </div>

      <div class="content grid">
        <div class="box">
          <div class="img">
            <img src="image/r1.jpg" alt="">
          </div>

          <div class="text">
            <h3>Cuarto Superior Serendipity</h3>
            <p> <span>$</span>129 USD<span>/por noche</span> </p>
          </div>

        </div>

        <div class="box">
          <div class="img">
            <img src="image/r2.jpg" alt="">
          </div>

          <div class="text">
            <h3>Cuarto Inferior Serendipity</h3>
            <p> <span>$</span>100 USD<span>/por noche</span> </p>
          </div>

        </div>

        <div class="box">

          <div class="img">
            <img src="image/r3.jpg" alt="">
          </div>

          <div class="text">
            <h3>Cuarto Máximo Serendipity</h3>
            <p> <span>$</span>240 USD<span>/por noche</span> </p>
          </div>
          
        </div>
      </div>
    </div>
  </section>

  <section class="restaurant top" id="restaurant">
    <div class="container flex">

      <div class="left">
        <img src="image/re.jpg" alt="">
      </div>

      <div class="right">

        <div class="text">
          <h2>Nuestro Restaurante</h2>
          <p> Exquisita comida te aguarda con nuestros diferentes estilos de platillo que tenemos a tu dispocición.</p>
        </div>

        <div class="accordionWrapper">
          <div class="accordionItem open">
            <h2 class="accordionIHeading">Comida Italiana</h2>
            <div class="accordionItemContent">
              <p>El restaurante busca ofrecer comida italiana de excelente calidad y brindar un nuevo servicio de ensaladas.</p>
            </div>
          </div>

          <div class="accordionItem close">
            <h2 class="accordionIHeading">Comida Mexicana</h2>
            <div class="accordionItemContent">
              <p>Dar el mejor servicio a nuestros clientes, con precios accesibles y con la mejor calidad de comida mexicana, conservando nuestras tradiciones.</p>
            </div>
          </div>

          <div class="accordionItem close">
            <h2 class="accordionIHeading">Cocina Japonesa</h2>

            <div class="accordionItemContent">
              <p>Ser la principal cadena de restaurantes de comida japonesa, con la mejor calidad en nuestros alimentos y la mejor atención al cliente.</p>
            </div>

          </div>

          <div class="accordionItem close">
            <h2 class="accordionIHeading">Cocina Española</h2>

            <div class="accordionItemContent">
              <p>Para ti platillos llenos de sabor y tradición española.</p>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>

  <script>
    var accItem = document.getElementsByClassName('accordionItem');
    var accHD = document.getElementsByClassName('accordionIHeading');

    for (i = 0; i < accHD.length; i++) {
      accHD[i].addEventListener('click', toggleItem, false);
    }

    function toggleItem() {
      var itemClass = this.parentNode.className;
      for (var i = 0; i < accItem.length; i++) {
        accItem[i].className = 'accordionItem close';
      }
      if (itemClass == 'accordionItem close') {
        this.parentNode.className = 'accordionItem open';
      }
    }
  </script>

  <section class="gallary mtop " id="gallary">
    <div class="container">

      <div class="heading_top flex1">

        <div class="heading">
          <h2>Galería de Fotos</h2>
        </div>
        
      </div>

      <div class="owl-carousel owl-theme">

        <div class="item">
          <img src="image/g1.jpg" alt="">
        </div>

        <div class="item">
          <img src="image/g2.jpg" alt="">
        </div>

        <div class="item">
          <img src="image/g3.jpg" alt="">
        </div>

        <div class="item">
          <img src="image/g4.jpg" alt="">
        </div>

        <div class="item">
          <img src="image/g5.jpg" alt="">
        </div>

        <div class="item">
          <img src="image/g6.jpg" alt="">
        </div>

        <div class="item">
          <img src="image/g7.jpg" alt="">
        </div>

        <div class="item">
          <img src="image/g8.jpg" alt="">
        </div>

      </div>

    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous"
    referrerpolicy="no-referrer">
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"
    referrerpolicy="no-referrer">
  </script>

  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      dots: false,
      navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    })
  </script>

  <footer>
    <div class="containergridtop">

      <div class="box">
        <p class="p_footer"> Haz una reservación utilizando los siguientes metodos de pago:</p>

        <div class="payment grid">
          <img src="https://img.icons8.com/color/48/000000/visa.png" />
          <img src="https://img.icons8.com/color/48/000000/mastercard.png" />
          <img src="https://img.icons8.com/color-glass/48/000000/paypal.png" />
          <img src="https://img.icons8.com/fluency/48/000000/amex.png" />
        </div>
      </div>

      <div class="box">
        <h3>Contáctanos</h3>

        <ul>
          <li>Blvd. Revolución y, Av. Instituto Tecnológico de La Laguna s/n, Primero de Cobián Centro, 27000 Torreón, Coah.</li>
          <li><i class="far fa-envelope"></i> alu.21130877@correo.itlalaguna.edu.mx </li>
          <li><i class="far fa-phone-alt"></i >871 705 1313 </li>
          <li><i class="far fa-comments"></i> 24/7 Servicio Al Cliente </li>
          <li><a href="loginadmin.php">Inicio Sesion Administrador</a></p></li>
        </ul>

      </div>
    </div>
  </footer>

</body>
</html>