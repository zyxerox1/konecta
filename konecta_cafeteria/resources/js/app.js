var lenguajeDatatTable={
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sSearch":         "Buscar:",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
  };

$(".card-desplegue").on('click', function () {
    if($(this).find(".tittle-card").find(".desplegue-btn").hasClass('fa-chevron-down')){
      $(this).siblings(".divDesplegableContainer").show("slow");
      $(this).find(".tittle-card").find(".desplegue-btn").removeClass('fa-chevron-down');
      $(this).find(".tittle-card").find(".desplegue-btn").addClass('fa-chevron-up');
    }else if($(this).find(".tittle-card").find(".desplegue-btn").hasClass('fa-chevron-up')){
      $(this).siblings(".divDesplegableContainer").hide("slow");
      $(this).find(".tittle-card").find(".desplegue-btn").addClass('fa-chevron-down');
      $(this).find(".tittle-card").find(".desplegue-btn").removeClass('fa-chevron-up');
    }
});

$( document ).ajaxSend(function(event,xhr,options) {
    $(".loader").fadeIn('slow');
});
  
$( document ).ajaxComplete(function() {
    setTimeout(function() {
        $(".loader").fadeOut(1);
    },1);
});