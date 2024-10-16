<?php
    require_once "views/company/registrarse.html";
    require_once "models/DataBase.php";

    if (!isset($_SESSION['usuario'])) {
        header('Location: views/company/inicar.html');
        exit();
    }
?>
