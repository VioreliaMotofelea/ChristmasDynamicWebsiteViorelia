<?php
    session_start();

    $_SESSION['tip_background'] = "bg-".$_GET['culoare'];

    header("Location: ./");