<!-- Modal Price tags -->
<div class="modal fade" id="createpricetagsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Servicio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formTags">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="tagsid">
                    <div class="mb-3">
                        <label for="title" class="form-label">Nombre del Servicio</label>
                        <input type="text" class="form-control" id="nametags" placeholder="Nombre del Servicio" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Precio del Servicio</label>
                        <input type="number" class="form-control" id="costtags" placeholder="Precio del Servicio" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Permiso de vista</label>
                        <select class="form-select" id="viewtags" aria-label="Default select example" placeholder="Precio del Servicio" required>
                          <option selected>Seleccione un opcion</option>
                          <option value="1">Activada</option>
                          <option value="2">Desactivada</option>
                        </select>   
                    </div>
                              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnSaveTitle" class="btn btn-dark">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Item tags -->
<div class="modal fade" id="createitemtagsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Item para el Servicio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formItemTags">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="itemtagsid">
                    <div class="mb-3">
                        <label for="title" class="form-label">Item del Servicio</label>
                        <input type="text" class="form-control" id="nameitemtags" placeholder="Nombre del Servicio" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Servicios a relacionar</label>
                        <div id="selecttag">
                          
                        </div>
                      
                    </div>
                              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnSaveTitle" class="btn btn-dark">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal plans -->
<div class="modal fade" id="createplansModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Plan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formPlans">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="plansid">
                    <div class="mb-3">
                        <label for="title" class="form-label">Categoria del Plan</label>
                        <select class="form-select" id="catplans" aria-label="Default select example" required>
                            <!-- CARGA A TRAVEZ DE AJAX -->
                          </select>  
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Nombre del Plan</label>
                        <input type="text" class="form-control" id="nameplans" placeholder="Nombre del Plan" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Precio del Plan</label>
                        <input type="number" class="form-control" id="costplans" placeholder="Precio del Plan" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Permiso de vista</label>
                        <select class="form-select" id="viewplans" aria-label="Default select example" placeholder="Precio del Servicio" required>
                          <option selected>Seleccione un opcion</option>
                          <option value="1">Activada</option>
                          <option value="2">Desactivada</option>
                        </select>   
                    </div>
                              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnSaveTitlePlans" class="btn btn-dark">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Item plans -->
<div class="modal fade" id="createitemplansModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Item para el Plan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formItemPlans">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="itemplansid">
                    <input type="hidden" class="form-control" id="itemplansiditem">
                    <div class="mb-3">
                        <label for="title" class="form-label">Item del Plan</label>
                        <input type="text" class="form-control" id="nameitemplans" placeholder="Nombre del Plan" required>
                    </div>

                              
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnDeleteTitleItemplans" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnSaveTitleItemplans" class="btn btn-dark">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Users -->
<div class="modal fade" id="createuserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Informacion de Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formUsers">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="userid">
                    <div class="mb-3">
                        <label for="title" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nameuser" placeholder="Nombre de Usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Correo de Usuario</label>
                        <input type="emal" class="form-control" id="mailuser" placeholder="Correo de Usuario" required>
                    </div> 
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contraseña de Usuario</label>
                        <input type="password" class="form-control" id="passuser" placeholder="Contraseña de Usuario" required>
                    </div>              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnSaveUser" class="btn btn-dark">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login - Modulo Admin</h1>
        <button type="button" id="closeLogin" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formLogin">    
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">login - Usuario</label>
                        <input type="text" class="form-control" id="login" placeholder="login - Usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Password - Contraseña</label>
                        <input type="password" class="form-control" id="passw" placeholder="Password - Contraseña" required>
                    </div>              
                </div>
                <div class="modal-footer">
                    <button type="button" id="cncLogin" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnLogin" class="btn btn-dark">Login</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal CM Server -->
<div class="modal fade" id="CMservModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Servicio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formCMServ">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="cmservid">
                    <div class="row">

                      <div class="col-6">
                          <label for="contenido" class="form-label">Categoria de Servicio</label>
                          <select class="form-select" id="catgeneral" aria-label="Default select example" required>
                            <!-- CARGA A TRAVEZ DE AJAX -->
                          </select>   
                      </div>
                      <div class="col-6">
                        <label for="title" class="form-label">Nombre del Servicio</label>
                        <input type="text" class="form-control" id="cmservname" placeholder="Nombre del Servicio" required>
                      </div>
                      <div class="col-4">
                        <label for="contenido" class="form-label">Precio del Servicio</label>
                        <input type="number" min="1" class="form-control" id="cmservprice" placeholder="Precio del Servicio" required>
                      </div>
                      <div class="col-8">
                        <label for="simagecm" class="form-label">Imagen</label>
                        <input class="form-control" type="file" onkeyup="loaddds(1);" name="simagecm" id="simagecm"  accept="image/x-png,image/gif,image/jpeg">
                      </div>
                      
                    </div>
                    
                    <div class="mb-3">
                      <label for="cmservdesc" class="form-label">Descripcion del Servicio</label>
                      <textarea class="form-control" id="cmservdesc" rows="6" required></textarea>
                    </div>
                              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnSaveTitle" class="btn btn-dark">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Owner -->
<div class="modal fade" id="createOwnerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Propietario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formOwner">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="ownerid">
                    <div class="row">
                      <div class="col-8">
                        <label for="title" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nameowner" placeholder="Nombre" required>
                      </div><!--
                      <div class="col-4" id="idefault">
                        <img src="assets/img/owner/noimage.png" class="card-img-top" alt="">
                      </div>-->
                      <div class="col-6">
                        <label for="contenido" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="phoneowner" placeholder="Telefono" required>
                      </div>
                      <div class="col-6">
                        
                      </div>
                      <div class="col-6">
                        <label for="contenido" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="igowner" placeholder="Nombre de la Cuenta" required>
                      </div>
                      <div class="col-6">
                        <label for="contenido" class="form-label">Instagram Link</label>
                        <input type="text" class="form-control" id="ligowner" placeholder="Link de la Cuenta" required>
                      </div>
                      <div class="col-8">
                      <label for="pimageown" class="form-label">Imagen</label>
                        <input class="form-control" type="file" onkeyup="loaddds(1);" name="pimageown" id="pimageown"  accept="image/x-png,image/gif,image/jpeg">
                        </div>             
                      </div>
                    </div>                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit"  class="btn btn-dark">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal cmport -->
<div class="modal fade" id="createcmportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Infomacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formcmport">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="cmportid">
                    <div class="row">
                      <div class="col-6">
                          <label for="contenido" class="form-label">Categoria del Portafolio</label>
                          <select class="form-select" id="cmportcat" aria-label="Default select example" required>
                            <!-- CARGA A TRAVEZ DE AJAX -->
                          </select>   
                      </div>
                      <div class="col-6">
                          <label for="contenido" class="form-label">Autor del Portafolio</label>
                          <select class="form-select" id="cmportaut" aria-label="Default select example" required>
                            <!-- CARGA A TRAVEZ DE AJAX -->
                          </select>   
                      </div>
                      <div class="col-6">
                        <label for="title" class="form-label">Nombre del Portafoleo</label>
                        <input type="text" class="form-control" id="cmportname" placeholder="Nombre del Portafoleo" required>
                      </div><!--
                      <div class="col-4" id="idefault">
                        <img src="assets/img/owner/noimage.png" class="card-img-top" alt="">
                      </div>-->
                      <div class="col-6">
                        <label for="contenido" class="form-label">Instagram Cliente</label>
                        <input type="text" class="form-control" id="cmportigc" placeholder="Instagram Cliente" required>
                      </div>
                      <div class="col-6">
                        <label for="contenido" class="form-label">Instagram Link</label>
                        <input type="text" class="form-control" id="cmportligc" placeholder="Link de la Cuenta" required>
                      </div>
                      <div class="col-8">
                        <label for="pimagecm" class="form-label">Imagen</label>
                        <input class="form-control" type="file" onkeyup="loaddds(1);" name="pimagecm" id="pimagecm"  maxlength="3" accept="image/x-png,image/gif,image/jpeg" multiple>
                        </div>             
                      </div>
                      <div id='preview'></div>
                    </div>                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit"  class="btn btn-dark">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Porfolio View -->
<div class="modal fade" id="viewprofolioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title col-12 text-center" id="exampleModalLabel">Mi Portafolio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formcmport">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id">
                    <div id="bodyporfolio">
                      
                    </div>                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit"  class="btn btn-dark">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>
