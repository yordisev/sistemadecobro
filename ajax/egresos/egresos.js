$(document).ready(function () {


    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $('#crear-egreso').on('submit', function (e) {
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (data) {
                var resultado = data;
                
                if (resultado.respuesta == 'exito') {
                    $('#agregaregreso').modal('hide');
                    swal(
                        'Correcto',
                        'Egreso realizo Correctamente',
                        'success'
                    ).then(function(){ 
                        location.reload();
                        });
                } else {
                    swal(
                        'Error',
                        'El monto es superior al saldo en caja',
                        'error'
                    )
                }

            }
        })

    });

  


});

