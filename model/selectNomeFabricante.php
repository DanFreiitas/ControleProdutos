<?php
function obterNomeFabricante($conn, $fabricanteId) {
    $sql = "SELECT nomeFabricante FROM fabricante WHERE idfabricante = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $fabricanteId);
    $stmt->execute();
    $result = $stmt->get_result();
    $fabricante = $result->fetch_assoc();
    return $fabricante['nomeFabricante'];
}