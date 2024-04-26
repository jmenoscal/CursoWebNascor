<?php
    require('db_utils.php');
    $q = "SELECT * FROM noticia";

    $resultado = consulta($q);
    header('Content-Type: application/json; charset=utf-8');
    $data = array();
    foreach($resultado as $row){
        $data[] = $row;
    }
    echo json_encode($data, JSON_PRETTY_PRINT);


