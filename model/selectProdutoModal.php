<?php
function selecionarProdutos($conn){
    $sql = "SELECT * FROM produto";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $produtos = array();

    while($row = $result->fetch_assoc()){
        $produtos[] = $row;
    }
    
    return $produtos;

}