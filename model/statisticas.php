<?php
require "../controller/config.php";

$consulta1 = ("SELECT * FROM fabricante");
$stmt = $conn->prepare($consulta1);
$stmt->execute();
$stmt->store_result();

$totalFabricante = $stmt->num_rows;


$consulta2 = ("SELECT * FROM produto");
$stmt = $conn->prepare($consulta2);
$stmt->execute();
$stmt->store_result();

$totalProdutos = $stmt->num_rows;


$consulta3 = ("SELECT * FROM categoria");
$stmt = $conn->prepare($consulta3);
$stmt->execute();
$stmt->store_result();

$totalCategorias = $stmt->num_rows;


$consulta4 = "SELECT f.nomeFabricante, COUNT(p.idproduto) AS total_itens
             FROM fabricante f
             LEFT JOIN produto p ON f.idfabricante = p.fabricante_idfabricante
             GROUP BY f.nomeFabricante";

$stmt = $conn->prepare($consulta4);
$stmt->execute();
$stmt->store_result();

$totalItensPorFabricante = array();

$stmt->bind_result($nomeFabricante, $totalItens);

while ($stmt->fetch()) {
    $totalItensPorFabricante[$nomeFabricante] = $totalItens;
}
session_start();
$_SESSION['totalItensPorFabricante'] = $totalItensPorFabricante;

#=======================================================================
$consulta5 = "SELECT c.nomeCategoria, COUNT(p.idproduto) AS total_itens
FROM categoria c
LEFT JOIN produto p ON c.idcategoria = p.categoria_idcategoria
GROUP BY c.nomeCategoria";

$stmt = $conn->prepare($consulta5);
$stmt->execute();
$stmt->store_result();

$totalItensPorCategoria = array();

$stmt->bind_result($nomeCategoria, $totalItensCategoria);

while ($stmt->fetch()) {
$totalItensPorCategoria[$nomeCategoria] = $totalItensCategoria;
}

$_SESSION['totalItensPorCategoria'] = $totalItensPorCategoria;
?>


