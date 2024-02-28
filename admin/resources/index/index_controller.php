<?php
session_name('smcwebside');
session_start();

//LLAMAMOS A LA CONEXION BASE DE DATOS.
require_once("../../conexion/conexion.php");

//LLAMAMOS AL MODELO DE ACTIVACIONCLIENTES
require_once("index_model.php");

//INSTANCIAMOS EL MODELO
$index = new Index();

$idteam   = (isset($_POST['idteam'])) ? $_POST['idteam'] : '';

switch($_GET["op"]){

  case 'listdatateam':
    echo '  <div class="section-title">
                <h2>Team</h2>
            </div>
            <div class="row justify-content-md-center">';
    $data = $index->listdatateam();
    foreach ($data as $row) {
        echo '
                <div class="col-lg col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <input type="hidden" id="idteam" value="'.$row['id'].'">
                        <div class="member-img">
                            <img src="admin/assets/img/owner/'.$row['Oimage'].'" class="img-fluid" alt="">
                            <div class="social">
                                <a target="_blank" href="'.$row['ligsocial'].'"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                        <h4>'.$row['own'].'</h4>
                        <button id="porfolio" type="button" class="btn btn-outline-danger" data-bs-toggle="modal"><i class="bi bi-folder-check"></i>Portafolio</button>
                        <button id="vitae" type="button" class="btn btn-outline-success" data-bs-toggle="modal"><i class="bi bi-images"></i>Curruculum</button>
                        <!--<span>Chief Executive Officer</span>-->
                        </div>
                    </div>
                </div>
        ';
        /*
        $sub_array = array();
    
        $sub_array['id']        = $row['id'];
        $sub_array['own']       = $row['own'];
        $sub_array['phone']     = $row['phone'];
        $sub_array['igsocial']  = $row['igsocial'];
        $sub_array['ligsocial'] = $row['ligsocial'];
        $sub_array['Oimage']    = $row['Oimage'];

        $dato[] = $sub_array;
        */

    }
    echo '</div>';
    break;

    case 'listporfolioteam':
      $data = $index->listteam($idteam);
      echo '<div class="row">';
      foreach ($data as $row) {
          echo '<div class="col-lg-6 col-md-6 piso">
                  <div class="box" data-aos="fade-up" data-aos-delay="100">
                      <div class="member-img">
                          <center><img src="admin/assets/img/owner/'.$row['Oimage'].'" class="img-fluid" alt=""></center>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 mt-4 mt-md-0">
                  <div class="box featured" data-aos="fade-up" data-aos-delay="200">
                      <div class="text-white text-center">
                          <h2>'.$row['own'].'</h2><br>
                          <h1 class="fs-1"><b><strong>Portafolio de <br> Cuentas IG</strong></b></h1><br>
                          <div class="social">
                              <a target="_blank" href="'.$row['ligsocial'].'"><i class="bi bi-instagram"></i><span>'.$row['igsocial'].'</span></a>
                          </div>
                      </div>
                  </div>
              </div>';
              $data2 = $index->porfolioteam($row['id']);
              foreach ($data2 as $row2) {
                  echo '<div class="col-12">
                          <h2 class="text-white text-end">'.$row2['job'].'</h2>
                          <dic class="row">';
                          $data3 = $index->imgporfolioteam($row2['idp']);
                          foreach ($data3 as $row3) {
                              echo '<div class="col-lg-4 col-md-6 piso">
                                      <div class="box" data-aos="fade-up" data-aos-delay="100">
                                          <div class="member-img">
                                              <center><img src="admin/assets/img/cm/'.$row3['nameimg'].'" class="img-fluid" alt=""></center>
                                          </div>
                                      </div>
                                  </div>';
                          }
                  echo'   </div>
                      </div>';
              }

      }
      echo '</div>';
      break;

   


    case 'listdatacompany':
    
      $data = $index->listdatacompany();

      if($data){

          foreach ($data as $row) {
              echo '
              <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3 style="color: white;">Nuestra dirección</h3>
                  <p style="color: black;">'.$row['address'].'<br>'.$row['country'].'</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3 style="color: white;">Envíanos un correo electrónico</h3>
                  <p style="color: black;">'.$row['email'].'</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3 style="color: white;">Llámenos</h3>
                  <p style="color: black;">'.$row['phone'].'<br>'.$row['mobile'].'</p>
                </div>
              </div>
            </div>
              ';
            
          }

      }else{

              echo '
              <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3 style="color: white;">Nuestra dirección</h3>
                  <p></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3 style="color: white;">Envíanos un correo electrónico</h3>
                  <p></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3 style="color: white;">Llámenos</h3>
                  <p></p>
                </div>
              </div>
            </div>
              ';

      }
      
      echo '</div>';
      break;

    
  case 'listdatacompanyfooter':
  
      $data = $index->listdatacompany();

      if($data){

          foreach ($data as $row) {
              echo '<h3>Nosotros<span>.</span></h3>
              <p>
              '.$row['address'].'<br>
              '.$row['country'].'  <br><br>
                <strong>Teléfono : '.$row['phone'].'</strong> <br>
                <strong>Email: '.$row['email'].'</strong> <br>
              </p>
              ';
            
          }

      }else{

              echo '<h3>Nosotros<span>.</span></h3>
              <p>
                  <br>
                  <br><br>
                <strong>Teléfono :</strong> <br>
                <strong>Email:</strong> <br>
              </p>
              ';

      }
      
      echo '</div>';
      break;


  case 'listdatapricing':

    $data_category = $index->listdatapricingcategory();


    if($data_category){
      
        foreach ($data_category as $row_category) {

          $i=1;
          $atributo='';

          echo '<h2>'.$row_category['category'].'</h2><br>';

          $data = $index->listdatapricing($row_category['id']);

          foreach ($data as $row) {

              if(($i%2)==0){
                $atributo='box featured';
              }else{
                $atributo='box';
              }

                echo '<div class="col-lg-4 col-md-6">
                          <div class="'.$atributo.' dimension" data-aos="fade-up" data-aos-delay="100">
                            <h3>'.$row['description'].'</h3>
                            <h4><sup>$</sup>'.$row['cost'].'<span> / Mes</span></h4>
                                <ul>';

                                  $data_item = $index->listdatapricingItem($row['Id']);

                                    foreach ($data_item as $row_item) {
                                      echo '<li>'.$row_item['description'].'</li>';
                                    }

                      echo '</ul>
                              <div class="btn-wrap">
                                
                              </div>
                          </div>
                      </div>';

              $i++;
            }
          
        }

    }else{

            echo '';

    }
    
    break;
        
    

}





