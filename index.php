<?php
    require_once "models/Database.php";

    if (!isset($_SESSION['usuario'])) {
        header('Location: views/company/inicar.html');
        exit();
    }
?>