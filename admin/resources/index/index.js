function init() {
    listdatapricing();
    listdatacompany();
    listdatacompanyfooter();
}

$(document).ready(function () {

    $.ajax({
    type: "POST",
    url: "admin/resources/index/index_controller.php?op=listdatateam",
    dataType: "html",
    success: function (data) {
            $('#teamcontent').html(data);
        }
    });

    $.ajax({
        type: "POST",
        url: "admin/resources/index/index_controller.php?op=listservices",
        dataType: "html",
        success: function (data) {
                $('#servicescontent').html(data);
            }
        });

    $(document).on("click", "#porfolio", function(){
        idteam  = $.trim($('#idteam').val());
        $("#id").val(idteam);

        $.ajax({
            url: "admin/resources/index/index_controller.php?op=listporfolioteam",
            type: "POST",
            dataType: "html",    
            data:  {idteam:idteam},
  
            success: function(data) {
                console.log(data)
                $('#bodyporfolio').html(data);
            }
    
          });
    
        $(".modal").css("background-color", "rgb(25 13 53 / 46%)");
        $(".modal-content").css("background-color", "rgb(25 13 53 / 46%)");
        $(".modal-header").css("color", "white" );
        $('#viewprofolioModal').modal('show');	
        
    });

    $(document).on("click", "#downporfolio", function(){
        idteam  = $.trim($('#idteam').val());
        window.open('cmportafolio.pdf', '_blank');      

        
    });
    $(document).on("click", "#vitae", function(){
        idteam  = $.trim($('#idteam').val());
        window.open('cmvitae.pdf', '_blank');      

        
    });
    
});



function limpiar() {
    $("#name").val('');
    $("#email").val('');
    $("#subject").val('');
    $("#message").val('');
}


$(document).on("click", "#btn_mensaje", function () {

    var name = $("#name").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    
    if (name !== "" && email !== "" && message !== "") {

        if (email.includes('@') && (email.includes('.com') || email.includes('.COM'))) {

                $.ajax({
                    url: "admin/resources/index/index_contact.php",
                    type: "post",
                    dataType: "json",
                    data: { name: name, email: (email), subject: (subject), message: (message) },
                    error: function (datos) {
                        let { icono, mensaje } = datos;
                        //verifica si el mensaje de insercion contiene error
                        if (icono == 'error') {
                            return (false);
                        } else {

                            $('#sent').show();

                            setTimeout(function () {
                                $('#sent').hide();
                            }, 1000);

                            limpiar();

                        }
                    },
                    success: function (datos) {
                        let { icono, mensaje } = datos;
                        //verifica si el mensaje de insercion contiene error
                        if (mensaje.includes('error')) {
                            return (false);
                        } else {

                            $('#sent').show();
                        
                            setTimeout(function () {
                                $('#sent').hide();
                            }, 1000);

                            limpiar();

                        }

                    }
                });


        } else {

            $('#validando').text("Correo Invalido.");
            $('#validando').show();

            setTimeout(function () {
                $('#validando').hide();
            }, 2000);
        }

    } else {

        $('#validando').text("Debe llenar todos los campos.");
        $('#validando').show();

        setTimeout(function () {
            $('#validando').hide();
        }, 2000);
    }


});

function listdatapricing() {

    $.ajax({
        type: "POST",
        url: "admin/resources/index/index_controller.php?op=listdatapricing",
        dataType: "html",
        success: function (data) {
            $('#pricingcontent').html(data);
        }
    });

};

function listdatacompany() {

    $.ajax({
        type: "POST",
        url: "admin/resources/index/index_controller.php?op=listdatacompany",
        dataType: "html",
        success: function (data) {
            $('#contactcontent').html(data);
        }
    });

};

function listdatacompanyfooter() {

    $.ajax({
        type: "POST",
        url: "admin/resources/index/index_controller.php?op=listdatacompanyfooter",
        dataType: "html",
        success: function (data) {
            $('#footercontent').html(data);
        }
    });

};



function mayus(e) {
    e.value = e.value.toUpperCase();
}

//Mostrar datos 
init();