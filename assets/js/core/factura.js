//consulta producto factura
let $code_search = document.getElementById("code_search")
let $add_item = document.getElementById("add_item")
let timeout
let count = 0;

$(document).ready(function() {

    $("#form_factura").submit(function(event) {
        event.preventDefault();

        if (count > 0) {
            console.log($code_search);

            $.ajax({
                url: '../controllers/factura/factura.php',
                type: 'POST',
                data: $(this).serialize(),
                beforeSend: function() {
                    toastr.info('Status', 'Procesando...', { timeOut: 3000 });
                },
                success: function(res) {
                    toastr.success('', 'Factura registrada correctamente.', { timeOut: 5000 });
                    var datos = JSON.parse(res)
                    console.log(datos)

                    $('#modal_factura').modal('hide');
                    $("#form_factura")[0].reset();

                    $.ajax({
                        url: '../controllers/factura/print.php',
                        type: 'get',
                        data: { factura: datos.id_factura },
                        beforeSend: function() { $("#listado-productos-factura").html('<img src="../assets/img/loading.gif" class="loading" width="100">'); },
                        success: function(data) {

                            setTimeout(function() {
                                // data es el HTML a imprimir (el contenido del elemento)
                                var pw = window.open('', '');
                                pw.document.write('<head></head><body>');
                                pw.document.write(data);
                                pw.document.write('</body>');
                                pw.print();
                                pw.close();

                                // window.open('http://' + document.domain + '/pv/controllers/factura/print.php?factura=' + datos.id_factura, '_blank');

                            }, 1000)

                        }
                    });

                }
            });

        } else {
            bootbox.alert("Debe de tener minimo un producto agregado para poder continuar!");
        }

    });

    $("#event_table").click(function(event) {
        calcular_total();
    });

    $("#event_table").keydown(function(event) {
        calcular_total();
    });

    cargar_facturas();

});

function cargar_facturas() {
    $.ajax({
        url: '../controllers/factura/show.php',
        type: 'get',
        beforeSend: function() { $("#datos_facturas").html('<img src="../assets/img/loading.gif" class="loading" width="100">'); },
        success: function(data) {
            setTimeout(function() {
                $('#datos_facturas').html(data);
                $('#productos_table').DataTable();
            }, 1000)
        }
    });
}

$add_item.addEventListener('click', () => {

    count += 1;
    let template = '';

    template = `<tr id="item_${count}">
        <td>${count}<input type="hidden" name="ids[]" value="0" /></td>
        <td><input type="text" name="nombre[]" value="" /></td>
        <td><input type="number" name="cantidad[]" value="1" id="cantidad_${count}" /></td>
        <td><input type="number" name="precio[]" value="0" id="precio_${count}" /></td>
        <td><div id="total_${count}">0</div></td>
        <td><button class="btn btn-danger btn-sm"id="item" onclick="delete_item(${count},'')"><i class="material-icons">delete</i></button></td>
        </tr>`;

    $("#productos_factura").append(template);
    $code_search.value = '';
    $code_search.focus();

    $("#ti").text(count)
    calcular_total();

})

$code_search.addEventListener('keydown', () => {
    clearTimeout(timeout)
    timeout = setTimeout(() => {

        $.ajax({
            url: '../controllers/factura/consultar_producto.php',
            type: 'POST',
            data: { code: $code_search.value },
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(data) {

                let prod_resp = JSON.parse(data);
                let template = '';

                if (prod_resp[0] != '') {

                    count += 1;

                    template = `<tr id="item_${count}">
                    <td>${count}<input type="hidden" name="ids[]" value="${prod_resp[0].id}" /></td>
                    <td><input type="text" name="nombre[]" value="${prod_resp[0].nombre}" readonly="readonly" /></td>
                    <td><input type="number" name="cantidad[]" value="1" id="cantidad_${count}" /></td>
                    <td><input type="number" name="precio[]" value="${prod_resp[0].precio}" id="precio_${count}" readonly="readonly" /></td>
                    <td><div id="total_${count}">${prod_resp[0].precio}</div></td>
                    <td><button class="btn btn-danger btn-sm"id="item" onclick="delete_item(${count})"><i class="material-icons">delete</i></button></td>
                    </tr>`;

                    $("#productos_factura").append(template);
                    toastr.success('', 'Producto agregado.', { timeOut: 5000 });
                    calcular_total()
                } else {
                    toastr.warning('', 'Sorry.', { timeOut: 5000 });
                }

            }
        });

        $code_search.value = '';
        $code_search.focus();
        $("#ti").text(count)
        calcular_total()

        clearTimeout(timeout)
    }, 1000)

})

function delete_item(id, product) {

    count -= 1;
    $("#ti").text(count)

    $("#item_" + id).remove();
    if (product === 'yes') {
        delete_product(id);
    }

    calcular_total()
}

function delete_factura(id) {

    bootbox.confirm({
        message: "Esta de eliminar esta factura?",
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
                    url: '../controllers/factura/delete.php',
                    type: 'post',
                    data: { id: id },
                    beforeSend: function() { toastr.info('', 'Procesando...', { timeOut: 5000 }); },
                    success: function() {
                        $("#item_" + id).remove();
                        cargar_facturas();
                        toastr.success('', 'Factura eliminado.', { timeOut: 5000 });
                    }
                });
            }

        }
    });

}

function calcular_total() {
    clearTimeout(timeout)
    timeout = setTimeout(() => {

        let suma_total = 0;
        for (var i = 0; i <= count; i++) {

            let cantidad_item = $("#cantidad_" + i).val();
            let precio_item = $("#precio_" + i).val();
            let suma_item = 0;

            for (var o = 1; o <= cantidad_item; o++) {
                console.log('activo:', o)
                suma_item = parseInt(suma_item) + parseInt(precio_item);
            }

            $("#total_" + i).text(suma_item);
            suma_total = parseInt(suma_total) + parseInt(suma_item);

        }
        $("#totalprecios").text(suma_total);

        clearTimeout(timeout)
    }, 100)
}

function ver_factura(id) {

    $('#modal_ver_factura').modal('show');

    $.ajax({
        url: '../controllers/factura/ver_factura.php',
        type: 'post',
        data: { factura: id },
        beforeSend: function() { $("#listado-productos-factura").html('<img src="../assets/img/loading.gif" class="loading" width="100">'); },
        success: function(data) {
            console.log(data)
            setTimeout(function() {
                $('#listado-productos-factura').html(data);
                // $('#datos_fatura_productos').DataTable();
            }, 1000)
        }
    });
}

function imprimir_factura() {


    $.ajax({
        url: '../controllers/factura/print.php',
        type: 'get',
        data: { factura: $('#id_factura_selecionada').val() },
        // beforeSend: function() {},
        success: function(data) {

            $('#modal_ver_factura').modal('hide');

            setTimeout(function() {

                // data es el HTML a imprimir (el contenido del elemento)
                var pw = window.open('', '');
                pw.document.write('<head></head><body>');
                pw.document.write(data);
                pw.document.write('</body>');
                pw.print();
                pw.close();

                // window.open('http://' + document.domain + '/pv/controllers/factura/print.php?factura=' + datos.id_factura, '_blank');

            }, 1000)

        }
    });


}