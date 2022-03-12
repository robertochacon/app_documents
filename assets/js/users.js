$(document).ready(function() {

    $("#form_users").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: './controllers/users.php',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                toastr.success('', 'Producto registrado correctamente.', { timeOut: 5000 });
                $('#registroUsuarioModal').modal('hide');
                $("#form_users")[0].reset();
                cargar_usuarios();
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
                cargar_usuarios();
            }
        });
    });


    // mostrando productos
    cargar_usuarios();

});

function cargar_usuarios() {
    $.ajax({
        url: './controllers/users.php',
        type: 'get',
        beforeSend: function() { $("#datos_usuarios").html('<center><img src="./assets/img/loading.gif" class="loading" width="100"><center>'); },
        success: function(data) {
            setTimeout(function() {
                $('#datos_usuarios').html(data);
                $('#usuarios_table').DataTable();
            }, 1000)
        }
    });
}

function delete_user(id) {
    if (confirm("Esta seguro de eliminar este usuario?")) {
        $.ajax({
            url: './controllers/users.php',
            type: 'post',
            data: { id: id, opc: 'delete' },
            beforeSend: function() { toastr.info('', 'Procesando...', { timeOut: 5000 }); },
            success: function() {
                $("#item_" + id).remove();
                toastr.success('', 'Usuario eliminado.', { timeOut: 5000 });
            }
        });
    }
}

function edit_user(id) {

    $("#username_edit").val($("#item_" + id).attr('username'))
    $("#password_edit").val($("#item_" + id).attr('password'))
    $("#id_edit").val($("#item_" + id).attr('identificador'))
        // $("#status").val($("#item_" + id).attr('status'))

    $("#editarUsuarioModal").modal('show');
}