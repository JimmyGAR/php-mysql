<?php

// Permet d'importer des fichiers externes (à voir pour plus tard)
// require 'recettes.php';

// Déclaration du tableau de recettes
$users = [
    [
        'full_name' => 'Mickaël Andrieu',
        'email' => 'mickael.andrieu@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Mathieu Nebra',
        'email' => 'mathieu.nebra@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Laurène Castor',
        'email' => 'laurene.castor@exemple.com',
        'age' => 28,
    ],
];

$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => '',
        'author' => 'mathieu.nebra@exemple.com',
        'enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => '',
        'author' => 'laurene.castor@exemple.com',
        'enabled' => false,
    ],
];

function isValidRecipe(array $recipe) : bool {
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }
    return $isEnabled;
}

function getRecipes(array $recipes) : array {
    $validRecipes = [];
    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }
    return $validRecipes;
}

function displayAuthor(string $authorEmail, array $users) : string
{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            return $author['full_name'] . '(' . $author['age'] . ' ans)';
        }
    }
}

// print(displayAuthor($recipes[2]["author"], $users))

// print_r($recipes);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Affichage des recettes</title>
        <style>
            * {
                margin: 0;
            }

            h1 {
                color: greenyellow;
                padding: 20px;
            }

            body {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1> Affichage des recettes </h1>
        <?php foreach($recipes as $recipe) {
            
            if ($recipe['enabled']) {
        ?>
            <h2>
                <?php echo $recipe['title'] . '<br>';?>
            </h2>
            <p>
                <?php 

                    echo $recipe['recipe'] . '<br>' . displayAuthor($recipe["author"], $users);
                ?>
            </p>
        <?php } } ?>
    </body>
</html>