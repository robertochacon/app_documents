<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/sp.png">
    <link rel="icon" type="image/png" href="assets/img/sp.png">
    <title>Documents</title>
    <link href="./assets/css/animate.min.css" rel="stylesheet" />
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/toastr.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="./assets/js/app.js"></script>
    <style>
        body {
            /* background: #273746; */
        }
    </style>
</head>

<body class="animate__animated animate__fadeIn">

<?php include('./views/layouts/header.php');?>

<div class="container">
    <div class="container p-5">

    
        <div class="d-flex justify-content-between p-4 shadow bg-secondary text-white">
            <h2>Lista de documentos</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroDocumentoModal">Agregar nuevo documento</button>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="datos_documentos"></div>
            </div>
        </div>

        <!-- Modal registrar doumento -->
        <div class="modal fade" id="registroDocumentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form id="form_document">
            <input type="hidden" class="form-control" name="opc" value="insert">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="title" id="titulo" placeholder="Escriba un titulo">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo de documento</label>
                        <select class="form-select" id="type" name="type">
                            <option selected>Seleccionar</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="forma" class="form-label">Forma de documento</label>
                        <select class="form-select" id="forma" name="shape">
                            <option selected>Seleccionar</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Fecha <span class="text-danger">*</span> </label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Documento</label>
                        <input type="file" class="form-control" name="document" id="file" accept="image/jpeg,image/png,application/pdf">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            </form>
            </div>
        </div>
        </div>

        <!-- Modal editar doumento -->
        <div class="modal fade" id="registroDocumentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form id="form_document">
            <input type="hidden" class="form-control" name="opc" value="insert">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" name="title" id="titulo" placeholder="Escriba un titulo">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo de documento</label>
                        <select class="form-select" id="type" name="type">
                            <option selected>Seleccionar</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="forma" class="form-label">Forma de documento</label>
                        <select class="form-select" id="forma" name="shape">
                            <option selected>Seleccionar</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Fecha <span class="text-danger">*</span> </label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Documento</label>
                        <input type="file" class="form-control" name="document" id="file" accept="image/jpeg,image/png,application/pdf">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            </form>
            </div>
        </div>
        </div>


        <!-- Modal visualizar doumento -->
        <div class="modal fade" id="visualizarDocumentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Visualizar documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    
                <div id="preview_document"></div>
    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>


    </div>
</div>

<!--   Core JS Files   -->
<script src="./assets/js/jquery/jquery.min.js"></script>
<script src="./assets/js/datatable/jquery.dataTables.min.js"></script>
<script src="./assets/js/datatable/dataTables.min.js"></script>
<script src="./assets/js/documents.js"></script>
<script src="./assets/js/plugins/sweetalert2.js"></script>
<script src="./assets/js/core/toastr.min.js"></script>

</body>
</html>