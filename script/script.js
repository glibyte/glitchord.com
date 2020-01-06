$(document).on("keypress", ".cantidad_in", function(e) {
    if (e.which == 13) {
        var inputVal = $(this).val();
        var id = $(this).attr('data-id');
        var precio = $(this).attr('data-precio');
        var subtotal = precio * inputVal;
        $(this).closest('.productos_c').find('.subtotal').text('Subtotal: ' + subtotal);
        $.post('php/modificarDatos.php', {
            Id: id,
            Precio: precio,
            Cantidad: inputVal
        }, function(e) {
            $("#total").text('Total: ' + e);
        });
    }
});
$(document).ready(function() {
    $(".en_eliminar").click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $(this).parent('.productos_c').remove();
        $.post('php/eliminar.php', {
            Id: id
        }, function(a) {
            if (a == '0') {
                location.href = "?=eliminado";
            }
        });
    });
});