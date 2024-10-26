<!-- <?php
    session_start();

    require_once("module/modul-functii.php");
    require_once("module/modul-setari.php");

    $tip_background = "bg-danger";
    if(isset($_SESSION['tip_background']))
        $tip_background = $_SESSION['tip_background'];
    
    $pagina = "index";
    if(isset($_GET['pagina']))
    {
        if(ValideazaPagina($_GET['pagina'])) /// validam pagina
            $pagina = strtolower($_GET['pagina']);
    } 
?> -->
<!-- data-bs-theme="dark" -->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crăciunul</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>


    <body>
        <!-- <pre><?=Password('parola12')?></pre> -->
        <!-- <div class="<?=$tip_background?> py-5">
            <div class="container">Site-ul Crăciunului</div>
        </div> -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #D8D9CF;">
            <div class="container">
                <a class="navbar-brand" href="./">
                    <img src="img/icon.png" alt="Christmas icon" width="40" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="./">Acasă</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="./?pagina=poze">Poze</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="./?pagina=detalii">Detalii</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="./?pagina=cadcraciun">Cadouri de Crăciun</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Locuri de vizitat
                            </a>
                            <ul class="dropdown-menu" style="background-color: #D8D9CF;">
                                <li><a class="dropdown-item" href="./?pagina=betleem">Betleem</a></li>
                                <li><a class="dropdown-item" href="./?pagina=laponia">Laponia</a></li>
                                <li><a class="dropdown-item" href="./?pagina=viena">Viena</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?pagina=testimoniale">Testimoniale</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php
                            if(Login() === false)
                            {
                        ?>
                        
                                <li class="nav-item">
                                    <a class="nav-link" href="./?pagina=register">
                                        Creeaza cont
                                    </a>
                                </li>
                        <?php
                            }
                        ?>
                        <?php
                            if(Login()) 
                            {
                        ?>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Culori
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" 
                                        href="schimba-background.php?culoare=success">
                                        Succes
                                    </a>
                                    <a class="dropdown-item"
                                        href="schimba-background.php?culoare=warning">
                                        Warning
                                    </a>
                                    <a class="dropdown-item"
                                        href="schimba-background.php?culoare=info">
                                        Info
                                    </a>
                                    <a class="dropdown-item"
                                        href="schimba-background.php?culoare=primary">
                                        Primary
                                    </a>
                                    <a class="dropdown-item"
                                        href="schimba-background.php?culoare=secondary">
                                        Secondary
                                    </a>
                                    <a class="dropdown-item"
                                        href="schimba-background.php?culoare=light">
                                        Light
                                    </a>
                                    <a class="dropdown-item"
                                        href="schimba-background.php?culoare=dark">
                                        Dark
                                    </a>
                                </li>
                            </ul>
                        </li>         -->
                        <?php
                            }
                        ?>     
                        <li class="nav-item">
                            <?php
                                if(Login() === false)
                                {
                            ?>
                            <a class="nav-link" href="./?pagina=login">
                                Autentificare
                            </a>
                            <?php
                                }
                                else
                                {
                                    ?>
                                    <a class="nav-link" href="./logout.php">
                                        Logout
                                    </a>
                                    <?php
                                }
                            ?>
                        </li>       
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container py-4">
        <?php
            AfisareMesaje();

            include "pagini/p-{$pagina}.php";
        ?>
        </div>
        <div class="mb-secondary">
            <div class="container">
                Copyright &copy; XII-A, <?=date("Y")?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
