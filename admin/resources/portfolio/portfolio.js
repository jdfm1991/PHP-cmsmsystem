$(document).ready(function () {


    ownerTable = $('#ownerTable').DataTable({  
      "ajax":{            
          "url": "resources/owner/owner_controller.php?op=list", 
          "method": 'POST', //usamos el metodo POST
          "dataSrc":""
      },
      "columns":[
          {"data": "id"},
          {"data": "own"},
          {"data": "phone"},
          {"data": "igsocial"},
          {"data": "ligsocial"},
          {"data": "Oimage",
             "render":function(data,type,row) {
                return '<center><img src="assets/img/owner/'+data+'" width="100px" height="100px"></center>'
             }
            },
          {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEditOwner'><i class='ri-quill-pen-fill'></i></button><button class='btn btn-danger btn-sm BtnDeleteOwner'><i class='ri-delete-bin-6-line'></i></button></div></div>"}
      ]
    });
    
    $("#btnNewOwner").click(function(){
        wipe() 
        $("input").prop('disabled', false);         
        $("#formTitle").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
    });

    $('#formOwner').submit(function (e) {   
        e.preventDefault();
        
    
        ownerid    = $.trim($('#ownerid').val());
        nameowner  = $.trim($('#nameowner').val());
        phoneowner = $.trim($('#phoneowner').val());
        igowner    = $.trim($('#igowner').val());
        ligowner  = $.trim($('#ligowner').val());
        pimageown  = $("#pimageown")[0].files[0];
                
        var datos = new FormData();
    
        datos.append('ownerid', ownerid)
        datos.append('nameowner', nameowner)
        datos.append('phoneowner', phoneowner)
        datos.append('igowner', igowner)
        datos.append('ligowner', ligowner)
        datos.append('pimageown', pimageown)
    
        $.ajax({
            url: "resources/owner/owner_controller.php?op=save_edit",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
    
            },   
            success: function(data) {
              if (data.status == 'new') {
                swal("Has creado Exitosamente el registro", {
                  buttons: false,
                  icon: "success",
                  timer: 2000,
                  
                });
                          
              } else {
                swal("Has Actualizado Exitosamente el regitro", {
                  buttons: false,
                  icon: "success",
                  timer: 2000,
                  
                });
              }
                
                 
                  $('#createOwnerModal').modal('hide');
                  
    
    
                  setTimeout(() => {
                    ownerTable.ajax.reload(null, false);
                  }, 1000);
            }
    
          });
    
    
          
    });

    $(document).on("click", ".BtnDeleteOwner", function(){
      fila = $(this);           
      ownerid = $(this).closest('tr').find('td:eq(0)').text();
      nameowner = $(this).closest('tr').find('td:eq(1)').text();

      swal({
      
          title: "Eliminar Usuario",
          text: "¿Está seguro de borrar el registro de: "+nameowner+"?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: "resources/owner/owner_controller.php?op=delete",
                  type: "POST",
                  dataType:"json",    
                  data:  {ownerid:ownerid},
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
                        ownerTable.ajax.reload(null, false);
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
  
    $(document).on("click", ".BtnEditOwner", function(){
        fila = $(this).closest("tr");	        		            
        ownerid    = fila.find('td:eq(0)').text();
        nameowner  = fila.find('td:eq(1)').text(); 
        phoneowner = fila.find('td:eq(2)').text();
        igowner    = fila.find('td:eq(3)').text();
        ligowner   = fila.find('td:eq(4)').text();
        pimageown  = fila.find('td:eq(5)').text();

        
        $("#ownerid").val(ownerid);
        $("#nameowner").val(nameowner);
        $("#phoneowner").val(phoneowner);
        $("#igowner").val(igowner);
        $("#ligowner").val(ligowner);
        $("#pimageown").val(pimageown);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Informacion");		
        $('#createOwnerModal').modal('show');	
    });

});

function wipe() {
  $("#ownerid").val("");
  $('#nameowner').val("");
  $('#phoneowner').val("");
  $('#igowner').val("");
  $('#ligowner').val("");
  $("#pimageown").val("");
}

    

 