$(document).ready(function () {

    var mont;
	$('#prestado').keyup(function (e) {
		mont = $(this).val();
	 //console.log(mont)	  
	})

		$('select#interes').on('change',function(){
		     var valor = $(this).val(); 
			 var subt = mont * (valor/100);
			 var total = parseFloat(subt) + parseFloat(mont);			
			 $("#acobrar").val(total);		
		})



    $('#crear-productos').on('submit', function (e) {
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
                    $('#agregarproductos').modal('hide');
                    swal(
                        'Correcto',
                        'Prestamo Realizado Correctamente',
                        'success'
                    ).then(function(){ 
                        location.reload();
                        });
                } else {
                    swal(
                        'Error',
                        'Hubo un error',
                        'error'
                    )
                }

            }
        })

    });

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $('#crear-pago').on('submit', function (e) {
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
                    $('#add-pago').modal('hide');
                    swal(
                        'Correcto',
                        'El Pago se realizo Correctamente',
                        'success'
                    ).then(function(){ 
                        location.reload();
                        });
                } else {
                    swal(
                        'Error',
                        'Valor del pago es superior',
                        'error'
                    )
                }

            }
        })

    });

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $('#editar-productos').on('submit', function (e) {
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function (data) {
                var resultado = data;
                if (resultado.respuesta == 'exitoso') {
                    $('#editarproducto').modal('hide');
                    swal(
                        'Correcto',
                        'Usuario Modificado Correctamente',
                        'success' 
                    ).then(function(){ 
                        location.reload();
                        });
                    
                } else {
                    swal(
                        'Error',
                        'Hubo un error',
                        'error'
                    )
                }

            }
        })



    });

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    $('.borrar_registro').on('click', function (e) {
        e.preventDefault();

        var codigo = $(this).attr('data-codigo');
        var producto = $(this).attr('data-producto');

        swal({
            title: 'Esta seguro?',
            text: "Un registro eliminado no se puede recuperar",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3885d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then(function (res) {
            if (res) {
                  $.ajax({
                type: 'post',
                data: {
                    'codigo': codigo,
                    'registro' : 'eliminar'
                },

                url: 'acciones/productos/modelo_productos.php',
                success:function(data){
                    var  resultado = JSON.parse(data);
                    if (resultado.respuesta == 'exitoso'){
                        swal(
                            'Eliminado',
                            'El Producto se elimino correctamente',
                            'success'
                        )
                        jQuery('[data-codigo="'+ resultado.id_eliminado +'"]').parents('tr').remove();
                    } else{
                        swal(
                            'Error',
                            'Hubo un error',
                            'error'
                        )
                    }

                }

            })
            }
           



        });

    });

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

    $('#add-pago').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Botón que activó el modal
        var codigo = button.data('codigo') // Extraer la información de atributos de datos
       

        var modal = $(this)
        modal.find('.modal-body #codigo').val(codigo)
    })

    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

   $('#editarproducto').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Botón que activó el modal
        var estado = button.data('estado') // Extraer la información de atributos de datos
        var codigo = button.data('codigo') // Extraer la información de atributos de datos
        var nombres = button.data('nombres') // Extraer la información de atributos de datos
        var estado = button.data('estado') // Extraer la información de atributos de datos
        var apellidos = button.data('apellidos') // Extraer la información de atributos de datos
        var direccion = button.data('direccion') // Extraer la información de atributos de datos
        var prestado = button.data('prestado') // Extraer la información de atributos de datos
        var acobrar = button.data('acobrar') // Extraer la información de atributos de datos
        var recibido = button.data('recibido') // Extraer la información de atributos de datos
        var fecha_entrega = button.data('fecha_entrega') // Extraer la información de atributos de datos
        var fechapc = button.data('fechapc') // Extraer la información de atributos de datos
        var fechauc = button.data('fechauc') // Extraer la información de atributos de datos

        var modal = $(this)
        modal.find('.modal-title').text('Modificar nombres: ' + nombres)
        modal.find('.modal-body #estado').val(estado)
        modal.find('.modal-body #codigo').val(codigo)
        modal.find('.modal-body #nombres').val(nombres)
        modal.find('.modal-body #estado').val(estado)
        modal.find('.modal-body #apellidos').val(apellidos)
        modal.find('.modal-body #direccion').val(direccion)
        modal.find('.modal-body #prestado').val(prestado)
        modal.find('.modal-body #acobrar').val(acobrar)
        modal.find('.modal-body #recibido').val(recibido)
        modal.find('.modal-body #fecha_entrega').val(fecha_entrega)
        modal.find('.modal-body #fechapc').val(fechapc)
        modal.find('.modal-body #fechauc').val(fechauc)
    })


// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
const number = document.querySelector('.number');

function formatNumber (n) {
	n = String(n).replace(/\D/g, "");
  return n === '' ? n : Number(n).toLocaleString();
}
number.addEventListener('keyup', (e) => {
	const element = e.target;
	const value = element.value;
  element.value = formatNumber(value);
});
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


});

