<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Presento Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Sweetalert and JQuery js File -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>

  <!-- =======================================================
  * Template Name: Presento - v3.10.0
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
        <!-- <h1 class="logo me-auto"><a href="./">Presento<span>.</span></a></h1><hr>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="./" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>

        <nav id="navbar" class="tabs">
            <div class="row justify-content-md-center">
                <?php if ($_SESSION) { ?>
                <ul class="nav nav-tabs row d-flex">
                    <li class="nav-item col">
                        <a class="nav-link" href="./">
                        <i class="ri-home-gear-line"></i>
                        <h4 class="d-none d-lg-block">Home</h4>
                        </a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link" href="owners.php">
                        <i class="ri-home-gear-line"></i>
                        <h4 class="d-none d-lg-block">Propietario</h4>
                        </a>
                    </li>
<!--
                    <li class="nav-item col">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#pricetags">
                        <i class="ri-newspaper-line"></i>
                        <h4 class="d-none d-lg-block">Servicios y Precios</h4>
                        </a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#owners">
                        <i class="ri-newspaper-line"></i>
                        <h4 class="d-none d-lg-block">Propietarios</h4>
                        </a>
                    </li>-->
                    <li class="nav-item col">
                        <a class="nav-link" href="users.php">
                        <i class="ri-user-3-line"></i>
                        <h4 class="d-none d-lg-block">Control Usuarios</h4>
                        </a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link" id="signoff">
                        <i class="ri-shut-down-line"></i>
                        <h4 class="d-none d-lg-block">Cerrar Session</h4>
                        </a>
                    </li>
                </ul>
                <?php }?>
            </div>
            
            
            <!--<i class="bi bi-list mobile-nav-toggle"></i>-->
        </nav>
        <!-- .navbar -->
        </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section></section>

    <main id="main">

 