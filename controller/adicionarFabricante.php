<?php
session_start();
include './config.php';
include '../model/addFabricanteModel.php';
include '../model/loginModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fabricante = array(
            "nomeFabricante" => ucfirst(strtolower($_POST["nomeFabricante"])),
            "cnpj" => strtolower($_POST["cnpj"]),
            "telefone" => strtolower($_POST["telefone"]),
            "endereco" => strtolower($_POST["endereco"]),
        );
    
    adicionarFabricante($conn, $fabricante);

}