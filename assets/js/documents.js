$(document).ready(function() {

    $("#form_document").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: './controllers/documents.php',
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                toastr.success('', 'Documento registrado correctamente.', { timeOut: 5000 });
                $('#registroDocumentoModal').modal('hide');
                $("#form_document")[0].reset();
                cargar_documentos();
            }
        });

    });

    $("#form_edit_users").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: './controllers/users.php',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                toastr.success('', 'Usuario editado correctamente.', { timeOut: 5000 });
                $('#editarUsuarioModal').modal('hide');
                $("#form_edit_users")[0].reset();
                cargar_documentos();
            }
        });
    });


    // mostrando productos
    cargar_documentos();

});

function cargar_documentos() {
    $.ajax({
        url: './controllers/documents.php',
        type: 'get',
        beforeSend: function() { $("#datos_documentos").html('<center><img src="./assets/img/loading.gif" class="loading" width="100"><center>'); },
        success: function(data) {
            setTimeout(function() {
                $('#datos_documentos').html(data);
                $('#documents_table').DataTable();
            }, 1000)
        }
    });
}

function delete_document(id) {
    if (confirm("Esta seguro de eliminar este documento?")) {
        $.ajax({
            url: './controllers/documents.php',
            type: 'post',
            data: { id: id, opc: 'delete' },
            beforeSend: function() { toastr.info('', 'Procesando...', { timeOut: 5000 }); },
            success: function() {
                $("#item_" + id).remove();
                toastr.success('', 'Documento eliminado.', { timeOut: 5000 });
            }
        });
    }
}

function edit_document(id) {

    $("#username_edit").val($("#item_" + id).attr('username'))
    $("#password_edit").val($("#item_" + id).attr('password'))
    $("#id_edit").val($("#item_" + id).attr('identificador'))
        // $("#status").val($("#item_" + id).attr('status'))

    $("#editarUsuarioModal").modal('show');
}

function watch_document(file) {

    if (file.includes(".pdf")) {
        $("#preview_document").html(`<embed src="files/${file}" type="application/pdf" width="100%" height="600px" />`)
    } else if (file.includes(".jpg") || file.includes(".jpeg") || file.includes(".png")) {
        $("#preview_document").html(`<img src="files/${file}" width="100%"/>`)
    }

    // $("#username_edit").val($("#item_" + id).attr('username'))

    $("#visualizarDocumentoModal").modal('show');
}