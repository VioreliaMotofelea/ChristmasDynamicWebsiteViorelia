<?php

    function ValideazaPagina($pagina) {
        global $valid_pages;
        return in_array(strtolower($pagina), $valid_pages); 
    }

    function DeschideConexiuneBD() {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        global $bd_host, $bd_user, $bd_pass, $bd;
        return mysqli_connect($bd_host, $bd_user, $bd_pass, $bd);
    }

    function InchideConexiuneBD($conexiune) {
        if (isset($conexiune))
            mysqli_close($conexiune);
    }

    function VerificareUserParola($user, $parola)
    {
        $conn = DeschideConexiuneBD();
        $sql = "SELECT cod, nume_prenume, admin FROM utilizatori WHERE utilizator=? AND parola=?";
        $stmt = mysqli_prepare($conn, $sql);
        $parola_hash = Password($parola);
        mysqli_stmt_bind_param($stmt, "ss", $user, $parola_hash);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result !== false && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $_SESSION['user'] = $row;
            InchideConexiuneBD($conn);
            return true;
        }
        
        InchideConexiuneBD($conn);
        return false;
    }

    function CreeazaCont($nume, $user, $parola, $parolaVerif) 
    {
        if ($parola !== $parolaVerif) 
        {
            AdaugaMesaj("Parola nu se confirma!", "danger");
            return false;
        }

        $conn = DeschideConexiuneBD();
        $sql = "SELECT COUNT(cod) AS nr FROM utilizatori WHERE utilizator=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result !== false && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($row['nr'] > 0) 
            {
                AdaugaMesaj("Exista deja un cont asociat acestui nume de utilizator!", "danger");
            }
            else
            {
                $sql = "INSERT INTO utilizatori(nume_prenume, utilizator, parola) VALUES(?, ?, ?)";
                $parola_hash = Password($parola);
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sss", $nume, $user, $parola_hash);
                if (mysqli_stmt_execute($stmt))
                {
                    InchideConexiuneBD($conn);
                    return VerificareUserParola($user, $parola);
                }
            }
        }
        
        InchideConexiuneBD($conn);
        return false;
    }

    function AdaugaTestimonial($text, $codUtilizator)
    {
        if (!isset($text) || $text === "")
        {
            AdaugaMesaj('Textul nu poate fi gol!', 'danger');
            return false;
        }

        $conn = DeschideConexiuneBD();
        $sql = "INSERT INTO testimoniale(continut, cod_utilizator) VALUES(?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $text, $codUtilizator);
        $success = mysqli_stmt_execute($stmt);
        InchideConexiuneBD($conn);
        return $success;
    }

    function ListaTestimoniale($codUtilizator = 0, $esteAdministrator = 0)
    {
        $conn = DeschideConexiuneBD();
        $sql = "SELECT t.cod, t.continut, t.aprobat, t.data, t.cod_utilizator, u.nume_prenume FROM testimoniale t LEFT JOIN utilizatori u ON t.cod_utilizator = u.cod ";
        if ($codUtilizator > 0 && $esteAdministrator === 0)
        {
            $sql .= "WHERE t.aprobat=1 OR t.cod_utilizator=? ";
        }
        elseif ($codUtilizator === 0 && $esteAdministrator === 0)
        {
            $sql .= "WHERE t.aprobat=1 ";
        }
        
        $sql .= "ORDER BY t.data DESC";
        $stmt = mysqli_prepare($conn, $sql);

        if ($codUtilizator > 0 && $esteAdministrator === 0)
        {
            mysqli_stmt_bind_param($stmt, "i", $codUtilizator);
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $results = [];

        if ($result !== false && mysqli_num_rows($result) > 0) 
        {

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($results, $row);
            }
        }

        InchideConexiuneBD($conn);

        return $results;
    }

    function AprobaTestimonial($cod)
    {
        $conn = DeschideConexiuneBD();
        $sql = "UPDATE testimoniale SET aprobat=1 WHERE cod=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $cod);
        mysqli_stmt_execute($stmt);
        InchideConexiuneBD($conn);
    }

    function StergeTestimonial($cod)
    {
        $conn = DeschideConexiuneBD();
        $sql = "DELETE FROM testimoniale WHERE cod=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $cod);
        mysqli_stmt_execute($stmt);
        InchideConexiuneBD($conn);
    }

    function AdaugaPoza($extensie, $codUtilizator)
    {

        $conn = DeschideConexiuneBD();
        $sql = "INSERT INTO poze(extensie, cod_utilizator) VALUES(?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $extensie, $codUtilizator);
        mysqli_stmt_execute($stmt);

        $codPoza = 0;
        
        $sql = "SELECT MAX(cod) AS cod FROM poze WHERE cod_utilizator = ? AND extensie = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "is", $codUtilizator, $extensie);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($result !== false && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $codPoza = $row['cod'];
        }

        InchideConexiuneBD($conn);

        return $codPoza;
    }

    function Poza($codPoza)
    {

        $conn = DeschideConexiuneBD();      
        $sql = "SELECT * FROM poze WHERE cod = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $codPoza);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $poza = false;
        
        if ($result !== false && mysqli_num_rows($result) > 0)
            $poza = mysqli_fetch_array($result, MYSQLI_ASSOC);

        InchideConexiuneBD($conn);

        return $poza;
    }

    function ListaPoze()
    {
        $conn = DeschideConexiuneBD();
        $sql = "SELECT * FROM poze ORDER BY cod DESC ";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $results = [];

        if ($result !== false && mysqli_num_rows($result) > 0) 
        {

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                array_push($results, $row);
            }
        }

        InchideConexiuneBD($conn);

        return $results;
    }

    function Login()
    {
        if(! isset($_SESSION['user']))
            return false;
        return $_SESSION['user'];
    }

    function Password($parola_in_clar)
    {
        global $password_salt;
        return Sha1($password_salt . sha1($parola_in_clar));
    }


    function AdaugaMesaj($mesaj, $tip_mesaj='success')
    {
        if(! isset($_SESSION['mesaje']))
            $_SESSION['mesaje'] = [];
        $_SESSION['mesaje'][] = [
            'mesaj' => $mesaj,
            'tip_mesaj' => $tip_mesaj
        ];
    }

    function AfisareMesaje()
    {
        if(!isset($_SESSION['mesaje']))
            return;
        foreach($_SESSION['mesaje'] as $mesaj)
        {
            ?>
            <div class="mb-3">
                <div class="alert alert-<?=$mesaj['tip_mesaj']?>">
                    <?=$mesaj['mesaj']?>
                </div>
            </div>
            <?php
        }
        $_SESSION['mesaje'] = [];
    }

    