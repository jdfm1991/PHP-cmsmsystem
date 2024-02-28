$(document).ready(function() {
        
    UserTable = $('#UserTable').DataTable({  
        "ajax":{            
            "url": "resources/users/users_controller.php?op=enlist", 
            "method": 'POST', //usamos el metodo POST
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "correo"},
            {"data": "login"},
            {"data": "pass"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEditUser'><i class='ri-quill-pen-fill'></i></button><button class='btn btn-danger btn-sm BtnDeleteUser'><i class='ri-delete-bin-6-line'></i></button></div></div>"}
        ]
    });     
    
    
    $(document).on("click", ".BtnDeleteUser", function(){
      fila = $(this);           
      userid = $(this).closest('tr').find('td:eq(0)').text();

      swal({
      
          title: "Eliminar Usuario",
          text: "¿Está seguro de borrar el registro "+userid+"?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: "resources/users/users_controller.php?op=delete",
                  type: "POST",
                  dataType:"json",    
                  data:  {userid:userid},
                  beforeSend: function () {
                      
                  },
                  success: function(data) {
                    if (data.status == true) {
                      swal("¡Se elimino usuario Exitosamente!", {
                        buttons: false,
                        icon: "success",
                        timer: 1000,
                        
                      });
                                
                      setTimeout(() => {
                        UserTable.ajax.reload(null, false);
                      }, 1000);
        
                    } else {
                      swal("¡Error eliminar usuario!", {
                        buttons: false,
                        icon: "error",
                        timer: 1000,
                        
                      });
                    }
                                        
                   }
                });	
          }
        });

    });

    $(document).on("click", ".BtnEditUser", function(){		        
      fila = $(this).closest("tr");	        		            
      userid  = fila.find('td:eq(0)').text();
      nameuser = fila.find('td:eq(2)').text(); //capturo el ID
      mailuser    = fila.find('td:eq(1)').text();
      passuser    = fila.find('td:eq(3)').text();
      $("#userid").val(userid);
      $("#nameuser").val(nameuser);
      $("#mailuser").val(mailuser);
      $("#passuser").val(passuser);
      $(".modal-header").css("background-color", "#007bff");
      $(".modal-header").css("color", "white" );
      $(".modal-title").text("Editar de Usuario");		
      $('#createuserModal').modal('show');	
    });
         
    });   
