<!--PREGUNTAR A MANOLLI COMO SUBIR LA TABLA Y COMO HACER LO DE LOS BOTONES DE CANCELAR FIESTA-->
<?php
  session_start();
  include("codigo/funciones.php");

  if (isset($_GET['iniciar'])) 
  {
    iniciar();
  }

  if (isset($_GET['cerrar'])) 
  {
    cerrarSesion();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Selecao Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Selecao - v4.1.0
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">Piñata Feliz</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <?php
            if(!isset($_SESSION['usuario']) and !isset($_SESSION['admin']))
            {
          ?>
              <li><a class="nav-link scrollto active" href="index.php">No ha Iniciado</a></li>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#alta">Alta</a></li>
              <li><a class="nav-link scrollto" href="#iniciar">Iniciar Sesion</a></li>
          <?php
            }
            elseif(isset($_SESSION['usuario']))
            {
          ?>
              <li><a class="nav-link scrollto active" href="index.php">Bienvenido, <?php echo $_SESSION['usuario'] ?></a></li>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#reservar">Reservar</a></li>
              <li><a class="nav-link scrollto" href="#misFiestas">Mis fiestas</a></li>
              <li><a class="nav-link scrollto " href="index.php?cerrar">Cerrar Sesion</a></li>
          <?php
            }
            elseif(isset($_SESSION['admin']))
            {
          ?>
              <li><a class="nav-link scrollto active" href="index.php">Bienvenido, <?php echo $_SESSION['admin'] ?></a></li>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="index.php?crear">Crear BD</a></li>
              <li><a class="nav-link scrollto" href="index.php?borrar">Borrar BD</a></li>
              <li class="dropdown"><a href="#"><span>Animadores</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a class="nav-link scrollto " href="#altaEmp">Alta</a></li>
                <li><a class="nav-link scrollto" href="#bajaEmp">Baja</a></li>
                <li><a class="nav-link scrollto" href="#modEmp">Modificar</a></li>
                </ul>
              </li>  
              <li class="dropdown"><a href="#"><span>Consultas</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="#animador">Animadores</a></li>
                  <li><a href="#allFiestas">Todas las fiestas</a></li>
                  <li><a href="#fiestasClie">Fiestas segun cliente</a></li>
                </ul>
              </li>         
              <li><a class="nav-link scrollto " href="index.php?cerrar">Cerrar Sesion</a></li>
          <?php
            }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Bienvenido a <span>Piñata Feliz</span></h2>
          <p class="animate__animated fanimate__adeInUp">
            En nuestra empresa nos especializamos en la realización de fiestas privadas. Arriba esos ÁNIMOS!!
          </p>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
          <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
          <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <?php
    if (!isset($_SESSION['usuario']) and !isset($_SESSION['admin'])) 
    {
  ?>
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="alta" class="about">
    <div class="container">
      <h2>Dar de Alta: </h2>
      <form class="row g-3" action="index.php?altaCliente" method="post">
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Nombre Usuario</label>
            <input type="text" name="nombre" class="form-control " id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Direccion</label>
            <input type="text" name="direccion" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Contraseña</label>
            <input type="password" name="contrasenia" class="form-control" id="validationServer01" >
        </div>
        <div class="col-12 pt-3">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form>
        <div class="col-12 text-center">
          <?php
              if (isset($_GET['altaCliente'])) 
              {
                altaCliente();
              }
          ?>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="iniciar" class="features">
      <div class="container">
      <h2>Iniciar Sesion: </h2>
      <form class="row g-3" action="index.php?iniciar" method="post">
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Usuario</label>
            <input type="text" name="usuario" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Contraseña</label>
            <input type="password" name="contrasenia" class="form-control" id="validationServer01" >
        </div>
        <div class="col-12 pt-3">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form>
      </div>
    </section><!-- End Features Section -->

    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Nuestras fiestas</h2>
          <p>Tenemos gran variedad</p>
        </div>

        

        <div class="row portfolio-container" data-aos="fade-up">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets/img/portfolio/boda.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Boda</h4>
              <p>Organizacion de fiestas de boda</p>
              <a href="assets/img/portfolio/boda.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Organizamos fiestas de boda sin compromiso, usted elije el sitio que mas le guste de nuestro catalogo"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets/img/portfolio/fiesta.jpeg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Discoteca</h4>
              <p>Fiestas en discotecas locales</p>
              <a href="assets/img/portfolio/fiesta.jpeg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="La discoteca es un lugar mas solicitado por la audiencia joven, amplio lugar de baile"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets/img/portfolio/cumpleaños.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Fiestas tematicas</h4>
              <p>Organizacion de fiestas tematicas</p>
              <a href="assets/img/portfolio/cumpleaños.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Organizamos todo tipo de fiestas tematicas, como cumpleaños, fiestas de disfraces etc. Usted elije la tematica"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets/img/portfolio/viajes.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Viajes</h4>
              <p>Viajes al lugar soñado</p>
              <a href="assets/img/portfolio/viajes.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Le organizamos el viaje que siempre soñó con quien usted elija, pregunte sin compromiso"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets/img/portfolio/sorpresa.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Fiesta sorpresa</h4>
              <p>Le organizamos una fiesta sorpresa</p>
              <a href="assets/img/portfolio/sorpresa.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Organizamos una fiesta sorpresa para quien mas desee con todo tipo de detalles"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="assets/img/portfolio/halloween.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Fiesta de halloween</h4>
              <p>Organizamos fiestas de halloween</p>
              <a href="assets/img/portfolio/halloween.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Organizamos una fiesta de halloween a su gusto con todo tipo de detalles, contactenos para mas informacion"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets/img/portfolio/bautizo.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bautizos</h4>
              <p>Organizacion de bautizos</p>
              <a href="assets/img/portfolio/bautizo.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Organizamos bautizos para recordar, con sesion fotografica a disposicion"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="assets/img/portfolio/comunion.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>fiesta de comunion</h4>
              <p>organizamos comuniones</p>
              <a href="assets/img/portfolio/comunion.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Organizamos fiestas de comunion, tendrá todo a su disposion"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="assets/img/portfolio/otros.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Otros tipos de viajes</h4>
              <p>Disponemos de otros tipos de viajes no especificados</p>
              <a href="assets/img/portfolio/otros.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Indiquenos cualquier tipo de viajes que desee"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

        </div>

      </div>
    </section>
  <?php
    }
    elseif (isset($_SESSION['admin'])) 
    {
  ?>
    <!-- ======= Cta Section ======= -->
    <section id="#" class="features">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <?php
              if (isset($_GET['crear'])) 
              {
                CBD();
              }
              if (isset($_GET['borrar'])) 
              {
                BBD();
              }
              if (isset($_GET['altaAnimador'])) 
              {
                altaAnimador();
              }
              if (isset($_GET['bajaAnimador'])) 
              {
                bajaAnimador();
              }
              if (isset($_GET['modAnimador'])) 
              {
                modAnimador();
              }
              if (isset($_GET['reservar'])) 
              {
                reservar();
              }
            ?>
          </div>
        </div>
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Cta Section ======= -->
    <section id="altaEmp" class="features">
      <div class="container">
      <h2>Alta de Animadores: </h2>
      <form class="row g-3" action="index.php?altaAnimador" method="post">
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Id del Animador</label>
            <input type="text" name="id" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Nombre del Animador</label>
            <input type="text" name="nombre" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Especialidad del Animador</label>
            <input type="text" name="especialidad" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Precio que cobrara el Animador</label>
            <input type="text" name="precio" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Contraseña</label>
            <input type="password" name="contrasenia" class="form-control " id="validationServer01" >
        </div>
        <div class="col-12 pt-3">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form> 
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Cta Section ======= -->
    <section id="bajaEmp" class="features">
      <div class="container">
      <h2>Baja de Animadores: </h2>
      <form class="row g-3" action="index.php?bajaAnimador" method="post">
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Id del Animador</label>
            <input type="text" name="id" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-12 pt-3">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form>        
      </div>
    </section><!-- End Cta Section -->

    <section id="modEmp" class="features">
      <div class="container">
      <h2>Modificacion de Animadores: </h2>
      <form class="row g-3" action="index.php?modAnimador" method="post">
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">id del Animador que quieres modificar</label>
            <input type="text" name="id" class="form-control" id="validationServer01" required>
        </div>
      <h4>Lo de abajo es lo modificable</h4>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Nombre del Animador</label>
            <input type="text" name="nombre" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Especialidad del Animador</label>
            <input type="text" name="especialidad" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Precio que cobrara el Animador</label>
            <input type="text" name="precio" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Contraseña</label>
            <input type="password" name="contrasenia" class="form-control" id="validationServer01" >
        </div>
        <div class="col-12 pt-3">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form> 
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Cta Section ======= -->
    <section id="animador" class="features">
      <div class="container">
          <?php
            echo "<h4>Tabla de todos los animadores</h4>";
            TodosAnimadores();
          ?>
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Cta Section ======= -->
    <section id="allFiestas" class="features">
      <div class="container">

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Cta Section ======= -->
    <section id="fiestasClie" class="features">
      <div class="container">

      </div>
    </section><!-- End Cta Section -->

  <?php
    }
    elseif (isset($_SESSION['usuario'])) 
    {
  ?>

   <!-- ======= Cta Section ======= -->
   <section id="#" class="features">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <?php
              if (isset($_GET['reservar'])) 
              {
                reservar();
              }
              if (isset($_GET['eliminarregistro'])) 
              {
                eliminarregistro();
              }
            ?>
          </div>
        </div>
      </div>
    </section>
   <section id="reservar" class="features">
   <div class="container">
      <h2>Solicitar Fiesta:</h2>
      <form class="row g-3" action="index.php?reservar" method="post">
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Fecha (yyyy/mm/dd)</label>
            <input type="text" name="fecha" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
        <label for="validationServer01" class="form-label">Elige un animador/a</label>
        <select name="animador" class="form-select w-350 mr-1" id="validationTooltip04" required>
          <option selected disabled value="">Animador</option>
          <?php 
          if ($c=mysqli_connect ("localhost","usuapp","","pinata_feliz")){
            $sentencia="SELECT idanimador, NOMBREanimador FROM animadores";
            if($resultado=mysqli_query($c,$sentencia)){
              while ($registro = mysqli_fetch_array($resultado)){
                  echo '<option value="'.$registro[0].'">'.$registro[1].'</option>';
              }
            }else{
                echo "<h1>No ha sido posible ejecutar la consulta</h1>";
            }
          }else{
              echo "<h2> NO HA SIDO POSIBLE ESTABLECER LA CONEXIÓN</h2>"; 
          }
          mysqli_close($c);
          ?>
        </select>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Duracion (horas)</label>
            <input type="text" name="duracion" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Tipo de fiesta</label>
            <input type="text" name="tipo" class="form-control" id="validationServer01" required>
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Nº de asistentes</label>
            <input type="text" name="asistentes" class="form-control" id="validationServer01" >
        </div>
        <div class="col-md-12">
            <label for="validationServer01" class="form-label">Media de edad</label>
            <input type="text" name="mediaedad" class="form-control" id="validationServer01" >
        </div>
        <div class="col-12 pt-3">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form> 
      </div>
    </section>

    <section id="misFiestas" class="features">
      <div class="container">
          <?php
            echo "<h4>Tabla de todas las fiestas</h4>";
            misfiestas();
          ?>
      </div>
    </section>

  <?php
    }
  ?>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Selecao</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Selecao</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/selecao-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>