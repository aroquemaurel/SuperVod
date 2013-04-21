<?php
include_once('vues/header.php');
require_once('database/connect.php');

session_destroy();
$_SESSION['connect'] = false;

echo ' <div class="alert alert-success"><strong>Succès</strong>Vous êtes maintenant déconnecté.</div>';
redirection('index.php');
