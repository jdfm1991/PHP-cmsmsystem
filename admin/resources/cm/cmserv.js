

$(document).ready(function () {

    selectcat()
    
  $("#CmServerTable").dataTable().fnDestroy();

    CmServerTable = $('#CmServerTable').DataTable({  
      "ajax":{            
          "url": "resources/cm/cm_controller.php?op=list_cmserv", 
          "method": 'POST', //usamos el metodo POST
          "dataSrc":""
      },
      "columns":[
          {"data": "id"},
          {"data": "servcategory"},
          {"data": "servname"},
          {"data": "servprice"},
          {"data": "servdesc"},
          {"data": "servimage",
             "render":function(data,type,row) {
                return '<center><img src="assets/img/cm/'+data+'" width="100px" height="100px"></center>'
             }
            },
          {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEditCMserv'><i class='ri-quill-pen-fill'></i></button><button class='btn btn-danger btn-sm BtnDeleteCMserv'><i class='ri-delete-bin-6-line'></i></button></div></div>"}
      ],
      "language": texto_español_datatables
    });
    
    $("#btnNewcmserv").click(function(){
        wipe() 
        $("input").prop('disabled', false);         
        $("#formTitle").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
    });

    $('#formCMServ').submit(function (e) {   
        e.preventDefault();
        
    
        cmservid    = $.trim($('#cmservid').val());
        cmservcat   = $.trim($('#cmservcat').val());
        cmservname  = $.trim($('#cmservname').val());
        cmservprice = $.trim($('#cmservprice').val());
        cmservdesc  = $.trim($('#cmservdesc').val());
        //cmservimage = $("#cmservimage")[0].files[0];
        simagecm = $("#simagecm")[0].files[0];

                
        var datos = new FormData();
    
        datos.append('cmservid', cmservid)
        datos.append('cmservcat', cmservcat)
        datos.append('cmservname', cmservname)
        datos.append('cmservprice', cmservprice)
        datos.append('simagecm', simagecm)
        datos.append('cmservdesc', cmservdesc)
    
        $.ajax({
            url: "resources/cm/cm_controller.php?op=save_edit_cmserv",
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
                swal("Has creado Exitosamente el Servicio de: "+data.servic, {
                  buttons: false,
                  icon: "success",
                  timer: 2000,
                  
                });
                          
              } else {
                swal("Has Actualizado Exitosamente el Servicio de: "+data.servic, {
                  buttons: false,
                  icon: "success",
                  timer: 2000,
                  
                });
              }
                
                 
                  $('#CMservModal').modal('hide');
                  
    
    
                  setTimeout(() => {
                    CmServerTable.ajax.reload(null, false);
                  }, 1000);
            }
    
          });
    
          select();
    
          
      });

    $(document).on("click", ".BtnDeleteCMserv", function(){
      fila = $(this);           
      cmservid = $(this).closest('tr').find('td:eq(0)').text();

      swal({
      
        title: "Eliminar Usuario",
        text: "¿Está seguro de borrar el registro "+cmservid+"?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: "resources/cm/cm_controller.php?op=delete_cmserv",
                type: "POST",
                dataType:"json",    
                data:  {cmservid:cmservid},
                beforeSend: function () {
                    
                },
                success: function(data) {
                  if (data.status == true) {
                    swal("¡Se elimino usuario Exitosamente!", {
                      buttons: false,
                      icon: "success",
                      timer: 3000,
                      
                    });
                              
                    setTimeout(() => {
                      CmServerTable.ajax.reload(null, false);
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
  
    $(document).on("click", ".BtnEditCMserv", function(){
        fila = $(this).closest("tr");	        		            
        cmservid    = fila.find('td:eq(0)').text();
        cmservcat   = fila.find('td:eq(1)').text(); 
        cmservname  = fila.find('td:eq(2)').text();
        cmservprice = fila.find('td:eq(3)').text();
        cmservdesc  = fila.find('td:eq(4)').text();
        cmservimage = fila.find('td:eq(5)').text();

        $.ajax({
          url: "resources/cm/cm_controller.php?op=searchcat1",
          method: "POST",
          dataType: "json",
          data:  {cmservcat:cmservcat},
          beforeSend: function () {
      
          },   
          success: function(data) {
            $.each(data, function(idx, opt) {
                //se itera con each para llenar el select en la vista
                $("#catgeneral").val(opt.id);
            }); 
          }
      
        });

        
        $("#cmservid").val(cmservid);
        $("#cmservname").val(cmservname);
        $("#cmservprice").val(cmservprice);
        $("#cmservdesc").val(cmservdesc);
        //$("#cmservimage").val(cmservimage);
        //$('#fileInput').attr("value", cmservimage);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Informacion");		
        $('#CMservModal').modal('show');	
    });

});

function wipe() {
  $("#cmservid").val("");
  $('#catgeneral').val("");
  $('#cmservname').val("");
  $('#cmservprice').val("");
  $('#cmservdesc').val("");
  $("#simagecm").val("");
}

function selectcat() {

    $.ajax({
      url: "resources/cm/cm_controller.php?op=selectcat",
      method: "POST",
      dataType: "json",
      beforeSend: function () {
  
      },   
      success: function(data) {
        //$('#selecttag').html(data);

        $('#catgeneral').append('<option name="" value="">Seleccione Categoria</option>');
        $.each(data, function(idx, opt) {
            //se itera con each para llenar el select en la vista
            $('#catgeneral').append('<option name="" value="' + opt.id +'">' + opt.category + '</option>');
        });
    
      }
  
    });
    
  }
  
    

 