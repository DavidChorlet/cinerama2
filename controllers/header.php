<?php

if (isset($_GET['idDelete'])) {
    if ($isDelete) {
        session_destroy();
        header('Location:index.php');
        exit();
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'deconnexion') {
        session_destroy();
        header('Location:index.php');
        exit();
    }
}