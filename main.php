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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="./assets/js/app.js"></script>
    <style>
        body {
            /* background: #273746; */
        }
        .hover{
            border:2px solid white;
            transition:.5s;
        }
        .hover a{
            text-decoration:none;
        }
        .hover:hover{
            border:2px solid #1370f7;
            transition:.5s;
        }
    </style>
</head>

<body>

<?php include('./views/layouts/header.php');?>

<div class="container animate__animated animate__fadeIn mt-5">
    <div class="container">
        <div class="row justify-content-around">

            <div class="col-lg-3 col-md-5 col-sm-10 mt-4 p-5 shadow text-center hover">
                <a href="documents.php">    
                    <h4>Documentos</h4>
                    <img src="./assets/img/documents.png" width="50%" alt="">
                    <h6>Visualizacion y mantenimiento de documentos</h6>
                </a>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-10 mt-4 p-5 shadow text-center hover">
                <a href="settings.php">
                    <h4>Mantenimiento</h4>
                    <img src="./assets/img/settings.png" width="50%" alt="">
                    <h6>Visualizacion y administracion de los mantenimiento de documentos</h6>
                </a>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-10 mt-4 p-5 shadow text-center hover">
                <a href="users.php">    
                    <h4>Usuarios</h4>
                    <img src="./assets/img/users.jpeg" width="50%" alt="">
                    <h6>Visualizacion y administracion de usuarios del sistema</h6>
                </a>
            </div>

            

        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="./assets/js/jquery/jquery.min.js"></script>
<script src="./assets/js/datatable/jquery.dataTables.min.js"></script>
<script src="./assets/js/datatable/dataTables.min.js"></script>
<script src="./assets/js/utils.js"></script>


</body>
</html>