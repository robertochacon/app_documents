<?php

include('../../models/libs/conexion.php');

$conexion = new Conexion();

if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['opc'] == 'all'){

    $template = '';
    $sql = "SELECT * FROM shapes";
    $datos = $conexion->consultar($sql);

   $template .= ' <div class="table-responsive mt-4">';
   $template .= ' <table id="shapes_table" class="table table-striped table-bordered" style="width:100%">';
   $template .= ' <thead class=" text-dark">';
   $template .= ' <th></th>';
   $template .= ' <th>ID</th>';
   $template .= ' <th>Nombre</th>';
   $template .= ' <th>Estado</th>';
   $template .= ' <th>Acciones</th>';
   $template .= ' </thead>';
   $template .= ' <tbody id="datos_tipos">';

    foreach($datos as $item){

        if($item['status'] == '1'){
            $status = '<span class="badge bg-success">Activo</span>';
       }else{
        $status = '<span class="badge bg-secondary">Inactivo</span>';
       }

        $template .= '<tr id="item_'.$item['id'].'" identificador="'.$item['id'].'" name="'.$item['name'].'" status="'.$item['status'].'">';
        $template .= '<td><img src="./assets/img/shape.png" width=""></td>';
        $template .= '<td>'.$item['id'].'</td>';
        $template .= '<td>'.$item['name'].'</td>';
        $template .= '<td>'.$status.'</td>';
        $template .= '<td><button class="btn btn-info text-white" onclick="edit_shape('.$item['id'].')">Editar</button><button class="btn btn-danger text-white ml-2" onclick="delete_shape('.$item["id"].')">Eliminar</button></td>';
        $template .= '</tr>';
    }

    $template .= '</tbody>';
    $template .= '</table>';
    $template .= '</div>';

    echo $template;

}else if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['opc'] == 'list'){

    $template = '';
    $sql = "SELECT * FROM shapes";
    $datos = $conexion->consultar($sql);

    foreach($datos as $item){
        $template .= '<option value="'.$item['name'].'">'.$item['name'].'</option>';
    }

    echo $template;

}else if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $opc = $_POST['opc'];

    if($opc == 'insert'){
    
        $name = $_POST['name'];
        $status = 1;
    
        $sql = "INSERT INTO shapes (name,status)
        VALUES ('".$name."',$status)";
    
        $result = $conexion->ejecutar($sql);
    
        if ($result) {
            return true;
        }else{
            return false;
        }
    
    }else if($opc == 'edit'){
    
        $id = $_POST['id'];
        $name = $_POST['name'];
        $status = 1;
    
        $sql = "UPDATE shapes SET name = '".$name."', status = $status WHERE id = $id";
        $result = $conexion->ejecutar($sql);
        if ($result) {
            return true;
        }else{
            return false;
        }
    
    }else if($opc == 'delete'){
    
        $id = $_POST['id'];
        $sql = "DELETE FROM shapes WHERE id = $id";
        $result = $conexion->ejecutar($sql);
    
        if ($result) {
            return true;
        }else{
            return false;
        }
    
    }


}


?>