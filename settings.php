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
            <h2>Matenimiento</h2>
        </div>

        <div class="row">
            <div class="col-12">

            <nav>
                <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tipo de documentos</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Formas de documentos</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-10 p-5 text-center">
                            <h2>Tipos de documentos</h2>
                            <img src="./assets/img/settings.png" width="50%" alt=""><br>
                            <button class="btn btn-primary btn-block text-white" data-bs-toggle="modal" data-bs-target="#registroTipoModal">Agregar tipo</button>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div id="datos_tipos"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-10  p-5 text-center">
                            <h2>Formas de documentos</h2>
                            <img src="./assets/img/settings.png" width="50%" alt=""><br>
                            <button class="btn btn-primary btn-block text-white" data-bs-toggle="modal" data-bs-target="#registroFormaModal">Agregar forma</button>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div id="datos_formas"></div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

<?php include('./views/modals/modal_type.php');?>
<?php include('./views/modals/modal_shape.php');?>

<!--   Core JS Files   -->
<script src="./assets/js/jquery/jquery.min.js"></script>
<script src="./assets/js/datatable/jquery.dataTables.min.js"></script>
<script src="./assets/js/datatable/dataTables.min.js"></script>
<script src="./assets/js/settings.js"></script>
<script src="./assets/js/utils.js"></script>
<script src="./assets/js/plugins/sweetalert2.js"></script>
<script src="./assets/js/core/toastr.min.js"></script>


</body>
</html>