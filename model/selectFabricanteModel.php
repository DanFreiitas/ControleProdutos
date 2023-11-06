<?php
function selecionarFabricante($conn) {
    $sql = 'SELECT * FROM `fabricante` WHERE 1';
    $selectFabricante = $conn->prepare($sql);
    $selectFabricante->execute();
    $result = $selectFabricante->get_result();
    
    $fabricantes = array();

    while ($row = $result->fetch_assoc()) {
        $fabricantes[] = $row;
    }

    return $fabricantes;
}
