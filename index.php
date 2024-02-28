<?php
//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("admin/conexion/conexion.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("admin/resources/index/index_model2.php");

$index = new Index();
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once("head.php");
?>

<body>

  <!-- ======= Header ======= -->
<?php
require_once("header.php"); 
?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-6">
          <h1>Bettter digital experience with Presento</h1>
          <h2>We are team of talented designers making websites with Bootstrap</h2>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="admin/assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="admin/assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="admin/assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="admin/assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="admin/assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="admin/assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="admin/assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="admin/assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <div id="teamcontent">
          <!-- Se Llena por Controlador -->
        </div>
      </div>
    </section><!-- End Team Section -->



    
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Precios</h2><br>
          <!--<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        --></div>

        <div class="row justify-content-center" id="pricingcontent">
                    <!-- Se Llena por Controlador -->
        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Tabs Section ======= -->
    <section id="tabs" class="tabs">
        <div class="section-title">
          <h2>Servicicios</h2>
          
        </div>
        <div class="portfolio">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <?php
                $datacat = $index->listcategory();
                foreach ($datacat as $category) { ?>
                <li data-filter=".filter-cat<?php echo $category['id']  ?>"><?php echo $category['category']  ?></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php
            $datacat2 = $index->listcategory();
            foreach ($datacat2 as $category2) { ?>
              <div class="col portfolio-item filter-cat<?php echo $category2['id']  ?>">
                <div class="container" data-aos="fade-up">
                  <ul class="nav nav-tabs row d-flex">
                    <?php 
                    $dataserv = $index->listservices($category2['id']);
                    foreach ($dataserv as $services) { ?>
                    <li class="nav-item col">
                      <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-<?php echo $services['sid'] ?>">
                        <h4 class="d-none d-lg-block"><?php echo $services['servname']  ?></h4>
                      </a>
                    </li>
                    <?php } ?>
                  </ul>
                  <div class="tab-content">
                                       
                    <?php
                    $datacontent = $index->contentservices($category2['id']);
                    foreach ($datacontent as $contents) { 
                       ?>
                    <div class="tab-pane" id="tab-<?php echo $contents['id'] ?>">
                      <div class="row">
                        <div class="col-lg-6 ms-md-auto order-2 order-lg-1 bloque" data-aos="fade-up" data-aos-delay="100">
                          <h3><?php echo $contents['servname'] ?></h3>
                          <p class="fst-italic">
                          <?php echo $contents['servdesc'] ?>
                          </p>
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center bloque" data-aos="fade-up" data-aos-delay="200">
                          <img src="admin/assets/img/cm/<?php echo $contents['servimage'] ?>" alt="" class="img-fluid">
                        </div>
                      </div>
                    </div>
                    <?php }?>
                  </div>
                  <div class="tab-content">               
                    <div class="tab-pane active show" id="tab-1">
                      <div class="bloque">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
           

          </div>







        </div>

      

    </section>
    <!-- End Tabs Section -->




    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contacto</h2><br>
       </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6" id="contactcontent">
                <!-- Se Llena por Controlador -->
          </div>

          <div class="col-lg-6">
            <div  class="php-email-form">
              <div class="row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" onkeydown="return /[a-z, ]/i.test(event.key)" id="name" placeholder="Su nombre" required>
                </div>
                <div class="col form-group">
                  <input type="email"  pattern=".+@globex\.com" class="form-control" name="email" id="email" placeholder="Su Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" onkeyup="mayus(this);" id="subject" placeholder="Asunto" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" onkeyup="mayus(this);" id="message" rows="5" placeholder="Mensaje" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Cargando</div>
                <div class="error-message" id="error"></div>
                <div class="sent-message"  id="sent">Tu mensaje ha sido enviado. Gracias!</div>
                <div class="error-message"  id="validando"></div>
              </div>
              <div class="text-center"><button id="btn_mensaje" type="submit">Enviar mensaje</button></div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <script src="admin/resources/index/index.js"></script>



  </main><!-- End #main -->

  <?php include("admin/resources/modals/modals.php") ?>
  <!-- ======= Footer ======= -->
  <?php
require_once("footer.php"); 
?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="admin/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="admin/assets/vendor/aos/aos.js"></script>
  <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="admin/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="admin/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="admin/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="admin/assets/js/main.js"></script>

</body>

</html>

