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

                <div class="tab-pane" id="userlog">
                    <section class="section-bg">                      

                        <div class="container" data-aos="fade-up">
                            <div class="section-title">
                                <h2>Usuarios Registrados</h2>
                            </div>
                            <div class="table-responsive col-xl">
                                <!--begin::Table Widget 6-->
                                <div class="card text-bg-dark mb-3">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createuserModal"><i class="bx bx-plus"></i> <span>Usuarios</span></button>    
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <!--begin::Table-->
                                    <div class="card-body">
                                        <div class="container caja">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                <div class="table-responsive">        
                                                    <table id="UserTable" class="table table-dark table-striped" style="width:100%" >
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>Cod</th>
                                                                <th>Correo</th>
                                                                <th>Usuario</th>
                                                                <th>Pass</th>
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
                                    <!--end::Table-->
                                    <!--end::Body-->
                                </div>

                                <!--end::Tables Widget 6-->
                            </div>
                        

                        </div>

                    </section>
                </div>

                <div class="tab-pane" id="pricetags">
                    <section class="section-bg">                      

                        <div class="container" data-aos="fade-up">
                            <div class="section-title">
                                <h2>Servicios Ofrecidos </h2>
                            </div>
                            <div class="table-responsive col-xl">
                                <!--begin::Table Widget 6-->
                                <div class="card text-bg-dark mb-3">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button id="btnNew" type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createpricetagsModal"><i class="bx bx-plus"></i> <span>Servicio</span></button>    
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <!--begin::Table-->
                                    <div class="card-body">
                                        <div class="container caja">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                <div class="table-responsive">        
                                                    <table id="pricetagsTable" class="table table-dark table-striped" style="width:100%" >
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>Cod</th>
                                                                <th>Servicios</th>
                                                                <th>Precio</th>
                                                                <th>Vista</th>
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
                                    <!--end::Table-->
                                    <!--end::Body-->
                                </div>

                                <!--end::Tables Widget 6-->
                            </div>
                        

                        </div>

                        <br><br>

                        <div class="container" data-aos="fade-up">
                            <div class="section-title">
                                <h2>Item's de Servicios </h2>
                            </div>
                            <div class="table-responsive col-xl">
                                <!--begin::Table Widget 6-->
                                <div class="card text-bg-dark mb-3">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button id="btnNewItem" type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createitemtagsModal"><i class="bx bx-plus"></i> <span>Item's</span></button>    
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <!--begin::Table-->
                                    <div class="card-body">
                                        <div class="container caja">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                <div class="table-responsive">        
                                                    <table id="itemtagsTable" class="table table-dark table-striped" style="width:100%" >
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>Cod</th>
                                                                <th>Servicios</th>
                                                                <th>Item</th>
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
                                    <!--end::Table-->
                                    <!--end::Body-->
                                </div>

                                <!--end::Tables Widget 6-->
                            </div>
                        

                        </div>

                    </section>
                </div>

                <div class="tab-pane" id="servicetags">

                    <section id="counts" class="counts">
                        <div class="section-title">
                            <h2>Contenido Web</h2>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button id="btnNew" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createmenuModal"><i class="bx bx-plus"></i> <span>Opcion de Menu</span></button>
                        </div>


                        <div class="container" data-aos="fade-up">

                            <div class="row">

                                <div class="col-lg col-md-6">

                                    <div class="count-box">

                                        <i class="ri-check-double-line"></i>
                                        <section id="features" class="features">
                                            <div class="container" data-aos="fade-up">
                                                <section id="features" class="features">
                                                    <div class="container" data-aos="fade-up">

                                                        <div>
                                                            
                                                        </div>
                                                        <ul id="ulmenu" class="nav nav-tabs row  g-2 d-flex">
                                                            <!--El menu se carga a traves de Ajax-->
                                                        </ul>

                                                        <div id="menucontent" class="tab-content">
                                                            <!--El contenido del menu se carga a traves de Ajax-->
                                                        </div>

                                                    </div>
                                                </section>

                                            </div>
                                        </section>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>
                    
                </div>



                <div class="tab-pane active show">
                    <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                        <a href="cmtags.php" class="btn btn-outline-primary">
                            <img src="assets/img/img-cm.png" class="card-img-top" alt="...">
                            <div class="">
                                <p class="card-text text-white text-center">seccion Community & Content Manager</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="assets/img/logo.png" alt="" class="img-fluid">
                    </div>
                    </div>
                </div>
            </div>

            <?php  //include("cmtags.php") ?>


        </div>
    </section>
    <!-- End Tabs Section -->
    <script src="resources/menu/menu.js"></script>
    <script src="resources/pricetags/pricetags.js"></script>
    <script src="resources/pricetags/itemtags.js"></script>
    <script src="resources/users/users.js"></script>
    <script src="resources/cm/cm.js"></script>
    <!--<script src="resources/webcontent/webcontent.js"></script>-->


    <?php include("resources/modals/modals.php") ?>

<?php include("footer.php");  ?>

