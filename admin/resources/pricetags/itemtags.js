$(document).ready(function() {

  select() 

    

    itemtagsTable = $('#itemtagsTable').DataTable({  
        "ajax":{            
            "url": "resources/pricetags/pricetags_controller.php?op=listitemtags", 
            "method": 'POST', //usamos el metodo POST
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "dtags"},
            {"data": "item"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEdititemtags'><i class='ri-quill-pen-fill'></i></button><button class='btn btn-danger btn-sm BtnDeleteitemtags'><i class='ri-delete-bin-6-line'></i></button></div></div>"}
        ]
    });

    $('#formItemTags').submit(function (e) {   
      e.preventDefault();
      

      itemtagsid   = $.trim($('#itemtagsid').val());
      nameitemtags = $.trim($('#nameitemtags').val());
      itemtags     = $.trim($('#itemtags').val());
            
      var datos = new FormData();

      datos.append('itemtagsid', itemtagsid)
      datos.append('nameitemtags', nameitemtags)
      datos.append('itemtags', itemtags)

      $.ajax({
          url: "resources/pricetags/pricetags_controller.php?op=save_edit_items_tags",
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

                $('#createitemtagsModal').modal('hide');

                setTimeout(() => {
                  itemtagsTable.ajax.reload(null, false);
                }, 2000);
          }

        });
        
    });

    
    $(document).on("click", ".BtnDeleteitemtags", function(){
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

    $(document).on("click", ".BtnEdititemtags", function(){
        fila = $(this).closest("tr");	        		            
        itemtagsid   = fila.find('td:eq(0)').text();
        nameitemtags = fila.find('td:eq(2)').text(); //capturo el ID
        itemtags     = fila.find('td:eq(1)').text();

        $.ajax({
          url: "resources/pricetags/pricetags_controller.php?op=searchitem",
          method: "POST",
          dataType: "html",
          data:  {itemtags:itemtags},
          beforeSend: function () {
      
          },   
          success: function(data) {
            $('#default').html(data);
            /*
            $.each(data, function(idx, opt) {
                //se itera con each para llenar el select en la vista
                $("#itemtags").val(opt.id);
            }); 
            */      
          }
      
        });

       
        $("#itemtagsid").val(itemtagsid);
        $("#nameitemtags").val(nameitemtags);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Informacion");		
        $('#createitemtagsModal').modal('show');	
    });

    $("#btnNewItem").click(function(){
      wipe() 
      $("input").prop('disabled', false);         
      $("#formTitle").trigger("reset");
      $(".modal-header").css( "background-color", "#17a2b8");
      $(".modal-header").css( "color", "white" );
    });     
         
});  


function select() {

  $.ajax({
    url: "resources/pricetags/pricetags_controller.php?op=selecttags",
    method: "POST",
    dataType: "html",
    beforeSend: function () {

    },   
    success: function(data) {
      $('#selecttag').html(data);
      /*
      $('#itemtags').append('<option name="" value="">Seleccione</option>');
      $.each(data, function(idx, opt) {
          //se itera con each para llenar el select en la vista
          $('#itemtags').append('<option name="" value="' + opt.id +'">' + opt.tags + '</option>');
      });
      */      
    }

  });
  
}



