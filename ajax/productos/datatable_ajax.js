$(document).on("ready", function(){

    listar();

});

    var listar = function(){

        var table = $("#dt_cliente").DataTable({

            "ajax":{

                "method": "POST",

                "url": "listar.php"

            },

            "columns":[

                {"data":"codigo"},

                {"data":"nombres"},

                {

                    "data":"estado",

                    render: function (data, estado) {

                      if (estado === 'display') {

                        var label = 'label-success';

                        if (data === 'Activo') {

                          label = 'label-warning';

                        } else if (data === 'Inactivo') {

                          label = 'label-danger';

                        }

                        return '<span class="label ' + label + '">' + data + '</span>';

                      }

                      return data;

                    }

                  },

                {"data":"prestado"},

                {"data":"acobrar"},

                {"data":"recibido"},

                {"data":"fecha_entrega"},

                {"defaultContent":" <a href='#' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#editarproveedor' ><i class='fa  fa-file-image-o'></i></a>"}

            ]

        });

    }



      