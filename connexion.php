<?php
    include_once('vues/header.php');
    require_once('database/connect.php');
    if(isset($_POST['user']) && isset($_POST['mdp']) && $_POST['user'] == "admin" && $_POST['mdp'] == "admin") {
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['connect'] = true;
        $_SESSION['admin'] = true;
        echo '<div class="alert alert-success"><strong>Succès</strong> Vous êtes bien connectés</div>';
        redirection('index.php');
    } else {
        echo '<div class="alert alert-error"><strong>Erreur</strong> Identifiants de connexion incorrects</div>';
    }
