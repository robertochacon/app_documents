<?php
session_start();

if(isset($_SESSION['username'])){
  header('Location:./main.php');	
}
?>
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
            background: url('./assets/img/bg.jpg');
            background-size:cover;
            background-repeat:no-repeat;
            background-attachment: fixed;
            /* background: #273746; */
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark shadow" style="border-bottom:5px solid #1370f7;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand text-primary">App de documentos</a>
    </div>
  </div>
</nav>

<div class="container animate__animated animate__fadeIn mt-5">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-6 col-sm-10  mt-5 p-4 shadow bg-white">

                <center>
                    <h4>Panel de acceso</h4>
                    <img src="./assets/img/login.png" alt="">
                </center>

                <form id="login_form">
                    <input type="hidden" value="login" name="opc">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Escriba un nombre de usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Clave</label>
                        <input type="password" class="form-control" name="password" id="password_edit" placeholder="Escriba una clave" required>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Ingresar</button>
                </form>

            </div>

            

        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="./assets/js/jquery/jquery.min.js"></script>
<script src="./assets/js/utils.js"></script>
<script src="./assets/js/core/toastr.min.js"></script>

</body>
</html>