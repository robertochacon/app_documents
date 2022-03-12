<?php

include('./../models/libs/conexion.php');

$conexion = new Conexion();

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $template = '';
    $sql = "SELECT * FROM users";
    $datos = $conexion->consultar($sql);

   $template .= ' <div class="table-responsive mt-4">';
   $template .= ' <table id="usuarios_table" class="table table-striped table-bordered" style="width:100%">';
   $template .= ' <thead class=" text-dark">';
   $template .= ' <th>ID</th>';
   $template .= ' <th>Nombre</th>';
   $template .= ' <th>Estado</th>';
   $template .= ' <th>Acciones</th>';
   $template .= ' </thead>';
   $template .= ' <tbody id="datos_productos">';

    foreach($datos as $item){

        if($item['status'] == '1'){
            $status = '<span class="badge bg-success">Activo</span>';
       }else{
        $status = '<span class="badge bg-secondary">Inactivo</span>';
       }

        $template .= '<tr id="item_'.$item['id'].'" identificador="'.$item['id'].'" username="'.$item['username'].'" password="'.$item['password'].'" status="'.$item['status'].'">';
        $template .= '<td>'.$item['id'].'</td>';
        $template .= '<td>'.$item['username'].'</td>';
        $template .= '<td>'.$status.'</td>';
        $template .= '<td><button class="btn btn-info text-white" onclick="edit_user('.$item['id'].')">Editar</button><button class="btn btn-danger text-white ml-2" onclick="delete_user('.$item["id"].')">Eliminar</button></td>';
        $template .= '</tr>';
    }

    $template .= '</tbody>';
    $template .= '</table>';
    $template .= '</div>';

    echo $template;

}else if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $opc = $_POST['opc'];

    if($opc == 'insert'){
    
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = 1;
    
        $sql = "INSERT INTO users (username,password,status)
        VALUES ('".$username."','".$password."',$status)";
    
        $result = $conexion->ejecutar($sql);
    
        if ($result) {
            return true;
        }else{
            return false;
        }
    
    }else if($opc == 'edit'){
    
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = 1;
    
        $sql = "UPDATE users SET username = '".$username."', password = '".$password."', status = $status WHERE id = $id";
        $result = $conexion->ejecutar($sql);
        if ($result) {
            return true;
        }else{
            return false;
        }
    
    }else if($opc == 'delete'){
    
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id = $id";
        $result = $conexion->ejecutar($sql);
    
        if ($result) {
            return true;
        }else{
            return false;
        }
    
    }


}


?>