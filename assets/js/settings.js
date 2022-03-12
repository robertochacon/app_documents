$(document).ready(function() {

    // mostrando tipos
    cargar_tipos();
    // mostrando formas
    cargar_formas();

    //tipo de documentos
    $("#form_type").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: './controllers/settings/types.php',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                toastr.success('', 'Tipo registrado correctamente.', { timeOut: 5000 });
                $('#registroTipoModal').modal('hide');
                $("#form_type")[0].reset();
                cargar_tipos();
            }
        });
    });

    $("#form_edit_type").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: './controllers/settings/types.php',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                toastr.success('', 'Tipo editado correctamente.', { timeOut: 5000 });
                $('#editarTypeModal').modal('hide');
                $("#form_edit_type")[0].reset();
                cargar_tipos();
            }
        });
    });

    //forma de documentos
    $("#form_shape").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: './controllers/settings/shapes.php',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                toastr.success('', 'Forma de documento registrada correctamente.', { timeOut: 5000 });
                $('#registroFormaModal').modal('hide');
                $("#form_shape")[0].reset();
                cargar_formas();
            }
        });
    });

    $("#form_edit_shape").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: './controllers/settings/shapes.php',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                toastr.success('', 'Forma editada correctamente.', { timeOut: 5000 });
                $('#editarFormaModal').modal('hide');
                $("#form_edit_shape")[0].reset();
                cargar_formas();
            }
        });
    });


});


//tipos de documentos
function cargar_tipos() {
    $.ajax({
        url: './controllers/settings/types.php',
        type: 'get',
        data: { opc: 'all' },
        beforeSend: function() { $("#datos_tipos").html('<center><img src="./assets/img/loading.gif" class="loading" width="100"><center>'); },
        success: function(data) {
            setTimeout(function() {
                $('#datos_tipos').html(data);
                $('#types_table').DataTable();
            }, 1000)
        }
    });
}

function delete_type(id) {
    if (confirm("Esta seguro de eliminar este tipo de documento?")) {
        $.ajax({
            url: './controllers/settings/types.php',
            type: 'post',
            data: { id: id, opc: 'delete' },
            beforeSend: function() { toastr.info('', 'Procesando...', { timeOut: 5000 }); },
            success: function() {
                $("#item_" + id).remove();
                toastr.success('', 'Tipo eliminado.', { timeOut: 5000 });
            }
        });
    }
}

function edit_type(id) {

    $("#name_edit").val($("#item_" + id).attr('name'))
    $("#id_edit").val($("#item_" + id).attr('identificador'))
    $("#editarTypeModal").modal('show');
}


//formas de documentos
function cargar_formas() {
    $.ajax({
        url: './controllers/settings/shapes.php',
        type: 'get',
        data: { opc: 'all' },
        beforeSend: function() { $("#datos_formas").html('<center><img src="./assets/img/loading.gif" class="loading" width="100"><center>'); },
        success: function(data) {
            setTimeout(function() {
                $('#datos_formas').html(data);
                $('#shapes_table').DataTable();
            }, 1000)
        }
    });
}

function delete_shape(id) {
    if (confirm("Esta seguro de eliminar este forma de documento?")) {
        $.ajax({
            url: './controllers/settings/shapes.php',
            type: 'post',
            data: { id: id, opc: 'delete' },
            beforeSend: function() { toastr.info('', 'Procesando...', { timeOut: 5000 }); },
            success: function() {
                $("#item_" + id).remove();
                toastr.success('', 'Forma eliminado.', { timeOut: 5000 });
            }
        });
    }
}

function edit_shape(id) {
    $("#name_shape_edit").val($("#item_" + id).attr('name'))
    $("#id_shape_edit").val($("#item_" + id).attr('identificador'))
    $("#editarFormaModal").modal('show');
}