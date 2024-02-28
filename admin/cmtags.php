<?php
session_name('smcwebside');
session_start();
include("header.php");
if ($_SESSION) {
    echo '<input type="hidden" id="session" name="session" value="activa">';
} else {
    echo '<input type="hidden" id="session" name="session" value="desactiva">';
}
?>



  <!-- ======= Tabs Section ======= -->
  <section id="tabs" class="tabs">

  
<div class="container" data-aos="fade-up">

    <div class="tab-content">

        <div class="tab-pane active show">
        <div class="section-title">
            <h2>Contenido Comunity Manager</h2>
        </div>
        <div class="container" data-aos="fade-up">

            <ul class="nav nav-tabs row d-flex">
                <li class="nav-item col">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#cmporttags">
                    <h4 class="d-none d-lg-block">Portafolio</h4>
                    </a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#cmservtags">
                    <h4 class="d-none d-lg-block">Servicios</h4>
                    </a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#cmplanstags">
                    <h4 class="d-none d-lg-block">Planes</h4>
                    </a>
                </li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane" id="cmservtags">
                    <section class="section-bg">                      

                        <div class="table-responsive col-xl">

                            <div class="card text-bg-dark mb-3">
                        
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <div class="table-responsive">        
                                                <table id="CmServerTable" class="table table-dark table-striped" style="width:100%" >
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>Cod</th>
                                                            <th>Categotia</th>
                                                            <th>Servicion</th>
                                                            <th>Precio</th>
                                                            <th>Descripcion</th>
                                                            <th>Imagen</th>
                                                            <th>Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                           
                                                    </tbody>        
                                                </table>               
                                            </div>
                                            </div>
                                        </div>  
                                    </div>  
                                </div>
                            </div>

                        </div>

                    </section>
                </div>

                <div class="tab-pane" id="cmporttags">
                    <section class="section-bg">                      

                        <div class="table-responsive col-xl">

                            <div class="card text-bg-dark mb-3">

                                <div class="card-header border-0 pt-5">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button id="btnNewcmport" type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createcmportModal"><i class="bx bx-plus"></i> <span>Portafolio</span></button>    
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <div class="table-responsive">        
                                                <table id="cmportTable" class="table table-dark table-striped" style="width:100%" >
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>Cod</th>
                                                            <th>Categoria</th>
                                                            <th>Propietario</th>
                                                            <th>Portafolio</th>
                                                            <th>Instagram Cliente</th>
                                                            <th>link Cliente</th>
                                                            <!--<th>Imagen</th>-->
                                                            <th>Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                           
                                                    </tbody>        
                                                </table>               
                                            </div>
                                            </div>
                                        </div>  
                                    </div>  
                                </div>
                            </div>

                        </div>

                    </section>
                </div>


                <div class="tab-pane" id="cmplanstags">
                    <section class="section-bg">                      

                        <div class="table-responsive col-xl">

                            <div class="card text-bg-dark mb-3">

                                <div class="card-header border-0 pt-5">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button id="btnNewcmplans" type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createplansModal"><i class="bx bx-plus"></i> <span>Nuevo Plan</span></button>    
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <div class="table-responsive">        
                                                <table id="cmplansTable" class="table table-dark table-striped" style="width:100%" >
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>Cod</th>
                                                            <th>Categoria</th>
                                                            <th>Descripción</th>
                                                            <th>Items</th>
                                                            <th>Costo</th>
                                                            <th>Accion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>                           
                                                    </tbody>        
                                                </table>               
                                            </div>
                                            </div>
                                        </div>  
                                    </div>  
                                </div>
                            </div>

                        </div>

                    </section>
                </div>
                <!--  
                <div id="home" class="tab-pane active show">
                    <div class="col-lg order-1 order-lg-2 text-center text-white">
                        <img src="assets/img/logo.png" alt="" class="img-fluid">
                        <h1><strong>Seccion Community & Contents Manager</strong></h1>
                    </div>
                </div>-->

                

            </div>

        </div>
            
        </div>
    </div>

</div>
</section>
<!-- End Tabs Section -->


    <!-- End Tabs Section -->
    <script src="resources/menu/menu.js"></script>
    <script src="resources/cm/cmserv.js"></script>
    <script src="resources/cm/cmport.js"></script>
    <script src="resources/cm/cmplanstags.js"></script>
    <!--<script src="resources/webcontent/webcontent.js"></script>-->


    <?php include("resources/modals/modals.php") ?>

<?php include("footer.php");  ?>
