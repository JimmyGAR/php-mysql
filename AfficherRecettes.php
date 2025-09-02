<?php

// Déclaration du tableau de recettes
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : flageolets, ...',
        'author' => 'mickael.andrieu@exemple.com',
        'enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Etape 1 : bouillir l\'eau, ...',
        'author' => 'mickael.andrieu@exemple.com',
        'enabled' => false,
    ]
];

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
            }
        </style>
    </head>
    <body>
        <h1> Affichage des recettes </h1>
        <ul>
            <?php foreach($recipes as $recipe) {
                
                if ($recipe['enabled']) {
            ?>
                <h2>
                    <?php echo $recipe['title'] . '<br>';?>
                </h2>
                <p>
                    <?php echo $recipe['recipe'] . '<br>' .$recipe['author'];?>
                </p>
            <?php } } ?>
        </ul>
    </body>
</html>