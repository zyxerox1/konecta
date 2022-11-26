$(document).ready(function() {
    //enviar submit para agregar produto
    $('#cancelar').click(function() {
        modal_advertencia();
    });
    cargar_ventas();
});

//modal a cancelar la guardada del producto
function modal_advertencia(){
    BootstrapDialog.show({
        title: 'Advertencia!',
        message: '¿Está seguro que desea ir al inventario? Se cancelara la compra.',
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

//convertir la tabla a datatable
function cargar_ventas() {
    //preguntar si la tabla ya esta con datatable
    if ($.fn.dataTable.isDataTable("#data_ventas")) {
        $("#data_ventas").dataTable().fnDestroy();
    }

    table = $("#data_ventas").DataTable({
        ajax: {
            url: route("ventas.lista"),
        },
        dom: 'l<"mystuff"ftip>',

        type: "get",
        paging: true,
        searching: true,
        ordering: true,
        responsive: true,
        language: lenguajeDatatTable,
        "stateSave": true,
        bLengthChange: true,
        info: true,
        //search: true,
        sort: true,
        async:true,
        processing: true,
        serverSide: true,
        columns: [
            { data: "nombre_producto", name: "nombre_producto" },
            { data: "cantidad", name: "cantidad" },
            { data: "fecha_format", name: "fecha_format" },
        ]
    });
}

/*function eliminar_producto(id){
    var formData = new FormData();
    formData.append("_token", token);
    $.ajax({
        data: formData,
        url: route("producto.eliminar",id),
       type: "post",
        success: function (e) {
            ohSnap("Se elimino con exito.", { color: "green" });
            setTimeout(function () {
                window.location.href = route("producto.invenario");
            }, 1000);
            
        },
        error: function (jqXhr, json, errorThrown) {
            ohSnap("Hubo un error", { color: "red" });
        },
    });
}*/