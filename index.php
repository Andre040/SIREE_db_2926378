<?php
    require_once "models/DataBase.php";
    require_once "controllers/Users.php";
    $controller = new Users();
    $controller->create_user();
?>