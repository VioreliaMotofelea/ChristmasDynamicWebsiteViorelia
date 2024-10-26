<?php
    session_start();

    require_once("module/modul-functii.php");
    require_once("module/modul-setari.php");

    if(!isset($_POST['user']) || !isset($_POST['parola']))
    {
        AdaugaMesaj('Foloseste acest formular.', 'warning');
        header("Location: ./?pagina=login");
        die();
    }

    $clean = [
        'user' => $_POST['user'],
        'parola' => $_POST['parola'],
    ];

    /// verificari
    
    if(VerificareUserParola($clean['user'], $clean['parola']))
    {
        AdaugaMesaj("Bine ai revenit, {$_SESSION['user']['nume_prenume']}!");
        header("Location: ./");
        die();
    }
    else
    {
        AdaugaMesaj("Date incorecte", 'danger');
        header("Location: ./?pagina=login");
        die();
    }
