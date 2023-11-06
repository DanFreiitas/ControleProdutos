<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['pagina']) && $pagina = trim($_GET['pagina'])) {
        $filename = '../view/componets/' . $pagina . '.php';
        if (file_exists($filename)) {
            include '../view/componets/' . $pagina . '.php';
        } else {
            echo "Página não encontrada";
        }
    } else {
        include '../view/componets/home.php';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pagina']) && $pagina = trim($_POST['pagina'])) {
        $filename = './../controller/' . $pagina . '.php';
        if (file_exists($filename)) {
            include './../controller/' . $pagina . '.php';
        } else {
            echo "Página não encontrada";
        }
    }
}
?>