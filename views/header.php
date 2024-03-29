<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>SuperVod - <?php echo $page; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->

    <link href="style/css/bootstrap.css" rel="stylesheet">
    <link href="style/css/style.css" rel="stylesheet">

    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
    <link href="style/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="style/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="style/ico/apple-touch-icon-144-precomposed.png">

    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="style/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="style/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="style/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="style/ico/favicon.png">
    <script src="style//js/jquery.js"></script>
    <script src="style//js/bootstrap.min.js"></script>

</head>
    <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">

            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="index.php">SuperVod
                </a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li <?php if($page == "Accueil") echo 'class="active"'; ?>><a href="index.php">Accueil</a></li>
                        <li <?php if($page == "Recherche des séries") echo 'class="active"'; ?>><a href="recherche_series.php">Recherche d'une série</a></li>
                        <li <?php if($page == "Recherche des épisodes") echo 'class="active"'; ?>><a href="recherche_episodes.php">Recherche d'un épisode</a></li>
                        <?php
                        if(isset($_SESSION['admin']) && $_SESSION['admin']) {
                            echo '<li '; if($page == "Administration") echo 'class="active"';
                            echo '><a href="prive.php"><i class="icon-white icon-wrench"></i> Administration</a></li>';
                        }
                        if(isset($_SESSION['connect']) && $_SESSION['connect']) {
                            echo '<li><a href="index.php?p=disconnect"><i class="icon-white icon-off"></i> Déconnexion</a></li>';
                        }
                        ?>
                    </ul>
                    <?php
                    if(!isset($_SESSION['connect']) || !$_SESSION['connect']) {
                     echo '
                    <form class="navbar-form pull-right" action="index.php?p=connect" method="post">
                        <input class="span2" type="text" name="user" placeholder="Utilisateur">
                        <input class="span2" type="password" name="mdp" placeholder="Password">
                        <button class="btn btn-primary" type="submit"><i class="icon-white icon-user"></i> Se connecter</button>
                    </form>';
                    }
                    ?>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>

