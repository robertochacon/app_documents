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

    $("#form_edit_document").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: './controllers/documents.php',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                toastr.success('', 'Documento editado correctamente.', { timeOut: 5000 });
                $('#editarDocumentoModal').modal('hide');
                $("#form_edit_document")[0].reset();
                cargar_documentos();
            }
        });
    });


    // mostrando documents
    cargar_documentos();

    //lista de tipos
    cargar_types_list();

    //lista de tipos
    cargar_shapes_list();

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

//tipos de documentos
function cargar_types_list() {
    $.ajax({
        url: './controllers/settings/types.php',
        type: 'get',
        data: { opc: 'list' },
        beforeSend: function() { $("#type").html('<option>Cargando...<option>'); },
        success: function(data) {
            setTimeout(function() {
                $('#type').html(data);
                $('#type_edit').html(data);
            }, 1000)
        }
    });
}

//formas de documentos
function cargar_shapes_list() {
    $.ajax({
        url: './controllers/settings/shapes.php',
        type: 'get',
        data: { opc: 'list' },
        beforeSend: function() { $("#shape").html('<option>Cargando...<option>'); },
        success: function(data) {
            setTimeout(function() {
                $('#shape').html(data);
                $('#shape_edit').html(data);
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

    $("#identificador").val($("#item_" + id).attr('identificador'))
    $("#titulo_edit").val($("#item_" + id).attr('title'))
    $("#type_edit").val($("#item_" + id).attr('type_document'))
    $("#shape_edit").val($("#item_" + id).attr('shape_document'))
    $("#date_edit").val($("#item_" + id).attr('date_document'))
    $("#comment_edit").val($("#item_" + id).attr('comment'))
        // $("#status").val($("#item_" + id).attr('status'))

    $("#editarDocumentoModal").modal('show');
}

function watch_document(id) {

    $("#visualizarDocumentoModal").modal('show');
    $("#preview_document").html('<center><img src="./assets/img/loading.gif" class="loading m-5" width="100"><center>');

    $("#title_watch").html($("#item_" + id).attr('title'))

    if ($("#item_" + id).attr('comment') !== '') {
        $("#comment_watch").html($("#item_" + id).attr('comment'))
    } else {
        $("#comment_watch").html("sin comentario")
    }

    setTimeout(function() {

        let file = $("#item_" + id).attr('file');

        if (file.includes(".pdf")) {
            $("#preview_document").html(`<embed src="files/${file}" type="application/pdf" width="100%" height="600px" />`)
        } else if (file.includes(".jpg") || file.includes(".jpeg") || file.includes(".png")) {
            $("#preview_document").html(`<img src="files/${file}" width="100%"/>`)
        }
    }, 1000)

}