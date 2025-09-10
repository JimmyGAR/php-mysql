<!-- index.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    if (
        (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        || (!isset($_POST['message']) || empty($_POST['message']))
    ) {
        echo ('Il faut un email et un message valides pour soumettre le formulaire.');
        return;
    }
    ?>
    <h1>Message bien reçu !</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Rappel de vos informations</h5>
            <p class="card-text"><b>Email</b> : <?php echo htmlspecialchars(strip_tags($_POST['email'])); ?> </p>
            <p class="card-text"><b>Message</b> : <?php echo htmlspecialchars(strip_tags($_POST['message'])); ?> </p>
        </div>
    </div>


    <?php
    ////////////////// Version 1 //////////////////
    
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0) {
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['screenshot']['size'] <= 1000000) {
            // Testons si l'extension est autorisée
            $fileInfo = pathinfo($_FILES['screenshot']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension, $allowedExtensions)) {

                // On ouvre un fichier préalablement ajouté dans le dossier qui va contenir
                // le dernier numéro qui servira de nom au fichier
    
                // lecture du fichier
                $f = fopen('uploads/number.txt', 'r');
                $ligne = fgets($f);
                $nom_fichier = (int) $ligne[0] + 1;
                fclose($f);

                // réécriture entière du fichier pour insérer que le nouveau chiffre 
                // (le fichier est remis à 0 puis on ajoute le chiffre)
                $f = fopen('uploads/number.txt', 'w');
                fputs($f, $nom_fichier);
                fclose($f);

                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file(
                    $_FILES['screenshot']['tmp_name'],
                    'uploads/' . $nom_fichier . '.' . $extension
                );
                echo "L'envoi a bien été effectué !";
            }
        }
    }
    ?>


    <?php
    ////////////////// Version 2 //////////////////
    

    // // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    // if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0) {
    //     // Testons si le fichier n'est pas trop gros
    //     if ($_FILES['screenshot']['size'] <= 1000000) {
    //         // Testons si l'extension est autorisée
    //         $fileInfo = pathinfo($_FILES['screenshot']['name']);
    //         $extension = $fileInfo['extension'];
    //         $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
    //         if (in_array($extension, $allowedExtensions)) {
    
    //             // Ajout du nom du fichier en fonction des secondes écoulé 
    //             // depuis le 1er janvier 1970 avec un identifiant unique 
    //             // généré à partir du temps en microsecondes
    
    //             $nom_fichier = time() . '_' . uniqid() . '.' . $extension;
    //             // On peut valider le fichier et le stocker définitivement
    //             move_uploaded_file(
    //                 $_FILES['screenshot']['tmp_name'],
    //                 'uploads/' . $nom_fichier
    //             );
    //             echo "L'envoi a bien été effectué !";
    //         }
    //     }
    // }
    ?>
</body>

</html>