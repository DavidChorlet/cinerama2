<?php

$isPost = FALSE;
$posts = new posts();
if (!empty($_GET['id'])) {
    $posts->id = htmlspecialchars($_GET['id']);
    $isPost = $posts->profilePost();
}

//Déclaration des regex :
$titleRegex = '/[a-zA-Z0-9\- ]$/';
$textRegex = '/[a-zéèàêâùûüëïA-Z0-9\.\!?;+\-]$/';
//Création d'un tableau où l'on vient stocker les erreurs :
$formError = array();
$isSuccess = FALSE;
$isError = FALSE;

//Si le submit existe
if (isset($_POST['submit'])) {
    // Contôle de l'image
    if (isset($_FILES['affiche']) && !empty($_FILES['affiche']['name'])) {
        // On gère ici la taille en Octets le poids de notre image
        // ici donc environ 5Mo.
        $tailleMax = 5097152;
        // On declare un tableau pour les extensions autorisées
        $extensionsValides = ['jpg', 'jpeg', 'gif', 'png'];
        // On récupère et on compare le poids de l'image avec ce que l'on autorise
        if ($_FILES['affiche']['size'] <= $tailleMax) {
            // On récupere ici l'extension de notre image passée
            // strtolower ==> passe tous les caractères en minuscules au cas ou
            // substr ==> on enlève le nom de notre image
            // strrchr ==> on récupère la dernière occurence de notre fichier après le point exemple ==> png
            $extensionUpload = strtolower(substr(strrchr($_FILES['affiche']['name'], '.'), 1));
            // On compare avec notre tableau d'extensions autorisées si c'est bon on continu
            if (in_array($extensionUpload, $extensionsValides)) {

                // On déclare le chemin de notre dossier qui va recevoir nos images
                $path = 'uploadAffiche/' . str_replace(' ', '-', $_FILES['affiche']['name']);
                // Comme c'est OK on envoie notre image dans notre dossier upload.
                $resultat = move_uploaded_file($_FILES['affiche']['tmp_name'], '../assets/' . $path);
                if ($resultat) {
                    $picture = $path;
                } else {
                    $formError['affiche'] = '- Erreur durant l\'importation de votre image.';
                }
            } else {
                $formError['affiche'] = '- Votre photo doit être au format jpg, jpeg, gif ou png.';
            }
        } else {
            $formError['affiche'] = '- Votre photo ne doit pas dépasser 5Mo.';
        }
    } else {
        // Si le champ est vide nous  renvoyons l'information en BDD.
        $picture = $medias->picture;
    }
    //Si $_POST['title'] existe
    if (isset($_POST['title'])) {
        //si $_POST['title'] n'est pas vide
        if (!empty($_POST['title'])) {
            //on vérifie si $_POST['title'] respecte la regex
            if (preg_match($titleRegex, $_POST['title'])) {
                $title = htmlspecialchars($_POST['title']);
                //Sinon on stock un message dans le tableau formError    
            } else {
                $formError['title'] = 'Saisie invalide.';
            }
        } else {
            $formError['title'] = 'Erreur, veuillez remplir le champ.';
        }
    }

    if (isset($_POST['content'])) {
        if (!empty($_POST['content'])) {
            if (preg_match($textRegex, $_POST['content'])) {
                $content = htmlspecialchars($_POST['content']);
            } else {
                $formError['content'] = 'Saisie invalide.';
            }
        } else {
            $formError['content'] = 'Erreur, veuillez remplir le champ.';
        }
    }

    //Si mon tableau ne contient aucune erreur
    if (count($formError) == 0) {
        //Instanciation de l'objet posts. 
        //$posts devient une instance de la classe posts.
        //La méthode magique construct est appelée automatiquement grâce au mot clé new.

        $posts->title = $title;
        $posts->content = $content;
        $posts->picture = $picture;
        $posts->postUpdate();

        if ($posts->postUpdate()) {
            $isSuccess = TRUE;
        } else {
            $isError = TRUE;
        }
    }
}