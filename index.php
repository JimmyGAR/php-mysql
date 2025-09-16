<!-- index.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('header.php'); ?>
    <div class="container">
        <hr>
        <!-- inclusion des variables et fonctions -->
        <?php
        include_once('variables.php');
        include_once('functions.php');
        ?>
        <!-- inclusion de l'entête du site -->
        <?php include_once('header.php'); ?>

        <!-- Inclusion du formulaire de connexion -->
        <?php include_once('login.php'); ?>

        <?php
        if (isset($loggedUser)) {

            echo "<h1>Site de Recettes !</h1>";

            foreach ($recipes as $recipe) {

                if ($recipe['enabled']) {
                    ?>
                    <div class="recettes">
                        <?php
                        echo "<h2> " . $recipe['title'] . '<br>' . "</h2>";
                        echo "<p> " . $recipe['recipe'] . '<br>' . displayAuthor($recipe["author"], $users) . "</p>"; ?>
                    </div>
                    <?php
                }
            }
        }
        ?>
        <hr>

    </div>
    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>

</html>