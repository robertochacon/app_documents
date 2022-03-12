$(document).ready(function() {

    $("#login_form").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: '../controllers/usuario/login.php',
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
                        window.location.href = "dashboard.php";
                    }, 1000)
                } else if (datos.message === "fail") {
                    toastr.warning('', 'Credenciales incorrectas', { timeOut: 5000 });
                } else {
                    toastr.error('', 'Problemas tecnicos, intente mas tarde.', { timeOut: 5000 });
                }

            }
        });


    });

});