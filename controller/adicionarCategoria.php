<?php

require '../controller/config.php';
include '../model/addCategoriaModal.php';

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $categoria = $_POST["nomeCategoria"];
    $adicionar = criarNovaCategoria($conn, $categoria);
    
    if ($adicionar) {
        header("Location: dashboard.php?pagina=novaCategoria&mensagem=success");
    } else {
        header("Location: dashboard.php?pagina=novaCategoria&mensagem=error");
    }
}