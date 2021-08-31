
$(document).ready(function () {

function mostrar_items(){
    var parametros={"action":"ajax"};
    $.ajax({
        url:'acciones/productos/modelo_ventas.php',
        data: parametros,
         beforeSend: function(objeto){
         $('.items').html('Cargando...');
      },
        success:function(data){
            $(".items").html(data).fadeIn('slow');
    }
    })
}


mostrar_items();

});