<!-- index.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
</body>

</html>