<?php
require '../controller/config.php';
require '../model/selectProdutoModal.php';

function obterProdutos($conn) {
        $resultados = selecionarProdutos($conn);
        return $resultados;
}