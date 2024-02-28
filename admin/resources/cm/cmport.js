
$(document).ready(function () {

    selectcat2();
    autor();
    listdatacompanyfooter();
 

    $("#cmportTable").dataTable().fnDestroy();

    cmportTable = $('#cmportTable').DataTable({  
      "ajax":{            
          "url": "resources/cm/cm_controller.php?op=list_cmport", 
          "method": 'POST', //usamos el metodo POST
          "dataSrc":""
      },
      "columns":[
          {"data": "id"},
          {"data": "category"},
          {"data": "own"},
          {"data": "job"},
          {"data": "customer"},
          {"data": "acustomer"},
          {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEditcmport'><i class='ri-quill-pen-fill'></i></button><button class='btn btn-danger btn-sm BtnDeletecmport'><i class='ri-delete-bin-6-line'></i></button></div></div>"}
      ],
      "language": texto_español_datatables
    });
    
    $("#btnNewcmport").click(function(){
        wipe() 
        $("input").prop('disabled', false);         
        $("#formTitle").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
    });

    $('#formcmport').submit(function (e) {   
        e.preventDefault();
        
    
        cmportid  = $.trim($('#cmportid').val());
        cmportcat = $.trim($('#cmportcat').val());
        cmportaut = $.trim($('#cmportaut').val());
        cmportname= $.trim($('#cmportname').val());
        cmportigc = $.trim($('#cmportigc').val());
        cmportligc= $.trim($('#cmportligc').val());
        // Read selected files
        var totalfiles = document.getElementById('pimagecm').files.length;
         
                
        var datos = new FormData();
    
        datos.append('cmportid', cmportid)
        datos.append('cmportcat', cmportcat)
        datos.append('cmportaut', cmportaut)
        datos.append('cmportname', cmportname)
        datos.append('cmportigc', cmportigc)
        datos.append('cmportligc', cmportligc)
        for (var index = 0; index < totalfiles; index++) {
          datos.append("pimagecm[]", document.getElementById('pimagecm').files[index]);
       }
        
    
        $.ajax({
            url: "resources/cm/cm_controller.php?op=save_edit_cmport",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
    
            },   
            success: function(data) {
              console.log(data)
              if (data.tags == 'new') {
                if (data.status == 'ok') {
                  swal("Has creado Exitosamente el registro de: "+data.porfol, {
                    buttons: false,
                    icon: "success",
                    timer: 2000,
                    
                  });                  
                } else {
                  swal("Error Fatal al registar a: "+data.porfol, {
                    buttons: false,
                    icon: "error",
                    timer: 2000,
                    
                  });
                  
                }
               
                          
              } else {
                swal("Has Actualizado Exitosamente el regitro", {
                  buttons: false,
                  icon: "success",
                  timer: 2000,
                  
                });
              }
                
                 
                  $('#createcmportModal').modal('hide');
                  
    
    
                  setTimeout(() => {
                    cmportTable.ajax.reload(null, false);
                  }, 1000);
            }
    
          });
    
    
          
    });

    $(document).on("click", ".BtnEditcmport", function(){
      $("#pimagecm").val("");
      fila = $(this).closest("tr");	        		            
      cmportid   = fila.find('td:eq(0)').text();
      cmportcat  = fila.find('td:eq(1)').text(); 
      cmportaut  = fila.find('td:eq(2)').text();
      cmportname = fila.find('td:eq(3)').text();
      cmportigc = fila.find('td:eq(4)').text();
      cmportligc = fila.find('td:eq(5)').text();

      catselect(cmportcat);
      autselect(cmportaut);

      
      $("#cmportid").val(cmportid);
      $("#cmportcat").val(cmportcat);
      $("#cmportaut").val(cmportaut);
      $("#cmportname").val(cmportname);
      $("#cmportigc").val(cmportigc);
      $("#cmportligc").val(cmportligc);
      $(".modal-header").css("background-color", "#007bff");
      $(".modal-header").css("color", "white" );
      $(".modal-title").text("Editar Informacion");		
      $('#createcmportModal').modal('show');	
    });
  

    $(document).on("click", ".BtnDeletecmport", function(){
      
      fila = $(this);           
      cmportid = $(this).closest('tr').find('td:eq(0)').text();
      cmportname = $(this).closest('tr').find('td:eq(3)').text();

      swal({
      
          title: "Eliminar Usuario",
          text: "¿Está seguro de borrar el registro de: "+cmportname+"?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: "resources/cm/cm_controller.php?op=delete_cmport",
                  type: "POST",
                  dataType:"json",    
                  data:  {cmportid:cmportid},
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
                        cmportTable.ajax.reload(null, false);
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


});

function wipe() {
  $("#cmportid").val("");
  $('#cmportcat').val("");
  $('#cmportaut').val("");
  $('#cmportname').val("");
  $('#cmportigc').val("");
  $("#cmportligc").val("");
  $("#pimagecm").val("");
}

function selectcat2() {
  $.ajax({
    url: "resources/cm/cm_controller.php?op=selectcat",
    method: "POST",
    dataType: "json",
    beforeSend: function () {

    },   
    success: function(data) {
      //$('#selecttag').html(data);

      $('#cmportcat').append('<option name="" value="">Seleccione Categoria</option>');
      $.each(data, function(idx, opt) {
          //se itera con each para llenar el select en la vista
          $('#cmportcat').append('<option name="" value="' + opt.id +'">' + opt.category + '</option>');
      });
  
    }

  });
  
}

function autor() {
  $.ajax({
    url: "resources/cm/cm_controller.php?op=selectaut",
    method: "POST",
    dataType: "json",
    beforeSend: function () {

    },   
    success: function(data) {
      //$('#selecttag').html(data);

      $('#cmportaut').append('<option name="" value="">Seleccione Autor</option>');
      $.each(data, function(idx, opt) {
          //se itera con each para llenar el select en la vista
          $('#cmportaut').append('<option name="" value="' + opt.id +'">' + opt.own + '</option>');
      });
  
    }

  });
  
}


function listdatacompanyfooter() {

  $.ajax({
      type: "POST",
      url: "resources/index/index_controller.php?op=listdatacompanyfooter",
      dataType: "html",
      success: function (data) {
          $('#footercontent').html(data);
      }
  });

};

function catselect(cmportcat) {
  $.ajax({
    url: "resources/cm/cm_controller.php?op=searchcat1",
    method: "POST",
    dataType: "json",
    data:  {cmportcat:cmportcat},
    beforeSend: function () {

    },   
    success: function(data) {
      $.each(data, function(idx, opt) {
          //se itera con each para llenar el select en la vista
          $("#cmportcat").val(opt.id);
      }); 
    }

  });
  
}

function autselect(cmportaut) {
  $.ajax({
    url: "resources/cm/cm_controller.php?op=searchaut",
    method: "POST",
    dataType: "json",
    data:  {cmportaut:cmportaut},
    beforeSend: function () {

    },   
    success: function(data) {
      $.each(data, function(idx, opt) {
          //se itera con each para llenar el select en la vista
          $("#cmportaut").val(opt.id);
      }); 
    }

  });
  
}