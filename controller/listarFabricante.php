<?php 
require '../controller/config.php';
require '../model/selectFabricanteModel.php';

function obterFabricantes($conn) {
        $resultados = selecionarFabricante($conn);
        return $resultados;
}