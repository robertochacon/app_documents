<?php

include('./../models/libs/conexion.php');

$conexion = new Conexion();

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $template = '';
    $sql = "SELECT * FROM documents";
    $datos = $conexion->consultar($sql);

   $template .= ' <div class="col-12 table-responsive mt-4">';
   $template .= ' <table id="documents_table" class="table table-striped table-bordered" style="width:100%">';
   $template .= ' <thead class=" text-dark">';
   $template .= ' <th></th>';
   $template .= ' <th>ID</th>';
   $template .= ' <th>Titulo</th>';
   $template .= ' <th>Tipo</th>';
   $template .= ' <th>Forma</th>';
   $template .= ' <th>Fecha</th>';
   $template .= ' <th>Fecha creacion</th>';
   $template .= ' <th>Estado</th>';
   $template .= ' <th>Acciones</th>';
   $template .= ' </thead>';
   $template .= ' <tbody id="datos_documentos">';

    foreach($datos as $item){

        if($item['status'] == '1'){
            $status = '<span class="badge bg-success">Activo</span>';
        }else{
        $status = '<span class="badge bg-secondary">Inactivo</span>';
        }

        if(strpos($item['file'], '.jpg') == true || strpos($item['file'], '.jpeg') == true || strpos($item['file'], '.png') == true){
            $icon = '<img src="./assets/img/img.png" width="">';
        }else if(strpos($item['file'], '.pdf') == true){
            $icon = '<img src="./assets/img/pdf.png" width="">';
        }
        $format_date = date("d/m/Y", strtotime($item['date_document']) );
        $format_date_created = date("d/m/Y", strtotime($item['date_document']) );

        $template .= '<tr id="item_'.$item['id'].'" identificador="'.$item['id'].'" title="'.$item['title'].'" type_document="'.$item['type_document'].'" shape_document="'.$item['shape_document'].'" date_document="'.$item['date_document'].'" file="'.$item['file'].'" comment="'.$item['comment'].'" status="'.$item['status'].'">';
        $template .= '<td>'.$icon.'</td>';
        $template .= '<td>'.$item['id'].'</td>';
        $template .= '<td>'.$item['title'].'</td>';
        $template .= '<td>'.$item['type_document'].'</td>';
        $template .= '<td>'.$item['shape_document'].'</td>';
        $template .= '<td>'.$format_date.'</td>';
        $template .= '<td>'.$format_date_created.'</td>';
        $template .= '<td>'.$status.'</td>';
        $template .= '<td>
            <button class="btn btn-warning text-white" onclick="watch_document('.$item['id'].')">Ver</button>
            <button class="btn btn-info text-white ml-2" onclick="edit_document('.$item['id'].')">Editar</button>
            <button class="btn btn-danger text-white ml-2" onclick="delete_document('.$item["id"].')">Eliminar</button></td>';
        $template .= '</tr>';
    }

    $template .= '</tbody>';
    $template .= '</table>';
    $template .= '</div>';

    echo $template;

}else if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $opc = $_POST['opc'];

    if($opc == 'insert'){
    
        $title = $_POST['title'];
        $type = $_POST['type'];
        $shape = $_POST['shape'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];
        $file_name = $_FILES['document']['name'];
        $file = strtolower($file_name);
        $cd=$_FILES['document']['tmp_name'];
        $ruta = "../files/" . $_FILES['document']['name'];
        $destino = "../files/".$file_name;
        $resultado = @move_uploaded_file($_FILES["document"]["tmp_name"], $ruta);
        $status = 1;

        if($resultado){

            $sql = "INSERT INTO documents (title,type_document,shape_document,date_document,date_create,comment,file,status)
            VALUES ('".$title."','".$type."','".$shape."','".$date."','".date('Y-m-d')."','".$comment."','".$file_name."',$status)";

            $result = $conexion->ejecutar($sql);

            if ($result) {
                return true;
            }else{
                return false;
            }
        
        }else{
            return false;
        }
    
    }else if($opc == 'edit'){
    
        $id = $_POST['id'];
        $title = $_POST['title'];
        $type = $_POST['type'];
        $shape = $_POST['shape'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];
    
        $sql = "UPDATE documents SET title='".$title."',type_document='".$type."',shape_document='".$shape."',date_document='".$date."',comment='".$comment."' WHERE id = $id";
        $result = $conexion->ejecutar($sql);
        if ($result) {
            return true;
        }else{
            return false;
        }
    
    }else if($opc == 'delete'){
    
        $id = $_POST['id'];
        $sql = "DELETE FROM documents WHERE id = $id";
        $result = $conexion->ejecutar($sql);
    
        if ($result) {
            return true;
        }else{
            return false;
        }
    
    }


}


?>