<?php
    session_start();

    require_once("module/modul-functii.php");
    require_once("module/modul-setari.php");

    if(!isset($_POST['name']) || !isset($_POST['user']) || !isset($_POST['parola']) || !isset($_POST['parola-v']))
    {
        AdaugaMesaj('Foloseste acest formular.', 'warning');
        header("Location: ./?pagina=register");
        die();
    }

    $clean = [
        'nume' => $_POST['name'],
        'user' => $_POST['user'],
        'parola' => $_POST['parola'],
        'parolaVerif' => $_POST['parola-v']
    ];

    /// verificari
    
    if(CreeazaCont($clean['nume'], $clean['user'], $clean['parola'], $clean['parolaVerif']))
    {
        AdaugaMesaj("Bine ai venit, {$_SESSION['user']['nume_prenume']}!");
        header("Location: ./");
        die();
    }
    else
    {
        AdaugaMesaj("Date incorecte", 'danger');
        header("Location: ./?pagina=register");
        die();
    }
