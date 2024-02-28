$(document).ready(function () {
  session = $.trim($('#session').val());



    $.ajax({
        type: "POST",
        url: "resources/menu/menu_controller.php?op=users",
        dataType: "json",
        success: function (data) {

            if (Object.keys(data).length === 0) {

                  swal({
                    title: "Aun no se han creado ningun usuario",
                    text: "¿Deseas Crear un usuario para Administrar el contenido de la pagina?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                        $('#createuserModal').modal('show');
                    } else {
                        swal("No se Podra administrar el contenido de la pagina sin usuario administrador", {
                            buttons: false,
                            icon: "error",
                            timer: 30000,
                          });                        
                    }
                  });
            } else {
                if (session == 'activa') {
                  
                  $('#loginModal').modal('hide');

                } else {

                  $('#loginModal').modal('show');
                  
                }
            }
        }
    });
    
    $('#formUsers').submit(function (e) { 
      e.preventDefault();

      userid   = $.trim($('#userid').val());
      nameuser = $.trim($('#nameuser').val());
      mailuser = $.trim($('#mailuser').val());
      passuser = $.trim($('#passuser').val());
      
      var datos = new FormData();

      datos.append('userid', userid)
      datos.append('nameuser', nameuser)
      datos.append('mailuser', mailuser)
      datos.append('passuser', passuser)

      $.ajax({
          url: "resources/menu/menu_controller.php?op=save_edit_user",
          type: "POST",
          datatype:"json",    
          data:  datos,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function () {

          },   
          success: function(data) {
              swal("Se a creado Un nuevo Usuario Exito", {
                buttons: false,
                icon: "success",
                timer: 1000,
                });

                $('#createuserModal').modal('hide');

                setTimeout(() => {
                  location.reload(); 
                }, 1000);
           }
        });      
    })

    $('#formLogin').submit(function (e) { 
      e.preventDefault();

      login = $.trim($('#login').val());
      passw = $.trim($('#passw').val());
      
      var datos = new FormData();

      datos.append('login', login)
      datos.append('passw', passw)

      $.ajax({
          url: "resources/menu/menu_controller.php?op=login",
          type: "POST",
          dataType:"json",    
          data:  datos,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function () {

          },   
          success: function(data) {
            if (data.status == true) {
              swal("Bienvenido Has iniciado sesion correctamente", {
                buttons: false,
                icon: "success",
                timer: 3000,
                
              });
              
              $('#loginModal').modal('hide');

              setTimeout(() => {
                location.reload(); 
              }, 1000);

            } else {
              swal("El Usuario y/o password es incorrecto o no tienes permiso!", {
                buttons: false,
                icon: "error",
                timer: 3000,
                
              });
            }
              
           }
        });

        
      
    })

    $('#signoff').click(function (e) { 
      e.preventDefault();

      swal({
        title: "Cierre de sesion",
        text: "¿Esta seguro que desea cerrar sesion?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        
      })
      .then((willDelete) => {
        if (willDelete) {
          $(location).attr('href','logout.php');
        }
      });
      
    });

    $('#cncLogin').click(function (e) { 
      e.preventDefault();
      $(location).attr('href','../');
    });

    $('#closeLogin').click(function (e) { 
      e.preventDefault();
      $(location).attr('href','../');
    });
/*
    $.ajax({
        type: "POST",
        url: "resources/menu/menu_controller.php?op=menu_list",
        dataType: "html",
        success: function (data) {
            $('#').html(data);
            
        }
    });
*/

});
//