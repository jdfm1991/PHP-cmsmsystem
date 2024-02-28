$(document).ready(function() {

    pricetagsTable = $('#pricetagsTable').DataTable({  
        "ajax":{            
            "url": "resources/pricetags/pricetags_controller.php?op=listtags", 
            "method": 'POST', //usamos el metodo POST
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "tags"},
            {"data": "price"},
            {"data": "status",
             "render":function(data,type,row) {
              if (data == 1) {
                return '<p>Activada</p>'                
              } else {
                return '<p>Desactivada</p>' 
              }
             }
            },
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEditpricetags'><i class='ri-quill-pen-fill'></i></button><button class='btn btn-danger btn-sm BtnDeletepricetags'><i class='ri-delete-bin-6-line'></i></button></div></div>"}
        ]
    });

    $('#formTags').submit(function (e) {   
      e.preventDefault();
      

      tagsid    = $.trim($('#tagsid').val());
      nametags  = $.trim($('#nametags').val());
      costtags = $.trim($('#costtags').val());
      viewtags  = $.trim($('#viewtags').val());
      
      console.log(tagsid+' '+nametags+' '+costtags+' '+viewtags);
      
      var datos = new FormData();

      datos.append('tagsid', tagsid)
      datos.append('nametags', nametags)
      datos.append('costtags', costtags)
      datos.append('viewtags', viewtags)

      $.ajax({
          url: "resources/pricetags/pricetags_controller.php?op=save_edit_tags",
          type: "POST",
          datatype:"json",    
          data:  datos,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function () {

          },   
          success: function(data) {
              swal("Has creado un nuevo Servicio Exitosamente", {
                  icon: "success",
                  timer: 3000,
                });

               
                $('#createpricetagsModal').modal('hide');
                


                setTimeout(() => {
                  pricetagsTable.ajax.reload(null, false);
                  itemtagsTable.ajax.reload(null, false);
                }, 2000);
          }

        });

        select();

        
    });

    $(document).on("click", ".BtnDeletepricetags", function(){
      fila = $(this);           
      tagsid = $(this).closest('tr').find('td:eq(0)').text();

      swal({
      
          title: "Eliminar Usuario",
          text: "¿Está seguro de borrar el registro "+tagsid+"?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: "resources/pricetags/pricetags_controller.php?op=delete",
                  type: "POST",
                  dataType:"json",    
                  data:  {tagsid:tagsid},
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
                        pricetagsTable.ajax.reload(null, false);
                        itemtagsTable.ajax.reload(null, false);
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

    $(document).on("click", ".BtnEditpricetags", function(){
        fila = $(this).closest("tr");	        		            
        tagsid   = fila.find('td:eq(0)').text();
        nametags = fila.find('td:eq(1)').text(); //capturo el ID
        costtags  = fila.find('td:eq(2)').text();
        viewtags = fila.find('td:eq(3)').text();

        if (viewtags == 'Activada') {
          $("#viewtags").val(1);
        } else {
          $("#viewtags").val(2);
        }
        $("#tagsid").val(tagsid);
        $("#nametags").val(nametags);
        $("#costtags").val(costtags);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Informacion");		
        $('#createpricetagsModal').modal('show');	
    });

    $("#btnNew").click(function(){
      wipe() 
      $("input").prop('disabled', false);         
      $("#formTitle").trigger("reset");
      $(".modal-header").css( "background-color", "#17a2b8");
      $(".modal-header").css( "color", "white" );
    });     
         
});  
  
function wipe() {
  $("#tagsid").val("");
  $('#nametags').val("");
  $('#costtags').val("");
  $('#viewtags').val("");

  $("#itemtagsid").val("");
  $('#nameitemtags').val("");
  $('#itemtags').val("");
}

