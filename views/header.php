<?php
include '../controllers/header.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet" href="../assets/css/style.css"/>
        <link href="../assets/MDB-Free_4.6.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/MDB-Free_4.6.1/css/mdb.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
        <title>Cinerama</title>
    </head>
    <header>
        <a id="button"></a>
        <nav class="navbar navbar-expand-lg navbar-white bg-dark">
            <a class="navbar-brand" href="index.php">[ Cinerama ]</a>
            <!-- Collapse button -->
            <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
                    aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
                <div class="animated-icon1"><span></span><span></span><span></span></div>
            </button>
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent20">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <!--                    Navbar quand l'utilisateur est connecté-->
                    <?php if (isset($_SESSION['isConnect']) && $_SESSION['isConnect']) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['nickname']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php">Accèder à son profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?action=deconnexion">Déconnexion</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Médiathèque<span class="sr-only">(current)</span></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="mediasList.php">Liste des oeuvres</a>
                                <a class="dropdown-item" href="addMedia.php">Ajouter une oeuvre</a>
                                <a class="dropdown-item" href="media.php">Modifier/Supprimer une oeuvre</a>   
                            </div>                                                                 
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="postsList.php"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Articles<span class="sr-only">(current)</span></a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="postsList.php">Liste des articles</a>
                                <a class="dropdown-item" href="addPost.php">Ajouter un article</a>
                                <a class="dropdown-item" href="post.php">Modifier/Supprimer un article</a>   
                            </div>                                                
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="usersList.php">Liste des utilisateurs<span class="sr-only">(current)</span></a>
                        </li>
                        <!--                        Navbar qui s'affiche pour un simple visiteur-->
                    <?php } else { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="login.php">Connexion<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="register.php">Inscription <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="mediasList.php">Médiathèque<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="postsList.php">Liste des articles<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="usersList.php">Liste des utilisateurs<span class="sr-only">(current)</span></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>