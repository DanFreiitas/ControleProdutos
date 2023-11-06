<?php

function selecionarCategoria($conn){
    $sql = "SELECT * FROM `categoria` WHERE 1";
    $selectCategoria = $conn->prepare($sql);
    $selectCategoria->execute();
    $result = $selectCategoria->get_result();

    $categorias = array();

    while($row = $result->fetch_assoc()){
        $categorias[] = $row;
    }
    var_dump($categorias);
    return $categorias;
}