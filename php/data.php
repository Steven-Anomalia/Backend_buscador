<?php

function getCiudades(){
    $items = getData('../data-1.json');
    $ciudades = array();
    foreach ($items as $key => $value) {
        array_push($ciudades,$value['Ciudad']);
    }
    $ciudades = array_unique($ciudades);
    sort($ciudades);

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($ciudades,JSON_FORCE_OBJECT);
}

function getTipos(){
    $items = getData('../data-1.json');
    $tipos = array();
    foreach ($items as $key => $value) {
        array_push($tipos,$value['Tipo']);
    }
    $tipos = array_unique($tipos);
    sort($tipos);

    header('Content-type: application/json; charset=utf-8');
    echo json_encode($tipos,JSON_FORCE_OBJECT);
}


function getData($dir){
    $data_file = fopen($dir,"r");
    $data_readed = fread($data_file, filesize($dir));
    $data = json_decode($data_readed, true);
    fclose($data_file);
    return $data;
}


?>