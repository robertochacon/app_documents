//consulta producto factura
let $comment = document.getElementById("code_search")
let $add_item = document.getElementById("add_item")
let timeout
let count = 0;

$(document).ready(function() {

    //mostrando productos
    // $.ajax({
    //     url: '../controllers/productos/lista.php',
    //     type: 'get',
    //     beforeSend: function() { $("#datos_productos").html('carganado...'); },
    //     success: function(data) { $('#datos_productos').html(data); }
    // });

});


$add_item.addEventListener('click', () => {

    count += 1;
    let template = '';

    template = `<tr id="item_${count}">
        <td>${count}</td>
        <td><input type="text" value="" /></td>
        <td><input type="number" value="1" id="cantidad_${count}"/></td>
        <td><input type="text" value="" /></td>
        <td><div id="total_${count}"></div></td>
        <td><button class="btn btn-danger btn-sm"id="item" onclick="delete_item(${count},'')"><i class="material-icons">delete</i></button></td>
        </tr>`;

    $("#productos_factura").append(template);
    $comment.value = '';
    $comment.focus();

})


$comment.addEventListener('keydown', () => {
    clearTimeout(timeout)
    timeout = setTimeout(() => {

        $.ajax({
            url: '../controllers/factura/consultar_producto.php',
            type: 'POST',
            data: { code: $comment.value },
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {
                let prod_resp = JSON.parse(data);
                console.log('cantidad: ', prod_resp.length);
                count += 1;
                console.log('incrementeando: ', count);
                let template = '';

                if (prod_resp[0] != '') {

                    template = `<tr id="item_${count}">
                    <td>${count}</td>
                    <td><input type="text" value="${prod_resp[0].nombre}" disabled /></td>
                    <td><input type="number" value="1" id="cantidad_${count}"/></td>
                    <td><input type="text" value="${prod_resp[0].precio}" disabled /></td>
                    <td><div id="total_${count}"></div></td>
                    <td><button class="btn btn-danger btn-sm"id="item" onclick="delete_item(${count})"><i class="material-icons">delete</i></button></td>
                    </tr>`;

                    $("#productos_factura").append(template);
                    toastr.success('', 'Producto agregado.', { timeOut: 5000 });
                } else {
                    toastr.warning('', 'Sorry.', { timeOut: 5000 });
                }

            }
        });

        $comment.value = '';
        $comment.focus();

        clearTimeout(timeout)
    }, 1000)
})

function delete_item(id, product) {
    $("#item_" + id).remove();
    if (product === 'yes') {
        delete_product(id);
    }
}

function delete_product(id) {
    $.ajax({
        url: '../controllers/productos/delete.php',
        type: 'post',
        data: { id: id },
        beforeSend: function() { toastr.info('', 'Procesando...', { timeOut: 5000 }); },
        success: function() { toastr.success('', 'Producto eliminado.', { timeOut: 5000 }); }
    });
}