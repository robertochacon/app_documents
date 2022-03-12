<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/documents.png">
    <link rel="icon" type="image/png" href="assets/img/sp.png">
    <title>Documents</title>
    <link href="./assets/css/animate.min.css" rel="stylesheet" />
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./assets/css/toastr.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="./assets/js/app.js"></script>
    <style>
        body {
            /* background: #273746; */
        }
    </style>
</head>

<body>

<?php include('./views/layouts/header.php');?>

<div class="container animate__animated animate__fadeIn">
    <div class="container p-5">

        <div class="d-flex justify-content-between p-4 shadow bg-secondary text-white">
            <h2>Lista de usuarios</h2>
        </div>

        <div class="row">
            <div class="col-12">

                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-10  p-5 text-center">
                            <h2>Usuarios</h2>
                            <img src="./assets/img/users.jpeg" width="50%" alt=""><br>
                            <button type="button" class="btn btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#registroUsuarioModal">Agregar nuevo usuario</button>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div id="datos_usuarios"></div>
                        </div>
                    </div>

            </div>
        </div>
        
    </div>
</div>

<?php include('./views/modals/modal_users.php');?>

<!--   Core JS Files   -->
<script src="./assets/js/jquery/jquery.min.js"></script>
<script src="./assets/js/datatable/jquery.dataTables.min.js"></script>
<script src="./assets/js/datatable/dataTables.min.js"></script>
<script src="./assets/js/users.js"></script>
<script src="./assets/js/utils.js"></script>
<script src="./assets/js/plugins/sweetalert2.js"></script>
<script src="./assets/js/core/toastr.min.js"></script>

</body>
</html>