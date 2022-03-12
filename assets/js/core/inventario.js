$(document).ready(function() {

    // mostrando productos
    cargar_productos();

});

function cargar_productos() {
    $.ajax({
        url: '../controllers/inventario/show.php',
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