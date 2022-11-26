$(document).ready(function() {

    //cancela la acion de actualizar
    $('#cancelar').click(function() {
        modal_advertencia();
    });

});

function modal_advertencia(){
    BootstrapDialog.show({
        title: 'Advertencia!',
        message: '¿Está seguro que desea ir al inventario? Perderá los cambios que no ha guardado.',
        buttons: [{
            label: 'Si, salir',
            cssClass: 'btn-success',
            action: function(){
                window.location.href = route("producto.invenario");
            }
        }, {
            label: 'No',
            cssClass: 'btn-danger',
            action: function(dialogItself){
                dialogItself.close();
            }
        }]
    });
}