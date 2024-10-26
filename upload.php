<?php
    session_start();
    
    require_once("module/modul-setari.php");
    require_once("module/modul-functii.php");


    if(!Login())
    {
        header("Location: https://www.google.com");
        die();
    }
    /// preia fisierul trimise
    /// il muta in floderul poze
    /// redirectioneaza browserul pe pagina cu pozele!!!

    ///  $_FILES

    

    if(! isset($_FILES['fisier']))
    {
        AdaugaMesaj("Folosește acest formular!", 'danger');
        header("Location: ./?pagina=poze");
        die();
    }

    if($_FILES['fisier']['error'] != 0)
    {
        AdaugaMesaj("Ai apasat browse?", 'danger');
        header("Location: ./?pagina=poze");
        die();
    }

    if(strpos($_FILES['fisier']['type'], "image") !== 0) // este fisier imagine
    {
        AdaugaMesaj("Poți încărca numai imagini", 'danger');
        header("Location: ./?pagina=poze");
        die();
    }

    $numeFisier = $_FILES['fisier']['name'];
    $extensie = strtolower(substr($numeFisier, strrpos($numeFisier, '.') + 1));
    $codPoza = AdaugaPoza($extensie, $_SESSION['user']['cod']);

    if ($codPoza === 0)
    {
        AdaugaMesaj("A aparut o eroare la adaguarea in baza de date", 'danger');
        header("Location: ./?pagina=poze");
    }

    if(move_uploaded_file($_FILES['fisier']['tmp_name'], "./poze/".$codPoza.".".$extensie))
    {
        AdaugaMesaj("Fișierul a fost salvat!", 'success');
        header("Location: ./?pagina=poze");
    }
    else
    {
        AdaugaMesaj("Eroare la mutarea fisierului pe server!", 'danger');
        header("Location: ./?pagina=poze");
    }
    die();

    print "<pre>";
    var_dump($_FILES);
    print "</pre>";