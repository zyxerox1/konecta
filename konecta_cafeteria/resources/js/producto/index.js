$(document).ready(function() {
    //solo se ejecuta cuando quiere cerrar el modal de agregar producto
    $("#modalAgregar").on('hidden.bs.modal', function () {
        modal_advertencia();
    });

    //enviar submit para agregar produto
    $('#guardar').click(function() {
        $('#formulario-crear-producto').submit();
    });

    //consultar el stock mas vendido
    $('#vendido').click(function() {
        consultar_productos(2);
    });

    //consultar el stock mas tiene
    $('#stock').click(function() {
        consultar_productos(1);
    });
    


    cargar_producto();
});

//modal a cancelar la guardada del producto
function modal_advertencia(){
    BootstrapDialog.show({
        title: 'Advertencia!',
        message: '¿Está seguro no quiere agregar el producto? Perderá los cambios que no ha guardado.',
        buttons: [{
            label: 'Si, salir',
            cssClass: 'btn-danger',
            action: function(dialogItself){
                dialogItself.close();
                $("#modalAgregar").find("input").val("");
            }
        }, {
            label: 'No',
            cssClass: 'btn-success',
            action: function(dialogItself){
                dialogItself.close();
                $("#modalAgregar").modal("show");
            }
        }]
    });
}

//modal para advertencia cuando vaya a eliminar
function modal_advertencia_eliminar(){
    BootstrapDialog.show({
        title: 'Advertencia!',
        message: '¿Está seguro que quiere eliminar este registro?.',
        buttons: [{
            label: 'Si',
            cssClass: 'btn-success',
            action: function(){
                $("#formulario_eliminar").submit();
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

//funcion para cuando presione el boton de comprar
function compra_producto(id){
    //contruye el modal para ingresar la cantidad a vender
    BootstrapDialog.show({
        title: '¿Cuantas producto vas ha vender?.',
        message: $('<input type="number" id="cantidad_producto" class="form-control" placeholder="Ingrese cantidad producto." ></input>'),
        buttons: [{
            label: 'Comprar',
            cssClass: 'btn-success',
            action: function(){
                //direcionar al confirmar la ventas
                console.log(id);
                window.location.href = route("ventas.index",[id,$("#cantidad_producto").val()]);
            }
        }, {
            label: 'Cancelar',
            cssClass: 'btn-danger',
            action: function(dialogItself){
                //cierrar el  modal
                dialogItself.close();
            }
        }]
    });
}

//convertir la tabla a datatable
function cargar_producto() {
    //preguntar si la tabla ya esta con datatable
    if ($.fn.dataTable.isDataTable("#data_producto")) {
        $("#data_producto").dataTable().fnDestroy();
    }

    table = $("#data_producto").DataTable({
        ajax: {
            url: route("producto.lista"),
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
            { data: "referencia", name: "referencia" },
            { data: "precio", name: "precio" },
            { data: "peso", name: "peso" },
            { data: "categoria", name: "categoria" },
            { data: "stock", name: "stock" },
            { data: "fecha_format", name: "fecha_format" },
            { data: "id", name: "editar", orderable: false, searchable: false },
            { data: "id", name: "eliminar", orderable: false, searchable: false },
            { data: "id", name: "comprar", orderable: false, searchable: false },
        ],
        columnDefs: [
            {
                targets: 7,
                data: "id",
                render: function (data, type, row, meta) {
                    return (
                        '<button class="btn btn-primary edit" data-product="' +
                        row.id +
                        '"><i class="fas fa-pencil-alt"></i> editar</button>'
                    );
                },
            },
            {
                targets: 8,
                data: "id",
                render: function (data, type, row, meta) {
                    return (
                     
                        '<button class="btn btn-danger delete" data-product="' +
                        row.id +
                        '"><i class="fas fa-trash-alt"></i> eliminar</button>'
                    );
                },
            },
            {
                targets: 9,
                data: "id",
                render: function (data, type, row, meta) {
                    return (
                     
                        '<button class="btn btn-success comprar" data-product="' +
                        row.id +
                        '"><i class="fas fa-shopping-cart"></i> comprar</button>'
                    );
                },
            },
            
        ],

        pageLength: 10,
        drawCallback: function () {
            //eventos de botones del datatable "eliminar,editar,comprar"
            $(".delete").off();
            $(".edit").off();
            $(".delete").on("click", function () {
                var id = $(this).attr("data-product");
                $("#formulario_eliminar").attr("action", route("producto.eliminar",id));
                modal_advertencia_eliminar();
            });
            
            $(".edit").on("click", function () {
                var id = $(this).attr("data-product");
                window.location.href = route("producto.actualizar", id);
            });

            $(".comprar").on("click", function () {
                var id = $(this).attr("data-product");
                compra_producto(id);
            });
        },
    });
}

function consultar_productos(tipo){
    console.log(tipo);
    var formData = new FormData();
    formData.append("tipo", tipo);
    
    $.ajax({
        data: formData,
        url: route("producto.query",tipo),
       type: "get",
       contentType: false,
        processData: false,
        success: function (e) {
            var obj = JSON.parse(e);
            if(tipo==2){
                mostrar_mayor("El producto más vendido.","<h3>Producto: "+obj["nombre_producto"]+"</h3> <br> <h3>Cantidad: "+obj["total_ventas"]+"</h3>");
            }else{
                mostrar_mayor("El producto que más stock tiene.","<h3>Producto: "+obj["nombre_producto"]+"</h3> <br> <h3>Cantidad: "+obj["stock"]+"</h3>");
            }
        },
        error: function (jqXhr, json, errorThrown) {
            ohSnap("Hubo un error", { color: "red" });
        },
    });
}

//funcion para mostrar el mayor_stock o el mayor_vendido
function mostrar_mayor(title,message){
    BootstrapDialog.show({
        title: title,
        message: message,
        buttons: [{
            label: 'Cerrar',
            cssClass: 'btn-success',
            action: function(dialogItself){
                //cierrar el  modal
                dialogItself.close();
            }
        }]
    });
}