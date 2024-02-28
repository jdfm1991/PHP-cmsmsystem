$(document).ready(function () {

    nametable = $.trim($('#nametable').val());

    $.ajax({
        type: "POST",
        url: "resources/webcontent/webcontent_controller.php?op=menuitems",
        dataType: "json",
        success: function (data) {
            
            $.each(data, function(idx, opt) {
                target = opt.object
                //se itera con each para llenar las opciones del menu en la vista
                $('#ulmenu').append('<li class="nav-item col"><a class="nav-link" data-bs-toggle="tab" data-bs-target="#' + opt.object + '"><h4>' + opt.menu + '</h4></a></li>');

                $.ajax({
                    type: "POST",
                    url: "resources/webcontent/webcontent_controller.php?op=menucontent",
                    dataType: "json",
                    data:  {target:target},
                    success: function (data) {
                        console.log(data)
                        $.each(data, function(idx, opt) {
                            //se itera con each para llenar el select en la vista
                            $('#menucontent').append('<div class="tab-pane" id="' + opt.object + '"><div class="section-title"><h2>' + opt.webcontent + '</h2><div id="idtable"></div></div></div>');
                        });
                    }
                  });



            });

        }
      });

});