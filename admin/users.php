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

                <div class="tab-pane active show" id="userlog">
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

            </div>

            <?php  //include("cmtags.php") ?>


        </div>
    </section>
    <!-- End Tabs Section -->
    <script src="resources/menu/menu.js"></script>
    <script src="resources/users/users.js"></script>


    <?php include("resources/modals/modals.php") ?>

<?php include("footer.php");  ?>

