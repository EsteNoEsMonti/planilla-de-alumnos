$(document).ready(function () {
  tablaPersonas = $("#tablaPersonas").DataTable({
    "columnDefs": [{
      "targets": -1,
      "data": null,
      "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"
    }],

    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sSearch": "Buscar:",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "sProcessing": "Procesando...",
    }
  });

  $("#btnNuevo").click(function () {
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Alumno");
    $("#modalCRUD").modal("show");
    id = null;
    opcion = 1; //alta
  });

  var fila; //capturar la fila para editar o borrar el registro

  //botón EDITAR    
  $(document).on("click", ".btnEditar", function () {
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    apellido = fila.find('td:eq(2)').text();
    fnac = fila.find('td:eq(3)').text();
    curso = fila.find('td:eq(4)').text();
    tp1 = fila.find('td:eq(5)').text();
    tp2 = fila.find('td:eq(6)').text();
    nf = fila.find('td:eq(7)').text();

    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#fnac").val(fnac);
    $("#curso").val(curso);
    $("#tp1").val(tp1);
    $("#tp2").val(tp2);
    $("#nf").val(nf);
    opcion = 2; //editar

    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Persona");
    $("#modalCRUD").modal("show");

  });

  //botón BORRAR
  $(document).on("click", ".btnBorrar", function () {
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: " + id + "?");
    if (respuesta) {
      $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: { opcion: opcion, id: id },
        success: function () {
          tablaPersonas.row(fila.parents('tr')).remove().draw();
        }
      });
    }
  });

  $("#formPersonas").submit(function (e) {
    e.preventDefault();

    nombre = $.trim($("#nombre").val());
    apellido = $.trim($("#apellido").val());
    fnac = $.trim($("#fnac").val());
    curso = $.trim($("#curso").val());
    tp1 = $.trim($("#tp1").val());
    tp2 = $.trim($("#tp2").val());
    nf = $.trim($("#nf").val());
    $.ajax({
      url: "bd/crud.php",
      type: "POST",
      dataType: "json",
      data: { nombre: nombre, apellido: apellido, fnac: fnac, curso: curso, tp1: tp1, tp2: tp2, nf: nf, id: id, opcion: opcion },
      success: function (data) {
        var datos = JASON.parse(data);
        console.log(data);
        id = data[0].id;
        nombre = data[0].nombre;
        apellido = data[0].apellido;
        fnac = data[0].fnac;
        curso = data[0].curso;
        tp1 = data[0].tp1;
        tp2 = data[0].tp2;
        nf = data[0].nf;
        tablaPersonas.row.add({ id, nombre, apellido, fnac, curso, tp1, tp2, nf }).draw();
        if (opcion == 1) { tablaPersonas.row.add([id, nombre, apellido, fnac, curso, tp1, tp2, nf]).draw(); }
        else { tablaPersonas.row(fila).data([id, nombre, apellido, fnac, curso, tp1, tp2, nf]).draw(); }
      }
    });
    $("#modalCRUD").modal("hide");

  });

});