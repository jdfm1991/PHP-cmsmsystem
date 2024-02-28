const cmplansTable ='';

$(document).ready(function () {

  $('#btnDeleteTitleItemplans').hide();//OCULTAR

    selectcat3();
    
  $("#cmplansTable").dataTable().fnDestroy();

  cmplansTable = $('#cmplansTable').DataTable({  
      "ajax":{            
          "url": "resources/cm/cm_controller.php?op=list_cmplans", 
          "method": 'POST', //usamos el metodo POST
          "dataSrc":""
      },
      "columns":[
          {"data": "id"},
          {"data": "category"},
          {"data": "description"},
          {"data": "items"},
          {"data": "cost"},
          {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-success btn-sm BtnaddCMplansitem' ><i class='bx bx-plus'></i></button><button class='btn btn-primary btn-sm BtnEditCMplans'><i class='ri-quill-pen-fill'></i></button><button class='btn btn-danger btn-sm BtnDeleteCMplans'><i class='ri-delete-bin-6-line'></i></button></div></div>"}
      ],
      "language": texto_español_datatables
    });
});

$(document).on("click","#btnNewcmplans", function(){
  $('#btnNewcategoryplans').show(); //MOSTRAR
  wipe();
  $(".modal-title").text("Nuevo Plan");
  $("input").prop('disabled', false);         
  $("#formTitle").trigger("reset");
  $(".modal-header").css( "background-color", "#17a2b8");
  $(".modal-header").css( "color", "white" );
});

function wipe() {
    $("#plansid").val("");
    $('#nameplans').val("");
    $('#costplans').val("");
    $('#viewplans').val("");
    $('#catplans').val("");
  }


  $(document).on("click",".BtnaddCMplansitem", function(){

    $('#btnDeleteTitleItemplans').hide(); // OCULTAR

    fila = $(this).closest("tr");	
    $('#itemplansiditem').val(fila.find('td:eq(0)').text());
    $('#nameitemplans').val("");
    $('#itemplansid').val("");
        
    $('#createitemplansModal').modal('show');
    $('.modal-title').text("Nuevo Item para el Plan");
    
    
});



  $(document).on("click", ".BtnEditCMplans", function(){

    $('#btnNewcategoryplans').hide(); // OCULTAR

    fila = $(this).closest("tr");	        		            
    cmplansid    = fila.find('td:eq(0)').text();
    cmplanscat   = fila.find('td:eq(1)').text(); 
    cmplansname  = fila.find('td:eq(2)').text();
    cmplansitem = fila.find('td:eq(3)').text();
    cmplansprice  = fila.find('td:eq(4)').text();

    $.ajax({
      url: "resources/cm/cm_controller.php?op=searchcat2",
      method: "POST",
      dataType: "json",
      data:  {cmplanscat:cmplanscat},
      beforeSend: function () {
  
      },   
      success: function(data) {
        $.each(data, function(idx, opt) {
            //se itera con each para llenar el select en la vista
            $("#catplans").val(opt.id);
        }); 
      }
  
    });
    
    $("#plansid").val(cmplansid);
    $("#nameplans").val(cmplansname);
    $("#costplans").val(cmplansprice);
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Informacion");		
    $('#createplansModal').modal('show');	
});



$(document).on("click", ".BtnDeleteCMplans", function(){
      
    fila = $(this);           
    cmplansid = $(this).closest('tr').find('td:eq(0)').text();
    cmplansname = $(this).closest('tr').find('td:eq(2)').text();

    swal({
    
        title: "Eliminar Plan",
        text: "¿Está seguro de borrar el registro de: "+cmplansname+"?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "resources/cm/cm_controller.php?op=delete_cmplans",
                type: "POST",
                dataType:"json",    
                data:  {cmplansid:cmplansid},
                beforeSend: function () {
                    
                },
                success: function(data) {
                  if (data.status == true) {
                    swal("¡Se elimino Plan Exitosamente!", {
                      buttons: false,
                      icon: "success",
                      timer: 1000,
                      
                    });
                              
                    $('#cmplansTable').DataTable().ajax.reload();
                  
      
                  } else {
                    swal("¡Error eliminar Plan!", {
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



function selectcat3() {

    $.ajax({
      url: "resources/cm/cm_controller.php?op=selectcat_plans",
      method: "POST",
      dataType: "json",
      beforeSend: function () {
  
      },   
      success: function(data) {
        //$('#selecttag').html(data);

        $('#catplans').append('<option name="" value="">Seleccione Categoria</option>');
        $.each(data, function(idx, opt) {
            //se itera con each para llenar el select en la vista
            $('#catplans').append('<option name="" value="' + opt.id +'">' + opt.name + '</option>');
        });
    
      }
  
    });
    
  }

  $(document).on("click","#btnSaveTitlePlans", function(){ 
    
    plansid    = ($('#plansid').val());
    catplans   = ($('#catplans').val());
    nameplans  = ($('#nameplans').val());
    costplans = ($('#costplans').val());
    viewplans  = ($('#viewplans').val());

    var datos = new FormData();

    datos.append('plansid', plansid)
    datos.append('catplans', catplans)
    datos.append('nameplans', nameplans)
    datos.append('costplans', costplans)
    datos.append('viewplans', viewplans)

    $.ajax({
        url: "resources/cm/cm_controller.php?op=save_edit_cmplans",
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
            swal("Has creado Exitosamente el Plan de: "+data.plans, {
              buttons: false,
              icon: "success",
              timer: 2000,
              
            });
                      
          } else {
            swal("Has Actualizado Exitosamente el Plan de: "+data.plans, {
              buttons: false,
              icon: "success",
              timer: 2000,
              
            });
          }
            
             
              $('#createplansModal').modal('hide');
              


              $('#cmplansTable').DataTable().ajax.reload();
        }

      });

      
            
  });



  $(document).on("click","#btnSaveTitleItemplans", function(){ 
    
    itemplansid    = ($('#itemplansid').val());
    nameitemplans   = ($('#nameitemplans').val());
    Idplan = $('#itemplansiditem').val();

    var datos = new FormData();

    datos.append('itemplansid', itemplansid);
    datos.append('nameitemplans', nameitemplans);
    datos.append('Idplan', Idplan);

    $.ajax({
        url: "resources/cm/cm_controller.php?op=save_edit_cmplansItem",
        type: "POST",
        dataType:"json",    
        data:  datos,
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function () {

        },   
        success: function(data) {
          if (data.status == 'new') {
            swal("Has creado Exitosamente el Item de Plan de: "+data.plansItem, {
              buttons: false,
              icon: "success",
              timer: 2000,
              
            });
                      
          } else {
            swal("Has Actualizado Exitosamente el Item de Plan de: "+data.plansItem, {
              buttons: false,
              icon: "success",
              timer: 2000,
              
            });
          }
            
             
              $('#createitemplansModal').modal('hide');
              


              $('#cmplansTable').DataTable().ajax.reload();
        }

      });

      
            
  });


  

function mostrar(iditem = -1, description, Idplan) {
   
    $('#createitemplansModal').modal('show');
    $('.modal-title').text("Editar Item para el Plan");
    $('#btnDeleteTitleItemplans').show(); //MOSTRAR

    $('#itemplansid').val(iditem);
    $('#nameitemplans').val(description);
     $('#itemplansiditem').val(Idplan);

}




$(document).on("click", "#btnDeleteTitleItemplans", function(){
      
  cmplansid = $('#itemplansid').val();
  cmplansname =  $('#nameitemplans').val();

    swal({
  
      title: "Eliminar Item del Plan",
      text: "¿Está seguro de borrar el registro de: "+cmplansname+"?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
              url: "resources/cm/cm_controller.php?op=delete_cmplans_item",
              type: "POST",
              dataType:"json",    
              data:  {cmplansid:cmplansid},
              beforeSend: function () {
                  
              },
              success: function(data) {
                if (data.status == true) {
                  swal("¡Se elimino Item del Plan Exitosamente!", {
                    buttons: false,
                    icon: "success",
                    timer: 1000,
                    
                  });
                            
                  $('#createitemplansModal').modal('hide');
                  $('#cmplansTable').DataTable().ajax.reload();
                
    
                } else {
                  swal("¡Error eliminar Item del Plan!", {
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
