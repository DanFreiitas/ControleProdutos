<?php
include 'config.php';
include './model/loginModel.php';

switch ($_REQUEST["verificar"]) {
    case 'entrar':
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        if (empty($login) || empty($senha)) {
            echo "Preencha todos os campos obrigatórios";
            return;
        }
        if (checkLogin($conn, $login, $senha));
            break;

}