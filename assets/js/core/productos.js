$(document).ready(function() {

    $("#form_producto").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: '../controllers/productos/productos.php',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                toastr.success('', 'Producto registrado correctamente.', { timeOut: 5000 });

                $('#modal_productos').modal('hide');
                $("#form_producto")[0].reset();
            }
        });
        cargar_productos();
    });

    $("#form_producto_edit").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: '../controllers/productos/edit.php',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                toastr.success('', 'Producto editado correctamente.', { timeOut: 5000 });

                $('#modal_productos_edit').modal('hide');
                $("#form_producto_edit")[0].reset();
            }
        });
        cargar_productos();
    });


    // mostrando productos
    cargar_productos();

});

function cargar_productos() {
    $.ajax({
        url: '../controllers/productos/show.php',
        type: 'get',
        beforeSend: function() { $("#datos_productos").html('<img src="../assets/img/loading.gif" class="loading" width="100">'); },
        success: function(data) {
            setTimeout(function() {
                $('#datos_productos').html(data);
                $('#productos_table').DataTable();
            }, 1000)
        }
    });
}

function delete_product(id) {
    bootbox.confirm({
        message: "Esta de eliminar este producto?",
        buttons: {
            confirm: {
                label: 'Si',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function(result) {

            if (result) {
                $.ajax({
                    url: '../controllers/productos/delete.php',
                    type: 'post',
                    data: { id: id },
                    beforeSend: function() { toastr.info('', 'Procesando...', { timeOut: 5000 }); },
                    success: function() {
                        $("#item_" + id).remove();
                        toastr.success('', 'Producto eliminado.', { timeOut: 5000 });
                        cargar_productos();
                    }
                });
            }
        }
    });
}

function edit(id) {

    $("#identificador").val($("#item_" + id).attr('identificador'))
    $("#code_edit").val($("#item_" + id).attr('code'))
    $("#nombre_edit").val($("#item_" + id).attr('nombre'))
    $("#cantidad_edit").val($("#item_" + id).attr('cantidad'))
    $("#precio_edit").val($("#item_" + id).attr('precio'))
    $("#descripcion_edit").val($("#item_" + id).attr('descripcion'))

    $("#modal_productos_edit").modal('show');
}