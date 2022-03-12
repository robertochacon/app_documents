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

<div class="container mt-5">
    <div class="container">
        <div class="row">

            <div class="col-4 mt-4 text-center">
                <h4>Documentos</h4>
                <a href="documents.php">
                    <img src="./assets/img/documents.png" width="70%" alt="">
                </a>
                <h6>Visualizacion y mantenimiento de documentos</h6>
            </div>
            <div class="col-4 mt-4 text-center">
                <h4>Mantenimiento</h4>
                <a href="settings.php">
                    <img src="./assets/img/settings.png" width="70%" alt="">
                </a>
                <h6>Visualizacion y administracion de los mantenimiento de documentos</h6>
            </div>
            <div class="col-4 mt-4 text-center">
                <h4>Usuarios</h4>
                <a href="users.php">
                    <img src="./assets/img/users.jpeg" width="70%" alt="">
                </a>
                <h6>Visualizacion y administracion de usuarios del sistema</h6>
            </div>

            

        </div>
    </div>
</div>

</body>

</html>