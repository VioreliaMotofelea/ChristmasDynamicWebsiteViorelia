<?php
    session_start();

    require_once("module/modul-functii.php");


    if(isset($_SESSION['user']))
        unset($_SESSION['user']);
    
    AdaugaMesaj("La revedere!");
    header("Location: ./");
    die();