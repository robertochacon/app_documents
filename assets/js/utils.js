$(document).ready(function() {

    $("#login_form").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: './controllers/users.php',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend: function() {
                toastr.info('Status', 'Procesando...', { timeOut: 3000 });
            },
            success: function(res) {

                var datos = JSON.parse(res)
                console.log(datos)

                if (datos.message === "success") {
                    toastr.success('', 'Ingresando...', { timeOut: 5000 });

                    setTimeout(function() {
                        window.location.href = "main.php";
                    }, 1000)

                } else if (datos.message === "fail") {
                    toastr.warning('', 'Credenciales incorrectas', { timeOut: 5000 });
                } else {
                    toastr.error('', 'Problemas tecnicos, intente mas tarde.', { timeOut: 5000 });
                }

            }
        });


    });

    $("#logout").click(function(event) {
        event.preventDefault();

        $.ajax({
            url: './controllers/users.php',
            type: 'POST',
            data: { opc: 'logout' },
            success: function(res) {
                if (res == 'logout') {
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 100)
                }
            }

        });
    });

});